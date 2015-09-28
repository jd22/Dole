<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tratamiento extends CI_Controller {

    function __construct()
    {
       parent::__construct();
       $this->load->model('product_model','',TRUE);
       $this->load->model('InformacionTratamiento_model','',TRUE);
    }
    function index(){

    }

    function obtener_informaciontratamiento($idtratamiento){
    	$datos=array();
    	$query = $this->InformacionTratamiento_model->obtener_informacionT($idtratamiento);
    	
	    foreach ($query->result() as $row) 
	    {
	    	$datos3=array();
	    	$queryproduct = $this->product_model->obtener_producto($row->id_producto);
	      	foreach ($queryproduct->result() as $rowproducto) 
	     	{
				$datos3[] = $rowproducto->name;
				$datos3[] = $rowproducto->activecomponent;
				$datos3[] = $rowproducto->unit;
	     	}
	        $datos3[] = $row->id_producto;
	        $datos3[] = $row->dosis;
	        $datos3[] = $row->secado;
	        $datos3[] = $row->cosecha;
	        $datos[] = $datos3;
	    }
	    echo json_encode($datos,JSON_UNESCAPED_UNICODE);
    }
}

?>