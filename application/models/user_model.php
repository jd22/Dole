<?php 


class User_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }


     function insert_user($username, $password, $real_name,$email,$active,$date)
     {
     	$data = array(
     		'username' => $username,
     		'password' => $password,
               'realname'=> $real_name,
               'email'=>$email,
               'active'=>$active,
               'date'=>$date);
     	$this->db->insert('users',$data);
     }

     function delete_user($id)
     {
     	$this->db->where('id',$id);
     	$this->db->delete('users');
     }

     function update_user($id,$username, $real_name, $email)
     {
     	$data = array(
     		'username' => $username,
               'realname' => $real_name,
               'email' => $email);
     	$this->db->where('id',$id);
     	$this->db->update('users',$data);

     }

     function activate_dasactivate($id,$active)
     {
          $data = array(
               'active' => $active);
          $this->db->where('id',$id);
          $this->db->update('users',$data);   
     }

     function update_password($id,$password,$fecha)
     {
          $data = array(
               'date'=>$fecha,
               'generic_pass' => 0,
               'password' => $password);
          $this->db->where('id',$id);
          $this->db->update('users',$data);   

     }

     function get_users()
     {
          $this->db->select('*');
          $this->db->from('users');
          $query = $this->db->get();
          if($query->num_rows() >= 1) 
          {
            return $query->result(); 
          } 
          else 
          {
            return false; 
          }
     }

     function get_user($id)
     {
          $this->db->select('*');
          $this->db->from('users');
          $this->db->where('id',$id);
          $query = $this->db->get();
          if($query->num_rows() >= 1) 
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