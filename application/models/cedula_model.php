<?php
class cedula_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }


     function insertar_cedula($num, $id_aplicacion, $id_tratamiento,$area_aplicacion, $area_por_replica, $litros_agua,$capacidad_tanque, $area_buffer, $tanques_requeridos)
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