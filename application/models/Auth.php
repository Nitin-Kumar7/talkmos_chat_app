<?php

	class Auth extends CI_model{
		function __construct(){
			parent::__construct();
		}
		public $email;
		public function idUpdate(){
			$this->db->select('unique_id');
			$unique_id = $this->db->get('user')->result_array();
			$totalId = count($unique_id);
			for ($i=0; $i < $totalId; $i++) {
				$data = $unique_id[$i]['unique_id'];
				$count = $i + 1;
				$this->db->query("UPDATE user SET id = '$count' WHERE unique_id = '$data'");
			}
		}
		public function signup($data){
			$this->db->insert('user',$data);
		}
    public function checkEmail($email){
            if (!empty($email)) {
                $this->db->where("(user_email = '$email' OR user_name = '$email')");
                $res = $this->db->get('user');
        
                if($res->num_rows() > 0){
                   return  true;
                } else {
                   return false;
                }
            }
        }
         


		public function login($data){
			$res = $this->db->get_where('user', array('user_email'=>$data['email'], 'user_pass'=>base64_encode($data['pass'])));
 
			if($res->num_rows() > 0){
				return $res->result_array();
			}else{
				return false;
			}
		}
		public function checkFb($data){
	       
			 $this->db->where('user_pass',base64_encode($data));
			 $res= $this->db->get('user');
		 
			  
			if($res->num_rows() > 0){
				return $res->result_array();
			}else{
				return false;
			}
		}
	}

?>