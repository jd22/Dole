<?php
class dosis_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }

     function insert_dosis($id_producto,$dosis,$id_tratamiento)
     {
     	$data=array(
     		'id_product'=>$id_producto,
     		'dosis'=>$dosis,
     		'id_tratamiento'=>$id_tratamiento);
     	$this->db->insert('dosis',$data);

     }


     function get_dosis($id_tratamiento)
     {
          $this->db->select('*');
          $this->db->from('dosis');
          $this->db->where('id_tratamiento',$id_tratamiento);
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

     function delete_dosis($id)
     {
          $this->db->where('id_tratamiento',$id);
          $this->db->delete('dosis');

     }
}
?>