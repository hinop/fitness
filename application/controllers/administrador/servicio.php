<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Controller {

	public function index()
	{
		$lista=$this->servicio_model->listaservicios();
		$data['servicio']=$lista;

        $this->load->view('estructura/admin/cabecera');
        $this->load->view('modulos/administrador/servicio/serv_list',$data);
		$this->load->view('estructura/admin/footer');
		
        
	}
    /*referncia al agregar horarios al servicio*/
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
        if (isset($datos) && $datos!== null ) {
            $data['info'] = $datos;
            $info = $datos[0];
            $idS = $info['id'];       
            
        }
        

        $lista=$this->servicio_model->listahoraservicio($idS);
		$data['infoservicio']=$lista;
        
        /*$merged_data = array_merge($data, $datos);*/
        $this->load->view('estructura/admin/cabecera');
        $this->load->view('modulos/administrador/servicio/serv_horarioList',$data);
        
		$this->load->view('estructura/admin/footer');
		
	}
    

    public function horario()
	{ 
        $id=$_POST['id'];
        $data['infoservicio']=$this->servicio_model->recuperarservicio($id);

        $this->load->view('estructura/admin/cabecera');
        
        $this->load->view('modulos/administrador/servicio/serv_asignar',$data);
        $this->load->view('estructura/admin/footer');
	}
    public function asignarbd()
	{    

        $data['idHorario']=$_POST['idHorario'];
        $data['idServicio']=$_POST['idservicio'];
        
        $data['idInstructor']=$_POST['idinstructor'];
        $data['grupo']=$_POST['grupo'];
        

        $dato= $this->servicio_model->recuperarservicio($idServicio)->row();
        
        

        

        /*$dato = $this->servicio_model->recuperarservicio($idServicio)->result();
        $encodedData = base64_encode(json_encode($dato));*/

        $this->servicio_model->asignarhoraservicio($data);
        redirect('administrador/servicio/index','refresh');
        //redirect('administrador/servicio/asignar/' . urlencode($encodedData), 'refresh');
  

	}
    public function agrupar(){
        $id=$_POST['id'];
        $data['infoservicio']=$this->servicio_model->recuperarservicio($id);
    
    }
    /* -----------------*/
    public function agregar()
	{   
        $this->load->view('estructura/admin/cabecera');
        $this->load->view('modulos/administrador/servicio/serv_form');
		$this->load->view('estructura/admin/footer');
		
	}

    public function agregarbd()
	{
        $data['nombre']=$_POST['nombre'];
        
        $data['precioMensual']=$_POST['mes'];
        $data['descripcion']=$_POST['des'];

        $this->servicio_model->agregarservicio($data);

        redirect('administrador/servicio/index','refresh');
	}
    public function eliminarbd()
	{
        $id=$_POST['id'];
        $data['estado']='0';

        $this->servicio_model->eliminarservicio($id,$data);

        redirect('administrador/servicio/index','refresh');
	}
    
    public function modificar()
	{
        $id=$_POST['id'];
        $data['infoservicio']=$this->servicio_model->recuperarservicio($id);

        $this->load->view('estructura/admin/cabecera');
        
        $this->load->view('modulos/administrador/servicio/serv_modif',$data);
        $this->load->view('estructura/admin/footer');
	}
    public function modificarbd()
	{
        $id=$_POST['id'];

        $data['nombre']=$_POST['nombre'];
        
        $data['precioMensual']=$_POST['mes'];
        $data['descripcion']=$_POST['des'];

        $this->servicio_model->modificarservicio($id, $data);

        redirect('administrador/servicio/index','refresh');
	}
    public function modificarHorario()
	{
        $id=$_POST['id'];
        $idInstructor=$_POST['idInstructor'];
        $idHorario=$_POST['idHorario'];
        $data['infoservicio']=$this->servicio_model->recuperarservicioHorario($id,$idInstructor,$idHorario);

        $this->load->view('estructura/admin/cabecera');
        
        $this->load->view('modulos/administrador/servicio/serv_asigModif',$data);
        $this->load->view('estructura/admin/footer');
	}
    public function modificarbdH()
	{
        $idHorario=$_POST['idHorario'];
        $idInstructor=$_POST['idInstructor'];
        $idServicio=$_POST['idServicio'];
        
        $data['grupo']=$_POST['grupo'];

        $this->servicio_model->modificarservicioH($idHorario,$idInstructor,$idServicio, $data);

        redirect('administrador/servicio/index','refresh');
	}
    public function eliminarbdH()
	{
        $id=$_POST['id'];
        $idInstructor=$_POST['idInstructor'];
        $idHorario=$_POST['idHorario'];
        $data['estado']='0';

        $this->servicio_model->eliminarservicioH($id,$idInstructor,$idHorario,$data);

        redirect('administrador/servicio/index','refresh');
	}
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