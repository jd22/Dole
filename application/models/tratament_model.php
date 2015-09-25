<?php
class Tratament_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }

     function insert_tratament($secado,$cosecha,$id_aplication)
     {
     	$data=array(
     		'Secado'=>$secado,
     		'Cosecha'=>$cosecha,
     		'id_aplicación'=>$id_aplication);
     	$this->db->insert('tratamiento',$data);
     }

     function get_tratamientos_apli($id_aplicación)
     {
          $this->db->select('*');
          $this->db->from('tratamiento');
          $this->db->where('id_aplicación',$id_aplicación);
          $query = $this->db->get();
          if($query->num_rows() >= 1) 
          {
            return $query;
          } 
          else 
          {
            return false; 
          }
     }

     function get_tratamientos()
     {
          $this->db->select('*');
          $this->db->from('tratamiento');
          $query = $this->db->get();
          if($query->num_rows() >= 1) 
          {
            return $query;
          } 
          else 
          {
            return false; 
          }
     }
     function get_tratamiento($id)
     {
          $this->db->select('*');
          $this->db->from('tratamiento');
          $this->db->where('id',$id);
          $query = $this->db->get();
          if($query->num_rows() >= 1) 
          {
            return $query;
          } 
          else 
          {
            return false; 
          }
     }


     function delete_tratamientos($id)
     {
          $this->db->where('id_aplicación',$id);
          $this->db->delete('tratamiento');

     }
}
?>