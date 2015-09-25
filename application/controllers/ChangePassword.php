<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {

    function __construct()
    {
       parent::__construct();
       $this->load->model('user_model','',true);
       $this->load->model('temporal_model','',TRUE);
    }

    function index()
    {
    	$this->form_validation->set_rules('recentpassword', 'Password', 'trim|required|callback_change_pass');
        $this->form_validation->set_rules('newpassword', 'New Password', 'trim|required');
        $this->form_validation->set_rules('confpass', 'Confirm Password', 'trim|required'); 
        if($this->form_validation->run() == false) 
        {
          
            if($this->session->userdata('logged_in'))
            {
                $session_data = $this->session->userdata('logged_in');
                $data['realname'] = $session_data['realname'];
                $dato['id']=$session_data['id'];
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
                $this->load->view('change_pass_view',$dato);
                $this->load->view('footer');
            } else {
                redirect('Home', 'refresh');
            }
        } 
        else 
        {
            $session_data = $this->session->userdata('logged_in');
            $sess_array = array(
                  'dias'=>0,
                  'primer_inicio'=>0,
                  'realname' => $session_data['realname'],
                  'id'=>$session_data['id']);
                $this->session->set_userdata('logged_in',$sess_array);
            redirect('Success');
        }
    }

    function change_pass()
    {
    	$id=$this->input->post('id');
    	$recent_password=$this->input->post('recentpassword');
    	$new_password=$this->input->post('newpassword');
    	$confirm_password=$this->input->post('confpass');

    	$query=$this->user_model->get_user($id);

    	if($query!=false)
		{
			foreach ($query as $row) 
			{
				if($row->password==$recent_password)
				{
                    if(strlen($new_password)>=8)
                    {
    					if($new_password==$confirm_password)
    					{
                            $fecha=date('Y-m-d');
    						$this->user_model->update_password($id,$new_password,$fecha);
    						return true;

    					}
    					else
    					{
    						$this->form_validation->set_message('change_pass', 'Las contraseñas no coinciden');
                      		return false;
    					}
                    }
                    else
                    {
                        $this->form_validation->set_message('change_pass', 'La nueva contraseña es menor de 8 caracteres');
                        return false;

                    }
				}
				else
				{
					$this->form_validation->set_message('change_pass', 'Contraseña Incorrecta');
                    return false;	
				}	
			}
			return true;
		}
		else
		{
			return false;
		}


    }
}