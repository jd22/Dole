<?php
class Temporal_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }


     function insert_trata_t($secado,$cosecha)
     {
     	$data = array(
     		'secado'=>$secado,
     		'cosecha'=>$cosecha);
     	$this->db->insert('temporal_trata',$data); 
     }

     function insert_dosis_t($id_trata,$id_produ,$dosis)
     {
     	$data = array(
     		'id_trata'=>$id_trata,
     		'dosis'=>$dosis,
     		'id_produ'=>$id_produ);
     	$this->db->insert('temporal_dosis',$data);

     }

     function get_trata_t()
     {
     	$this->db->select('*');
        $this->db->from('temporal_trata');
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

      function get_last_id()
     {
          $query="SELECT MAX(id) AS id FROM temporal_trata";
          $result=$this->db->query($query);
          if($result->num_rows()>0)
          {
               return $result;
          }
          else{
               return false;
          }

     }

     function get_dosis_t($id_trata)
     {
     	  $this->db->select('*');
        $this->db->from('temporal_dosis');
        $this->db->where('id_trata',$id_trata);
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

     function eli_temporal()
     {
     	  $query="DELETE FROM temporal_trata";
        $this->db->query($query);
        $query2="DELETE FROM temporal_dosis";
     	  $this->db->query($query2);
     }
 }
 ?>
