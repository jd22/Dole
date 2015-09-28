<?php
class InformacionTratamiento_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }

     

     function obtener_informacionT($id)
     {
          $this->db->select('*');
          $this->db->from('informacion_tratamiento');
          $this->db->where('id_tratamiento',$id);
          $query = $this->db->get();
          return $query;
     }

}

?>