<?php
  
function messageTime($messageTime){
 
  // $yesterday = date('Y-m-d H:i', strtotime($messageTime));
      $date =  date('Y-m-d H:i', strtotime($messageTime));
      $today = date('Y-m-d');
      $yesterday = date('Y-m-d', strtotime('-1 day'));
  
      if ($date == $today) {
          return date('H:i A', strtotime($messageTime)); 
      } elseif ($date == $yesterday) {
          return 'Yesterday';
      } else {
       return  date('H:i A', strtotime($messageTime));
            
      }
  }
  
function googleLogin(){
    $ci=&get_instance();
    
    $data= array();
    $getInfo='';
    require_once APPPATH. '/libraries/vendor/autoload.php';
		$google_client = new Google_Client();
	  
		$google_client->setClientId('327519692940-fm45dbedegqdl56388ht7lc6llc9p6hh.apps.googleusercontent.com'); //Define your ClientID
	  
		$google_client->setClientSecret('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'); //Define your Client Secret Key
	  
		$google_client->setRedirectUri('https://talkmos.com/login'); //Define your Redirect Uri
	  
		$google_client->addScope('email');
	  
		$google_client->addScope('profile');

        if(isset($_GET["code"]))
        {
         $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
      
         if(!isset($token["error"]))
           {
          $google_client->setAccessToken($token['access_token']);
      
          $ci->session->set_userdata('access_token', $token['access_token']);
      
          $google_service = new Google_Service_Oauth2($google_client);
      
          $getInfo = $google_service->userinfo->get();
          $data['userdata']=$google_service->userinfo->get();
        
         }
       
       }
        


     
       if(isset($getInfo) && !empty($getInfo)){
     
        
        $data['userdata']= $getInfo;
        $data['logged']= true;
        $data['googleLogin']= '';
        }else{
           
        if(!$ci->session->userdata('access_token')){
           $data['googleLogin'] = $google_client->createAuthUrl();
           $data['userdata'] = '';
        } 
        }
      
        return  $data ;
    

}

 
   function GetUnseenMessage($unique_id,$receiver_id){
      $ci=&get_instance();
    // here reciever id will be session id
     $ci->db->select('COUNT(*) as unseen_count');
     $ci->db->from('user_messages');
     $ci->db->where('sender_message_id', $unique_id);
     $ci->db->where('receiver_message_id', $receiver_id);
     $ci->db->where('seen', 0);
    $query =   $ci->db->get();
    $result = $query->row();
    
    return $result->unseen_count;
    
   }
   
 
 
   
     function getLastMessage($unique_id){
        $ci=&get_instance();
        $ci->load->library('session');
		$ci->db->select('*');
		$session_id = $ci->session->userdata('uniqueid');
	 
		$where = "sender_message_id = '$session_id' AND receiver_message_id = '$unique_id' OR 
		sender_message_id = '$unique_id' AND receiver_message_id = '$session_id'";
		$ci->db->where($where);
		$ci->db->order_by('time', 'DESC');
		$result = $ci->db->get('user_messages', 1)->result_array();
		return $result;
	}
 
function showlastMessage($id){
  
  $result = getLastMessage($id);
  $data = array();
 
  foreach ($result as $msg) {
    if (!empty($msg) && isset($msg)) {
      $time = date("g:i A", strtotime($msg['time']));

      $last_msg = array(
        'message' => $msg['message'],
        'sender_id' => $msg['sender_message_id'],
        'receiver_id' => $msg['receiver_message_id'],
        'time' => $time
      );

      array_push($data, $last_msg);
    }
  }

  return $data;
}




 
 
?>