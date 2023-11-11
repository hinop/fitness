<?php
    class Cliente_model extends CI_Model{
        public function listaclientes(){
            $this->db->select('*');
            $this->db->from('cliente');
            $this->db->where('estado','1');
            return $this->db->get();
        }
        public function agregarcliente($data){
            $this->db->insert('cliente',$data);
            $this->db->from('cliente');
             return $this->db->get();
        }
        public function eliminarcliente($id,$data){
            $this->db->where('id',$id);
            $this->db->update('cliente', $data);
        }
        public function recuperarcliente($id){
            $this->db->select('*');
            $this->db->from('cliente');
            $this->db->where('id',$id);
             return $this->db->get();
        }
        public function modificarcliente($id, $data){
            $this->db->where('id',$id);
            $this->db->update('cliente', $data);
        }
        public function buscar_por_ci($ci) {
            
            $this->db->like('ci', $ci);
            $query = $this->db->get('cliente');
            return $query->result();
            
           


            
        }
        public function searchclientes($query) {
            // Realiza la búsqueda en la base de datos y devuelve resultados como un array
            // Asegúrate de adaptar esto según tu base de datos y modelo de datos
            $this->db->like('ci', $query);
            $this->db->or_like('nombres', $query);
            $this->db->or_like('primerApellido', $query);
            $this->db->or_like('segundoApellido', $query);
            $query = $this->db->get('cliente');
            return $query->result_array();
        }
        public function agregarclientemodal($data){
            $this->db->insert('cliente', $data);
            return $this->db->insert_id(); // Devuelve el ID del cliente recién insertado
        }
    }
?>