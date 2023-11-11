<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructor extends CI_Controller {

	public function index()
	{
		$lista=$this->instructor_model->listainstructores();
		$data['instructor']=$lista;

        $this->load->view('estructura/cabecera');
		$this->load->view('modulos/administrador/instructor/instructor_list',$data);
        $this->load->view('estructura/footer');
	}
    public function agregar()
	{
        $this->load->view('estructura/cabecera');
		$this->load->view('modulos/administrador/instructor/instructor_form');
        $this->load->view('estructura/footer');
		
	}
    public function agregarbd()
	{
		
        $data['nombres']=$_POST['nombres'];
        $data['primerApellido']=$_POST['primerApellido'];
        $data['segundoApellido']=$_POST['segundoApellido'];
        $data['ci']=$_POST['ci'];
        $data['telefono']=$_POST['telefono'];
        $data['direccion']=$_POST['direccion'];
        $data['especialidad']=$_POST['especialidad'];

        $this->instructor_model->agregarinstructor($data);

        redirect('instructor/index','refresh');
	}
    public function eliminarbd()
	{
        $id=$_POST['id'];
        $data['estado']='0';

        $this->instructor_model->eliminarinstructor($id,$data);

        redirect('instructor/index','refresh');
	}
    public function modificar()
	{
        $id=$_POST['id'];
        $data['infoinstructor']=$this->instructor_model->recuperarinstructor($id);

        $this->load->view('estructura/cabecera');
		$this->load->view('modulos/administrador/instructor/instructor_modif',$data);
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
        $data['direccion']=$_POST['direccion'];
        $data['especialidad']=$_POST['especialidad'];
        
        

        $this->instructor_model->modificarinstructor($id, $data);

        redirect('instructor/index','refresh');
	}
    /*public function buscar() {

        $ci = $this->input->post('ci');
        $instructores = $this->instructor_model->buscar_por_ci($ci);
        echo json_encode($instructores);

        

        
	}*/
    /*public function search_results() {
        
        $query = $this->input->post('query');
        $results = $this->instructor_model->search_data($query);
        echo json_encode($results);

        
    }*/
    public function search_results() {
        $query = $this->input->post('query');
        $results = $this->instructor_model->searchInstructors($query);
        echo json_encode($results);
    }
    
    


    
    
  }
    

