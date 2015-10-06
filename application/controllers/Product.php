<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct()
    {
       parent::__construct();
       $this->load->model('product_model','',TRUE);
       $this->load->model('temporal_model','',TRUE);    

    }

	function index()
	{
        $this->load->view('_Layout');
        $this->load->view('agregar_producto');
        $this->load->view('footerlayout'); 
	}	

    function insert_product()
    {
        $name = $this->input->post('_name');
        $active = $this->input->post('_active');
        $unit = $this->input->post('_unit');
        $this->product_model->insert_product($name,$active,$unit);
        $datos3=array();
        $datos3[]="Exito";
        echo json_encode($datos3);
    }

    function get_product($id)
    {
      $this->db->select('*');
      $this->db->from('products');
      $this->db->where('id_producto',$id);
      $this->db->limit(1);
      $query = $this->db->get();
      return $query;
    }
    function listaProductos(){
      $datos['productos'] = $this->product_model->get_productos();// hay que cambiar esto por la parte de los usuarios para cuales proyectos pertenecen a cada quien
      // por el momento se cargaran todos los proyectos
      $this->load->view('_Layout');                     
      $this->load->view('lista_productos',$datos);
      // $this->load->view('footerlayout');

    }
}

?>