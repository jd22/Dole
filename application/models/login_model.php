<?php
class Login_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }

	function userlogin($username, $password) {
     //get the username & password from usuarios table
     	  $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->limit(1);
          
         
        $query = $this->db->get();
        if($query->num_rows() == 1) 
        {
            return $query->result(); 
        } 
        else 
        {
            return false; 
        }
    }
}
?>