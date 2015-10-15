<?php
class Land_model extends CI_Model
{
   function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }


    function get_lands()
     {
     	$this->db->select('id, nombre');
     	$this->db->from('finca');
     	$query = $this->db->get();
        if($query->num_rows() > 0) 
        {
          foreach ($query->result() as $row) 
          {
          	$arrDatos[htmlspecialchars($row->id,ENT_QUOTES)]=htmlspecialchars($row->nombre,ENT_QUOTES);
          } 
          $query->free_result();
          return $arrDatos;
        } 
        else 
        {
          return false; 
        }

     }

    function get_land($id)
    {
      $this->db->select('nombre, ubicacion');
      $this->db->from('finca');
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

    function get_finca($id)
    {
      $this->db->select('*');
      $this->db->from('finca');
      $this->db->where('id',$id);
      $query = $this->db->get();
      return $query->result();
    }
}
?>