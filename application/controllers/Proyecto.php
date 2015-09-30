<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends CI_Controller {

    var $arreglo = array();

    function __construct()
    {
       parent::__construct();
       $this->load->model('proyecto_model','',TRUE);
       $this->load->model('product_model','',TRUE);
       $this->load->model('tratamiento_model','',TRUE);
       // $this->load->model('InformacionTratamiento_model','',TRUE);
       // $this->load->model('product_model','',TRUE);
       // // $this->load->model('tratament_model','',TRUE);
       $this->load->model('land_model','',TRUE);
       // $this->load->model('dosis_model','',TRUE);
       $this->load->model('cedula_model','',TRUE);
       // $this->load->model('temporal_model','',TRUE);

    }

    function index()
    {
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
      $this->load->view('agregar_proyecto',$datos);
      $this->load->view('footerlayout');

    }

    function listaProyectos(){
      $datos['proyectos'] = $this->proyecto_model->get_proyectos();// hay que cambiar esto por la parte de los usuarios para cuales proyectos pertenecen a cada quien
      // por el momento se cargaran todos los proyectos
      $this->load->view('_Layout');                     
      $this->load->view('lista_proyectos',$datos);
      // $this->load->view('footerlayout');

    }

   function CargarTratamientos()
    {
      $data = array(
        '_numeroProyecto' => $this->input->post('_numeroProyecto')        
      );

     $linfoTratamientos = $this->tratamiento_model->obtener_tratamientos($data['_numeroProyecto']);
     $datos=array();
     foreach($linfoTratamientos->result() as $row)
      {
        $datos3=array();
        $cantidad_cedulas = $this->cedula_model->cantidad_cedulas($row->id_tratamiento); // buscar la cantidad de cedulas de el tratamiento
        $datos3[]= $row->id_tratamiento;
        $datos3[]= $cantidad_cedulas;
        $datos[] = $datos3;
      }
      echo json_encode($datos,JSON_UNESCAPED_UNICODE);
    }

    // Inserta el tratamiento y su informacion
    function CrearTratamiento()
    {
      $data = array(
        '_numeroProyecto' => $this->input->post('_numeroProyecto'),
        '_linfoTratamientos' =>$this->input->post('_linfoTratamientos'),
      );
      $idProyecto = $this->proyecto_model->getid_proyecto($data['_numeroProyecto']); 
      $idTratamiento = $this->tratamiento_model->insertar_tratamiento($idProyecto);
     
      $linfoTratamientos = $data['_linfoTratamientos'];
       foreach ($linfoTratamientos as $info) {
          $this->tratamiento_model->insertar_informaciontratamiento($idTratamiento,$info['id_producto'],$info['dosis'],$info['plaga_nombre_comun'],$info['plaga_nombre_cientifico'],
            $info['secado'],$info['cosecha']);
      }
      $datos3=array();
      $datos3[]="TratamientoCreado";
      echo json_encode($datos3);
    }

    // Inserta el tratamiento y su informacion
    function AgregarProductoATratamientoExistente()
    {
      $info = array(
        '_idTratamientogeneral'=> $this->input->post('_idTratamientogeneral'),
        '_productoid'=> $this->input->post('_productoid'),
        '_dosis'=> $this->input->post('_dosis'),
        '_ncomun'=> $this->input->post('_ncomun'),
        '_ncientifico'=> $this->input->post('_ncientifico'),
        '_secado'=> $this->input->post('_secado'),
        '_cosecha'=> $this->input->post('_cosecha'),
      );
      $this->tratamiento_model->insertar_informaciontratamiento($info['_idTratamientogeneral'],$info['_productoid'],$info['_dosis'],$info['_ncomun'],$info['_ncientifico'],
          $info['_secado'],$info['_cosecha']);
      $datos3=array();
      $datos3[]="TratamientNuevooAgregado";
      echo json_encode($datos3);
    }




    function CrearProyecto()
    {
      $data = array(
        '_numero' =>$this->input->post('_numero'),
        '_fecha_creacion'  =>$this->input->post('_fecha_creacion')
      );

      if($this->proyecto_model->insert_proyecto($data['_numero'],$data['_fecha_creacion'])==false){
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