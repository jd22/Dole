<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct()
    {
       parent::__construct();
       $this->load->model('product_model','',TRUE);
       $this->load->model('temporal_model','',TRUE);    

    }

	function index()
	{
		$this->form_validation->set_rules('name', 'Username', 'trim|required|callback_insert_product');
        $this->form_validation->set_rules('active', 'Name', 'trim|required');
        $this->form_validation->set_rules('unit', 'Email', 'trim|required');
        //$this->temporal_model->eli_temporal();
        if($this->form_validation->run() == FALSE) 
        {
          
            if($this->session->userdata('logged_in'))
            {
                $session_data = $this->session->userdata('logged_in');
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
                $this->load->view('agregar_producto');
                $this->load->view('footerlayout');
                //$this->load->view('addproduct_view');
                //$this->load->view('footer');
            } else {
                redirect('Home', 'refresh');
            }
        } 
        else 
        {
            redirect('Success');
        }      

	}	

    function insert_product()
    {
        $name = $this->input->post('name');
        $active = $this->input->post('active');
        $unit = $this->input->post('unit');
        $this->product_model->insert_product($name,$active,$unit);
    }

    function get_product($id)
    {
      $this->db->select('*');
      $this->db->from('products');
      $this->db->where('id_producto',$id);
      $this->db->limit(1);
      $query = $this->db->get();
      return $query;
    }
           
}

?>