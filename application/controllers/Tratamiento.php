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

    function eliminar_informaciontratamiento(){
      $data = array(
        '_idinformaciontratamiento' => $this->input->post('_idinformaciontratamiento'),
        '_id_tratamiento' => $this->input->post('_id_tratamiento')
        );
      $this->InformacionTratamiento_model->eliminar_informacionT($data['_idinformaciontratamiento'],$data['_id_tratamiento']);
      $datos=array();
      $datos="Informacion Eliminada";
      echo json_encode($datos,JSON_UNESCAPED_UNICODE);
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
	        $datos3[] = $row->plaga_nombre_comun;
	        $datos3[] = $row->plaga_nombre_cientifico;
          $datos3[] = $row->id_informaciontratamiento;
	        $datos[] = $datos3;
	    }
       echo json_encode($datos,JSON_UNESCAPED_UNICODE);
    }

    function obtener_uninformaciontratamiento($idinformaciontratamiento){
      $datos=array();
      $query = $this->InformacionTratamiento_model->obtener_solounainformacionT($idinformaciontratamiento);
      
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
          $datos3[] = $row->plaga_nombre_comun;
          $datos3[] = $row->plaga_nombre_cientifico;
          $datos3[] = $row->id_informaciontratamiento;
          $datos[] = $datos3;
      }
      echo json_encode($datos,JSON_UNESCAPED_UNICODE);
    }

    function cargarNombreProducto($idProdu)
    {
      $datos=array();
      $query = $this->product_model->obtener_producto($idProdu);
      foreach ($query->result() as $row) 
      {
        $datos[] = $row->name;
      }
      echo json_encode($datos,JSON_UNESCAPED_UNICODE);
    }

    function eliminar_producto_informaciontratamiento(){
    	$data = array(
        '_idTrat' => $this->input->post('_idTrat'),
        '_idProd' => $this->input->post('_idProd'),
        '_dos' => $this->input->post('_dos'),
        '_sec' => $this->input->post('_sec'),
        '_cos' => $this->input->post('_cos'),
        '_planombcom' => $this->input->post('_planombcom'),
        '_planombcien' => $this->input->post('_planombcien'),
      	);

    	$this->InformacionTratamiento_model->eliminar_productoT($data['_idTrat'],$data['_idProd'],$data['_dos'],$data['_sec'],$data['_cos'],$data['_planombcom'],$data['_planombcien']);
    	$datos3=array();
      $datos3[]="ProductoEliminado";
      echo json_encode($datos3);
    }

    function editar_producto_informaciontratamiento($idinformaciontratamientoGeneralAeditar){
    	$data = array(
        '_productoid'=> $this->input->post('_productoid'),
        '_eddosis'=> $this->input->post('_eddosis'),
        '_edncomun'=> $this->input->post('_edncomun'),
        '_edncientifico'=> $this->input->post('_edncientifico'),
        '_edsecado'=> $this->input->post('_edsecado'),
        '_edcosecha'=> $this->input->post('_edcosecha'),
      	);

    	$query = $this->InformacionTratamiento_model->editar_productoT($idinformaciontratamientoGeneralAeditar,$data['_productoid'],$data['_eddosis'],$data['_edncomun'],
                                                            $data['_edncientifico'],$data['_edsecado'],$data['_edcosecha']);
    	$datos3=array();

      foreach ($query->result() as $row) 
      {
        $datos3=array();
        $datos3[] = $row->id_tratamiento;
      }
      echo json_encode($datos3);

    }
}

?>