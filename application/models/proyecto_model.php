<?php
class Proyecto_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }

     function insert_proyecto($numero)
     {
          $this->db->select('*');
          $this->db->from('proyecto');
          $query = $this->db->get();  
          foreach ($query->result() as $proyecto) 
          {
               if($proyecto->numero_proyecto == $numero){
                    return false;
               }
          } 
          $data = array(
               'numero_proyecto'=>$numero);
          $this->db->insert('proyecto',$data);
          return true;
     }

     function get_proyecto($id)
     {
          $this->db->select('*');
          $this->db->from('proyecto');
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