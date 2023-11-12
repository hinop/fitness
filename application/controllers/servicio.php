<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Controller {

	public function index()
	{
		$lista=$this->servicio_model->listaservicios();
		$data['servicio']=$lista;

        $this->load->view('estructura/cabecera');
        $this->load->view('modulos/administrador/servicio/serv_list',$data);
		$this->load->view('estructura/footer');
		
        
	}

    /*boton de referncia para ver los horarios de un servicio*/
    public function asignar()
    	{        
        $idS=0;
        $datos = json_decode(base64_decode(urldecode($this->uri->segment(3))), true);
        
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $data['servicio'] = $this->servicio_model->recuperarservicio($id);
            $idServ=$this->servicio_model->recuperarservicio($id)->row();
            $idS=$idServ->id;
        }
        /*$datos = json_decode($this->uri->segment(3), true);*/
        /*if (isset($datos) && $datos!== null ) {
            $data['info'] = $datos;
            $info = $datos[0];
            $idS = $info['id'];       
            
        }*/
        
        /* realiza la consult devuel todos los horarios para ese servicio*/
        $lista=$this->servicio_model->listahoraservicio($idS);
		$data['infoservicio']=$lista;
        
        /*$merged_data = array_merge($data, $datos);*/
        $this->load->view('estructura/cabecera');
        $this->load->view('modulos/administrador/servicio/serv_horarioList',$data);
        
		$this->load->view('estructura/footer');
		
	}
    

    public function horario()
	{ 
        $id=$_POST['id'];
        $data['infoservicio']=$this->servicio_model->recuperarservicio($id);

        $this->load->view('estructura/cabecera');
        
        $this->load->view('modulos/administrador/servicio/serv_asignar',$data);
        $this->load->view('estructura/footer');
	}
    public function asignarbd()
	{    
        $id=$_POST['idservicio'];
        if ($this->input->is_ajax_request()) {
            $grupo = $this->input->post('grupo');
            $disponibilidad = $this->input->post('disponibilidad');
            $datosTabla = $this->input->post('datosTabla');
    
            // Inicia la transacción
            $this->db->trans_start();
    
            // Inserta datos en la tabla horario_servicio
            foreach ($datosTabla as $dato) {
                $data = array(
                    'idHorario' => $dato['idHorario'],
                    'idServicio' => $dato['idServicio'],
                    'idInstructor' => $dato['idInstructor'],
                    'grupo' => $grupo,
                    'disponibilidad' => $disponibilidad
                );
                $this->db->insert('horario_servicio', $data);
            }
    
            // Completa la transacción
            $this->db->trans_complete();
    
            if ($this->db->trans_status() === FALSE) {
                // Si hay un error en la transacción, reviértela
                $this->db->trans_rollback();
                echo json_encode(array('status' => 'error', 'message' => 'Error en la transacción.'));
            } else {
                // Si la transacción fue exitosa, confírmala
                $this->db->trans_commit();
                echo json_encode(array('status' => 'success', 'id' => 'Transacción exitosa.'));
            }
        } else {
            show_404(); // Manejar solicitudes no AJAX de acuerdo a tus necesidades
        }

    }
    public function agrupar(){
        $id=$_POST['id'];
        $data['infoservicio']=$this->servicio_model->recuperarservicio($id);
    
    }
    /* -----------------*/
    public function agregar()
	{   
        $this->load->view('estructura/cabecera');
        $this->load->view('modulos/administrador/servicio/serv_form');
		$this->load->view('estructura/footer');
		
	}

    public function agregarbd()
	{
        $data['nombre']=$_POST['nombre'];
        $data['precioSeccion']=$_POST['seccion'];
        $data['precioMensual']=$_POST['mes'];
        $data['descripcion']=$_POST['des'];

        $this->servicio_model->agregarservicio($data);

        redirect('servicio/index','refresh');
	}
    public function eliminarbd()
	{
        $id=$_POST['id'];

        $this->servicio_model->eliminarservicio($id);

        redirect('servicio/index','refresh');
	}
    public function modificar()
	{
        $id=$_POST['id'];
        $data['infoservicio']=$this->servicio_model->recuperarservicio($id);

        $this->load->view('estructura/cabecera');
        
        $this->load->view('modulos/administrador/servicio/serv_modif',$data);
        $this->load->view('estructura/footer');
	}
    public function modificarbd()
	{
        $id=$_POST['id'];

        $data['nombre']=$_POST['nombre'];
        $data['precioSeccion']=$_POST['seccion'];
        $data['precioMensual']=$_POST['mes'];
        $data['descripcion']=$_POST['des'];

        $this->servicio_model->modificarservicio($id, $data);

        redirect('servicio/index','refresh');
	}
    /*public function buscar() {

        $nombre = $this->input->post('nombre');
        $servicios = $this->servicio_model->buscar_por_nombre($nombre);
        echo json_encode($servicios);

        

        
	}*/
    public function search_results() {
        $query = $this->input->post('query');
        $results = $this->servicio_model->searchservicios($query);
        echo json_encode($results);
    }
    public function get_grupos() {
        $idservicio = $this->input->post('idservicio');
        
        $grupos = $this->servicio_model->obtener_grupos($idservicio);
        
        
        echo json_encode($grupos);
    }
    public function datos_card() {
        $idservicio = $this->input->post('idservicio');
        $grupo = $this->input->post('grupo');
    
        
    
        $datos = $this->servicio_model->obtener_datos_card($idservicio, $grupo);
    
        // Devuelve los datos en formato JSON
        echo json_encode($datos);
        
    }
}