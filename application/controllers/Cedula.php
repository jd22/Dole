<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cedula  extends CI_Controller
{
	function __construct()
	{
	   parent::__construct();
	   $this->load->model('cedula_model','',TRUE);
       $this->load->model('aplication_model','',TRUE);
       $this->load->model('tratament_model','',TRUE);
       $this->load->model('dosis_model','',TRUE);
       $this->load->model('land_model','',TRUE);
       $this->load->model('product_model','',TRUE);
       $this->load->model('temporal_model','',TRUE);
	}


	function index()
	{
  //       $this->temporal_model->eli_temporal();

		// if($this->session->userdata('logged_in'))
  //       {
  //           $session_data = $this->session->userdata('logged_in');
  //           $data['realname'] = $session_data['realname'];
  //           $datos['users'] = $this->cedula_model->get_cedulas();
  //           //$this->load->view('header/librerias');
  //           //$this->load->view('header/header');
  //           if($session_data['realname']=="Administrator")
  //           {
  //           	//$this->load->view('header/menu',$data);
  //           }
  //           else
  //           {
  //           	//$this->load->view('header/menu_user',$data);
  //           }
  //           $this->load->view('_Layout');
  //           $this->load->view('lista_cedulas',$datos);
  //          // $this->load->view('footerlayout');
            
	 //     	//$this->load->view('seecedulas_view',$datos);
	 //     	//$this->load->view('footer');
  //       } else {
  //           redirect('Home', 'refresh');
  //       }

	}

    function CargarCantidadCedulas()
    {
      $data = array(
        '_id_tratamiento' => $this->input->post('_id_tratamiento')        
      );

     $linfoCedulas = $this->cedulas_model->obtener_cedulas($data['_id_tratamiento']);
     $datos=array();
     $cantidadCedulas = 0;
     foreach($linfoCedulas->result() as $row)
      {
        // $datos3=array();
        // $datos3[]= $row->id_tratamiento;
        // $datos[] = $datos3;
        $cantidadCedulas =  $cantidadCedulas+1;
      }
      $datos[] = $cantidadCedulas;
      echo json_encode($datos,JSON_UNESCAPED_UNICODE);
    }

    function Agregar_cedula(){
        $data = array(
                         '_id_tratamiento'=>$this->input->post('_id_tratamiento'),
                         '_numero_proyecto'=>$this->input->post('_numero_proyecto'),
                         '_id_finca'=>$this->input->post('_id_finca'),
                         '_descripcion_aplicacion'=>$this->input->post('_descripcion_aplicacion'),
                         '_semana_aplicacion'=>$this->input->post('_semana_aplicacion'),
                         '_fecha_programada'=>$this->input->post('_fecha_programada'),
                         '_litros'=>$this->input->post('_litros'),
                         '_presion'=>$this->input->post('_presion'),
                         '_velocidad'=>$this->input->post('_velocidad'),
                         '_rpm'=>$this->input->post('_rpm'),
                         '_marcha'=>$this->input->post('_marcha'),
                         '_tipo_boquilla'=>$this->input->post('_tipo_boquilla'),
                         '_cultivo'=>$this->input->post('_cultivo'),
                         '_variedad'=>$this->input->post('_variedad'),
                         '_lote'=>$this->input->post('_lote'),
                         '_bloque'=>$this->input->post('_bloque'),
                         '_estadio'=>$this->input->post('_estadio'),
                         '_semana_siembra'=>$this->input->post('_semana_siembra'),
                         '_area_bloque'=>$this->input->post('_area_bloque'),
                         '_area_proyecto'=>$this->input->post('_area_proyecto'),
                         '_cantidad_camas'=>$this->input->post('_cantidad_camas'),
                         '_ancho_camas'=>$this->input->post('_ancho_camas'),
                         '_longitud_parcelas'=>$this->input->post('_longitud_parcelas'),
                         '_cantidad_parcelas'=>$this->input->post('_cantidad_parcelas'),
                         '_cantidad_replicas'=>$this->input->post('_cantidad_replicas'),
                         '_volumen_aplicacion'=>$this->input->post('_volumen_aplicacion'),
                         '_modo_aplicacion'=>$this->input->post('_modo_aplicacion'),
                         '_metodo_aplicacion'=>$this->input->post('_metodo_aplicacion')
                         );
        $this->cedula_model->insertar_cedula($data['_id_tratamiento'],$data['_numero_proyecto'],$data['_id_finca'],$data['_descripcion_aplicacion'],
                     $data['_semana_aplicacion'],$data['_fecha_programada'],$data['_litros'],$data['_presion'],$data['_velocidad'],$data['_rpm'],
                     $data['_marcha'],$data['_tipo_boquilla'],$data['_cultivo'],$data['_variedad'],$data['_lote'],$data['_bloque'],$data['_estadio'],
                     $data['_semana_siembra'],$data['_area_bloque'],$data['_area_proyecto'],$data['_cantidad_camas'],$data['_ancho_camas'],
                     $data['_longitud_parcelas'],$data['_cantidad_parcelas'],$data['_cantidad_replicas'],$data['_volumen_aplicacion'],
                     $data['_modo_aplicacion'],$data['_metodo_aplicacion']);
        $datos3=array();
        $datos3[]="Exito";
        echo json_encode($datos3);
    }

    function generar_pdf()//$id_cedula
    {   $nombre_finca='';
        $num_proyecto='';
        $cedula = $this->cedula_model->get_cedula($id_cedula);
        $volumen_tanque='';
        $volumen_tanques='';
        //Aplicacion
        $Descripción='';
        $Cultivo='';
        $Ubicación='';
        $Modo_Aplicacion='';
        $fecha_programada='';
        $variedad='';
        $lote='';
        $bloque='';
        $sem_programada='';
        $estadio='';
        $sem_siembra='';
        $Secado='';
        $Cosecha='';
        $num_replicas;
        $presion;
        $velocidad;
        $rpm;
        $marcha;
        $boquilla;
        $volumen;

        //Cedula
        $area_aplicacion;
        $area_x_replica;
        $lts_agua;
        $capacidad_tanque;
        $area_buffer;
        $tanque_reqeridos;
        $num;
        $productos='';
        $int=1;

        $litros_tanque=array();
        if($cedula!=false)
        {
            foreach ($cedula as $row) 
            {
                $area_aplicacion=$row->area_aplicacion;
                $area_x_replica=$row->area_por_replica;
                $lts_agua=$row->Lts_Agua_Aplicacion;
                $capacidad_tanque=$row->Capacidad_Tanque;
                $area_buffer=$row->Area_Buffer;
                $tanque_reqeridos=$row->Tanques_Requeridos;
                $num=$row->num;
                $x=$tanque_reqeridos;
                if($x<1)
                {
                    $volumen_tanque=' <tr>
                                        <td>Volumen Tanque 1:</td>
                                        <td align="center">'.$x.'</td';
                    $litros_tanque[0]=number_format($x*$capacidad_tanque+66,1,'.','');
                    $x--;
                }
                else
                {
                    $volumen_tanque=' <tr>
                                        <td>Volumen Tanque 1:</td>
                                        <td align="center">1</td';
                    $litros_tanque[0]=number_format(1*$capacidad_tanque+66,1,'.','');
                    $x--;
                    $int++;
                }
                while($x>0)
                {
                    if($x>1)
                    {
                        $volumen_tanques=$volumen_tanques.' <tr>
                                            <td>Volumen Tanque '.$int.' :</td>
                                            <td align="center">1</td
                                          </tr>';
                        $litros_tanque[$int-1]=number_format(1*$capacidad_tanque+66,1,'.','');
                        $x--;
                        $int++;
                    }
                    else
                    {
                        $volumen_tanques=$volumen_tanques.' <tr>
                                            <td>Volumen Tanque '.$int.' :</td>
                                            <td align="center">'.$x.'</td
                                          </tr>';
                        $litros_tanque[$int-1]=number_format($x*$capacidad_tanque+66,1,'.','');
                        $x=$x-1;
                    }

                }

                $aplicacion=$this->aplication_model->get_aplication($row->id_aplicacion);
                if($aplicacion!=false)
                {
                    foreach ($aplicacion as $row2) 
                    {
                        $num_proyecto=$row2->Número_Proyecto;
                        $Descripción=$row2->Descripcion;
                        $Cultivo=$row2->cultivo;
                        $Modo_Aplicacion=$row2->Modo_Aplicacion;
                        $fecha_programada=$row2->fecha_programada;
                        $variedad=$row2->Variedad;
                        $lote=$row2->Lote;
                        $bloque=$row2->Bloque;
                        $sem_programada=$row2->Semana_Aplicacion;
                        $estadio=$row2->Estadio;
                        $sem_siembra=$row2->Semana_Siembra;
                        $num_replicas=$row2->Replicas;
                        $presion=$row2->Presion;
                        $velocidad=$row2->Velocidad;
                        $rpm=$row2->rpm;
                        $marcha=$row2->Marcha;
                        $boquilla=$row2->Boquilla;
                        $volumen=$row2->Volumen_Aplicacion;
                        $finca=$this->land_model->get_land($row2->id_finca);

                        $tiempo_replicas ='';
                        for ($i=1; $i <=$num_replicas ; $i++) 
                        { 
                            $tiempo_replicas=$tiempo_replicas.'<tr>
                                                                <td width="40%">Replica'.$i.'</td>
                                                                <td width=60%></td>
                                                               </tr> ';
                        }
                        if($finca!=false)
                        {
                            foreach ($finca->result() as $row3) 
                            {
                                $nombre_finca=$row3->name;
                                $Ubicación=$row3->Location;
                            }
                        }    
                    }

                }
                $tratamiento=$this->tratament_model->get_tratamiento($row->id_tratamiento);
                if($tratamiento!=false)
                {
                    foreach ($tratamiento->result() as $row4) 
                    {
                        $Secado=$row4->Secado;
                        $Cosecha=$row4->Cosecha;
                        $get_dosis=$this->dosis_model->get_dosis($row4->id);
                        if ($get_dosis!=false)
                        {
                            foreach ($get_dosis->result() as $row5)
                            {   
                                $dosis=$row5->dosis;
                                $producto=$this->product_model->get_product2($row5->id_product);
                                if($producto!=false)
                                {
                                    foreach ($producto->result() as $row6) 
                                    {
                                        $productos=$productos.'<tr>
                                                                <td>'.$row6->name.'</td>
                                                                <td align="center">'.$row6->activecomponent.'</td>
                                                                <td align="center">'.$dosis.'</td>';
                                        for ($i=0; $i < count($litros_tanque); $i++) 
                                        { 
                                            $cal_tanque=bcdiv($litros_tanque[$i]*$dosis,$volumen,3);
                                            $productos=$productos.'<td align="center">'.$cal_tanque.'</td>';
                                        }
                                        $productos=$productos.'<td align="center">'.$row6->unit.'</td>
                                                               <td></td>
                                                               </tr>';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $dosis_tanque='';
        $total_mezcla='';
        for ($i=0; $i < count($litros_tanque) ; $i++) { 
            $galones=round($litros_tanque[$i]/3.785);
            $total_mezcla=$total_mezcla.'<tr>
                                <td align="center">'.$int.'</td>
                                <td align="center">'.$litros_tanque[$i].'</td>
                                <td align="center">'.$galones.'</td>
                                <td></td>
                            </tr>';
            $id_tanque=$i+1;
            $dosis_tanque=$dosis_tanque.'<td style="background-color: grey;" rowspan="2" align="center">Dosis Tanque '.$id_tanque.'</td>';
        }
        $int=$int+1;

        $html=  '<html>
                    <head>
                        <meta charset="utf-8">
                        <title>PDF</title>
                    </head>
                    <body>
                       <table style="width:100%;font-size:11.5px" align="">
                            <tr>
                                <td>
                                <img src="C:/xampp/htdocs/Dole/images/dole3.png">
                                <br>
                                <br><strong>Cedula de Aplicaciones Experimentales</strong></br>
                                <br><strong>Agroindustrial Piñas del Bosque</strong></br>
                                <br><strong>Departamento de Investigaciones</strong></br>
                                <br><strong>Finca '.$nombre_finca.'</strong></br>
                                </td>
                                <td>
                                <br>Cultivo:                                             '.$Cultivo.'</br>
                                <br>Descripción de la Aplicación:                        '.$Descripción.'</br>
                                <br>Modo de aplicación:                                  '.$Modo_Aplicacion.'</br>
                                <br>Ubicación:                                           '.$Ubicación.'</br>
                                <br>Intervalo de reingreso al área tratada:              '.$Secado.'</br>
                                <br>Intervalo entre la última aplicación y la cosecha:   '.$Cosecha.'</br>
                                </td>
                            </tr>
                        </table>         
                        <br>
                            <table style="width:100%;font-size:11.5px" align="" border=0.1>
                                <tr>
                                    <td width="10%"> Proyecto:  </td>
                                    <td align="center" width="10%">'.$num_proyecto.'  </td>
                                    <td> Fecha Programada:  </td>
                                    <td align="center" width="12%">'.$fecha_programada.'</td>
                                    <td> Variedad:  </td>
                                    <td align="center">'.$variedad.'</td>
                                    <td style="background-color: grey;" align="center"> Tratamiento </td>
                                </tr>
                                <tr>
                                    <td> Lote:   </td>
                                    <td align="center"> '.$lote.' </td>
                                    <td> Fecha Aplicación:   </td>
                                    <td>    </td>
                                    <td> Estadio:   </td>
                                    <td align="center"> '.$estadio.' </td>
                                    <td rowspan="2" align="center">'.$num.'</td>
                                </tr>
                                <tr>
                                    <td> Bloque:   </td>
                                    <td align="center"> '.$bloque.' </td>
                                    <td> Sem. Programada:   </td>
                                    <td align="center"> '.$sem_programada.' </td>
                                    <td> Sem Siembra:   </td>
                                    <td align="center"> '.$sem_siembra.'</td>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <table style="width:100%;font-size:11.5px" align="" border=0.1>
                                <tr>
                                    <td style="background-color: grey;" colspan="2" align="center"> Calculos de Aplicación </td>
                                    <td style="background-color: grey;" colspan="2" align="center"> Datos de Equipo y Calibración </td>
                                    <td colspan="2" rowspan="2" align="centar">Nombre Operador del Tractor</td>
                                </tr>
                                <tr>
                                    <td> Número de Replicas:</td>
                                    <td align="center"> '.$num_replicas.' </td>
                                    <td>Sección</td>
                                    <td align="center"> 1   2   3   4 </td>
                                </tr>
                                <tr>
                                    <td> Area de Aplicación (m2):</td>
                                    <td align="center"> '.$area_aplicacion.' </td>

                                    <td>Presión (psi)</td>
                                    <td align="center">'.$presion.'</td>
                                    <td colspan="2" rowspan="2"></td>
                                </tr>
                                <tr>
                                    <td>Area calculada por Replc.(m2):</td>
                                    <td align="center"> '.$area_x_replica.' </td>

                                    <td>Velocidad (k/h)</td>
                                    <td align="center">'.$velocidad.'</td>
                                </tr>
                                <tr>
                                    <td> Volumen de Apl. (L ha-1):</td>
                                    <td align="center"> '.$volumen.' </td>

                                    <td>R.P.M</td>
                                    <td align="center">'.$rpm.'</td>
                                    <td colspan="2" rowspan="2">Nombre Operador del Spray Boom</td>
                                </tr>
                                <tr>
                                    <td> Lts. Agua x aplicación:</td>
                                    <td align="center"> '.$lts_agua.' </td>

                                    <td>Marcha</td>
                                    <td align="center">'.$marcha.'</td>
                                </tr>
                                <tr>
                                    <td> Capacidad Tanque (L):</td>
                                    <td align="center"> '.$capacidad_tanque.' </td>

                                    <td>Tipo Boquilla</td>
                                    <td align="center">'.$boquilla.'</td>
                                    <td colspan="2" rowspan="2"></td>
                                </tr>
                                <tr>
                                    <td> Area Buffer (m2):   </td>
                                    <td align="center"> '.$area_buffer.'</td>

                                    <td>Metodo de Aplicación</td>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <td> Tanques requeridos:   </td>
                                    <td align="center"> '.$tanque_reqeridos.' </td>
                                    <td>Num. Tractor</td>
                                    <td></td>
                                </tr>'.$volumen_tanque.'
                                    <td>Num. Spary Boom</td>
                                    <td></td>
                                </tr>'.$volumen_tanques.'
                            </table>
                        </div>
                        <div>
                            <table style="width:100%;font-size:11.5px" align="" border=0.1>
                                <tr>
                                    <td style="background-color: grey;" colspan="2" align="center">Momento de Aplicación</td>
                                    <td style="background-color: grey;" colspan="2" align="center">Condiciones Climáticas</td>
                                </tr>
                                <tr>
                                    <td width="40%">Día</td>
                                    <td width="60%"></td>
                                    <td width="40%">Soleado</td>
                                    <td width="60%"></td>
                                </tr>
                                <tr>
                                    <td>Noche</td>
                                    <td></td>
                                    <td>Nublado</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Hora Inicio</td>
                                    <td></td>
                                    <td>Llovizna</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Hora Final</td>
                                    <td></td>
                                    <td>Lluvia</td>
                                    <td></td>
                                </tr>
                            </table>
                            <table style="width:30%;font-size:11.5px" align="" border=0.1>
                                <tr>
                                    <td style="background-color: grey;" colspan="2" align="center">Tiempo de Aplicación</td>
                                </tr>'.$tiempo_replicas.'
                            </table>
                        </div>
                        <div>
                            <table style="width:100%;font-size:11.5px" align="" border=0.1>
                                <tr>
                                    <td style="background-color: grey;" rowspan="2" align="center">Nombre Comercial</td>
                                    <td style="background-color: grey;" rowspan="2" align="center">Ingrediente Activo</td>
                                    <td style="background-color: grey;" rowspan="2" align="center">Dosis por hectarea</td>
                                    '.$dosis_tanque.'
                                    <td style="background-color: grey;" rowspan="2" align="center">Unidad</td>
                                    <td style="background-color: grey;" rowspan="2" align="center">Lote fertilizante</td>
                                </tr>
                                <tr>
                                </tr>'.$productos.'
                            </table>
                        </div>
                        <div>
                            <table style="width:100%;font-size:11.5px" align="" border=0.1>
                                <tr>
                                    <td rowspan="'.$int.'" align="center">Volumen Total de mezlca</td>
                                    <td style="background-color: grey;" align="center">Tanque</td>
                                    <td style="background-color: grey;" align="center">Litros</td>
                                    <td style="background-color: grey;" align="center">Galones</td>
                                    <td style="background-color: grey;" align="center">Total tanques</td>
                                </tr>'.$total_mezcla.'
                            </table>
                        </div>
                        <br>
                        <div style="font-size:11.5px">
                            <table style="width:100%;font-size:11.5px" align="">
                                <tr>
                                    <td>Observaciones</td>
                                    <td>Encargados</td>
                                </tr>
                                <tr>
                                    <td>________________________________________</td>
                                    <td>________________________________________</td>
                                </tr>
                                <tr>
                                    <td>________________________________________</td>
                                    <td>________________________________________</td>
                                </tr>
                            </table>
                        </div>
                    </body>
                </html>';
        $this->load->library("Dompdf_lib");
        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $path="Cedula".$id_cedula."_".date('d-m-Y').".pdf";
        $dompdf->stream($path);
        
    }
}
?>