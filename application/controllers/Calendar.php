<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

    function __construct()
    {
       parent::__construct();
       $this->load->model('aplication_model','',TRUE);
       $this->load->model('product_model','',TRUE);
       $this->load->model('tratament_model','',TRUE);
       $this->load->model('Proyecto_model','',TRUE);
       $this->load->model('cedula_model','',TRUE);
       $this->load->model('Tratamiento_model','',TRUE);
    }

  function index()
  {
  if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['realname'] = $session_data['realname'];
            $dato['id']=$session_data['id'];
            $dato['dias']=$session_data['dias'];
            $dato['msj1']='Primer inicio cambie su contraseña generica';
            $dato['msj2']='Hace 3 meses realizo su último cambio de contraseña, por favor cambie su contraseña';
            //$this->load->view('header/librerias');
            //$this->load->view('header/header');

            if($session_data['primer_inicio']==1)
            {
                $this->load->view('header/menu_sin',$data);
                $this->load->view('change_pass_ini_view',$dato); 
                $this->load->view('footer');   
            }
            if($session_data['realname']=="Administrator")
            {
                
                $this->load->view('_Layout');
                $this->load->view('calendario');
            
            }
            else if($session_data['realname']!="Administrator" and $session_data['primer_inicio']==0 )
            {
                $this->load->view('_Layout');

                $this->load->view('calendario');
            }
            
        } else {
            redirect('login', 'refresh');
        }
            //$this->load->view('_Layout');
            //$this->load->view('calendario');
  }

function obtenerCedulas(){ // por cada tratamiento para ver por colores el calendario
    
    $datos=array();
    $tratamientos =$this->Tratamiento_model->get_tratamientos();
    foreach ($tratamientos->result() as $tra) {
        $cedulas =array();
        $cedulasdetratamiento = $this->cedula_model->obtener_cedulas($tra->id_tratamiento);   
        foreach ($cedulasdetratamiento as $ced) {
            $datos3=array();
            $datos3[] = $ced->id_tratamiento;
            $datos3[] = $this->Proyecto_model->getunico_proyecto($ced->numero_proyecto); // en realidad es el id del proyecto 
            $datos3[] = $ced->descripcion_aplicacion;
            $datos3[] = $ced->semana_aplicacion;
            $datos3[] = $ced->fecha_programada;
            $datos3[] = $ced->tipoCedula;
            $datos3[] = $ced->id_cedulaAplicacion;
            $cedulas[] = $datos3;
        }
        $datos[]=$cedulas;
    }
    echo json_encode($datos,JSON_UNESCAPED_UNICODE);
}


}

?>