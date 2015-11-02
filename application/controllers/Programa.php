<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Programa  extends CI_Controller
{
	function __construct()
	{
	   parent::__construct();
	   $this->load->model('cedula_model','',TRUE);
       $this->load->model('InformacionTratamiento_model','',TRUE);
       $this->load->model('tratamiento_model','',TRUE);
       $this->load->model('land_model','',TRUE);
       $this->load->model('product_model','',TRUE);
	}

	// function index(){
	// 	$datos['tratamientos'] = $this->tratamiento_model->get_tratamientos();
	// 	$this->load->view('_Layout');
 //        $this->load->view('Programas',$datos);
	// }

	function programa_tratamiento($id_proyecto,$numero_proyecto){
		$datos['IDproyecto'] = $id_proyecto;
		$datos['N_proyecto'] = $numero_proyecto;
		$datos['tratamientos'] = $this->tratamiento_model->get_tratamientosdelProyecto($id_proyecto);
		$datos['products']=$this->product_model->get_products();// se envian los productos a la vista
        $datos['lands']=$this->land_model->get_lands();// se envian las fincas a la vista
		$datos['descriptions']= array(
                                                1 => 'Fertilización',
                                                2 => 'Control Plagas Plantación',
                                                3 => 'Control Plagas Fruta',
                                                );// se envian los tipos de aplicacion a la vista
              $datos['modo']= array(
                                                1 => 'Apersión foliar',
                                                2 => 'Granular',
                                                3 => 'Manual',
                                                );// se envian los modos de aplicacion a la vista
              $datos['metodo']= array(
                                                1 => 'Spray Boom',
                                                2 => 'Stroller',
                                                3 => 'Bomba espalda',
                                                4 => 'Manual',
                                                );// se envian los metodos de aplicacion a la vista


		$this->load->view('_Layout');
    $this->load->view('Programas',$datos);
	}

function crearPrograma(){
  $data = array(
    'lista_cedulas'=>$this->input->post('_lista_Programa'),
  );
  $datos3=array();
  $lista_cedulas = $data['lista_cedulas'];
  foreach ($lista_cedulas as $value) {
    $lista_dosis = $value['dosis'];
    $cedula = $value['cedula'];   
    

    $idcedulaactual = $this->cedula_model->insertar_cedula($cedula['_id_tratamiento'],$cedula['_numero_proyecto'],$cedula['_id_finca'],$cedula['_descripcion_aplicacion'],
                             $cedula['_semana_aplicacion'],$cedula['_fecha_programada'],$cedula['_litros'],$cedula['_presion'],$cedula['_velocidad'],$cedula['_rpm'],
                             $cedula['_marcha'],$cedula['_tipo_boquilla'],$cedula['_cultivo'],$cedula['_variedad'],$cedula['_lote'],$cedula['_bloque'],$cedula['_estadio'],
                             $cedula['_semana_siembra'],$cedula['_area_bloque'],$cedula['_area_proyecto'],$cedula['_cantidad_camas'],$cedula['_ancho_camas'],
                             $cedula['_longitud_parcelas'],$cedula['_cantidad_parcelas'],$cedula['_cantidad_replicas'],$cedula['_volumen_aplicacion'],
                             $cedula['_modo_aplicacion'],$cedula['_metodo_aplicacion'],$cedula['_tipo']);
    foreach ($lista_dosis as $dosis) {
      
      $this->cedula_model->insertar_dosis($idcedulaactual,$dosis['id_infotratamiento'],$dosis['dosis']);
    }
  }
  echo json_encode($datos3);
}

}
?>