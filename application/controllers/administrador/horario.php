<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horario extends CI_Controller {

	public function index()
	{
        $data['horarios'] = $this->horario_model->listahorarios();
		/*$lista=$this->horario_model->listahorarios();
		$data['horario']=$lista;*/
        

        $this->load->view('estructura/admin/cabecera');
		$this->load->view('modulos/administrador/horario/horario_list',$data);
        $this->load->view('estructura/admin/footer');
	}
    public function agregar()
	{
        $this->load->view('estructura/admin/cabecera');
		$this->load->view('modulos/administrador/horario/horario_form');
        $this->load->view('estructura/admin/footer');
	}
    public function agregarbd()
	{
        
        $data['horaInicio']=$_POST['horaI'];
        $data['horaFin']=$_POST['horaF'];
        $data['idDia']=$_POST['dia'];
        

        $this->horario_model->agregarhorario($data);

        redirect('administrador/horario/index','refresh');
	}
    public function eliminarbd()
	{
        $id=$_POST['id'];

        $this->horario_model->eliminarhorario($id);

        redirect('administrador/horario/index','refresh');
	}
    public function modificar()
	{
        $id=$_POST['id'];
        $idDia=$_POST['idDia'];
        
        
        $data['infohorario']=$this->horario_model->recuperarhorario($id,$idDia);
        //$datos_horario = $this->horario_model->recuperarhorario($id);

    // Convertir la cadena 'Lun - Mar - Jue' en un array
        

        $this->load->view('estructura/admin/cabecera');
        $this->load->view('modulos/administrador/horario/horario_modif',$data);
        $this->load->view('estructura/admin/footer');
	}
    public function modificarbd()
	{
        $id=$_POST['id'];

        $data['horaInicio']=$_POST['hora_inicio'];
        $data['horaFin']=$_POST['hora_fin'];
        $data['idDia']=$_POST['dia'];
        
        $this->horario_model->modificarhorario($id, $data);

        redirect('administrador/horario/index','refresh');
	}
    
    public function cargarHorarios() {
        $idDia = $this->input->post('idDia'); // Obtén el idDia del POST
        $horarios = $this->horario_model->obtenerHorarios($idDia); // Reemplaza 'tu_modelo' con el nombre de tu modelo
        echo json_encode($horarios);
    }
    
    
    

}