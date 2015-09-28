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
          if($query->num_rows() >= 1) 
          {
            return $query->result(); 
          } 
          else 
          {
            return false; 
          }
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

     function insertar_cedula_b($num, $id_aplicacion, $id_tratamiento,$area_aplicacion, $area_por_replica, $litros_agua,$capacidad_tanque, $area_buffer, $tanques_requeridos)
     {
     	$datos = array(
               'num'=>$num,
               'id_aplicacion'=>$id_aplicacion,
     		'id_tratamiento'=>$id_tratamiento,
     		'area_aplicacion'=>$area_aplicacion,
     		'area_por_replica'=>$area_por_replica,
     		'Lts_Agua_Aplicacion'=>$litros_agua,
     		'Capacidad_tanque'=>$capacidad_tanque,
     		'Area_Buffer'=>$area_buffer,
     		'Tanques_Requeridos'=>$tanques_requeridos);
     	$this->db->insert('cedulas',$datos);
     }

     function update_cedula($id_aplicacion, $area_aplicacion, $area_por_replica, $litros_agua,$capacidad_tanque, $area_buffer, $tanques_requeridos)
     {
          $datos = array(
               'area_aplicacion'=>$area_aplicacion,
               'area_por_replica'=>$area_por_replica,
               'Lts_Agua_Aplicacion'=>$litros_agua,
               'Capacidad_tanque'=>$capacidad_tanque,
               'Area_Buffer'=>$area_buffer,
               'Tanques_Requeridos'=>$tanques_requeridos);
          $this->db->where('id_aplicacion',$id_aplicacion);
          $this->db->update('cedulas',$datos);
     }


     function delete_cedulas($id_aplicacion)
     {
     	$this->db->where('id_aplicacion',$id_aplicacion);
          $this->db->delete('cedulas');
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

     function get_cedulas_a($id_aplicacion)
     {
          $this->db->select('*');
          $this->db->from('cedulas');
          $this->db->where('id_aplicacion',$id_aplicacion);
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

     function get_cedula($id)
     {
          $this->db->select('*');
          $this->db->from('cedulas');
          $this->db->where('id',$id);
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
}

?>