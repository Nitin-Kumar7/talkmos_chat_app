<?php
class Message extends CI_controller{

   function __construct(){
	  parent::__construct();
   $this->load->helper('common');
  
   
   
            if (!isset($_SESSION['logged']) && !$_SESSION['logged'] == 1) {
                 header('Location: profile/setprofile');
                exit();
             
            }  
       }
 
  
  
 
 
	public function index(){
	   
		if(isset($_SESSION['user_avtar'])){
			
			$data['data'] = $this->Messagemodel->ownerDetails();
		 
			
			$this->load->view('layouts/head');
			$this->load->view('layouts/header',$data);
			$this->load->view('message/message', $data);
			$this->load->view('layouts/footerScript');
		}else{
		  
			$this->load->view('error/error');
			
		}
	}
	
	public function ownerDetails(){
		$res = $this->Messagemodel->ownerDetails();
		print_r(json_encode($res));
	}
// public function allUser(){
//     $language = $_GET['language'];
//     $gender = $_GET['gender'];
//     $data['data'] = $this->Messagemodel->allUser($language,$gender);
//     $data['last_msg'] = array();
//     $this->load->helper('url');
//     if(!is_array($data['data'])){
//         echo "<p class='text-center text-white'>No user available.</p>";
//     }else{
//         $count = count($data['data']);
//         for($i = 0; $i < $count; $i++){
//             $unique_id = $data['data'][$i]['unique_id'];
//             $msg = $this->Messagemodel->getLastMessage($unique_id);
//             $unseen_msg =  $this->Messagemodel->GetUnseenMessage($unique_id);
            
//             for($j = 0; $j < count($msg); $j++){
//                 $time = explode(" ",$msg[0]['time']);
//                 $time = explode(".", $time[1]);
//                 $time = explode(":",$time[0]);
//                 if((int)$time[0] == 12){
//                     $time = $time[0].":".$time[1]." PM";
//                 }elseif((int)$time[0] > 12){
//                     $time = ($time[0] - 12).":".$time[1]." PM";
//                 }else{
//                     $time = $time[0].":".$time[1]." AM";
//                 }

//                 array_push($data['last_msg'],array(
//                     'message' => $msg[0]['message'],
//                     'sender_id' => $msg[0]['sender_message_id'],
//                     'receiver_id' => $msg[0]['receiver_message_id'],
//                     'time' => $time,
//                     'unseen_count' => $unseen_msg // add count of unseen messages
//                 ));
//             }
//         }
//         $this->load->view('message/sampleDataShow',$data);
//     }
// }
public function allUser(){
    $language = $_GET['language'];
    $gender = $_GET['gender'];
    $data['data'] = $this->Messagemodel->allUser($language,$gender);
    $data['last_msg'] = array();
    $this->load->helper('url');
    if(!is_array($data['data'])){
        echo "<p class='text-center text-white'>No user available.</p>";
    }else{
   
        $this->load->view('message/sampleDataShow',$data);
    }
}


	public function selfUser(){
		$data['data'] = $this->Messagemodel->selfUser();
		$data['last_msg'] = array();
		$this->load->helper('url');
		if(!is_array($data['data'])){
			echo "<p class='text-center'>No user available.</p>";
		}else{
 
			$this->load->view('message/sampleDataShow',$data);
		 
		}

	}
	public function getIndividual(){
		 
		$returnVal = $this->Messagemodel->getIndividual($_POST['data']);
		print_r(json_encode($returnVal,true));
	}
	public function logout(){
 
	   
		if($this->input->post()){
			$date = $_POST['date'];
		}
  
		$this->Messagemodel->logoutUser('deactive',$date);
		$_SESSION['logged'] =false;
		unset(
			$_SESSION['uniqueid'],
			$_SESSION['user_name'],
			$_SESSION['user_avtar'],
			$_SESSION['signupdetails'],
			$_SESSION['access_token']
		);
		
			  
		echo base_url();
	 
	}
	public function setNoMessage(){
		$data['user_avtar'] = $_POST['user_avtar'];
		$data['name'] = $_POST['name'];
		$this->load->view('message/notmessageyet',$data);
	 
	}
	public function sendMessage(){
		 
		if(isset($_POST['data']) && isset($_SESSION['uniqueid'])){
		$jsonDecode = json_decode($_POST['data'],true);
	  $universe =isset($jsonDecode['universe']) ? $jsonDecode['universe'] : '0';
		$uniq = $_SESSION['uniqueid'];
		if(!empty($jsonDecode['uniq'])){
			$arr = array(
				'time' => $jsonDecode['datetime'],
				'sender_message_id' => $uniq,
				'receiver_message_id' => $jsonDecode['uniq'],
				'message' => $jsonDecode['message'],
				'universe' =>  $universe,
			);
		}else{
			$arr = array(
				'time' => $jsonDecode['datetime'],
				'sender_message_id' => $uniq,
				'receiver_message_id' => 1,
				'message' => $jsonDecode['message'],
				'universe' =>  $universe,

			);
		}
	  
		   $result = $this->Messagemodel->sentMessage($arr);
           echo $result ? 'true' : 'false';
		}
	}
public function deleteMessage()
{
    if (isset($_POST['uniqe_id']) && isset($_POST['universeType']) && isset($_SESSION['uniqueid'])) {
        $sender_id = $_POST['uniqe_id'];
        $universeType = $_POST['universeType'];
        $type = "";
        
        if ($universeType == "anonymous_mode") {
            $type = 0;
        } elseif ($universeType == "self_mode") {
            $type = 2;
        } elseif ($universeType == "universe_mode") {
            $type = 1;
        }
        
         $res = $this->Messagemodel->clearChat($sender_id, $type);
        print_r($res);
    }
}


	    
 
