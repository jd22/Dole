<?php
class Product_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }

     function get_products()
     {
     	$this->db->select('id_producto, name');
     	$this->db->from('products');
     	$query = $this->db->get();
        if($query->num_rows() > 0) 
        {
          foreach ($query->result() as $row) 
          {
          	$arrDatos[htmlspecialchars($row->id_producto,ENT_QUOTES)]=htmlspecialchars($row->name,ENT_QUOTES);
          } 
          $query->free_result();
          return $arrDatos;
        } 
        else 
        {
          return false; 
        }

     }
     function get_productos()
     {
      $this->db->select('*');
      $this->db->from('products');
      $query = $this->db->get();
      return $query->result(); 
     }

     function get_product2($id)
     {
      $this->db->select('*');
      $this->db->from('products');
      $this->db->where('id_producto',$id);
      $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1) 
        {
            return $query; 
        } 
        else 
        {
            return false; 
        }
     }

    function obtener_producto($id)
     {
      $this->db->select('*');
      $this->db->from('products');
      $this->db->where('id_producto',$id);
      // $this->db->limit(1);
      $query = $this->db->get();
      return $query; 
     }
     function get_product($id)
     {
     	$this->db->select('activecomponent, unit');
     	$this->db->from('products');
     	$this->db->where('id_producto',$id);
     	$this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1) 
        {
            return $query; 
        } 
        else 
        {
            return false; 
        }

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