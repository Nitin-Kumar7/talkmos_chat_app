<?php

class Authenticate extends CI_Controller{
	
	
	function __construct(){
		parent:: __construct();
		if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
            redirect(base_url('Message'));
        } 
	}
	public function login(){
	 
		$this->load->view('auth/login');
		$this->load->view('layouts/footerScript');
	}
	  
	public function signup(){
		 
	 
		$this->load->view('auth/signup');
		$this->load->view('layouts\footerScript');
	}
	
	public function signupData(){
		$data = $this->input->post();
 
       
		if(isset($data)){
			 
			 $unique_id=substr(md5(microtime()), rand(0,25), 6);
			$data_arr = array(
				'unique_id' => $unique_id,
				'user_name' => strtolower($data['user_name']),
				'user_email' =>  $data['user_email'] ,
				'user_pass' => base64_encode($data['user_pass']),
				'user_avtar' =>  $data['user_image'],
				'user_gender'=> $data['user_gender'],
				'created_at'=> $data['created_at'],
				'user_status' => 'active',
			);
			$session_arr = array(
				'user_name' =>strtolower($data['user_name']),
				'user_avtar' => $data['user_image'],
				'uniqueid' => $unique_id,
				'logged' => true,
			);
			  $email = $this->Auth->checkEmail($data['user_email']);
			   
			if(isset($email[0]['user_email'])){
				echo "Email is already exist";
			}else{
				$this->Auth->signup($data_arr);
				$this->Auth->idUpdate();
				$this->session->set_userdata($session_arr);
				echo "TRUE";
			   
			}	
		}
	}
	
	public function loginData(){
		if(isset($_POST['txt_email']) && isset($_POST['txt_pass'])){
			$data = array(
			'email' => $_POST['txt_email'],
			'pass' => $_POST['txt_pass']
			);
			
			$res = $this->Auth->login($data);
			 
	 
			if($res != 0){
				$user_name = $res[0]['user_name'];
				$user_avtar = $res[0]['user_avtar'];
				$uniqueid = $res[0]['unique_id'];
				$session_array = array(
					'user_name' => $user_name,
					'user_avtar' => $user_avtar,
					'uniqueid' => $uniqueid
				);
				$this->load->model('Messagemodel');
				$this->session->set_userdata($session_array);
				$this->Messagemodel->logoutUser('active','');


				print_r($res);
			}else{
				echo 0;
			}
		}
	}
}

?>