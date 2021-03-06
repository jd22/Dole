<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct()
    {
       parent::__construct();
       $this->load->model('product_model','',TRUE);
       // $this->load->model('temporal_model','',TRUE);    

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

            if($session_data['primer_inicio']==1)
            {
                $this->load->view('header/menu_sin',$data);
                $this->load->view('change_pass_ini_view',$dato); 
                $this->load->view('footer');   
            }
            if($session_data['realname']=="Administrator")
            {
                
                //$this->load->view('_Layout');
                //$this->load->view('calendario');
                $this->load->view('_Layout');
                $this->load->view('agregar_producto');
                $this->load->view('footerlayout');
            
            }
            else if($session_data['realname']!="Administrator" and $session_data['primer_inicio']==0 )
            {
                //$this->load->view('_Layout');

                //$this->load->view('calendario');
              $this->load->view('_Layout');
              $this->load->view('agregar_producto');
              $this->load->view('footerlayout');
            }
            
        } else {
            redirect('login', 'refresh');
        }
    //$this->load->view('_Layout');
    //$this->load->view('agregar_producto');
    //$this->load->view('footerlayout');
  } 


  function product($id)
    {
        $query = $this->product_model->get_product2($id);
        $datos=array();
        if($query!=false)
        {
            foreach($query->result() as $row)
            {
                $datos3=array();
                $datos3[]=$row->activecomponent;
                $datos3[]=$row->unit;
                $datos[] = $datos3;
            }
            echo json_encode($datos,JSON_UNESCAPED_UNICODE);
        }
        else
        {
            echo json_encode($query,JSON_UNESCAPED_UNICODE);
        }
    }

    function listaProductos(){
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

            if($session_data['primer_inicio']==1)
            {
                $this->load->view('header/menu_sin',$data);
                $this->load->view('change_pass_ini_view',$dato); 
                $this->load->view('footer');   
            }
            else if($session_data['realname']=="Administrator")
            {
                $datos['productos'] = $this->product_model->get_productos();// hay que cambiar esto por la parte de los usuarios para cuales proyectos pertenecen a cada quien
                // por el momento se cargaran todos los proyectos
                $this->load->view('_Layout');                     
                $this->load->view('lista_productos',$datos);
                // $this->load->view('footerlayout');
            
            }
            else if($session_data['realname']!="Administrator" and $session_data['primer_inicio']==0 )
            {
              $datos['productos'] = $this->product_model->get_productos();// hay que cambiar esto por la parte de los usuarios para cuales proyectos pertenecen a cada quien
              // por el momento se cargaran todos los proyectos
              $this->load->view('_Layout');                     
              $this->load->view('lista_productos',$datos);
              // $this->load->view('footerlayout');
                
            }
            
        } else {
            redirect('login', 'refresh');
        }
      // $this->load->view('footerlayout');

    }

    function insert_product()
    {
        $name = $this->input->post('_name');
        $active = $this->input->post('_active');
        $unit = $this->input->post('_unit');
        $this->product_model->insert_product($name,$active,$unit);
        $datos3=array();
        $datos3[]="Exito";
        echo json_encode($datos3);
    }

    function editar_producto(){
        $idProducto = $this->input->post('_idProducto');
      $name = $this->input->post('_name');
        $active = $this->input->post('_active');
        $unit = $this->input->post('_unit');

      $this->product_model->editar_product($idProducto,$name,$active,$unit);
      $datos3=array();
      $datos3[]="Exito";
        echo json_encode($datos3);

    }

    function get_producto($id)
    {
      $datos3=array();
      $producto = $this->product_model->obtener_producto($id);
      foreach ($producto->result() as $row) {
        $datos3[]=$row->id_producto;
        $datos3[]=$row->name;
        $datos3[]=$row->activecomponent;
        $datos3[]=$row->unit;
      }
      echo json_encode($datos3); 
    }
           
}

?>