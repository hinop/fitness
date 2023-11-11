<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends CI_Controller {

	public function index()
	{
		$lista=$this->instructor_model->listainstructores();
		$data['instructor']=$lista;

        $this->load->view('estructura/recep/cabecera');
		$this->load->view('modulos/recepcion/instructor/instructor_list',$data);
        $this->load->view('estructura/recep/footer');
	}
    public function agregar()
	{
        $this->load->view('estructura/recep/cabecera');
		$this->load->view('modulos/recepcion/instructor/instructor_form');
        $this->load->view('estructura/recep/footer');
		
	}
    public function agregarbd()
	{
		
        $data['nombres']=trim(mb_strtoupper($_POST['nombres'], 'UTF-8')); 
        $data['primerApellido']=trim(mb_strtoupper($_POST['primerApellido'], 'UTF-8')); 
        $data['segundoApellido']=trim(mb_strtoupper($_POST['segundoApellido'], 'UTF-8')); 
        $data['ci']=trim($_POST['ci']);
        $data['telefono']=trim($_POST['telefono']);
        $data['direccion']=trim(mb_strtoupper($_POST['direccion'], 'UTF-8')); 
        $data['especialidad']=trim(mb_strtoupper($_POST['especialidad'], 'UTF-8')); 

        $this->instructor_model->agregarinstructor($data);

        redirect('recepcion/instructor/index','refresh');
	}
    public function eliminarbd()
	{
        $id=$_POST['id'];
        $data['estado']='0';

        $this->instructor_model->eliminarinstructor($id,$data);

        redirect('recepcion/instructor/index','refresh');
	}
    public function modificar()
	{
        $id=$_POST['id'];
        $data['infoinstructor']=$this->instructor_model->recuperarinstructor($id);

        $this->load->view('estructura/recep/cabecera');
		$this->load->view('modulos/recepcion/instructor/instructor_modif',$data);
        $this->load->view('estructura/recep/footer');
        
	}
    public function modificarbd()
	{
        
        $id=$_POST['id'];
        
        $data['nombres']=trim(mb_strtoupper($_POST['nombres'], 'UTF-8')); 
        $data['primerApellido']=trim(mb_strtoupper($_POST['primerApellido'], 'UTF-8')); 
        $data['segundoApellido']=trim(mb_strtoupper($_POST['segundoApellido'], 'UTF-8')); 
        $data['ci']=trim(mb_strtoupper($_POST['ci'], 'UTF-8')); 
        $data['telefono']=trim($_POST['telefono']);
        $data['direccion']=trim(mb_strtoupper($_POST['direccion'], 'UTF-8')); 
        $data['especialidad']=trim(mb_strtoupper($_POST['especialidad'], 'UTF-8')); 
        
        

        $this->instructor_model->modificarinstructor($id, $data);

        redirect('recepcion/instructor/index','refresh');
	}
    
    public function search_results() {
        $query = $this->input->post('query');
        $results = $this->instructor_model->searchInstructors($query);
        echo json_encode($results);
    }
    
    


    
    
  }
    

