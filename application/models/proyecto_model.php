<?php
class Proyecto_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }

     function insert_proyecto($numero,$fechacreacion)
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
               'numero_proyecto'=>$numero,
               'fecha_creacion'=>$fechacreacion);
          $this->db->insert('proyecto',$data);
          return true;
     }

     function getid_proyecto($numero_proyecto)
     {
          $this->db->select('*');
          $this->db->from('proyecto');
          $this->db->where('numero_proyecto',$numero_proyecto);
          $query = $this->db->get();
          foreach ($query->result() as $row) 
          {
               return $row->id_proyecto;
          }   
     }

     function get_proyecto($id)
     {
          $this->db->select('*');
          $this->db->from('proyecto');
          $this->db->where('id_proyecto',$id);
          $query = $this->db->get();
          return $query->result(); 
     }

    


     function get_proyectos()// obtiene todos los proyectos de la base de datos
     {
          $this->db->select('*');
          $this->db->from('proyecto');
          $query = $this->db->get();
          return $query->result();
     }

}

?>