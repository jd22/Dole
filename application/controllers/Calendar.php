<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

    function __construct()
    {
       parent::__construct();
       $this->load->model('aplication_model','',TRUE);
       $this->load->model('product_model','',TRUE);
       $this->load->model('land_model','',TRUE);
    }

	function index()
	{
		// if($this->session->userdata('logged_in'))
  //       {
  //           $session_data = $this->session->userdata('logged_in');
  //           $data['realname'] = $session_data['realname'];
  //           // $this->load->view('header/librerias');
  //           // $this->load->view('header/header');
  //           if($session_data['realname']=="Administrator")
  //           {
  //             //  $this->load->view('header/menu',$data);
  //           }
  //           else
  //           {
  //               //$this->load->view('header/menu_user',$data);
  //           }
  //           $this->load->view('_Layout');
  //           $this->load->view('calendario');
	 //     	// $this->load->view('calendar_view');
	 //     	// $this->load->view('footer');
  //       } else {
  //           redirect('login', 'refresh');
  //       }
            $this->load->view('_Layout');
            $this->load->view('calendario');
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