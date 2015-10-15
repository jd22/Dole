<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class AddUser extends CI_Controller {

    function __construct()
    {
       parent::__construct();
       $this->load->model('user_model','',TRUE);
       //$this->load->model('temporal_model','',TRUE);    
   }

	function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_insert_user');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        //  $this->temporal_model->eli_temporal();
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
                    $this->load->view('agregar_usuario');
                    $this->load->view('footerlayout');
                //$this->load->view('adduser_view');
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

    function rand_chard($string, $length, $repeat = false)
    {
        if(!$repeat)
        {
            for($s ='', $i = 0, $z = strlen($string)-1; $i <  $length; $x = rand(0,$z), $s .= $string{$x}, $i++);
        }
        else
        {
            for($i = 0, $z = strlen($string)-1, $s = $string{rand(0,$z)}. $i = 1; $i != $length; $x = rand(0,$z), $s .= $string{$x}, $s = ($s{$i} == $s{$i-1} ? substr($s, 0, -1) : $s), $i = strlen($s));
        }

        return $s;
    }

    function insert_user()
    {
        $username = $this->input->post('username');
        $realname = $this->input->post('name');
        $email = $this->input->post('email');
        $active = 1;
        $date = date("Y-m-d");
        $query = $this->user_model->get_users(); 
        if($query!=false)
        {
            foreach($query as $row)
            {
                if($row->username == $username)
                {
                    $this->form_validation->set_message('insert_user', 'Username already exists');
                    return false;
                }

            }
            $password = $this->rand_chard("ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz0123456789",8,TRUE);
            $this->user_model->insert_user($username, $password, $realname,$email,$active,$date);
           /* $mail = new PHPMailer(); 
            $mail->IsSMTP(); 
            $mail->SMTPAuth = true; 
            $mail->SMTPSecure = "tls"; 
            $mail->Host = "smtp.gmail.com"; 
            $mail->Port = 587; 
            $mail->Username = "chicoms1329@gmail.com"; 
            $mail->Password = "chico13beto05";

            $mail->From = "chicoms1329@gmail.com"; 
            $mail->FromName = "Nombre"; 
            $mail->Subject = "Asunto del Email"; 
            $mail->AltBody = "Este es un mensaje de prueba."; 
            $mail->MsgHTML("<b>Este es un mensaje de prueba</b>.");  
            $mail->AddAddress("chicoms1329@gmail.com", "Destinatario"); 
            $mail->IsHTML(true); 
            if(!$mail->Send()) {
               echo $mail->ErrorInfo;
            } else {
                echo "Sirve";
            }*/

            return true;
        }
        $this->form_validation->set_message('insert_user','Error to check username');
        return false;
    }
}

?>