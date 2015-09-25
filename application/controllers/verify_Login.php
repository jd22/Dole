<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class verify_Login extends CI_Controller {

  function __construct()
   {
     parent::__construct();
     $this->load->model('login_model','',TRUE);
     //$this->load->model('temporal_model','',TRUE);
   }
   
    function index() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
  
        if($this->form_validation->run() == FALSE) 
        {
          //$this->load->view('header/header');
          //$this->load->view('header/librerias');
          $this->load->view('loggin_nuevo');
          //$this->load->view('login_view');
          //$this->load->view('footer');
        } 
        else 
        {
          redirect('Home', 'refresh');
        }      
    }
        
    function check_database($password) {
         $username = $this->input->post('username');
         $result = $this->login_model->userlogin($username, $password);
         if($result) {
             $sess_array = array();
             foreach($result as $row)
              {
                if($row->active==0)
                {
                  $this->form_validation->set_message('check_database', 'El Usuario esta Inactivo');
                  return FALSE;                  
                }
                $segundos=strtotime('now') - strtotime($row->date);
                $diferencia=intval($segundos/60/60/24);
                $sess_array = array(
                  'primer_inicio'=>$row->generic_pass,
                  'realname' => $row->realname,
                  'dias'=> $diferencia,
                  'id'=>$row->id);
                  
                $this->session->set_userdata('logged_in', $sess_array);
              }
            return TRUE;
          } 
          else 
          {
               
            $this->form_validation->set_message('check_database', 'Username o Contraseña Invalidos');
            return FALSE;
          }
    }
}


?>