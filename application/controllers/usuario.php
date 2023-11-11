<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index()
	{

		if($this->session->userdata('nombreUsuario'))
		{
			redirect('usuario/panel','refresh');			 
		}
		else
		{
			$data['msg']=$this->uri->segment(3);
			$this->load->view('login', $data);
		}
	}

	public function validarusuario()
	{
		$nombreUsuario=$_POST['nombreUsuario'];
		$contrasenia=md5($_POST['contrasenia']);

		$consulta=$this->usuario_model->validar($nombreUsuario,$contrasenia);     //consulta a BD

		if($consulta->num_rows()>0)
		{
			foreach($consulta->result() as $row)
			{
				$this->session->set_userdata('id', $row->id);
				
				$this->session->set_userdata('nombres', $row->nombres);
				$this->session->set_userdata('primerApellido', $row->primerApellido);
				$this->session->set_userdata('segundoApellido', $row->primerApellido);
				$this->session->set_userdata('ci', $row->ci);
				$this->session->set_userdata('telefono', $row->telefono);
				$this->session->set_userdata('email', $row->email);
				$this->session->set_userdata('direccion', $row->direccion);
				$this->session->set_userdata('rol', $row->rol);
				$this->session->set_userdata('nombreUsuario', $row->nombreUsuario);
				$this->session->set_userdata('contrasenia', $row->contrasenia);
				$this->session->set_userdata('estado', $row->estado);
				$this->session->set_userdata('fechaRegistro', $row->fechaRegistro);
				$this->session->set_userdata('fechaActualizacion', $row->fechaActualizacion);
				$this->session->set_userdata('idUsuario', $row->idUsuario);
				redirect('usuario/panel','refresh');
			}
		}
		else
		{
			redirect('usuario/index/1','refresh');
		}
	}

	public function panel()
	{
		if($this->session->userdata('nombreUsuario'))
		{
			$tipo=$this->session->userdata('rol');
			if($tipo =='Administracion')
			{
				redirect('/usuario/indexlte','refresh');
                
			}
			else{
				redirect('usuario/indexlte','refresh');
			}			 
		}
		else
		{
			redirect('usuario/index/2','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('usuario/index/3','refresh');
	}

    
	public function indexlte()
	{
        $lista=$this->usuario_model->listausuarios();
		        $data['usuario']=$lista;

				$this->load->view('estructura/cabecera');
				$this->load->view('modulos/administrador/usuario/usuario_list',$data);
				$this->load->view('estructura/footer');
		        
	}




    public function agregar()
	{
		$this->load->view('estructura/cabecera');
		$this->load->view('modulos/administrador/usuario/usuario_form');
		$this->load->view('estructura/footer');
	}
    public function agregarbd()
	{
        
        // Obtener datos del formulario
        $primerApellido = $_POST['primerApellido'];
        $ci = $_POST['ci'];
        $email = $_POST['email'];

        // Generar nombre de usuario a partir del apellido y CI
        $nombreUsuario = strtolower(substr($primerApellido, 0, 3) . $ci);

        // Generar contraseña segura
        $contraseñaGenerada = $this->usuario_model->generarContraseñaSegura();

        // Aquí debes guardar $nombreUsuario, $contraseñaGenerada y otros datos del usuario en tu base de datos.
        
        $data['nombres']=$_POST['nombres'];
        $data['primerApellido']=$_POST['primerApellido'];
        $data['segundoApellido']=$_POST['segundoApellido'];
		$data['ci']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
        $data['email']=$_POST['email'];
        $data['direccion']=$_POST['direccion'];
        $data['rol']=$_POST['rol'];
        $data['nombreUsuario']=$nombreUsuario;
        $data['contrasenia']=md5($contraseñaGenerada);

        $this->usuario_model->agregarusuario($data);

        // Luego, envía el nombre de usuario y la contraseña al correo del usuario.
        $asunto = "Tu nuevo nombre de usuario y contraseña";
        $mensaje = "Nombre de usuario: $nombreUsuario\nContraseña: $contraseñaGenerada";
        ini_set('smtp_port', 587);
        mail($email, $asunto, $mensaje);

        // Redirige a la página de éxito o muestra un mensaje de éxito.
        redirect('usuario/index','refresh');
    }
    public function eliminarbd()
	{
        $id=$_POST['id'];

        $this->usuario_model->eliminarusuario($id);

        redirect('usuario/index','refresh');
	}
    public function modificar()
	{
        $id=$_POST['id'];
        $data['infousuario']=$this->usuario_model->recuperarusuario($id);

		$this->load->view('estructura/cabecera');
        $this->load->view('modulos/administrador/usuario/usuario_modif',$data);
		$this->load->view('estructura/footer');
	}
    public function modificarbd()
	{
        $id=$_POST['id'];

        
        $data['nombres']=$_POST['nombres'];
        $data['primerApellido']=$_POST['primerApellido'];
        $data['segundoApellido']=$_POST['segundoApellido'];
		$data['ci']=$_POST['ci'];
		$data['telefono']=$_POST['telefono'];
        $data['email']=$_POST['email'];
        $data['direccion']=$_POST['direccion'];
        $data['rol']=$_POST['rol'];

        $this->usuario_model->modificarusuario($id, $data);

        redirect('usuario/index','refresh');
	}
	public function cambioContrasenia(){
		$this->load->view('estructura/cabecera');
        $this->load->view('modulos/administrador/usuario/cambioContrasenia');
		$this->load->view('estructura/footer');

	}
	public function changePassword() {
        // Validar la antigua contraseña
        $this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_verifyOldPassword');
        $this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() === FALSE) {
            // La validación falló, muestra el formulario de cambio de contraseña
            $this->load->view('estructura/cabecera');
			$this->load->view('modulos/administrador/usuario/cambioContrasenia');
			$this->load->view('estructura/footer');
        } else {
            // Cambiar la contraseña
            $new_password = md5($this->input->post('new_password'));
            $user_id = $this->session->userdata('id'); // O cualquier forma de obtener el ID del usuario
            $this->usuario_model->updatePassword($user_id, $new_password);

            // Redirigir a la página de inicio de sesión u otra página deseada
            
			redirect('usuario/logout','refresh');
        }
    }

    public function verifyOldPassword($password) {
        $user_id = $this->session->userdata('id'); // O cualquier forma de obtener el ID del usuario
        $old_password = md5($password);
        if ($this->usuario_model->checkPassword($user_id, $old_password)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('verifyOldPassword', 'La contraseña antigua es incorrecta.');
            return FALSE;
        }
    }



}
