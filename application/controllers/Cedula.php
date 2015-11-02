<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cedula  extends CI_Controller
{
	function __construct()
	{
	   parent::__construct();
	     $this->load->model('cedula_model','',TRUE);
       $this->load->model('InformacionTratamiento_model','',TRUE);
       $this->load->model('land_model','',TRUE);
       $this->load->model('product_model','',TRUE);
	}


	function index()
	{

	}
  function eliminar_cedula($id_cedula){
    $this->cedula_model->eliminar_cedula($id_cedula);
    $datos=array();
    $datos[] = "eliminadacedula";
    echo json_encode($datos,JSON_UNESCAPED_UNICODE);
  }
    function CargarCantidadCedulas()
    {
      $data = array(
        '_id_tratamiento' => $this->input->post('_id_tratamiento')        
      );

     $linfoCedulas = $this->cedula_model->obtener_cedulas($data['_id_tratamiento']);
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
    function obtener_cedulas($id_tratamiento)
    {
     $linfoCedulas = $this->cedula_model->obtener_cedulas($id_tratamiento);
     $datos=array();
     foreach($linfoCedulas as $row)
      {
        $datos3=array();
        $datos3[]= $row->id_cedulaAplicacion;
        $datos3[]= $row->descripcion_aplicacion;
        $datos3[]= $row->semana_aplicacion;
        $datos[] = $datos3;
      }
      echo json_encode($datos);
    }

    function obtener_cedulasportipo($id_tratamiento,$tipo)
    {
     $linfoCedulas = $this->cedula_model->obtenertodas_cedulasytipo($id_tratamiento,$tipo);
     $datos=array();
     foreach($linfoCedulas->result() as $row)
      {
        $datos3=array();
        $datos3[]= $row->id_cedulaAplicacion;
        $datos3[]= $row->descripcion_aplicacion;
        $datos3[]= $row->semana_aplicacion;
        $datos[] = $datos3;
      }
      echo json_encode($datos);
    }


    function  obtener_unacedula($id_cedula){
      $datos=array();
      $queryCedula = $this->cedula_model->obtener_unacedula($id_cedula);
      foreach ($queryCedula as $row) {
        //$datos[]= $row->id_cedulaAplicacion;
        $datos[]= $row->id_finca;
        $datos[]= $row->descripcion_aplicacion;
        $datos[]= $row->semana_aplicacion;
        $datos[]= $row->fecha_programada;
        $datos[]= $row->litros;
        $datos[]= $row->presion;
        $datos[]= $row->velocidad;
        $datos[]= $row->rpm;
        $datos[]= $row->marcha;
        $datos[]= $row->tipo_boquilla;
        $datos[]= $row->cultivo;
        $datos[]= $row->variedad;
        $datos[]= $row->lote;
        $datos[]= $row->bloque;
        $datos[]= $row->estadio;
        $datos[]= $row->semana_siembra;
        $datos[]= $row->area_bloque;
        $datos[]= $row->area_proyecto;
        $datos[]= $row->cantidad_camas;
        $datos[]= $row->ancho_camas;
        $datos[]= $row->longitud_parcelas;
        $datos[]= $row->cantidad_parcelas;
        $datos[]= $row->cantidad_replicas;
        $datos[]= $row->volumen_aplicacion;
        $datos[]= $row->modo_aplicacion;
        $datos[]= $row->metodo_aplicacion;
      }
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
                         '_metodo_aplicacion'=>$this->input->post('_metodo_aplicacion'),
                         '_tipo'=>$this->input->post('_tipo')
                         
                         );
        if($data['_tipo']!='PC-A'){
          $this->cedula_model->insertar_cedula($data['_id_tratamiento'],$data['_numero_proyecto'],$data['_id_finca'],$data['_descripcion_aplicacion'],
                             $data['_semana_aplicacion'],$data['_fecha_programada'],$data['_litros'],$data['_presion'],$data['_velocidad'],$data['_rpm'],
                             $data['_marcha'],$data['_tipo_boquilla'],$data['_cultivo'],$data['_variedad'],$data['_lote'],$data['_bloque'],$data['_estadio'],
                             $data['_semana_siembra'],$data['_area_bloque'],$data['_area_proyecto'],$data['_cantidad_camas'],$data['_ancho_camas'],
                             $data['_longitud_parcelas'],$data['_cantidad_parcelas'],$data['_cantidad_replicas'],$data['_volumen_aplicacion'],
                             $data['_modo_aplicacion'],$data['_metodo_aplicacion'],'PC-A');
        }
        if($data['_tipo']!='PC-B'){
          $this->cedula_model->insertar_cedula($data['_id_tratamiento'],$data['_numero_proyecto'],$data['_id_finca'],$data['_descripcion_aplicacion'],
                             $data['_semana_aplicacion'],$data['_fecha_programada'],$data['_litros'],$data['_presion'],$data['_velocidad'],$data['_rpm'],
                             $data['_marcha'],$data['_tipo_boquilla'],$data['_cultivo'],$data['_variedad'],$data['_lote'],$data['_bloque'],$data['_estadio'],
                             $data['_semana_siembra'],$data['_area_bloque'],$data['_area_proyecto'],$data['_cantidad_camas'],$data['_ancho_camas'],
                             $data['_longitud_parcelas'],$data['_cantidad_parcelas'],$data['_cantidad_replicas'],$data['_volumen_aplicacion'],
                             $data['_modo_aplicacion'],$data['_metodo_aplicacion'],'PC-B');
        }
        if($data['_tipo']!='PC-C'){
          $this->cedula_model->insertar_cedula($data['_id_tratamiento'],$data['_numero_proyecto'],$data['_id_finca'],$data['_descripcion_aplicacion'],
                             $data['_semana_aplicacion'],$data['_fecha_programada'],$data['_litros'],$data['_presion'],$data['_velocidad'],$data['_rpm'],
                             $data['_marcha'],$data['_tipo_boquilla'],$data['_cultivo'],$data['_variedad'],$data['_lote'],$data['_bloque'],$data['_estadio'],
                             $data['_semana_siembra'],$data['_area_bloque'],$data['_area_proyecto'],$data['_cantidad_camas'],$data['_ancho_camas'],
                             $data['_longitud_parcelas'],$data['_cantidad_parcelas'],$data['_cantidad_replicas'],$data['_volumen_aplicacion'],
                             $data['_modo_aplicacion'],$data['_metodo_aplicacion'],'PC-C');
        }
        if($data['_tipo']!='PC-D'){
          $this->cedula_model->insertar_cedula($data['_id_tratamiento'],$data['_numero_proyecto'],$data['_id_finca'],$data['_descripcion_aplicacion'],
                             $data['_semana_aplicacion'],$data['_fecha_programada'],$data['_litros'],$data['_presion'],$data['_velocidad'],$data['_rpm'],
                             $data['_marcha'],$data['_tipo_boquilla'],$data['_cultivo'],$data['_variedad'],$data['_lote'],$data['_bloque'],$data['_estadio'],
                             $data['_semana_siembra'],$data['_area_bloque'],$data['_area_proyecto'],$data['_cantidad_camas'],$data['_ancho_camas'],
                             $data['_longitud_parcelas'],$data['_cantidad_parcelas'],$data['_cantidad_replicas'],$data['_volumen_aplicacion'],
                             $data['_modo_aplicacion'],$data['_metodo_aplicacion'],'PC-D');
        }
        if($data['_tipo']!='POST-FORZA'){
          $this->cedula_model->insertar_cedula($data['_id_tratamiento'],$data['_numero_proyecto'],$data['_id_finca'],$data['_descripcion_aplicacion'],
                             $data['_semana_aplicacion'],$data['_fecha_programada'],$data['_litros'],$data['_presion'],$data['_velocidad'],$data['_rpm'],
                             $data['_marcha'],$data['_tipo_boquilla'],$data['_cultivo'],$data['_variedad'],$data['_lote'],$data['_bloque'],$data['_estadio'],
                             $data['_semana_siembra'],$data['_area_bloque'],$data['_area_proyecto'],$data['_cantidad_camas'],$data['_ancho_camas'],
                             $data['_longitud_parcelas'],$data['_cantidad_parcelas'],$data['_cantidad_replicas'],$data['_volumen_aplicacion'],
                             $data['_modo_aplicacion'],$data['_metodo_aplicacion'],'POST-FORZA');
        }
        $this->cedula_model->insertar_cedula($data['_id_tratamiento'],$data['_numero_proyecto'],$data['_id_finca'],$data['_descripcion_aplicacion'],
                             $data['_semana_aplicacion'],$data['_fecha_programada'],$data['_litros'],$data['_presion'],$data['_velocidad'],$data['_rpm'],
                             $data['_marcha'],$data['_tipo_boquilla'],$data['_cultivo'],$data['_variedad'],$data['_lote'],$data['_bloque'],$data['_estadio'],
                             $data['_semana_siembra'],$data['_area_bloque'],$data['_area_proyecto'],$data['_cantidad_camas'],$data['_ancho_camas'],
                             $data['_longitud_parcelas'],$data['_cantidad_parcelas'],$data['_cantidad_replicas'],$data['_volumen_aplicacion'],
                             $data['_modo_aplicacion'],$data['_metodo_aplicacion'],$data['_tipo']);
        
        $datos3=array();
        $datos3[]="Exito";
        echo json_encode($datos3);
    }

// <br>Intervalo de reingreso al área tratada:             ?            
// <br>Intervalo entre la última aplicación y la cosecha:  ?


function Actualizar_cedula(){
        $data = array(
                         '_id_cedula'=>$this->input->post('_id_cedula'),
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
        $this->cedula_model->editar_cedula($data['_id_cedula'],$data['_numero_proyecto'],$data['_id_finca'],$data['_descripcion_aplicacion'],
                     $data['_semana_aplicacion'],$data['_fecha_programada'],$data['_litros'],$data['_presion'],$data['_velocidad'],$data['_rpm'],
                     $data['_marcha'],$data['_tipo_boquilla'],$data['_cultivo'],$data['_variedad'],$data['_lote'],$data['_bloque'],$data['_estadio'],
                     $data['_semana_siembra'],$data['_area_bloque'],$data['_area_proyecto'],$data['_cantidad_camas'],$data['_ancho_camas'],
                     $data['_longitud_parcelas'],$data['_cantidad_parcelas'],$data['_cantidad_replicas'],$data['_volumen_aplicacion'],
                     $data['_modo_aplicacion'],$data['_metodo_aplicacion']);
        $datos3=array();
        $datos3[]="Exito";
        echo json_encode($datos3);
    }



function generar_pdf($id_cedula,$numeroTratamiento)//$id_cedula
{   
  $informacionCedula = $this->cedula_model->obtener_unacedula($id_cedula);

  //$id_cedulaAplicacion
  $id_tratamiento='';
  $numero_proyecto='';
  $id_finca='';
  $descripcion_aplicacion='';
  $semana_aplicacion='';
  $fecha_programada='';
  $litros='';
  $presion='';
  $velocidad='';
  $rpm='';
  $marcha='';
  $tipo_boquilla='';
  $cultivo='';
  $variedad='';
  $lote='';
  $bloque='';
  $estadio='';
  $semana_siembra='';
  $area_bloque='';
  $area_proyecto='';
  $cantidad_camas='';
  $ancho_camas='';
  $longitud_parcelas='';
  $cantidad_parcelas='';
  $cantidad_replicas='';
  $volumen_aplicacion='';
  $modo_aplicacion='';
  $metodo_aplicacion='';

  $htmlrowproductos = '';
  foreach ($informacionCedula as $row) {
      $id_tratamiento=$row->id_tratamiento;
      $numero_proyecto=$row->numero_proyecto;
      $id_finca=$row->id_finca;
      $descripcion_aplicacion=$row->descripcion_aplicacion;
      $semana_aplicacion=$row->semana_aplicacion;
      $fecha_programada=$row->fecha_programada;
      $litros=$row->litros;
      $presion=$row->presion;
      $velocidad=$row->velocidad;
      $rpm=$row->rpm;
      $marcha=$row->marcha;
      $tipo_boquilla=$row->tipo_boquilla;
      $cultivo=$row->cultivo;
      $variedad=$row->variedad;
      $lote=$row->lote;
      $bloque=$row->bloque;
      $estadio=$row->estadio;
      $semana_siembra=$row->semana_siembra;
      $area_bloque=$row->area_bloque;
      $area_proyecto=$row->area_proyecto;
      $cantidad_camas=$row->cantidad_camas;
      $ancho_camas=$row->ancho_camas;
      $longitud_parcelas=$row->longitud_parcelas;
      $cantidad_parcelas=$row->cantidad_parcelas;
      $cantidad_replicas=$row->cantidad_replicas;
      $volumen_aplicacion=$row->volumen_aplicacion;
      $modo_aplicacion=$row->modo_aplicacion;
      $metodo_aplicacion=$row->metodo_aplicacion;
  }
  
  $queryfinca = $this->land_model->get_finca($id_finca);
  $nombreFinca='';
  $ubicacionfinca='';
  foreach ($queryfinca as $row) {
    $nombreFinca = $row->nombre;
    $ubicacionfinca = $row->ubicacion;
  }

  // para los calculos
  $NúmeroReplc = $cantidad_parcelas;
  $AreacalculadaporReplica = $cantidad_camas*$ancho_camas*$longitud_parcelas;
  $AreadeAplicación = $AreacalculadaporReplica*$NúmeroReplc;
  $VolumendeApl = $volumen_aplicacion;
  $LtsAguaxaplicación =$VolumendeApl/10000*$AreadeAplicación;
  $CapacidadTanque= 200*3.785;
  $AreaBuffer = $area_bloque-$area_proyecto;
  $Tanquesrequeridos = $LtsAguaxaplicación/$CapacidadTanque;
  $Volumentanque1 = $Tanquesrequeridos;
  $Volumentanque2 = '';


  // para html para la ultima columna
  $columlitros = ($Volumentanque1*$CapacidadTanque)+66;
  $columgalones = $columlitros/3.785;
  $htmlvolumentotal = '<tr>
                        <td align="center">1</td>
                        <td align="center">'.$columlitros.'</td>
                        <td align="center">'.$columgalones.'</td>
                        <td>'.' '.'</td>
                      </tr>';
  
  
  //para todos los productos
  $listainformaciontratamiento = $this->InformacionTratamiento_model->obtener_informacionT($id_tratamiento);
  foreach ($listainformaciontratamiento->result() as $row) {
    $queryproducto = $this->product_model->obtener_producto($row->id_producto);
    $Nombrecomercial='';
    $IngredienteActivo='';
    $Unidad='';
    $dosisTanque = ($columlitros*$row->dosis)/$VolumendeApl;//formula

    foreach ($queryproducto->result() as $producto) { // para sacar todo los datos del producto de la informacion del tratamiento
      $Nombrecomercial=$producto->name;
      $IngredienteActivo=$producto->activecomponent;
      $Unidad=$producto->unit;
    }
    $htmlrowproductos = $htmlrowproductos.
                        '<tr>
                          <td> '.$Nombrecomercial.' </td>
                          <td> '.$IngredienteActivo.' </td>
                          <td> '.$row->plaga_nombre_comun.' </td>
                          <td> '.$row->plaga_nombre_cientifico.' </td>
                          <td> '.$row->dosis.' </td>
                          <td> '.$dosisTanque.' </td>
                          <td> '.$Unidad.' </td>
                          <td> Horas </td>
                          <td> Días </td>
                        </tr>';
  }



$html='<html>
          <head>
              <meta charset="utf-8">
              <title>PDF</title>
              <style>
                body {margin: -35px;}
              </style>
          </head>
          <body>
              <table style="width:100%;font-size:11px" align="">
                <tr>
                    <td>
                      <img src="C:/xampp/htdocs/Dole/images/dole3.png"><br>
                      <strong>Cedula de Aplicaciones Experimentales</strong><br>
                      <strong>Agroindustrial Piñas del Bosque</strong><br>
                      <strong>Departamento de Investigaciones</strong><br>
                      <strong>Finca: </strong> '.$nombreFinca.'<br>
                    </td>
                    <td>
                      <br><strong>Cultivo:</strong>                                            '.$cultivo.'
                      <br><strong>Descripción de la Aplicación:</strong>                       '.$descripcion_aplicacion.'                       
                      <br><strong>Modo de aplicación:</strong>                                 '.$modo_aplicacion.'                     
                      <br><strong>Ubicación:</strong>                                          '.$ubicacionfinca.'                     
                      
                  </td>
                </tr>
              </table>  
              <div>       
                  <table id="general_info" style="width:100%;font-size:11px" border=0.1>
                    <tr>
                      <td><strong>Proyecto: </strong>                   '.$numero_proyecto.'</td>
                      <td><strong>Fecha programada: </strong>           '.$fecha_programada.'</td>
                      <td><strong>Variedad: </strong>                   '.$variedad.'</td>
                      <td align="center"><strong>Tratamiento:</strong></td>
                    </tr>
                    <tr>  
                      <td><strong>Lote: </strong>                             '.$lote.'</td>
                      <td><strong>Fecha Aplicación: </strong>                  </td>
                      <td><strong>Sem Siembra / Sem cierre Cosecha: </strong> '.$semana_siembra.'</td>
                      <td rowspan="2" align="center"><strong>                 '.$numeroTratamiento.' </strong></td>
                    </tr>
                    <tr>
                      <td><strong>Block: </strong>            '.$bloque.'</td>
                      <td><strong>Estadío: </strong>          '.$estadio.'</td>
                      <td><strong>Sem. Programada: </strong>  '.$semana_aplicacion.'</td>
                    </tr>
                  </table>
              </div>
              <div>
                <table id="primerfila" style="width:100%;font-size:10px" align="" border=0>
                    <tr>
                      <td>
                        <table id="calculos" style="width:100%;font-size:10px" align="" border=0.1>
                          <tr>
                            <td style="background-color: grey;" colspan="2" align="center">Cálculos de Aplicación</td>
                          </tr>
                          <tr><td><strong>Número Replc. </strong></td> <td align="right">'.$NúmeroReplc.'</td>
                          </tr>
                          <tr><td><strong>Area de Aplicación.  (m2) </strong></td> <td align="right">'.$AreadeAplicación.'</td>
                          </tr>  
                          <tr><td><strong>Area calculada por Replica  (m2) </strong></td> <td align="right">'.$AreacalculadaporReplica.'</td>
                          </tr>
                          <tr><td><strong>Volumen de Apl. (L ha-1) </strong></td> <td align="right">'.$VolumendeApl.'</td>
                          </tr>
                          <tr><td><strong>Lts. Agua x aplicación </strong></td> <td align="right">'.$LtsAguaxaplicación.'</td>
                          </tr>
                          <tr><td><strong>Capacidad Tanque (L) </strong></td> <td align="right">'.$CapacidadTanque.'</td>
                          </tr>
                          <tr><td><strong>Area Buffer (m2) </strong></td> <td align="right">'.$AreaBuffer.'</td>
                          </tr>
                          <tr><td><strong>Tanques requeridos </strong></td> <td align="right">'.$Tanquesrequeridos.'</td>
                          </tr>
                          <tr><td><strong>Volumen tanque 1 </strong></td> <td align="right">'.$Volumentanque1.'</td>
                          </tr>
                          <tr><td><strong>Volumen tanque 2 </strong></td> <td align="right">'.$Volumentanque2.'</td>
                          </tr>
                        </table>
                      </td>
                      <td>
                        <table id="datosequipo" style="width:100%;font-size:10px;margin-top:-20px" align="" border=0.1>
                          <tr>
                            <td style="background-color: grey;" colspan="5" align="center">Datos de Equipo y Calibración</td>
                          </tr>
                          <tr><td><strong>Sección</strong></td> 
                              <td align="center"> 1</td>
                              <td align="center"> 2</td>
                              <td align="center"> 3</td>
                              <td align="center"> 4</td>
                          </tr>
                          <tr><td><strong>Presión (psi)</strong></td> <td align="right" colspan="4">'.$presion.'</td>
                          </tr>  
                          <tr><td><strong>Velocidad (k/h)</strong></td> <td align="right" colspan="4">'.$velocidad.'</td>
                          </tr>
                          <tr><td><strong>r.p.m </strong></td> <td align="right" colspan="4">'.$rpm.'</td>
                          </tr>
                          <tr><td><strong>Marcha </strong></td> <td align="right" colspan="4">'.$marcha.'</td>
                          </tr>
                          <tr><td><strong>Tipo de boquilla</strong></td> <td align="right" colspan="4">'.$tipo_boquilla.'</td>
                          </tr>
                          <tr><td><strong>Metodo de Aplicación</strong></td> <td align="right" colspan="4">'.$metodo_aplicacion.'</td>
                          </tr>
                          <tr><td><strong>Num. Tractor</strong></td> <td align="right" colspan="4">104</td>
                          </tr>
                          <tr><td><strong>Num. Spray Boom </strong></td> <td align="right" colspan="4">416</td>
                          </tr>
                        </table>
                      </td>
                      <td>
                        <table id="otros" style="width:100%;font-size:10px;margin-top:-50px" align="" border=0.1>
                          <tr>
                            <td rowspan="2" align="center"><strong>Nombre operador del Tractor</strong></td>                            
                          </tr>
                          <tr></tr>
                          <tr>
                            <td rowspan="4"> </td>
                          </tr>
                          <tr></tr>
                          <tr></tr>
                          <tr></tr>
                          <tr>
                           <td rowspan="2" align="center"><strong>Nombre operador del Spray Boom</strong></td>                      
                          </tr>  
                          <tr></tr>
                          <tr>
                            <td rowspan="4"> </td>
                          </tr>
                          <tr></tr>
                          <tr></tr>
                          <tr></tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
                <div>
                  <table style="width:100%;font-size:10px;" align="center">
                    <tr>
                      <td style="">
                        <table style="width:100%;font-size:10px;" align="" border=0.1>
                          <tr>
                            <td style="background-color: grey;" colspan="2" align="center">Momento de Aplicación</td>
                          </tr>
                          <tr><td><strong>Día</strong></td> <td></td>
                          </tr>
                          <tr><td><strong>Noche</strong></td> <td></td>
                          </tr>  
                          <tr><td><strong>Hora Inicio</strong></td> <td></td>
                          </tr>
                          <tr><td><strong>Hora Final</strong></td> <td></td>
                          </tr>
                        </table>
                      </td>

                      <td style="">
                        <table style="width:100%;font-size:10px;" align="center" border=0.1>
                          <tr>
                            <td style="background-color: grey;" colspan="2" align="center">Condiciones climaticas</td>
                          </tr>
                          <tr><td><strong>Soleado</strong></td> <td></td>
                          </tr>
                          <tr><td><strong>Nublado</strong></td> <td></td>
                          </tr>  
                          <tr><td><strong>Llovizna</strong></td> <td></td>
                          </tr>
                          <tr><td><strong>Lluvia</strong></td> <td></td>
                          </tr>
                        </table>
                      </td>

                      <td rowspan="2">
                        <img heigh="320px" width="400px" src="C:/xampp/htdocs/Dole/images/imagen.png">
                      </td>
                    </tr>

                    <tr>
                      <td style="">
                        <table style="width:100%;font-size:10px;" align="" border=0.1>
                          <tr>
                            <td style="background-color: grey;" colspan="6" align="center">Condiciones camino</td>
                          </tr>
                          <tr><td><strong>Replica</strong></td> 
                            <td align="center"> 1</td>
                            <td align="center"> 2</td>
                            <td align="center"> 3</td>
                            <td align="center"> 4</td>
                            <td align="center"> 5</td>
                          </tr>
                          <tr><td><strong>Seco</strong>       </td> <td colspan="5"></td>
                          </tr>  
                          <tr><td><strong>Mojado</strong>      </td> <td colspan="5"></td>
                          </tr>
                          <tr><td><strong>Fangoso</strong>     </td> <td colspan="5"></td>
                          </tr>
                          <tr><td><strong>Uniforme</strong>    </td> <td colspan="5"></td>
                          </tr>
                          <tr><td><strong>Desuniforme</strong> </td> <td colspan="5"></td>
                          </tr>
                          <tr><td><strong>Huecos</strong>      </td> <td colspan="5"></td>
                          </tr>
                          <tr><td><strong>Pedregoso</strong>   </td> <td colspan="5"></td>
                          </tr
                        </table>
                      </td>
                      <td style="">
                        <table style="width:100%;font-size:10px;" align="" border=0.1>
                          <tr>
                            <td style="background-color: grey;" colspan="2" align="center">Tiempo de aplicación</td>
                          </tr>
                          <tr><td><strong>Replica 1</strong></td> <td></td>
                          </tr>
                          <tr><td><strong>Replica 2</strong></td> <td></td>
                          </tr>  
                          <tr><td><strong>Replica 3</strong></td> <td></td>
                          </tr>
                          <tr><td><strong>Replica 4</strong></td> <td></td>
                          </tr>
                          <tr><td><strong>Replica 5</strong></td> <td></td>
                          </tr>
                          <tr><td><strong>Replica 6</strong></td> <td></td>
                          </tr>
                          <tr><td><strong>Replica 7</strong></td> <td></td>
                          </tr>
                          <tr><td><strong>Replica 8</strong></td> <td></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
              </div>
              <div>
                  <table style="width:100%;font-size:10px;" align="center" border=0.1>
                    <tr>
                      <td style="background-color: grey;" align="center">Nombre comercial</td>
                      <td style="background-color: grey;" align="center">Ingrediente Activo</td>
                      <td style="background-color: grey;" align="center" colspan="2" align="center">Plaga / enfermedad / Malezas a controlar</td>
                      <td style="background-color: grey;" align="center">Dosis por hectarea</td>
                      <td style="background-color: grey;" align="center">Dosis tanque I</td>
                      <td style="background-color: grey;" align="center">Unidad</td>
                      <td style="background-color: grey;" align="center">Periodo de Reingreso (horas)</td>
                      <td style="background-color: grey;" align="center">Intervalo a Cosecha (dias)</td>
                    </tr>
                    '.$htmlrowproductos.'
                  </table>
              </div>
              <div>
                  <table style="width:100%;font-size:10px;" align="center" border=0.1>
                    <tr>
                      <td style="background-color: grey;" rowspan="3" align="center">Volumen total de mezcla</td>
                      <td style="background-color: grey;">Tanque</td>
                      <td style="background-color: grey;">Litros</td>
                      <td style="background-color: grey;">Galones</td>
                      <td style="background-color: grey;">Total tanques</td>
                    </tr>
                    '.$htmlvolumentotal.'
                  </table>
              </div>
               <div>
                  <table style="width:100%;font-size:10px;">
                    <tr>
                      <td><strong>Observaciones</strong></td>
                    </tr>
                    <tr>
                      <td>________________________________________</td>
                      <td>Autorización Técnica Supervisor:</td>
                      <td>________________________________________</td>
                    </tr>
                    <tr>
                      <td>________________________________________</td>
                      <td>Autorización Técnico Líder de Proyectos:</td>
                      <td>________________________________________</td>
                    </tr>
                  </table>
              </div>
          </body>
      </html>';
        $this->load->library("Dompdf_lib");
        $dompdf = new DOMPDF();

        //$dompdf->set_paper('A4', 'portrait');

        $dompdf->load_html($html);
        $dompdf->render();
        $path="Cedula".$id_cedula."_".date('d-m-Y').".pdf";
        //$path="Cedula.pdf";
        $dompdf->stream($path);
        
    }
}
?>