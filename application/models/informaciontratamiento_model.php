<?php
class InformacionTratamiento_model extends CI_Model
{
	 function __construct()
     {
          // Call the Model constructor
          parent::__construct();
          $this->load->database();
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

     function editar_productoT($idT,$idP,$d,$s,$c,$pnc,$pnci,$dn,$sn,$cn,$npnc,$npnci)
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
          $data2 = array(
               'dosis' => $dn,
               'secado' => $sn,
               'cosecha' => $cn,
               'plaga_nombre_comun' => $npnc,
               'plaga_nombre_cientifico' => $npnci
               );
          $this->db->update('informacion_tratamiento',$data2,$data);
          return true;

     }

}

?>