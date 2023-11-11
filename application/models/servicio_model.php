<?php
    class Servicio_model extends CI_Model{
        public function listaservicios(){
            $this->db->select('*');
            $this->db->from('servicio');
             return $this->db->get();
        }
        public function agregarservicio($data){
            $this->db->insert('servicio',$data);
            $this->db->from('servicio');
             return $this->db->get();
        }
        public function eliminarservicio($id){
            $this->db->where('id',$id);
            $this->db->delete('servicio');
        }
        public function recuperarservicio($id){
            $this->db->select('*');
            $this->db->from('servicio');
            $this->db->where('id',$id);
            return $this->db->get();
        }
        public function modificarservicio($id, $data){
            $this->db->where('id',$id);
            $this->db->update('servicio', $data);

        }
        public function buscar_por_nombre($nombre) {
            
            $this->db->like('nombre', $nombre);
            $query = $this->db->get('servicio');
            return $query->result();
            
           


            
        }
        public function asignarhoraservicio($data){
            $this->db->insert('horario_servicio',$data);
            $this->db->from('horario_servicio');
            return $this->db->get();
        }
        public function listahoraservicio($id){
            $this->db->select('*');
            $this->db->from('horario_servicio');
            $this->db->where('idServicio',$id);
            $query = $this->db->get();
             if ($query->num_rows() > 0) {
                return $query->result_array();
            } else {
                return array(); // En caso de que no se encuentren resultados
            }
        }
        public function obtenerservicioinfo($idservicio) {
            $this->db->where('id', $idservicio);
            return $this->db->get('servicio')->row();
        }
        public function searchservicios($query) {
            // Realiza la búsqueda en la base de datos y devuelve resultados como un array
            // Asegúrate de adaptar esto según tu base de datos y modelo de datos
            $this->db->like('nombre', $query);
                      
            $query = $this->db->get('servicio');
            return $query->result_array();
        }
        public function obtener_grupos($idservicio) {
            $this->db->select('grupo');
            $this->db->distinct();
            $this->db->where('idServicio', $idservicio);
            $query = $this->db->get('horario_servicio');
            return $query->result_array();
        }
        public function obtener_datos_card($idservicio,$grupo){
            $this->db->select('instructor.nombres, instructor.primerApellido, instructor.segundoApellido, dia.dia, horario.horaInicio, horario.horaFin');
            $this->db->from('horario_servicio');
            $this->db->join('instructor', 'instructor.id = horario_servicio.idInstructor');
            $this->db->join('horario', 'horario.id = horario_servicio.idHorario');
            $this->db->join('dia', 'dia.id = horario.idDia');
            $this->db->where('horario_servicio.idServicio', $idservicio);
            $this->db->where('horario_servicio.grupo', $grupo);

            $query = $this->db->get();
            return $query->result_array();
        }
        

    }
?>