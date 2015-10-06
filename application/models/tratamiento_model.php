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


     function insertar_tratamiento($id_proyecto)
     {
        $data = array(
          'id_proyecto' => $id_proyecto
          );
        $this->db->insert('tratamiento',$data);
        return $this->db->insert_id();// retorna el ultima id insertado
     }

     function eliminar_tratamiento($idT)
     {
          $data = array(
               'id_tratamiento' => $idT
               );
          $this->db->delete('informacion_tratamiento',$data);
          $this->db->delete('cedula_aplicacion',$data);
          $this->db->delete('tratamiento',$data);
          return true;

     }

     function insertar_informaciontratamiento( $idTratamiento,$id_producto,$dosis,$plaga_nombre_comun,$plaga_nombre_cientifico,$secado,$cosecha)
     {
        $data = array(
        	'id_tratamiento' => $idTratamiento,
        	'id_producto' => $id_producto,
        	'dosis' => $dosis,
        	'plaga_nombre_comun' => $plaga_nombre_comun,
        	'plaga_nombre_cientifico' => $plaga_nombre_cientifico,
          'secado' => $secado,
          'cosecha' => $cosecha
          );
        $this->db->insert('informacion_tratamiento',$data);
        
        return true;
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
 }

?>