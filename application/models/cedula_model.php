<?php
class cedula_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }

     function obtener_cedulas($id_tratamiento){
          $this->db->select('*');
          $this->db->from('cedula_aplicacion');
          $this->db->where('id_tratamiento',$id_tratamiento);
          $query = $this->db->get();
          return $query->result(); 
     }
     function cantidad_cedulas($id_tratamiento){
          $this->db->select('*');
          $this->db->from('cedula_aplicacion');
          $this->db->where('id_tratamiento',$id_tratamiento);
          $query = $this->db->get();
          return $query->num_rows();
     }

     function insertar_cedula($id_tratamiento,$numero_proyecto,$id_finca,$descripcion_aplicacion,$semana_aplicacion,
                              $fecha_programada,$litros,$presion,$velocidad,$rpm,$marcha,$tipo_boquilla,$cultivo,$variedad,
                              $lote,$bloque,$estadio,$semana_siembra,$area_bloque,$area_proyecto,$cantidad_camas,$ancho_camas,$longitud_parcelas,
                              $cantidad_parcelas,$cantidad_replicas,$volumen_aplicacion,$modo_aplicacion,$metodo_aplicacion)
     {
          $datos = array(
                         'id_tratamiento'=>$id_tratamiento,
                         'numero_proyecto'=>$numero_proyecto,
                         'id_finca'=>$id_finca,
                         'descripcion_aplicacion'=>$descripcion_aplicacion,
                         'semana_aplicacion'=>$semana_aplicacion,
                         'fecha_programada'=>$fecha_programada,
                         'litros'=>$litros,
                         'presion'=>$presion,
                         'velocidad'=>$velocidad,
                         'rpm'=>$rpm,
                         'marcha'=>$marcha,
                         'tipo_boquilla'=>$tipo_boquilla,
                         'cultivo'=>$cultivo,
                         'variedad'=>$variedad,
                         'lote'=>$lote,
                         'bloque'=>$bloque,
                         'estadio'=>$estadio,
                         'semana_siembra'=>$semana_siembra,
                         'area_bloque'=>$area_bloque,
                         'area_proyecto'=>$area_proyecto,
                         'cantidad_camas'=>$cantidad_camas,
                         'ancho_camas'=>$ancho_camas,
                         'longitud_parcelas'=>$longitud_parcelas,
                         'cantidad_parcelas'=>$cantidad_parcelas,
                         'cantidad_replicas'=>$cantidad_replicas,
                         'volumen_aplicacion'=>$volumen_aplicacion,
                         'modo_aplicacion'=>$modo_aplicacion,
                         'metodo_aplicacion'=>$metodo_aplicacion
               );
     $this->db->insert('cedula_aplicacion',$datos);   
     }


     function editar_cedula($id_cedulaAplicacion,$numero_proyecto,$id_finca,$descripcion_aplicacion,$semana_aplicacion,
                              $fecha_programada,$litros,$presion,$velocidad,$rpm,$marcha,$tipo_boquilla,$cultivo,$variedad,
                              $lote,$bloque,$estadio,$semana_siembra,$area_bloque,$area_proyecto,$cantidad_camas,$ancho_camas,$longitud_parcelas,
                              $cantidad_parcelas,$cantidad_replicas,$volumen_aplicacion,$modo_aplicacion,$metodo_aplicacion){
          $datos = array(
                         'numero_proyecto'=>$numero_proyecto,
                         'id_finca'=>$id_finca,
                         'descripcion_aplicacion'=>$descripcion_aplicacion,
                         'semana_aplicacion'=>$semana_aplicacion,
                         'fecha_programada'=>$fecha_programada,
                         'litros'=>$litros,
                         'presion'=>$presion,
                         'velocidad'=>$velocidad,
                         'rpm'=>$rpm,
                         'marcha'=>$marcha,
                         'tipo_boquilla'=>$tipo_boquilla,
                         'cultivo'=>$cultivo,
                         'variedad'=>$variedad,
                         'lote'=>$lote,
                         'bloque'=>$bloque,
                         'estadio'=>$estadio,
                         'semana_siembra'=>$semana_siembra,
                         'area_bloque'=>$area_bloque,
                         'area_proyecto'=>$area_proyecto,
                         'cantidad_camas'=>$cantidad_camas,
                         'ancho_camas'=>$ancho_camas,
                         'longitud_parcelas'=>$longitud_parcelas,
                         'cantidad_parcelas'=>$cantidad_parcelas,
                         'cantidad_replicas'=>$cantidad_replicas,
                         'volumen_aplicacion'=>$volumen_aplicacion,
                         'modo_aplicacion'=>$modo_aplicacion,
                         'metodo_aplicacion'=>$metodo_aplicacion
               );
               $this->db->where('id_cedulaAplicacion',$id_cedulaAplicacion);
               $this->db->update('cedula_aplicacion',$datos);
     }

     function eliminar_cedula($id_cedulaaplicacion)
     {
          $this->db->where('id_cedulaAplicacion',$id_cedulaaplicacion);
          $this->db->delete('cedula_aplicacion');
     }
     function get_cedulas()
     {
          $this->db->select('*');
          $this->db->from('cedulas');
          $query = $this->db->get();
          if($query->num_rows() >= 1) 
          {
            return $query->result(); 
          } 
          else 
          {
            return false; 
          }
     }


     function obtener_unacedula($id_cedula) // obtiene la informacion de la tabla cedulas_aplicacion por el id de la cedula solicitada
     {
          $this->db->select('*');
          $this->db->from('cedula_aplicacion');
          $this->db->where('id_cedulaAplicacion',$id_cedula);
          $this->db->limit(1);// seleccionar solo uno
          $query = $this->db->get();
          return $query->result(); 
     }
}

?>