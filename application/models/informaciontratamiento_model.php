<?php
class InformacionTratamiento_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
     }

     function eliminar_informacionT($id_informaciontratamiento,$id_tratamiento)
     {
          // $dataidinfo = array(
          //      'id_informaciontratamiento' => $id_informaciontratamiento,
          //      );
          // $dataidt = array(
          //      'id_tratamiento' => $id_tratamiento,
          //      );

          $this->db->where('id_informaciontratamiento',$id_informaciontratamiento);
          $this->db->delete('informacion_tratamiento');
          
          $this->db->where('id_tratamiento',$id_tratamiento);
          $this->db->delete('cedula_aplicacion');

          // $this->db->delete('informacion_tratamiento',$dataidinfo);
          // $this->db->delete('cedula_aplicacion',$dataidt);
          //$this->db->delete('tratamiento',$data);
          return true;

     }

     function obtener_solounainformacionT($id)
     {
          $this->db->select('*');
          $this->db->from('informacion_tratamiento');
          $this->db->where('id_informaciontratamiento',$id);
          $query = $this->db->get();
          return $query;
     }

     function obtener_informacionT($id)
     {
          $this->db->select('*');
          $this->db->from('informacion_tratamiento');
          $this->db->where('id_tratamiento',$id);
          $query = $this->db->get();
          return $query;
     }

     function eliminar_productoT($idT,$idP,$d,$s,$c,$pnc,$pnci)
     {
          $data = array(
               'id_tratamiento' => $idT,
               'id_producto' => $idP,
               'dosis' => $d,
               'secado' => $s,
               'cosecha' => $c,
               'plaga_nombre_comun' => $pnc,
               'plaga_nombre_cientifico' => $pnci
               );
          $this->db->delete('informacion_tratamiento',$data);
          return true;

     }

     function editar_productoT($idinformaciontratamientoGeneralAeditar,$_productoid,$_eddosis,$_edncomun,$_edncientifico,$_edsecado,$_edcosecha)
     {
          $data = array(
               'id_producto' => $_productoid,
               'dosis' => $_eddosis,
               'secado' => $_edsecado,
               'cosecha' => $_edcosecha,
               'plaga_nombre_comun' => $_edncomun,
               'plaga_nombre_cientifico' => $_edncientifico
               );
          
          $this->db->where('id_informaciontratamiento',$idinformaciontratamientoGeneralAeditar);
          $this->db->update('informacion_tratamiento',$data);
          $query = $this->db->select('*')->from('informacion_tratamiento')->where('id_informaciontratamiento',$idinformaciontratamientoGeneralAeditar)->get();
          return $query;
     }

}

?>