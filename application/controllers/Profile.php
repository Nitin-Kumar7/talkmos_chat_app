<?php
class Profile extends CI_controller{

    function __construct()
    {
        parent::__construct();
        
      if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
         redirect(base_url('Message'));
        } 
       
   
    }
    
	public function setprofile(){
          $signupdetails = $this->session->userdata('signupdetails');
 
        if(empty($signupdetails['email'])){
            redirect(base_url('signup'));
        }
       
     
           
        $this->load->view('layouts/heads');
        $this->load->view('profile/setprofile');
        $this->load->view('layouts/footerScript');
 
    }
    public function setchate(){
        $this->load->view('layouts/heads');
        $this->load->view('profile/setChate');
        $this->load->view('layouts/footerScript');
    }
  
      public function getSignindetails(){
  

        if(isset($_POST['email'])){
            $res= $this->Auth->checkEmail($_POST['email']);
           if($res){
            echo "User Exist";
               return;
           }else{
               $signupdetails=array(
                   'email'=>$_POST['email'],
                   'pass'=>$_POST['pass'],
                   'created_at'=>$_POST['created_at'],
                );
                $this->session->set_userdata('signupdetails', $signupdetails);
                echo "FALSE";
           }
           
           
        }
 
      }
    public function getProfiledetails(){
       $post= $this->input->post();
         $profileDetails =array(
            'user_name'=>$post['user_name'],
            'user_gender'=>$post['user_gender'],
            'user_language'=>$post['user_language'],
            'user_image'=>$post['user_image'],
         );

         if($post){
            
            $this->session->set_userdata('profileDetails',  $profileDetails);
             echo "TRUE";
         }
 
    }
       
    public function isUserAlreadyExist(){
	       
		$username =$this->input->post('username') ;
		$res= $this->Messagemodel->checkUsername($username);
       
		$response = array();
       
		if($res){
		  $response['status'] = 'success';
		  $response['message'] = 'User Exist';
		  $response['result'] = 'TRUE';
		}else{
		  $response['status'] = 'error';
		  $response['message'] = 'New user';
		  $response['result'] = 'FALSE';
		}
        echo json_encode($response);
 
   } 
    
   
     
}?>