<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends CI_Controller {

    var $arreglo = array();

    function __construct()
    {
       parent::__construct();
       $this->load->model('proyecto_model','',TRUE);
       $this->load->model('product_model','',TRUE);
       // $this->load->model('InformacionTratamiento_model','',TRUE);
       // $this->load->model('product_model','',TRUE);
       // // $this->load->model('tratament_model','',TRUE);
       // $this->load->model('land_model','',TRUE);
       // $this->load->model('dosis_model','',TRUE);
       // $this->load->model('cedula_model','',TRUE);
       // $this->load->model('temporal_model','',TRUE);

    }

    function index()
    {
      $datos['products']=$this->product_model->get_products();
      $this->load->view('_Layout');
      $this->load->view('agregar_proyecto',$datos);
      $this->load->view('footerlayout');

    }

    function Crear()
    {
      $data = array(
        '_numero' =>$this->input->post('_numero')
      );

      if($this->proyecto_model->insert_proyecto($data['_numero'])==false){
        $datos3=array();
        $datos3[]="False";
        echo json_encode($datos3);
      }

      // $nombre = $this->input->post('_nombre');
      $datos3=array();
      $datos3[]="Exito";
      echo json_encode($datos3);
    }
}