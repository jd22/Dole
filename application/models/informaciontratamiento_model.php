<?php
class InformacionTratamiento_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }

     

     function get_aplication($id)
     {
          $this->db->select('*');
          $this->db->from('informacion_tratamiento');
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

     function get_aplications()
     {
          $this->db->select('*');
          $this->db->from('informacion_tratamiento');
          $query = $this->db->get();
          if($query->num_rows() >= 1) 
          {
            return $query;
          } 
          else 
          {
            return false; 
          }
     }

     

     function insert_event($id,$title,$body,$url,$start,$end)
     {
          $data = array(
               'id'=>$id,
               'title'=>$title,
               'body'=>$body,
               'url'=>$url,
               'start'=>$start,
               'end'=>$end);
          $this->db->insert('eventos',$data);


     }

     function update_evento($id,$start,$end)
     {
          $data = array(
               'id'=>$id,
               'start'=>$start,
               'end'=>$end);
          $this->db->where('id',$id);
          $this->db->update('eventos',$data);    
     }

     function delete_event($id_aplicacion)
     {
          $this->db->where('id',$id_aplicacion);
          $this->db->delete('eventos');
     }

     function get_eventos()
     {
          $this->db->select('*');
          $this->db->from('eventos');
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

     function insert_aplication($des,$proy,$sem_apli,$date,$lote,$bloque,$estadio,$sem_siem,$are_blo,$area_proye,$camas,$ancho_camas,$long_camas,
          $presion,$speed,$rpm,$marcha,$boquilla,$trata,$replicas,$parcela,$volum_aplic,$id_finca,$varidad,$modo_aplicacio,$cultiv,$litros)
     {
          $data = array(
               'fecha_programada'=>$date,
               'Area_Proyecto'=>$area_proye,
               'Semana_Siembra'=>$sem_siem,
               'Area_Bloque'=> $are_blo,
               'Modo_Aplicacion'=>$modo_aplicacio,
               'Marcha'=>$marcha,
               'rpm'=>$rpm,
               'Estadio'=>$estadio,
               'Lote'=>$lote,
               'Boquilla'=>$boquilla,
               'Presion'=>$presion,
               'Replicas'=>$replicas,
               'Bloque'=>$bloque,
               'Parcelas'=>$parcela,
               'Semana_Aplicacion'=>$sem_apli,
               'Volumen_Aplicacion'=>$volum_aplic,
               'Descripcion'=>$des,
               'Velocidad'=>$speed,
               'Número_Proyecto'=>$proy,
               'Cantidad_Tratamientos'=>$trata,
               'Variedad'=>$varidad,
               'Camas'=>$camas,
               'Ancho_Camas'=>$ancho_camas,
               'Longitud_Camas'=>$long_camas,
               'id_finca'=>$id_finca,
               'cultivo'=>$cultiv,
               'litros'=>$litros);
          $this->db->insert('aplicación',$data);
     }

     function update_aplication($id,$des,$proy,$sem_apli,$date,$lote,$bloque,$estadio,$sem_siem,$are_blo,$area_proye,$camas,$ancho_camas,$long_camas,
          $presion,$speed,$rpm,$marcha,$boquilla,$replicas,$parcela,$volum_aplic,$id_finca,$varidad,$modo_aplicacio,$cultiv,$litros)
     {
          $data = array(
               'fecha_programada'=>$date,
               'Area_Proyecto'=>$area_proye,
               'Semana_Siembra'=>$sem_siem,
               'Area_Bloque'=> $are_blo,
               'Modo_Aplicacion'=>$modo_aplicacio,
               'Marcha'=>$marcha,
               'rpm'=>$rpm,
               'Estadio'=>$estadio,
               'Lote'=>$lote,
               'Boquilla'=>$boquilla,
               'Presion'=>$presion,
               'Replicas'=>$replicas,
               'Bloque'=>$bloque,
               'Parcelas'=>$parcela,
               'Semana_Aplicacion'=>$sem_apli,
               'Volumen_Aplicacion'=>$volum_aplic,
               'Descripcion'=>$des,
               'Velocidad'=>$speed,
               'Número_Proyecto'=>$proy,
               'Variedad'=>$varidad,
               'Camas'=>$camas,
               'Ancho_Camas'=>$ancho_camas,
               'Longitud_Camas'=>$long_camas,
               'id_finca'=>$id_finca,
               'cultivo'=>$cultiv,
               'litros'=>$litros);
          $this->db->where('id',$id);
          $this->db->update('aplicación',$data);

     }

     function delete_aplication($id)
     {
          $this->db->where('id',$id);
          $this->db->delete('aplicación');

     }


     function get_last_id()
     {
          $query="SELECT MAX(id) AS id FROM aplicación";
          $result=$this->db->query($query);
          if($result->num_rows()>0)
          {
               return $result;
          }
          else{
               return false;
          }

     }

     function get_last_id2()
     {
          $query="SELECT MAX(id) AS id FROM tratamiento";
          $result=$this->db->query($query);
          if($result->num_rows()>0)
          {
               return $result;
          }
          else{
               return false;
          }

     }


}

?>