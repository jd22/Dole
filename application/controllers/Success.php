<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Success extends CI_Controller {

	function index()
	{
		if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['realname'] = $session_data['realname'];
            //$this->load->view('header/librerias');
            //$this->load->view('header/header');
            //$this->load->view('header/menu',$data);
	     	$this->load->view('success_view');
	     	//$this->load->view('footer');


        } else {
            redirect('Home', 'refresh');
        }

	}	
}

?>