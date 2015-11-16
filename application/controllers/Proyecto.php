<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyecto extends CI_Controller {

    var $arreglo = array();

    function __construct()
    {
       parent::__construct();
       $this->load->model('proyecto_model','',TRUE);
       $this->load->model('product_model','',TRUE);
       $this->load->model('tratamiento_model','',TRUE);
       $this->load->model('InformacionTratamiento_model','',TRUE);
       // $this->load->model('product_model','',TRUE);
       // // $this->load->model('tratament_model','',TRUE);
       $this->load->model('land_model','',TRUE);
       // $this->load->model('dosis_model','',TRUE);
       $this->load->model('cedula_model','',TRUE);
       // $this->load->model('temporal_model','',TRUE);

    }

    function index($id_proyecto)
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
                $datos['idproyecto']=$id_proyecto;
                $datos['products']=$this->product_model->get_products();// se envian los productos a la vista
                $datos['lands']=$this->land_model->get_lands();// se envian las fincas a la vista
                $datos['descriptions']= array(
                                                  1 => 'Fertilización',
                                                  2 => 'Control Plagas Plantación',
                                                  3 => 'Control Plagas Fruta',
                                                  );// se envian los tipos de aplicacion a la vista
                $datos['modo']= array(
                                                  1 => 'Apersión foliar',
                                                  2 => 'Granular',
                                                  3 => 'Manual',
                                                  );// se envian los modos de aplicacion a la vista
                $datos['metodo']= array(
                                                  1 => 'Spray Boom',
                                                  2 => 'Stroller',
                                                  3 => 'Bomba espalda',
                                                  4 => 'Manual',
                                                  );// se envian los metodos de aplicacion a la vista
                $this->load->view('_Layout');
                $this->load->view('agregar_proyecto',$datos);
                $this->load->view('footerlayout');
                      
            }
            else if($session_data['realname']!="Administrator" and $session_data['primer_inicio']==0 )
            {
              $datos['idproyecto']=$id_proyecto;
              $datos['products']=$this->product_model->get_products();// se envian los productos a la vista
              $datos['lands']=$this->land_model->get_lands();// se envian las fincas a la vista
              $datos['descriptions']= array(
                                                1 => 'Fertilización',
                                                2 => 'Control Plagas Plantación',
                                                3 => 'Control Plagas Fruta',
                                                );// se envian los tipos de aplicacion a la vista
              $datos['modo']= array(
                                                1 => 'Apersión foliar',
                                                2 => 'Granular',
                                                3 => 'Manual',
                                                );// se envian los modos de aplicacion a la vista
              $datos['metodo']= array(
                                                1 => 'Spray Boom',
                                                2 => 'Stroller',
                                                3 => 'Bomba espalda',
                                                4 => 'Manual',
                                                );// se envian los metodos de aplicacion a la vista
              $this->load->view('_Layout');
              $this->load->view('agregar_proyecto',$datos);
              $this->load->view('footerlayout');
                
            }
            
        } else {
            redirect('login', 'refresh');
        }
      
    }

    function actualizar_proyecto($idProyecto,$numero_proyecto){
      $datos=array();
      $numeroupdate = $this->proyecto_model->editar_proyecto($idProyecto,$numero_proyecto);
      $datos[] = $numeroupdate;
      //
      echo json_encode($datos); 
    }

    function eliminar_proyecto($numProyecto,$idProyecto){
      
      $queryTratamientos = $this->tratamiento_model->obtener_tratamientos($numProyecto);
      foreach ($queryTratamientos->result() as $row) {
        $this->tratamiento_model->eliminar_Tratamiento($row->id_tratamiento);
      }

      $this->proyecto_model->eliminar_proyecto($idProyecto);
      $datos=array();
      echo json_encode($datos); 
    }

    function existente($id_proyecto)
    {
      $datos['idproyecto']=$id_proyecto;
      $datos['products']=$this->product_model->get_products();// se envian los productos a la vista
      $datos['lands']=$this->land_model->get_lands();// se envian las fincas a la vista
      $datos['descriptions']= array(
                                        1 => 'Fertilización',
                                        2 => 'Control Plagas Plantación',
                                        3 => 'Control Plagas Fruta',
                                        );// se envian los tipos de aplicacion a la vista
      $datos['modo']= array(
                                        1 => 'Apersión foliar',
                                        2 => 'Granular',
                                        3 => 'Manual',
                                        );// se envian los modos de aplicacion a la vista
      $datos['metodo']= array(
                                        1 => 'Spray Boom',
                                        2 => 'Stroller',
                                        3 => 'Bomba espalda',
                                        4 => 'Manual',
                                        );// se envian los metodos de aplicacion a la vista
      $this->load->view('_Layout');
      $this->load->view('agregar_proyecto',$datos);
      $this->load->view('footerlayout');
    }

    function listaProyectos(){
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
                $datos['proyectos'] = $this->proyecto_model->get_proyectos();// hay que cambiar esto por la parte de los usuarios para cuales proyectos pertenecen a cada quien
                // por el momento se cargaran todos los proyectos
                $this->load->view('_Layout');                     
                $this->load->view('lista_proyectos',$datos);
                // $this->load->view('footerlayout');
            
            }
            else if($session_data['realname']!="Administrator" and $session_data['primer_inicio']==0 )
            {
              $datos['proyectos'] = $this->proyecto_model->get_proyectos();// hay que cambiar esto por la parte de los usuarios para cuales proyectos pertenecen a cada quien
              // por el momento se cargaran todos los proyectos
              $this->load->view('_Layout');                     
              $this->load->view('lista_proyectos',$datos);
              // $this->load->view('footerlayout');
                
            }
            
        } else {
            redirect('login', 'refresh');
        }
      
    }

    function Programa(){
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
                //$datos['proyectos'] = $this->proyecto_model->get_proyectos();// hay que cambiar esto por la parte de los usuarios para cuales proyectos pertenecen a cada quien
                // por el momento se cargaran todos los proyectos
                $this->load->view('_Layout');                     
                $this->load->view('programas');
                // $this->load->view('footerlayout');
            
            }
            else if($session_data['realname']!="Administrator" and $session_data['primer_inicio']==0 )
            {
              //$datos['proyectos'] = $this->proyecto_model->get_proyectos();// hay que cambiar esto por la parte de los usuarios para cuales proyectos pertenecen a cada quien
              // por el momento se cargaran todos los proyectos
              $this->load->view('_Layout');                     
              $this->load->view('programas');
              // $this->load->view('footerlayout');
                
            }
            
        } else {
            redirect('login', 'refresh');
        }
      
    }

    function listaProgramas(){
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
                $datos['proyectos'] = $this->proyecto_model->get_proyectos();// hay que cambiar esto por la parte de los usuarios para cuales proyectos pertenecen a cada quien
                // por el momento se cargaran todos los proyectos
                $this->load->view('_Layout');                     
                $this->load->view('lista_programas',$datos);
                // $this->load->view('footerlayout');
            
            }
            else if($session_data['realname']!="Administrator" and $session_data['primer_inicio']==0 )
            {
              $datos['proyectos'] = $this->proyecto_model->get_proyectos();// hay que cambiar esto por la parte de los usuarios para cuales proyectos pertenecen a cada quien
              // por el momento se cargaran todos los proyectos
              $this->load->view('_Layout');                     
              $this->load->view('lista_programas',$datos);
              // $this->load->view('footerlayout');
                
            }
            
        } else {
            redirect('login', 'refresh');
        }
      

    }
    

   function CargarTratamientos($numeroProyecto)
    {
     $linfoTratamientos = $this->tratamiento_model->obtener_tratamientos($numeroProyecto);
     $datos=array();
     foreach($linfoTratamientos->result() as $row)
      {
        $datos3=array();
        $cantidad_cedulas = $this->cedula_model->cantidad_cedulas($row->id_tratamiento); // buscar la cantidad de cedulas de el tratamiento
        $datos3[]= $row->id_tratamiento;
        $datos3[]= $cantidad_cedulas;
        $datos[] = $datos3;
      }
      echo json_encode($datos,JSON_UNESCAPED_UNICODE);
    }

    // Inserta el tratamiento y su informacion
    function CrearTratamiento()
    {
      $data = array(
        '_numeroProyecto' => $this->input->post('_numeroProyecto'),
        '_linfoTratamientos' =>$this->input->post('_linfoTratamientos'),
        '_predeterminado' =>$this->input->post('_predeterminado'),
      );

      $idProyecto = $this->proyecto_model->getid_proyecto($data['_numeroProyecto']); 
      $idTratamiento = $this->tratamiento_model->insertar_tratamiento($idProyecto,$data['_predeterminado']);
     
      $linfoTratamientos = $data['_linfoTratamientos'];
       foreach ($linfoTratamientos as $info) {
          $this->tratamiento_model->insertar_informaciontratamiento($idTratamiento,$info['id_producto'],$info['dosis'],$info['plaga_nombre_comun'],$info['plaga_nombre_cientifico'],
            $info['secado'],$info['cosecha'],$info['tipoCedula']);

          // $this->tratamiento_model->insertar_informaciontratamiento($idTratamiento,$info['id_producto'],$info['dosis'],$info['plaga_nombre_comun'],$info['plaga_nombre_cientifico'],
          //   $info['secado'],$info['cosecha'],'PC-B');
          // $this->tratamiento_model->insertar_informaciontratamiento($idTratamiento,$info['id_producto'],$info['dosis'],$info['plaga_nombre_comun'],$info['plaga_nombre_cientifico'],
          //   $info['secado'],$info['cosecha'],'PC-C');
          // $this->tratamiento_model->insertar_informaciontratamiento($idTratamiento,$info['id_producto'],$info['dosis'],$info['plaga_nombre_comun'],$info['plaga_nombre_cientifico'],
          //   $info['secado'],$info['cosecha'],'PC-D');
          // $this->tratamiento_model->insertar_informaciontratamiento($idTratamiento,$info['id_producto'],$info['dosis'],$info['plaga_nombre_comun'],$info['plaga_nombre_cientifico'],
          //   $info['secado'],$info['cosecha'],'POST-FORZA');
      }
      $datos3=array();
      $datos3[]="TratamientoCreado";
      echo json_encode($datos3,JSON_UNESCAPED_UNICODE);
    }

    //file upload function
    function upload()
    {
      //set preferences
      $config['upload_path'] = 'C:/xampp/htdocs/Dole/images/';
      $config['allowed_types'] = '*';
      $config['overwrite'] = "TRUE";
      $config['file_name'] = $_POST['id_trata']; 
        
      $message = $_POST['id_trata'];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('filename'))
        {
            // case - failure
            $upload_error = array('error' => $this->upload->display_errors());
            echo "<script type='text/javascript'>alert('$upload_error');</script>";
            //$this->load->view('agregar_proyecto', $upload_error);
            
        }
        else
        {
            // case - success
            $upload_data = $this->upload->data();
            $data['success_msg'] = '<div class="alert alert-success text-center">Your file <strong>' . $upload_data['file_name'] . '</strong> was successfully uploaded!</div>';
             $this->tratamiento_model->insertar_imagen_tratamiento($message,$message);
            //$this->load->view('agregar_proyecto', $message);
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            echo "<script type='text/javascript'>alert('$message);</script>";
            
         //   echo "base_url(Proyecto/index/1)";
        }
        
    }

    // Inserta el tratamiento y su informacion
    function AgregarProductoATratamientoExistente()
    {
      $info = array(
        '_idTratamientogeneral'=> $this->input->post('_idTratamientogeneral'),
        '_productoid'=> $this->input->post('_productoid'),
        '_dosis'=> $this->input->post('_dosis'),
        '_ncomun'=> $this->input->post('_ncomun'),
        '_ncientifico'=> $this->input->post('_ncientifico'),
        '_secado'=> $this->input->post('_secado'),
        '_cosecha'=> $this->input->post('_cosecha'),
        '_tipoCedula'=> $this->input->post('_tipoCedula'),
      );
      $this->tratamiento_model->insertar_informaciontratamiento($info['_idTratamientogeneral'],$info['_productoid'],$info['_dosis'],$info['_ncomun'],$info['_ncientifico'],
          $info['_secado'],$info['_cosecha'],$info['_tipoCedula']);
      // $this->tratamiento_model->insertar_informaciontratamiento($info['_idTratamientogeneral'],$info['_productoid'],$info['_dosis'],$info['_ncomun'],$info['_ncientifico'],
      //     $info['_secado'],$info['_cosecha'],'PC-B');
      // $this->tratamiento_model->insertar_informaciontratamiento($info['_idTratamientogeneral'],$info['_productoid'],$info['_dosis'],$info['_ncomun'],$info['_ncientifico'],
      //     $info['_secado'],$info['_cosecha'],'PC-C');
      // $this->tratamiento_model->insertar_informaciontratamiento($info['_idTratamientogeneral'],$info['_productoid'],$info['_dosis'],$info['_ncomun'],$info['_ncientifico'],
      //     $info['_secado'],$info['_cosecha'],'PC-D');
      // $this->tratamiento_model->insertar_informaciontratamiento($info['_idTratamientogeneral'],$info['_productoid'],$info['_dosis'],$info['_ncomun'],$info['_ncientifico'],
      //     $info['_secado'],$info['_cosecha'],'POST-FORZA');
      $datos3=array();
      $datos3[]="TratamientNuevooAgregado";
      echo json_encode($datos3,JSON_UNESCAPED_UNICODE);
    }



    function CrearProyecto()
    {
      $data = array(
        '_numero' =>$this->input->post('_numero'),
        '_fecha_creacion'  =>$this->input->post('_fecha_creacion')
      );

      if($this->proyecto_model->insert_proyecto($data['_numero'],$data['_fecha_creacion'])==false){
        $datos3=array();
        $datos3[]="False";
        echo json_encode($datos3);
      }

      // $nombre = $this->input->post('_nombre');
      $datos3=array();
      $datos3[]="Exito";
      echo json_encode($datos3,JSON_UNESCAPED_UNICODE);
    }

    function eliminar_tratamiento(){
      $data = array(
        '_idTrat' => $this->input->post('_idTrat'),
        );

      $this->tratamiento_model->eliminar_tratamiento($data['_idTrat']);
      $datos3=array();
      $datos3[]="ProductoEliminado";
      echo json_encode($datos3,JSON_UNESCAPED_UNICODE);

    }


    function cargarTratamientosExistentes(){
      // cargar tratamientos predeterminados
      $datosPredeterminados=array();
      $queryTratamientos = $this->tratamiento_model->get_tratamientospredeterminados();

      foreach ($queryTratamientos->result() as $tratamientorow) {
         $tratamientoPredeterminado=array();
         $queryInfoProyectos = $this->proyecto_model->get_proyecto($tratamientorow->id_proyecto);// obtener el proyecto con el id del proyecto del tratamiento predeterminado
          
        foreach ($queryInfoProyectos as $proyectorow) {// se saca la informacion del proyecto que tiene el tratamiento predeterminado
          $tratamientoPredeterminado[] = $proyectorow->numero_proyecto; // numero del proyecto
          break;
        }
        $tratamientoPredeterminado[] = $tratamientorow->id_tratamiento; // id tratamiento

             $queryInformacionTratamientos = $this->InformacionTratamiento_model->obtener_informacionT($tratamientorow->id_tratamiento); // todas las informaciones del tratamientos
             $productosPredeterminados =array();
             foreach ($queryInformacionTratamientos->result() as $informaciontratamiento) {// Buscar todos las informaciones del tratamiento
               $queryProductos = $this->product_model->obtener_producto($informaciontratamiento->id_producto); // obtiena la informacion del producto con el id de informaciontratamiento
                 foreach ($queryProductos->result() as $producto) {// Se obtiene el nombre del producto de la informacion del tratamiento
                    $productosPredeterminados[] = $producto->name;
                    break;
                 }
             }

        

        $tratamientoPredeterminado[] =$productosPredeterminados;
        
        $cantidad_cedulas = $this->cedula_model->cantidad_cedulas($tratamientorow->id_tratamiento);
        $tratamientoPredeterminado[] = $cantidad_cedulas;
        
        $datosPredeterminados[] = $tratamientoPredeterminado;
      }

      // $queryInformacionTratamientos =
      // $queryCedulaTrataminetos = 
       echo json_encode($datosPredeterminados,JSON_UNESCAPED_UNICODE);
    }

}