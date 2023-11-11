<?php
    class Inscripcion_model extends CI_Model{
        public function listainscripcion(){
            $this->db->select('venta.id, CONCAT(cliente.nombres, " ", cliente.primerApellido, " ", cliente.segundoApellido) AS nombre_completo, venta.fecha_venta, venta.total');
            
            $this->db->from('cliente');
                $this->db->join('venta', 'venta.idCliente = cliente.id');
                $this->db->order_by('venta.fecha_venta', 'DESC'); 
                return  $this->db->get();
             
        }
        public function listainscripcionReporte(){
            $this->db->select('venta.id, CONCAT(cliente.nombres, " ", cliente.primerApellido, " ", cliente.segundoApellido) AS nombre_completo, venta.fecha_venta, venta.total');
            
            $this->db->from('cliente');
                $this->db->join('venta', 'venta.idCliente = cliente.id');
                $this->db->order_by('venta.fecha_venta', 'ASC'); 
                return  $this->db->get();
             
        }
        public function agregarinscripcion($data){
            $this->db->insert('venta',$data);
            $this->db->from('venta');
             return $this->db->get();
        }
        public function eliminarinscripcion($id){
            $this->db->where('id',$id);
            $this->db->delete('venta');
        }
        public function recuperarinscripcion($id){
            $this->db->select('*');
            $this->db->from('venta');
            $this->db->where('id',$id);
             return $this->db->get();
        }
        public function modificarinscripcion($id, $data){
            $this->db->where('id',$id);
            $this->db->update('venta', $data);
        }
        public function insertarVenta($data) {
            $this->db->insert('venta', $data);
        }
        public function insertarDetalle($data) {
            $this->db->insert('detalle', $data);
        }
    }
?>