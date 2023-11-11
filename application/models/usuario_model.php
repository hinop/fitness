<?php
    class Usuario_model extends CI_Model{
        public function listausuarios(){
            $this->db->select('*');
            $this->db->from('usuario');
             return $this->db->get();
        }
        public function agregarusuario($data){
            $this->db->insert('usuario',$data);
            $this->db->from('usuario');
             return $this->db->get();
        }
        public function eliminarusuario($id){
            $this->db->where('id',$id);
            $this->db->delete('usuario');
        }
        public function recuperarusuario($id){
            $this->db->select('*');
            $this->db->from('usuario');
            $this->db->where('id',$id);
             return $this->db->get();
        }
        public function modificarusuario($id, $data){
            $this->db->where('id',$id);
            $this->db->update('usuario', $data);
        }
        
        public function generarContraseñaSegura() {
            $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+[]{}|;:,.<>?';
            $contraseña = '';
    
            while (strlen($contraseña) < 8) {
                $contraseña .= $caracteres[rand(0, strlen($caracteres) - 1)];
            }
    
        return $contraseña;
        }

        public function validar($nombreUsuario, $contrasenia){ 
            $this->db->select('*');
            $this->db->from('usuario');
            $this->db->where('nombreUsuario', $nombreUsuario);
            $this->db->where('contrasenia', $contrasenia);
            return $this->db->get();
        }
        public function checkPassword($user_id, $old_password) {
            // Realiza una consulta para verificar si la contraseña antigua coincide con la de la base de datos.
            $this->db->where('id', $user_id);
            $this->db->where('contrasenia', $old_password);
            $query = $this->db->get('usuario'); // Supongamos que tu tabla de usuarios se llama 'users'.
    
            if ($query->num_rows() == 1) {
                return true;
            } else {
                return false;
            }
        }
    
        public function updatePassword($user_id, $new_password) {
            // Actualiza la contraseña del usuario en la base de datos.
            $this->db->where('id', $user_id);
            $this->db->update('usuario', array('contrasenia' => $new_password));
        }

    }
?>