<?php
class GoogleModel extends CI_Model
{
 function Is_already_register($id)
 {
  $this->db->where('login_oauth_uid', $id);
  $query = $this->db->get('google_auth');
  if($query->num_rows() > 0)
  {
   return true;
  }
  else
  {
   return false;
  }
 }

 function UpdateUserData($data, $id)
 {
  $this->db->where('login_oauth_uid', $id);
  $this->db->update('google_auth', $data);
 }

 function InsertUserData($data)
 {
  $this->db->insert('google_auth', $data);
 }
}
?>