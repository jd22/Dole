<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tratamiento extends CI_Controller {

    function __construct()
    {
       parent::__construct();
       $this->load->model('proyecto_model','',TRUE);
       $this->load->model('product_model','',TRUE);
       $this->load->model('InformacionTratamiento_model','',TRUE);
       $this->load->model('Tratamiento_model','',TRUE);
       $this->load->model('cedula_model','',TRUE);
    }
    function index(){

    }

    function eliminar_todoeltratamiento($id_tratamiento){ // ELimina toda la informacion de ese tratamiento incluidos cedulas e informacion
      $this->Tratamiento_model->eliminar_Tratamiento($id_tratamiento);
      $datos3=array();
      $datos3[]="TratamientoEliminado";
      echo json_encode($datos3);
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

      $predeterminado = $this->Tratamiento_model->get_predeterminado($idtratamiento);

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
          $datos3[] = $predeterminado;
	        $datos[] = $datos3;
	    }
       echo json_encode($datos,JSON_UNESCAPED_UNICODE);
    }


    function set_predeterminado($idtratamiento,$predeterminado){
        $this->Tratamiento_model->editar_predeterminado($idtratamiento,$predeterminado);
        $datos=array();
        echo json_encode($datos);
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


  function AgregartratamientoExistente($numeroProyecto,$idtratamientoexistente,$predeterminado){ // dos var proyecto a agregar e id del tratamiento existente predeterminado
    $idProyecto = $this->proyecto_model->getid_proyecto($numeroProyecto);  // Obtiene el proyecto
    $idTratamiento = $this->Tratamiento_model->insertar_tratamiento($idProyecto,$predeterminado); // Inserta el id del tratamiento
    
    // Se obtienen la informacion de los tratamientos primero con el idtratamiento

    $listaInformacionTratamientos = $this->InformacionTratamiento_model->obtener_informacionT($idtratamientoexistente);

    // // inserta todos las informaciones del tratamiento existente en el nuevo tratamiento  
    foreach ($listaInformacionTratamientos->result() as $informacion) {
      $this->Tratamiento_model->insertar_informaciontratamiento($idTratamiento,$informacion->id_producto,$informacion->dosis,
        $informacion->plaga_nombre_comun,$informacion->plaga_nombre_cientifico,$informacion->secado,$informacion->cosecha);
    }

    $listaCedulas = $this->cedula_model->obtener_cedulas($idtratamientoexistente); 
    // // insertar todos las cedulas del tratamiento existente al nuevo tratamiento del proyecto
    foreach ($listaCedulas as $informacionCedula) {
        $this->cedula_model->insertar_cedula($idTratamiento,
        $informacionCedula->numero_proyecto,$informacionCedula->id_finca,
        $informacionCedula->descripcion_aplicacion,$informacionCedula->semana_aplicacion,
        $informacionCedula->fecha_programada,$informacionCedula->litros,
        $informacionCedula->presion,$informacionCedula->velocidad,
        $informacionCedula->rpm,$informacionCedula->marcha,
        $informacionCedula->tipo_boquilla,$informacionCedula->cultivo,
        $informacionCedula->variedad,$informacionCedula->lote,
        $informacionCedula->bloque,$informacionCedula->estadio,
        $informacionCedula->semana_siembra,$informacionCedula->area_bloque,
        $informacionCedula->area_proyecto,$informacionCedula->cantidad_camas,
        $informacionCedula->ancho_camas,$informacionCedula->longitud_parcelas,
        $informacionCedula->cantidad_parcelas,$informacionCedula->cantidad_replicas,
        $informacionCedula->volumen_aplicacion,$informacionCedula->modo_aplicacion,$informacionCedula->metodo_aplicacion);
    }

    $datos3=array();
    $datos3[]=$numeroProyecto;
    $datos3[]=$idtratamientoexistente;
    echo json_encode($datos3);
  }

}

?>