	public function getMessage(){
		 
      
		if(isset($_POST['universe'])){
		
			$send =array('uniqueid'=>$_POST['data'],'universe'=>$_POST['universe']);
			if($_POST['universe']==1){
				 
				if(isset($_POST['data']) && isset($_SESSION['uniqueid'])){
				$data['data'] = $this->Messagemodel->getmessage($send);
				
				$data['user_avtar'] =  $_POST['user_avtar'] ? $_POST['user_avtar'] :'';
				$this->load->view('message/sampleMessageShow',$data);
			  }
			 
			}
			if($_POST['universe']==2){
				 
				if(isset($_POST['data']) && isset($_SESSION['uniqueid'])){
				 
				$data['data'] = $this->Messagemodel->getmessage($send);
				
				$data['user_avtar'] =  $_POST['user_avtar'] ? $_POST['user_avtar'] :'';
				$this->load->view('message/sampleMessageShow',$data);
			  }
			 
			}
		}else{
			 
			$send =array('uniqueid'=>$_POST['data']);
		
			if(isset($_POST['data']) && isset($_SESSION['uniqueid'])){
				$data['data'] = $this->Messagemodel->getmessage($send);
				$data['user_avtar'] =  $_POST['user_avtar'] ? $_POST['user_avtar'] :'';
				$this->load->view('message/sampleMessageShow',$data);
			}
				 
				 
		}
	 
	}
	public function updateBio(){
		if($_POST){
			$this->Messagemodel->updateBio($_POST);
		}
	}
	public function blockUser(){
		if(isset($_POST['time']) && isset($_POST['uniq'])){
			$arr = array(
				'blocked_from' => $_SESSION['uniqueid'],
				'blocked_to' => $_POST['uniq'],
				'time' => $_POST['time']
			);
			$this->Messagemodel->blockUser($arr);
			return 1;
		}
	}
	public function getBlockUserData(){
		if(isset($_POST['uniq'])){
			$res = $this->Messagemodel->getBlockUserData($_POST['uniq'],$_SESSION['uniqueid']);
			print_r(json_encode($res));
		}
	}
	public function unBlockUser(){
		if(isset($_POST['uniq'])){
			$from = $_SESSION['uniqueid'];
			$to = $_POST['uniq'];
			$this->Messagemodel->unBlockUser($from, $to);
		}
	}

