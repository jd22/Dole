<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_delete_Aplication extends CI_Controller {

    function __construct()
    {
       parent::__construct();
       $this->load->model('aplication_model','',TRUE);
       $this->load->model('product_model','',TRUE);
       $this->load->model('tratament_model','',TRUE);
       $this->load->model('land_model','',TRUE);
       $this->load->model('dosis_model','',TRUE);  
       $this->load->model('cedula_model','',TRUE);
       $this->load->model('temporal_model','',TRUE);
    }

  function index($id)
	 {
    $this->temporal_model->eli_temporal();
	 	if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['realname'] = $session_data['realname'];
            $datos['lands']=$this->land_model->get_lands();
            $datos['apli']=$this->aplication_model->get_aplication($id);
            $this->load->view('header/librerias');
            $this->load->view('header/header');
            if($session_data['realname']=="Administrator")
            {
              $this->load->view('header/menu',$data);
            }
            else
            {
              $this->load->view('header/menu_user',$data);
            }
	     	    $this->load->view('edit_delete_aplication_view',$datos);
	     	    $this->load->view('footer');

        } else {
            redirect('login', 'refresh');
        }
	     
	 }


   function delete_aplication()
    {
        $id=$this->input->post('id_e');
        $this->aplication_model->delete_aplication($id);
        $query = $this->tratament_model->get_tratamientos();
        foreach ($query->result() as $row) {

          if($row->id_aplicación==$id)
          {
            $this->dosis_model->delete_dosis($row->id);
          }
            
        }
        $this->tratament_model->delete_tratamientos($id);
        $this->aplication_model->delete_event($id);
        $this->cedula_model->delete_cedulas($id); 
        redirect('Success','refresh');
    }

    function update_aplicacion()
    {
        $id=$this->input->post('id_a');
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
        $num_replicas=$this->input->post('num_replicas');
        $num_parcelas=$this->input->post('num_plots');
        $volumen_aplication=$this->input->post('aplication_volume');
        $id_finca=$this->input->post('selLands');
        $variedad=$this->input->post('product_range');
        $modo_aplicaction=$this->input->post('mode_aplication');
        $cultivo=$this->input->post('culti_type');
        $litros = $this->input->post('litros');
        $start=(strtotime($Date_aplication)*1000)+100000000;
        $end=(strtotime($Date_aplication)*1000)+100000000;

        $this->aplication_model->update_aplication($id,$description,$num_proyect,$week_aplicaction,$Date_aplication,$lote,$bloque,$estadio,
            $sem_aplication,$are_bloque,$are_proyect,$num_camas,$ancho_camas,$longitud_parcelas,$presion,$speed,$rpm,$marcha,$boquilla
            ,$num_replicas,$num_parcelas,$volumen_aplication,$id_finca,$variedad,$modo_aplicaction,$cultivo,$litros);
        $this->aplication_model->update_evento($id,$start,$end);

        $area_por_replica = $num_camas*$ancho_camas*$longitud_parcelas;
        $area_aplicacion = $area_por_replica*$num_replicas;
        $litros_agua = ($volumen_aplication/10000)*$area_aplicacion;
        $capacidad_tanque = 200*3.785;
        $area_buffer = $are_bloque-$are_proyect;
        $tanques_requeridos = bcdiv($litros_agua, $capacidad_tanque, 4);

        $this->cedula_model->update_cedula($id,$area_aplicacion,$area_por_replica,$litros_agua,$capacidad_tanque,$area_buffer,$tanques_requeridos);
        redirect('Success','refresh');
        
    }

}
?>