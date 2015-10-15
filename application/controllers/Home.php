<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

//session_start(); //we need to call PHP's session object to access it through CI

class Home extends CI_Controller {

     function __construct()
     {
       parent::__construct();
       //$this->load->model('login_model','',TRUE);
     }
     
     function index()
     {
        //$this->temporal_model->eli_temporal();
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
                //$this->load->view('header/menu',$data);
                //$this->load->view('home_view');
                //$this->load->view('footer');
                $this->load->view('_Layout');
            //    $this->load->view('footerlayout');
                $this->load->view('calendario');
            
            }
            else if($session_data['realname']!="Administrator" and $session_data['primer_inicio']==0 )
            {
                $this->load->view('_Layout');
              //  $this->load->view('footerlayout');

                $this->load->view('calendario');
                //$this->load->view('header/menu_user',$data);
                //$this->load->view('home_view');
                //$this->load->view('footer');
            }
            
        } else {
            redirect('login', 'refresh');
        }
         
     }

     function logout()
    {
        $this->session->unset_userdata('logged_in');
       session_destroy();
       redirect('index.php', 'refresh');
    }
     
 
}

?>
