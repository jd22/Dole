<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

    function __construct()
    {
       parent::__construct();
       $this->load->model('aplication_model','',TRUE);
       $this->load->model('product_model','',TRUE);
       $this->load->model('tratament_model','',TRUE);
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

            if($session_data['primer_inicio']==1 or $session_data['dias']>=30)
            {
                $this->load->view('header/menu_sin',$data);
                $this->load->view('change_pass_ini_view',$dato); 
                $this->load->view('footer');   
            }
            if($session_data['realname']=="Administrator" and $session_data['dias']<30)
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


    function addEvents()
    {
        if($this->input->is_ajax_request())
        {
            $events = $this->aplication_model->get_eventos();
            echo json_encode(
                array(
                    "success" => 1,
                    "result" => $events
                )
            );
        }
    } 
}

?>