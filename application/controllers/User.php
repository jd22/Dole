<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
	   parent::__construct();
	   $this->load->model('user_model','',TRUE);
	   $this->load->model('temporal_model','',TRUE);
	}


	function index()
	{

		if($this->session->userdata('logged_in'))
        {
        	$this->temporal_model->eli_temporal();
            $session_data = $this->session->userdata('logged_in');
            $data['realname'] = $session_data['realname'];
            $datos['users'] = $this->user_model->get_users();
            //$this->load->view('header/librerias');
            //$this->load->view('header/header');
            if($session_data['realname']=="Administrator")
            {
            	//$this->load->view('header/menu',$data);
            }
            else
            {
            	//$this->load->view('header/menu_user',$data);
            }
            $this->load->view('_Layout');
            $this->load->view('lista_usuarios',$datos);
            //$this->load->view('footerlayout');
	     	//$this->load->view('seeuser_view',$datos);
	     	//$this->load->view('footer');
        } else {
            redirect('Home');
        }

	}




	function delete_user($id_user)
	{
		$this->user_model->delete_user($id_user);
		$datos3=array();
        $datos3[]="Exito";
        echo json_encode($datos3);

	}

	function update_password($id_user,$password)
	{
		$this->user_model->update_password($id_user, $password);
		$datos3=array();
        $datos3[]="Exito";
        echo json_encode($datos3);
	}

	function callupdate()
	{
		$this->form_validation->set_rules('usernamei', 'Username', 'trim|required');
        $this->form_validation->set_rules('namei', 'Name', 'trim|required|');
        $this->form_validation->set_rules('emaili', 'Email', 'trim|required|callback_update_user');
  
        if($this->form_validation->run() == false) 
        {
            redirect('User');
        } 
        else 
        {
            redirect('User');
        }
	}

	function update_user()
	{
		$id_user= $this->input->post('idi');
		$username=$this->input->post('usernamei');
		$real_name=$this->input->post('namei');
		$email=$this->input->post('emaili');
		$this->user_model->update_user($id_user,$username, $real_name, $email);	
        return true;
	}

	function activate_desactivate($id)
	{
		$query=$this->user_model->get_user($id);
		if($query!=false)
		{
			foreach ($query as $row) 
			{
				if($row->active==1)
				{
					$this->user_model->activate_dasactivate($row->id,0);
					$datos3=array();
                	$datos3[]="Exito";
                	echo json_encode($datos3);
				}
				else
				{
					$this->user_model->activate_dasactivate($row->id, 1);
					$datos3=array();
                	$datos3[]="Exito";
                	echo json_encode($datos3);	
				}	
			}
			return true;
		}
		else
		{
			return false;
		}

	}

	function get_user($id)
	{
		$query = $this->user_model->get_user($id);
        $datos=array();
        if($query!=false)
        {
            foreach($query as $row)
            {
                $datos3=array();
                $datos3[]=$row->id;
                $datos3[]=$row->username;
                $datos3[]=$row->realname;
                $datos3[]=$row->email;
                $datos3[]=$row->active;
                $datos[] = $datos3;
            }
            echo json_encode($datos, JSON_UNESCAPED_UNICODE);
        }
        else
        {
            echo json_encode($query, JSON_UNESCAPED_UNICODE);
        }
	}
}





?>