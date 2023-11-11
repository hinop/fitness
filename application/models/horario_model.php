<?php
    class Horario_model extends CI_Model{
        
        public function listahorarios(){
            $this->db->select('horario.id,horario.horaInicio, horario.horaFin, horario.idDia, dia.dia');
            $this->db->from('horario');
            $this->db->join('dia', 'dia.id = horario.idDia', 'inner');
            $query = $this->db->get();
        
            // Verificar si la consulta se ejecutó con éxito
            if ($query) {
                return $query->result(); // Devolver el resultado de la consulta
            } else {
                // Si la consulta falla, puedes manejar el error o devolver un valor predeterminado, por ejemplo:
                return array(); // Un arreglo vacío
            }

            /*$this->db->select('*');
            $this->db->from('horario');
             return $this->db->get();*/
        }
        public function agregarhorario($data){
            $this->db->insert('horario',$data);
            $this->db->from('horario');
             return $this->db->get();
        }
        public function eliminarhorario($id){
            $this->db->where('id',$id);
            $this->db->delete('horario');
        }
        public function recuperarhorario($id,$idDia){
            $this->db->select('horario.id, horario.horaInicio, horario.horaFin, horario.idDia, dia.dia');
            $this->db->from('horario');
            $this->db->join('dia', 'dia.id = horario.idDia', 'inner');
            $this->db->where('horario.id', $id);
            $this->db->where('dia.id', $idDia);

            
            $query = $this->db->get();

            // El resultado se devuelve a través de $query, y la vista lo utilizará
            return $query->row(); // Devuelve un solo resultado

            
        }
        public function modificarhorario($id, $data){
            $this->db->where('id',$id);
            $this->db->update('horario', $data);

        }
        public function buscar_por_nombre($nombre) {
            
            $this->db->like('nombre', $nombre);
            $query = $this->db->get('horario');
            return $query->result();
            
           


            
        }
        public function obtenerHorarios($idDia) {
            // Realiza una consulta en la base de datos para obtener los horarios disponibles
            $this->db->select('id,horaInicio, horaFin');
            $this->db->from('horario');
            $this->db->where('idDia', $idDia);
            $this->db->where('estado', 1); // Suponiendo que tienes una columna 'disponible' que marca si un horario está disponible
    
            $query = $this->db->get();
    
            // Verifica si se encontraron resultados
            if ($query->num_rows() > 0) {
                return $query->result(); // Retorna los resultados como un array de objetos
            } else {
                return array(); // Si no se encontraron horarios disponibles, devuelve un array vacío
            }
        }
        public function obtenerhorarioinfo($idhorario) {
            $this->db->select('horario.*, dia.dia');
            $this->db->from('horario');
            $this->db->join('dia', 'horario.idDia = dia.id', 'inner'); // Establece la relación mediante un JOIN izquierdo
            $this->db->where('horario.id', $idhorario);
            return $this->db->get()->row();
        }
        
    }
?>