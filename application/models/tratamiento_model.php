<?php
class Tratamiento_model extends CI_Model
{
   function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }
  function insert_product($name,$active,$unit)
     {

        $data = array(
          'name' => $name,
          'activecomponent' => $active,
          'unit'=> $unit
          );
        $this->db->insert('products',$data);
     }

     function get_predeterminado($id_tratamiento){
        $this->db->select('*');
        $this->db->from('tratamiento');
        $this->db->where('id_tratamiento',$id_tratamiento);
        $this->db->limit(1);// seleccionar solo uno
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            return $row->predeterminado;
        }
     }

     function eliminar_Tratamiento($id_tratamiento){// se eliminan datos de 3 tablas
          $this->db->where('id_tratamiento',$id_tratamiento); // se elimina la informacion del tratamiento (s)
          $this->db->delete('informacion_tratamiento');

          $this->db->where('id_tratamiento',$id_tratamiento); // se elimina la las cedulas del tratamiento
          $this->db->delete('cedula_aplicacion');

          $this->db->where('id_tratamiento',$id_tratamiento); // se elimina el tratamiento
          $this->db->delete('tratamiento');

          return true;
     }

     function insertar_tratamiento($id_proyecto,$predeterminado)
     {
        $data = array(
          'id_proyecto' => $id_proyecto,
          'predeterminado' =>$predeterminado
          );
        $this->db->insert('tratamiento',$data);
        return $this->db->insert_id();// retorna el ultima id insertado
     }

     function insertar_imagen_tratamiento($id_tratamiento,$imagen){
         $data = array(
          'imagen' =>$imagen
          );
         $this->db->where('id_tratamiento',$id_tratamiento);
        $this->db->update('tratamiento',$data);
        //return $this->db->insert_id();// retorna el ultima id insertado
     }
     
     function insertar_informaciontratamiento($idTratamiento,$id_producto,$dosis,$plaga_nombre_comun,$plaga_nombre_cientifico,$secado,$cosecha,$tipoCedula)
     {
        $data = array(
          'id_tratamiento' => $idTratamiento,
          'id_producto' => $id_producto,
          'dosis' => $dosis,
          'plaga_nombre_comun' => $plaga_nombre_comun,
          'plaga_nombre_cientifico' => $plaga_nombre_cientifico,
          'secado' => $secado,
          'cosecha' => $cosecha,
          'tipoCedula' => $tipoCedula
          );
        $this->db->insert('informacion_tratamiento',$data);
     }
     function obtener_tratamientos($numeroProyecto)
     {
        $Proyectos = $this->db->select('*')->from('proyecto')->where('numero_proyecto',$numeroProyecto)->get();
        $idProyecto = "";
        foreach ($Proyectos->result() as $row) 
        {
            $idProyecto = $row->id_proyecto;
          
        } 
        $listaTratamientos = $this->db->select('*')->from('tratamiento')->where('id_proyecto',$idProyecto)->get();
      return $listaTratamientos;
     }

     function ontener_nombre_producto($idProducto)
     {

      $this->db->select('*');
      $this->db->from('products');
      $this->db->where('id_producto',$idProducto);
      $query = $this->db->get();
      return $query;
     }


// Devuelve trataminetos predeterminados en formato SQL
      function get_tratamientosdelProyecto($id_proyecto)
      {
        $this->db->select('*');
        $this->db->from('tratamiento');
        $this->db->where('id_proyecto',$id_proyecto);
        $query = $this->db->get();
        return $query;
      }

     // Devuelve trataminetos predeterminados en formato SQL
      function get_tratamientospredeterminados()
      {
        $this->db->select('*');
        $this->db->from('tratamiento');
        $this->db->where('predeterminado','1');
        $queryPredeterminados = $this->db->get();
        return $queryPredeterminados;
      }

      function get_tratamientos()
      {
        $this->db->select('*');
        $this->db->from('tratamiento');
        $queryPredeterminados = $this->db->get();
        return $queryPredeterminados;
      }


      function editar_predeterminado($id_tratamiento,$predeterminado)
     {
          $data = array(
               'predeterminado' => $predeterminado
          );
          $this->db->where('id_tratamiento',$id_tratamiento);
          $this->db->update('tratamiento',$data);
     }

     function editar_cedula($id_tratamiento,$cedula,$intervalo,$ultima_sem_apl){
        $data = array(
          'cedula' => $cedula,
          'intervalo' => $intervalo,
          'ultima_sem_apl' => $ultima_sem_apl);
        $this->db->where('id_tratamiento',$id_tratamiento);
        $this->db->update('tratamiento',$data);
     }
 }

?>