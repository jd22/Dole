<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplication extends CI_Controller {

    var $arreglo = array();

    function __construct()
    {
       parent::__construct();
       $this->load->model('InformacionTratamiento_model','',TRUE);
       $this->load->model('Tratamiento_model','',TRUE);
       $this->load->model('product_model','',TRUE);
       // $this->load->model('tratament_model','',TRUE);
       $this->load->model('land_model','',TRUE);
       // $this->load->model('dosis_model','',TRUE);
       // $this->load->model('cedula_model','',TRUE);
       // $this->load->model('temporal_model','',TRUE);

    }

	function index()
	{
        //$this->temporal_model->eli_temporal();
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $datos['products']=$this->product_model->get_products();
            $datos['lands']=$this->land_model->get_lands();
            
            $datos['descriptions']= array(
                                        1 => 'Fertilización',
                                        2 => 'Control Plagas Plantación',
                                        3 => 'Control Plagas Fruta',
                                        );
            $data['realname'] = $session_data['realname'];
            //$this->load->view('header/librerias');
            //$this->load->view('header/header');
            if($session_data['realname']=="Administrator")
            {
              //  $this->load->view('header/menu',$data);
            }
            else
            {
                //$this->load->view('header/menu_user',$data);
            }
            $this->load->view('_Layout');
            $this->load->view('agregar_aplicacion',$datos);
            $this->load->view('footerlayout');
	     	//$this->load->view('addaplication_view',$datos);
	     	//$this->load->view('footer');
        } else {
            redirect('Home', 'refresh');
        }

	}

	

    function product($id)
    {
        $query = $this->product_model->get_product2($id);
        $datos=array();
        if($query!=false)
        {
            foreach($query->result() as $row)
            {
                $datos3=array();
                $datos3[]=$row->activecomponent;
                $datos3[]=$row->unit;
                $datos[] = $datos3;
            }
            echo json_encode($datos,JSON_UNESCAPED_UNICODE);
        }
        else
        {
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }
    }

    function confirm_aplication()
    {
        $this->form_validation->set_rules('description', 'Description', 'trim|required|callback_insert_aplication');
        $this->form_validation->set_rules('num_proyect', 'Number Proyect', 'trim|required');
  
        if($this->form_validation->run() == FALSE) 
        {
          
            redirect('Success');
        } 
        else 
        {
            redirect('Success');
        }
    }


    function insertar_tratamiento($id_proyecto)
    {
        
    }    




    //Funcion para insertar una determinada aplicación

    function insert_aplication()
    {
        $description=$this->input->post('description');
        $num_proyect=$this->input->post('number_proyect');
        $week_aplicaction=$this->input->post('week_aplication');
        $Date_aplication=$this->input->post('scheduled');
        $lote=$this->input->post('batch');
        $bloque=$this->input->post('block');
        $estadio=$this->input->post('stadium');
        $sem_aplication=$this->input->post('week_seeding');
        $are_bloque=$this->input->post('block_area');
        $are_proyect=$this->input->post('proyect_area');
        $num_camas=$this->input->post('num_beds');
        $ancho_camas=$this->input->post('beds_width');
        $longitud_parcelas=$this->input->post('plots_length');
        $presion=$this->input->post('presion');
        $speed=$this->input->post('velocidad');
        $rpm=$this->input->post('r_p_m');
        $marcha=$this->input->post('marcha');
        $boquilla=$this->input->post('boquilla');
        $num_tratament=$this->input->post('num_treataments');
        $num_replicas=$this->input->post('num_replicas');
        $num_parcelas=$this->input->post('num_plots');
        $volumen_aplication=$this->input->post('aplication_volume');
        $id_finca=$this->input->post('selLands');
        $variedad=$this->input->post('product_range');
        $modo_aplicaction=$this->input->post('mode_aplication');
        $cultivo=$this->input->post('culti_type');
        $litros = $this->input->post('litros');
        $url="http://localhost/Dole/index.php/Edit_delete_Aplication/index/";
        $start=(strtotime($Date_aplication)*1000)+100000000;
        $end=(strtotime($Date_aplication)*1000)+100000000;
        $title="Number Proyect: ".$num_proyect."     Description: ".$description;
        $count=1;
        $this->aplication_model->insert_aplication($description,$num_proyect,$week_aplicaction,$Date_aplication,$lote,$bloque,$estadio,
            $sem_aplication,$are_bloque,$are_proyect,$num_camas,$ancho_camas,$longitud_parcelas,$presion,$speed,$rpm,$marcha,$boquilla,
            $num_tratament,$num_replicas,$num_parcelas,$volumen_aplication,$id_finca,$variedad,$modo_aplicaction,$cultivo,$litros);
        $query = $this->aplication_model->get_last_id();
        if ($query!=false)
        {
            foreach ($query->result() as $row) 
            {
                $id_aplication = $row->id;
                $url2=$url.$id_aplication;
                $this->aplication_model->insert_event($id_aplication,$title,$description,$url2,$start,$end);
                $area_por_replica = $num_camas*$ancho_camas*$longitud_parcelas;
                $area_aplicacion = $area_por_replica*$num_replicas;
                $litros_agua = ($volumen_aplication/10000)*$area_aplicacion;
                $capacidad_tanque = 200*3.785;
                $area_buffer = $are_bloque-$are_proyect;
                $tanques_requeridos = bcdiv($litros_agua, $capacidad_tanque, 4);
                $tratamiento=$this->temporal_model->get_trata_t();
                foreach ($tratamiento->result() as $row1)
                {
                    $this->tratament_model->insert_tratament($row1->secado,$row1->cosecha,$id_aplication);
                    $trata=$row1->id;
                    $query = $this->aplication_model->get_last_id2();
                    foreach ($query->result() as $row2) 
                    {
                        $id_tratamiento=$row2->id;
                        $this->cedula_model->insertar_cedula($count, $id_aplication,$id_tratamiento,$area_aplicacion,$area_por_replica,$litros_agua,$capacidad_tanque,$area_buffer,$tanques_requeridos);
                        $count++;
                        $dosis=$this->temporal_model->get_dosis_t($trata);
                        foreach ($dosis->result() as $row3) 
                        {
                            $this->dosis_model->insert_dosis($row3->id_produ,$row3->dosis,$id_tratamiento);
                        }
                    }
                }
            }
            $this->temporal_model->eli_temporal();
            $datos3=array();
            $datos3[]="Exito";
            echo json_encode($datos3);
        }
        else
        {
            $datos3=array();
            $datos3[]="Fracaso";
            echo json_encode($datos3);
        }
    }

}

?>