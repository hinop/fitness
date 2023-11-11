<?php
    class Instructor_model extends CI_Model{
        public function listainstructores(){
            $this->db->select('*');
            $this->db->from('instructor');
            $this->db->where('estado','1');
            return $this->db->get();
        }
        public function agregarinstructor($data){
            $this->db->insert('instructor',$data);
            $this->db->from('instructor');
             return $this->db->get();
        }
        public function eliminarinstructor($id,$data){
            $this->db->where('id',$id);
            $this->db->update('instructor', $data);
        }
        public function recuperarinstructor($id){
            $this->db->select('*');
            $this->db->from('instructor');
            $this->db->where('id',$id);
             return $this->db->get();
        }
        public function modificarinstructor($id, $data){
            $this->db->where('id',$id);
            $this->db->update('instructor', $data);
        }
        /*public function buscar_por_ci($ci) {
            
            $this->db->like('ci', $ci);
            $query = $this->db->get('instructor');
            return $query->result();
            
           


            
        }
*/
            /*public function search_data($query) {
                $this->db->select('*');
                $this->db->from('instructor'); // Reemplaza 'tu_tabla' por el nombre de tu tabla
                $this->db->like('nombres', $query);
                $this->db->or_like('primerApellido', $query);
                $this->db->or_like('ci', $query);
                $query = $this->db->get();
                return $query->result_array();


            }*/
            public function searchInstructors($query) {
                // Realiza la búsqueda en la base de datos y devuelve resultados como un array
                // Asegúrate de adaptar esto según tu base de datos y modelo de datos
                $this->db->like('ci', $query);
                $this->db->or_like('nombres', $query);
                $this->db->or_like('primerApellido', $query);
                $this->db->or_like('segundoApellido', $query);
                $query = $this->db->get('instructor');
                return $query->result_array();
            }
            public function obtenerinstructorinfo($idInstructor) {
                $this->db->where('id', $idInstructor);
                return $this->db->get('instructor')->row();
            }

            
            
    }
?>