<?php
class Policy extends CI_controller{

    function __construct()
    {
        parent::__construct();
        
      if (isset($_SESSION['logged']) && $_SESSION['logged'] == 1) {
         redirect(base_url('Message'));
        } 
       
   
    }
    

    public function index(){
        $this->load->view('layouts/heads');
        $this->load->view('profile/policy');
        $this->load->view('layouts/footerScript');
    }
  
     
    
       
    
    
   
     
}?>