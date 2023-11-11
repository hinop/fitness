<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscripcion extends CI_Controller {

	public function index()
	{
		$lista=$this->inscripcion_model->listainscripcion();
		$data['inscripcion']=$lista;

       
        $this->load->view('estructura/admin/cabecera');
		$this->load->view('modulos/administrador/inscripcion/inscripcion_list',$data);
        $this->load->view('estructura/admin/footer');
		
	}
    public function agregar()
	{
        $data['user_id'] = $this->session->userdata('id');
        

        $this->load->view('estructura/admin/cabecera');
		$this->load->view('modulos/administrador/inscripcion/inscripcion_form',$data);
        $this->load->view('estructura/admin/footer');
		
	}
    public function agregarbd()
	{
        $data['nombre']=$_POST['nombre'];
        $data['precio_mes']=$_POST['mes'];
        
        $data['descripcion']=$_POST['desc'];

        $this->inscripcion_model->agregarinscripcion($data);

        redirect('administrador/inscripcion/index','refresh');
	}
    public function eliminarbd()
	{
        $id=$_POST['id'];

        $this->inscripcion_model->eliminarinscripcion($id);

        redirect('administrador/inscripcion/index','refresh');
	}
    public function modificar()
	{
        $id=$_POST['id'];
        $data['infoinscripcion']=$this->inscripcion_model->recuperarinscripcion($id);

        $this->load->view('estructura/admin/cabecera');
		$this->load->view('modulos/administrador/servicio/inscripcion_modif',$data);
        $this->load->view('estructura/admin/footer');
        
	}
    public function modificarbd()
	{
        $id=$_POST['id'];

        $data['nombre']=$_POST['nombre'];
        $data['precio_mes']=$_POST['mes'];
        $data['precio_seccion']=$_POST['seccion'];
        $data['descripcion']=$_POST['desc'];

        $this->servicio_model->modificarinscripcion($id, $data);

        redirect('administrador/inscripcion/index','refresh');
	}
    public function nuevaInscripcion()
{
    date_default_timezone_set('America/La_Paz');
    $fecha_venta = date('Y-m-d ');
    $idCliente = $this->input->post('idCliente');
    $idUsuario = $this->session->userdata('id');
    $detalles = $this->input->post('detalles');
    $total = $this->input->post('total');

    // Iniciar la transacción
    $this->db->trans_start();

    // Insertar en la tabla de venta
    $ventaData = array(
        'idCliente' => $idCliente,
        'idUsuario' => $idUsuario,
        'fecha_venta' => $fecha_venta,
        'total' => $total
    );
    $this->inscripcion_model->insertarVenta($ventaData);

    // Obtener el ID de la venta recién insertada
    $idVenta = $this->db->insert_id();

    // Insertar los detalles de la venta
    
        foreach ($detalles as $detalle) {
            $detalle['idVenta'] = $idVenta;
            $this->inscripcion_model->insertarDetalle($detalle);
        }
    

    // Finalizar la transacción
    $this->db->trans_complete();

    if ($this->db->trans_status() === FALSE) {
        // Si la transacción falla
        $response = array('status' => 'error');
        
        
    } else {
        // Si la transacción tiene éxito
        $response = array('status' => 'success', 'idVenta' => $idVenta);
        
    }
    header('Content-Type: application/json');
    echo json_encode($response);// Redirige a la URL deseada
}

    public function comprobante(){
        $this->load->library('pdf'); 
        if ($this->input->get('id')) {
            $idVenta = $this->input->get('id');
        } elseif ($this->input->post('id')) {
            $idVenta = $this->input->post('id');
        } else {}
        
        
            
    
        // Consulta la base de datos para obtener los datos necesarios
        $data = $this->consultarDatosDesdeBaseDeDatos($idVenta);

        var_dump($data);
        // Captura la salida HTML de la vista en una variable
        $html = $this->load->view('modulos/administrador/reportes/comprobante',$data, true);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        
        $options = new Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isJavascriptEnabled', true);
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);

        
        $dompdf->setPaper('letter', 'portrait');

        
        
        $dompdf->render();

        //$dompdf->stream('documento.pdf', array('Attachment' => 1));
        //$dompdf->stream('ventas.pdf', array('Attachment' => 0, 'target' => '_blank'));
        //$dompdf->stream('ventas.pdf');
       header("Content-type: application/pdf");
       header("Content-Disposition: inline; filename=documento.pdf");
       
       echo $dompdf->output();
        
        


        
        exit;
    }
    private function consultarDatosDesdeBaseDeDatos($idVenta)
    {
        // Obtener los datos de la primera consulta
        $query1 = $this->db->query("SELECT V.id AS idVenta, V.fecha_venta as fechaVenta, C.ci AS ci, CONCAT(C.nombres,' ',C.primerApellido,' ',IFNULL(C.segundoApellido,'')) AS nombre_completo
            FROM venta V 
            INNER JOIN cliente C ON C.id = V.idCliente
            WHERE V.id = $idVenta");
            

        if ($query1->num_rows() > 0) {
            $data1 = $query1->row_array();
        } else {
            $data1 = array(); // Puedes definir un valor predeterminado o manejarlo de acuerdo a tus necesidades.
        }

        // Obtener los datos de la segunda consulta
        $query2 = $this->db->query("SELECT S.nombre AS nombreServicio, D.fechaInicio AS fechaInicio,D.fechaFin AS fechaFin,
        D.precioUnitario AS precio,D.cantidad AS cantidad,  
        D.descuento AS descuento,(D.cantidad * D.precioUnitario *(1-D.descuento*0.01)) AS importe
        FROM venta V 
        INNER JOIN detalle D ON D.idVenta = V.id
        INNER JOIN servicio S ON S.id = D.idServicio
        WHERE V.id = $idVenta");

        

        if ($query2->num_rows() > 0) {
            $data2 = $query2->result_array();
        } else {
            $data2 = array(); // Puedes definir un valor predeterminado o manejarlo de acuerdo a tus necesidades.
        }

        // Combina ambos conjuntos de datos en un solo arreglo
        $data = array(
            'data1' => $data1,
            'data2' => $data2
        );
        return $data;
    }
        
    }
