<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function index()
	{
		$lista=$this->cliente_model->listaclientes();
		$data['cliente']=$lista;

        $this->load->view('estructura/recep/cabecera');
		$this->load->view('modulos/recepcion/cliente/cliente_list',$data);
        $this->load->view('estructura/recep/footer');
	}
    public function agregar()
	{
        $this->load->view('estructura/recep/cabecera');
		$this->load->view('modulos/recepcion/cliente/cliente_form');
        $this->load->view('estructura/recep/footer');
		
	}
    public function agregarbd()
	{
		
        $data['nombres']=$_POST['nombres'];
        $data['primerApellido']=$_POST['primerApellido'];
        $data['segundoApellido']=$_POST['segundoApellido'];
        $data['ci']=$_POST['ci'];
        $data['telefono']=$_POST['telefono'];
        $data['fechaNacimiento']=$_POST['fecha'];
        $data['sexo']=$_POST['sexo'];
        

        $this->cliente_model->agregarcliente($data);

        redirect('recepcion/cliente/index','refresh');
	}
    public function agregarmodal()
    {
        $data['nombres']=$_POST['nombresM'];
        $data['primerApellido']=$_POST['primerApellidoM'];
        $data['segundoApellido']=$_POST['segundoApellidoM'];
        $data['ci']=$_POST['ciM'];
        $data['telefono']=$_POST['telefonoM'];
        $data['fechaNacimiento']=$_POST['fechaM'];
        $data['sexo']=$_POST['sexoM'];
        //insertar datos a la base de datos
        $idCliente =$this->cliente_model->agregarclientemodal($data);
        //obtener id de la insercion
        

        $data['infocliente']=$this->cliente_model->recuperarcliente($idCliente);

       
		$this->load->view('modulos/recepcion/inscripcion/inscripcion_form',$data);
        
        redirect(current_url());
    }
    public function eliminarbd()
	{
        $id=$_POST['id'];
        $data['estado']='0';

        $this->cliente_model->eliminarcliente($id,$data);

        redirect('recepcion/cliente/index','refresh');
	}
    public function modificar()
	{
        $id=$_POST['id'];
        $data['infocliente']=$this->cliente_model->recuperarcliente($id);

        $this->load->view('estructura/recep/cabecera');
		$this->load->view('modulos/recepcion/cliente/cliente_modif',$data);
        $this->load->view('estructura/recep/footer');
        
	}
    public function modificarbd()
	{
        
        $id=$_POST['id'];
        
        $data['nombres']=trim(mb_strtoupper($_POST['nombres'], 'UTF-8'));
        $data['primerApellido']=trim(mb_strtoupper($_POST['primerApellido'], 'UTF-8'));
        $data['segundoApellido']=trim(mb_strtoupper($_POST['segundoApellido'], 'UTF-8'));
        $data['telefono']=trim($_POST['telefono']);
        $data['ci']=trim(mb_strtoupper($_POST['ci'], 'UTF-8'));
        $data['fechaNacimiento']=trim($_POST['fecha']);
        $data['sexo']=trim(mb_strtoupper($_POST['sexo'], 'UTF-8'));

        $this->cliente_model->modificarcliente($id, $data);

        redirect('recepcion/cliente/index','refresh');
	}
    
    public function search_results() {
        $query = $this->input->post('query');
        $results = $this->cliente_model->searchclientes($query);
        echo json_encode($results);
    }
  }
    