	public function isUserAlreadyExist(){
	 
		$username =$this->input->post('username') ;
		$res= $this->Messagemodel->checkUsername($username);
		 if($res){
			 echo 'true';
		 }else{
			 echo 'false';
 
		 }
 
   }
   public function updateProfile(){
	if($_POST){
		  if($this->Messagemodel->updateProfile($_POST)){
			$_SESSION['user_avtar']=$_POST['avatar'];
			  echo "TRUE";
		  }else{
			echo "FALSE";
		  }
		  
		}
		}
public function changePassword(){
	if($_POST){
			if($this->Messagemodel->changePassword($_POST)){
				echo "TRUE";
			}else{
			echo "FALSE";
			}
			
		}
 }
	 

public function do_upload(){
    if(!empty($_FILES['file']['name'][0]))
    {
   
      if (isset($_FILES['file']['name']) && is_array($_FILES['file']['name'])) {
        $total_files = count($_FILES['file']['name']);
          
      }else{
          $total_files =  0;
      }
        
        if ($total_files > 0) {
            
            for($i=0; $i<$total_files; $i++)
            {
                $ext = pathinfo($_FILES['file']['name'][$i], PATHINFO_EXTENSION);
                
                $allow_ext = array('jpg','png','gif', 'jpeg', 'pdf', 'GIF', 'JPG', 'JPEG', 'PNG', 'PDF', 'doc', 'DOC');
                
                if(in_array($ext, $allow_ext))
                {
                    $source_path = $_FILES['file']['tmp_name'][$i];
                    $target_path = 'assets/upload/'. $_FILES['file']['name'][$i];
                    
                     if($this->input->post('isReady')=='true'){
                         
                        if(move_uploaded_file($source_path, $target_path))
                        {
                         echo '<p><img src="'.$target_path.'" class="img-thumbnail sentimg" width="200" height="160" /></p><br />';
                         
                        }
                         
                     }else{
                         echo '<p><img src="'.$target_path.'" class="img-thumbnail sentimg fail" width="200" height="160" /></p><br />';
                     }
                }
            }
        }
    }
}


//   public function do_upload() {
  
  
//   print_r($_FILES);
// 	$unique_id =$this->input->post('unique_id');
//     $config['upload_path'] = 'assets/upload';
//     $config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|GIF|JPG|JPEG|PNG|PDF|doc|DOC';
//     // $config['max_size'] = 2000000;
//     // $config['max_width'] = 1024;
//     // $config['max_height'] = 768;
//     $this->load->library('upload', $config);
//     $this->upload->initialize($config);
//     $error = array();
//     $data = array();
	 

//     if (isset($_FILES['file'])) {
//         print_r($_FILES['file']);
      
//         $number_of_files = sizeof($_FILES['file']['tmp_name']);
//         $files = $_FILES['file'];
//         for ($i = 0; $i < $number_of_files; $i++) {
			 
//             $_FILES['file']['name'] = $files['name'][$i];
//             $_FILES['file']['type'] = $files['type'][$i];
//             $_FILES['file']['tmp_name'] = $files['tmp_name'][$i];
//             $_FILES['file']['error'] = $files['error'][$i];
//             $_FILES['file']['size'] = $files['size'][$i];

//             if (!$this->upload->do_upload('file')) {
//                 $error[] = $this->upload->display_errors();
//             } else {
//                 $data[] = $this->upload->data();
//                 $upload_data = $this->upload->data();
//                 $file_name = $upload_data['file_name'];
// 				$this->Messagemodel->SaveMedia($unique_id,$file_name);   
			  
//             }
//         }
//     }
//     echo json_encode(array('error' => $error, 'data' => $data));
// }

        public function updateUnSeenMsg(){      
            if(isset($_POST['uniqe_id'])){
                $sender_id = $_SESSION['uniqueid'];
                $reciver_id = $_POST['uniqe_id'];
                $result = $this->Messagemodel->updateUnSeenMsg($reciver_id,$sender_id);
                  $result ? true :false;  
                          
            }
        }
        public function IsMsgSeenByUser(){      
            if(isset($_POST['uniqe_id'])){
                $sender_id = $_SESSION['uniqueid'];
                $reciver_id = $_POST['uniqe_id'];
                $result = $this->Messagemodel->IsMsgSeenByUser($reciver_id,$sender_id);
                 print_r($result);
              
                          
            }
        }
        
        
        
                
            public function IsTyping() {
            if(isset($_POST['is_type']) && isset($_POST['unique_id'])) {
                $is_type = $_POST['is_type'];
                $unique_id = $_POST['unique_id'];
                $result = $this->Messagemodel->setIsTyping($unique_id, $is_type);
                print_r($result);
                // echo $result ? 'true' : 'false';
            }
        }
        
              public function IsOnlineOffline() {
              if(isset($_POST['is_online']) && isset($_POST['unique_id']) && isset($_POST['last_logout'])) {
                $is_online = $_POST['is_online'];
                $unique_id = $_POST['unique_id'];
                $last_logout = $_POST['last_logout'];
                $result = $this->Messagemodel->setIsOnlineOffline($unique_id, $is_online,$last_logout);
                print_r($result);
              
            }
        }

	 
	 
	    

}
?>