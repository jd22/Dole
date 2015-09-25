<?php
class Tratamiento_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }
	function insert_product($name,$active,$unit)
     {

        $data = array(
          'name' => $name,
          'activecomponent' => $active,
          'unit'=> $unit
          );
        $this->db->insert('products',$data);
     }
 }

?>