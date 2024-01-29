<?php

 

class Authenticate extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->helper( array('url','common'));
		$this->load->model('GoogleModel');
		$this->load->model('Messagemodel');
		
 
	
  
 
 // Check if the user is logged in
     if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
     // Check if the user's profile is complete
        if (isset($_SESSION['signupdetails']['email']) && $_SESSION['signupdetails']['email'] != '') {
            // Redirect the user to the message page
            header('Location: Message');
            exit();
        } 
          header('Location: Message');
            exit();
    }
  
         
  
	   
	}
	
	public function login(){
    	if (isset($_SESSION['signupdetails']['email'])) {
		  header('Location: profile/setprofile');
           exit();
		    
		}
		$Google = googleLogin();
	 	 
  
        if(!empty($Google['userdata'])){

			$userData = array(
				'pass' => $Google['userdata']['id'],
				'email' => $Google['userdata']['email'],
			);
		
		   $res= $this->Auth->login($userData);
	 
		  
			if($res != 0){
				$user_name = $res[0]['user_name'];
				$user_avtar = $res[0]['user_avtar'];
				$uniqueid = $res[0]['unique_id'];
				$session_array = array(
					'user_name' => $user_name,
					'user_avtar' => $user_avtar,
					'uniqueid' => $uniqueid,
					'logged' => true,
				);
				
				$this->session->set_userdata($session_array);
				$this->Messagemodel->logoutUser('active','');
				redirect(base_url('Message'));
			
				} else
				{
			 
					$userData = array(
						'pass' => $Google['userdata']['id'],
						'email' => $Google['userdata']['email'],
						'created_at'=> date('d/m/Y, H:s:i a'),
					
					);
					$this->session->set_userdata('signupdetails',$userData);
					redirect(base_url('profile/setprofile'));
						
	
				}
			} 
		 	 
        if(isset($Google['googleLogin'])){
			$Google['googleLogin'];
			$this->load->view('auth/login',$Google);
			$this->load->view('layouts/footerScript');
        } 
       
	}
     
	
	public function signup(){
	  
 	
 
		if (isset($_SESSION['signupdetails']['email'])) {
		  header('Location: profile/setprofile');
            // exit();
		    
		}
	 
 
		$Google = googleLogin();
   
        if(!empty($Google['userdata'])){

			$userData = array(
				'pass' => $Google['userdata']['id'],
				'email' => $Google['userdata']['email'],
			);
		   $res= $this->Auth->login($userData);
		  
			if($res != 0){
				$user_name = $res[0]['user_name'];
				$user_avtar = $res[0]['user_avtar'];
				$uniqueid = $res[0]['unique_id'];
				$session_array = array(
					'user_name' => $user_name,
					'user_avtar' => $user_avtar,
					'uniqueid' => $uniqueid,
					'logged' => true,
				);
				
				$this->session->set_userdata($session_array);
				$this->Messagemodel->logoutUser('active','');
				redirect(base_url('Message'));
			
				} else
				{
			 
					$userData = array(
						'pass' => $Google['userdata']['id'],
						'email' => $Google['userdata']['email'],
						'created_at'=> date('d/m/Y, H:s:i a'),
						 
					);
					$this->session->set_userdata('signupdetails',$userData);
					redirect(base_url('profile/setprofile'));
						
	
				}
			} 
		 	 
        if(isset($Google['googleLogin'])){
			$Google['googleLogin'];
		 
			$this->load->view('auth/signup',$Google);
			$this->load->view('layouts/footerScript');
        }
	 
	 
	}
	
public function signupData() {
    $data = $this->input->post();
  
    if (isset($data)) {
 
        $email = $this->Auth->checkEmail($data['user_email']);
        print_r($email);
        
        $unique_id = substr(md5(microtime()), rand(0,25), 6);
        $data_arr = array(
            'unique_id' => $unique_id,
            'user_name' => strtolower($data['user_name']),
            'user_email' =>  $data['user_email'],
             'user_lang' =>  $data['user_language'],
            'user_pass' => base64_encode($data['user_pass']),
            'user_avtar' =>  $data['user_image'],
            'user_gender' => $data['user_gender'],
            'created_at' => $data['created_at'],
            'user_status' => 'active'
        );
            
        $session_arr = array(
            'user_name' => strtolower($data['user_name']),
            'user_avtar' => $data['user_image'],
            'uniqueid' => $unique_id,
            'logged' => true
        );
        if (isset($email[0]['user_email'])) {
            $data = array(
                'email' => $_POST['user_email'],
                'pass' => $_POST['user_pass']
            );
            echo $this->bygoogleCheck($data) ? 'TRUE' : 'FALSE';
        } else {
            $this->Auth->signup($data_arr);
            $this->Auth->idUpdate();
            $this->session->set_userdata($session_arr);
            echo 'TRUE';
        }
    }
}

	
	public function loginData(){
 
		if(isset($_POST['email']) && isset($_POST['pass'])){
			$data = array(
			'email' => $_POST['email'],
			'pass' => $_POST['pass']
			);
			 
		
	   
			$res = $this->Auth->login($data);
			
			if($res != 0){
				$user_name = $res[0]['user_name'];
				$user_avtar = $res[0]['user_avtar'];
				$uniqueid = $res[0]['unique_id'];
				$session_array = array(
					'user_name' => $user_name,
					'user_avtar' => $user_avtar,
					'uniqueid' => $uniqueid,
					'logged' => true,
				);
				$this->load->model('Messagemodel');
				$this->session->set_userdata($session_array);
				$this->Messagemodel->logoutUser('active','');


				echo "TRUE";
			}else{
				echo "FALSE";
			}	
		}
	}


	private function byGoogleCheck($data){
	
		$data = array(
			'email' => $data['txt_pass'],
			'pass' => $data['txt_email']
			);
		$res = $this->Auth->login($data);
		
			if($res != 0){
				$user_name = $res[0]['user_name'];
				$user_avtar = $res[0]['user_avtar'];
				$uniqueid = $res[0]['unique_id'];
				$session_array = array(
					'user_name' => $user_name,
					'user_avtar' => $user_avtar,
					'uniqueid' => $uniqueid,
					'logged' => true,
				);
				$this->load->model('Messagemodel');
				$this->session->set_userdata($session_array);
				$this->Messagemodel->logoutUser('active','');


				 return true;
			}else{
				return false;
			}

	}

	public function isEmailAlreadyExist(){
	  
	  if(isset($_POST['email'])){
		  $res= $this->Auth->checkEmail($_POST['email']);
		   if($res){
			   echo 'TRUE';
		   }else{
			   echo 'FALSE';
	
		   }

	  }
 
 
   }
   
   public function Facebook(){
	
	 $this->session->unset_userdata('access_token');
	   $this->session->unset_userdata('signupdetails');
	  
    	$res= $this->Auth->checkFb($_POST['id']);
	 
		if($res != 0){
			$user_name = $res[0]['user_name'];
			$user_avtar = $res[0]['user_avtar'];
			$uniqueid = $res[0]['unique_id'];
			$session_array = array(
				'user_name' => $user_name,
				'user_avtar' => $user_avtar,
				'uniqueid' => $uniqueid,
				'logged' => true,
			);
			
			$this->session->set_userdata($session_array);
			$this->Messagemodel->logoutUser('active','');
			echo "TRUE";	
			 
		}else{
			$userData = array(
				'pass' =>  $_POST['id'],
				'email' => $_POST['name'] ,
				'created_at'=>$_POST['created_at'],
			);
			$this->session->set_userdata('signupdetails',$userData);
			echo "FALSE";
			
		}
 

   }

}

?>