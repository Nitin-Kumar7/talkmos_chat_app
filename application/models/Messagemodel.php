<?php
class Messagemodel extends CI_model{
	public function ownerDetails(){

		//    echo "<pre>"; print_r($_SESSION);die;
		if(isset($_SESSION['uniqueid'])){
			$this->db->select('*');
			$this->db->where('unique_id',$_SESSION['uniqueid']);
			$res = $this->db->get('user')->result_array();
			return $res;
		}
	}

	public function updateProfile($data){
		if(isset($_SESSION['uniqueid'])){
			$session_id = $_SESSION['uniqueid'];
			$gender = $data['gender'];
			$language = $data['language'];
			$avatar = $data['avatar'];
			 
		return $this->db->query("UPDATE user SET user_gender = '$gender', user_lang = '$language', user_avtar = '$avatar' WHERE unique_id = '$session_id'");
		 
		}
	}
	public function changePassword($data){
		if(isset($_SESSION['uniqueid'])){
			$session_id = $_SESSION['uniqueid'];
			$oldPass = $data['oldPass'];
			$newPass = $data['newPass'];
	
			// Check if old password matches
			$user = $this->db->get_where('user', array('unique_id' => $session_id))->row();
		 
			if(password_verify(base64_decode($oldPass), $user->user_pass)){
				// Hash new password using bcrypt
				$hashedPass = base64_encode($newPass);
	
				// Update user's password in the database
				return $this->db->update('user', array('user_pass' => $hashedPass), array('unique_id' => $session_id));
			} else {
				return false;
			}
		}
	}
// 	public function allUser($language, $gender) {
// 		if(isset($_SESSION['uniqueid'])) {
// 			$mysession = $_SESSION['uniqueid'];
// 			$this->db->select('*');
// 			$this->db->where('unique_id != ', $mysession);
	
// 			if($language != 'null' && $language!='') {
// 				$this->db->where('user_lang', $language); // modify query to include language parameter
// 			}
// 			if($gender != 'null' && $gender!='') {
// 				$this->db->or_where('user_gender', $gender); // modify query to include gender parameter
// 			}
	
// 			$data = $this->db->get('user');
			 
// 			// echo $this->db->last_query(); 
// 			if($data->num_rows() > 0){
// 				return $data->result_array();
// 			} else {
// 				return false;
// 			}
// 		}
// 	}


public function allUser1($language, $gender) {
	if(isset($_SESSION['uniqueid'])) {
		$mysession = $_SESSION['uniqueid'];
		$this->db->select('*');
		$this->db->where('unique_id != ', $mysession);

		if($language != 'null' && $language!='') {
			$this->db->where('user_lang', $language);
		}
		if($gender != 'null' && $gender!='') {
			$this->db->where('user_gender', $gender);
		}

		$data = $this->db->get('user');
		 
		if($data->num_rows() > 0){
			return $data->result_array();
		} else {
			return false;
		}
	}
}

public function allUser($language, $gender) {
	if(isset($_SESSION['uniqueid'])) {
		
		$mysession = $_SESSION['uniqueid'];
		$msgQuery = "SELECT * FROM `user` LEFT JOIN user_messages ON (user_messages.sender_message_id = user.unique_id) WHERE user.unique_id != '".$mysession."' AND user_messages.receiver_message_id = '".$mysession."' AND user_messages.seen = 0 GROUP BY user_messages.sender_message_id" ;
		//$msgQuery1 = "SELECT user.unique_id FROM `user` LEFT JOIN user_messages ON (user_messages.sender_message_id = user.unique_id) WHERE user.unique_id != '".$mysession."' AND user_messages.receiver_message_id = '".$mysession."' AND user_messages.seen = 0 GROUP BY user_messages.sender_message_id" ;
	    $data = $this->db->query($msgQuery);
	    if($data->num_rows() > 0){ $messageUsers =  $data->result_array(); } else { $messageUsers =  array(); }
	        
	        
		$otherData = $this->db->query("SELECT * 
FROM `user` 
WHERE user.unique_id != '".$mysession."' AND user.unique_id NOT IN(
    SELECT user.unique_id 
FROM `user` 
LEFT JOIN user_messages ON (user_messages.sender_message_id = user.unique_id)
WHERE user.unique_id != '".$mysession."' AND user_messages.receiver_message_id = '".$mysession."' AND user_messages.seen = 0
GROUP BY user_messages.sender_message_id)
ORDER BY user.user_status");
			
		if($otherData->num_rows() > 0){
		    $allUsers = array_merge($messageUsers, $otherData->result_array());
		    
		    return $allUsers;
		} else {
		    return  $data->result_array();
		}
		
		/*if(){	
		} else {
			return false;
		}*/
	}
}



	public function selfUser(){
		if(isset($_SESSION['uniqueid'])){
			$mysession = $_SESSION['uniqueid'];
			$this->db->select('*');
			$this->db->where('unique_id = ',$mysession);
			$data = $this->db->get('user');
			if($data->num_rows() > 0){
				return $data->result_array();
			}else{
				return false;
			}
		}
	}
				

	public function logoutUser($status, $date){
		if(isset($_SESSION['uniqueid'])){
			$currentSession = $_SESSION['uniqueid'];
			$this->db->query("UPDATE user SET user_status = '$status' , last_logout = '$date' WHERE 
			unique_id = '$currentSession'");
		}
	}
	public function sentMessage($data){
		return	$this->db->insert('user_messages',$data);
	}
	public function getmessage($data){
	
		if(isset($data['universe'])){
		    
			if($data['universe'] && $data['uniqueid']){
			    
			    $universe =$data['universe'];
    			$session_id =$data['uniqueid'];
    			
			    if($data['universe'] == 1){
    			    $where = "sender_message_id = '$session_id' AND universe = '$universe' AND seen = 0";
    			} else {
    				$where = "sender_message_id = '$session_id' AND universe = '$universe'";
    			}
			}
		}else{
		    //echo '<pre>' ; print_r($data);
			$uniqueid =$data['uniqueid'];
			$session_id = $_SESSION['uniqueid'];
			$where = "seen = 0 AND ((sender_message_id = '$session_id' AND receiver_message_id = '$uniqueid') OR 
			(sender_message_id = '$uniqueid' AND receiver_message_id = '$session_id'))";
			/*$where = "seen = 0 AND (sender_message_id = '$uniqueid' OR receiver_message_id = '$uniqueid')";*/
		}

 
		$this->db->select('*');
		$this->db->where($where);
		$result = $this->db->get('user_messages')->result_array();
	 // print_r($this->db->last_query());   
		return $result;
	 
	}


// 	// getuniVerseMessage
	
// 	public function getmessage($data){
// 	$this->db->select('*');
// 	$session_id = $_SESSION['uniqueid'];
// 	$where = "sender_message_id = '$session_id' AND receiver_message_id = '1' OR 
// 	sender_message_id = '$data' AND receiver_message_id = '1' AND universe = '1'";
// 	$this->db->where($where);
// 	$result = $this->db->get('user_messages')->result_array();
// 	return $result;
 
// }
 
	public function getLastMessage($data){
	    $this->db->select('*');
		$session_id = $_SESSION['uniqueid'];
		/*$where = "((sender_message_id = '$session_id' AND receiver_message_id = '$data') OR 
		(sender_message_id = '$data' AND receiver_message_id = '$session_id')) AND seen = 0";*/
		
		$where = "seen = 0 AND ((sender_message_id = '$session_id' AND receiver_message_id = '$data') OR 
			(sender_message_id = '$data' AND receiver_message_id = '$session_id'))";
			
		$this->db->where($where);
		$this->db->order_by('time', 'DESC');
		$result = $this->db->get('user_messages', 1)->result_array();
		return $result;
	}
	public function getLastMessagetoself($uniqueid){
		$this->db->select('*');
 
		$this->db->where('universe',1);
		$this->db->where('sender_message_id',$uniqueid);
		// $this->db-('sender_message_id',$session_id);
		$this->db->order_by('time', 'DESC');
		$result = $this->db->get('user_messages', 1)->result_array();
	 
		return $result;
		 
	}
	public function getIndividual($id){
		$this->db->select('*');
		$this->db->where('unique_id',$id);
		$res = $this->db->get('user')->result_array();
		return $res;
	}
	public function updateBio($data){
		if(isset($_SESSION['uniqueid'])){
			$session_id = $_SESSION['uniqueid'];
			$bio = $data['bio'];
			$dob = $data['dob'];
			$address = $data['address'];
			$phone = $data['phone'];

			$this->db->query("UPDATE user SET bio = '$bio', dob = '$dob', address = '$address', phone = '$phone' WHERE unique_id = '$session_id'");
			// return $data;
		}
	}
	public function blockUser($arr){
		$this->db->insert('block_user',$arr);
	}
	public function unBlockUser($val1, $val2){
		$this->db->query("DELETE FROM block_user WHERE blocked_from = '$val1' AND blocked_to = '$val2'");
	}
	public function getBlockUserData($val1, $val2){
		$this->db->select('*');
		$where = "blocked_from = '$val1' AND blocked_to = '$val2' OR blocked_from = '$val2' AND blocked_to = '$val1'";
		$this->db->where($where);
		$res = $this->db->get('block_user')->result_array();

		return $res;
	}
	public function checkUsername($username){
		$this->db->where('user_name',$username);
		$row = $this->db->get('user')->num_rows();
		if($row > 0 ){
        return true;
		}else{
			return false;
		}
		 
		 
	}


public function clearChat($sender_id, $universe) {
    $session_id = $_SESSION['uniqueid'];
    $where = "sender_message_id = '$session_id' AND receiver_message_id = '$sender_id' OR sender_message_id = '$sender_id' AND receiver_message_id = '$session_id' AND universe = $universe";
    $this->db->where($where);
     $this->db->delete('user_messages');
     $lastQuery = $this->db->last_query();
     echo $lastQuery;
}

	 
 public	function SaveMedia($unique_id,$file){
		// $this->db->where('unique_id',$id);
	  $this->db->insert('media',array('unique_id'=>$unique_id,'media'=>$file));
	  
		
	}
 
 

public function updateUnSeenMsg($sender_id, $receiver_id) {    
    $this->db->where('receiver_message_id', $receiver_id);
    $this->db->where('sender_message_id', $sender_id);
    $this->db->where('seen', 0); 
    $result = $this->db->update('user_messages', array('seen' => 1));
    echo '<pre>'; print_r($result);
     if($result){
       return true;   
     }else{
         return false;
     }       
}
public function IsMsgSeenByUser($sender_id, $receiver_id) {
    $this->db->where('receiver_message_id', $receiver_id);
    $this->db->where('sender_message_id', $sender_id);
    $this->db->where('seen', 1); 
    $result = $this->db->get('user_messages');
    
    return $result->num_rows() > 0;
}




 
public function setIsTyping($receiver_id, $istype) {  
  	$session_id = $_SESSION['uniqueid'];
    $this->db->where('unique_id', $session_id);
    $result = $this->db->update('user', array('isTyping' => $istype));
   
    return $result;       
     
}
 
public function setIsOnlineOffline($receiver_id, $is_online ,$last_logout) {  
  	$session_id = $_SESSION['uniqueid'];
    $this->db->where('unique_id', $session_id);
    $result = $this->db->update('user', array('user_status' => $is_online,'last_logout'=>$last_logout));
    return $result;       
    
     
}










}
?>