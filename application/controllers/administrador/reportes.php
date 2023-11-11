<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reportes extends CI_Controller
{

    public function reporte1()
    {
        $lista=$this->inscripcion_model->listainscripcionReporte();
		$data['inscripcion']=$lista;

        $this->load->view('estructura/admin/cabecera');
        $this->load->view('modulos/administrador/reportes/listaInscripcion', $data);
        $this->load->view('estructura/admin/footer');
    }
    public function reporteGeneral()
    {
        $this->load->library('pdf');
        $fechaDesde  = $_POST['desdeList']; 
        $fechaHasta  = $_POST['hastaList']; 

        
        $data = $this->reportes_model->consultarDatos($fechaDesde, $fechaHasta);

        $html = $this->load->view('modulos/administrador/reportes/pdf/reporteGeneral', $data, true);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');

        $options = new Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isJavascriptEnabled', true);
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);

        $dompdf->setPaper('letter', 'portrait');

        $dompdf->render();

        $pdfContent = $dompdf->output();

        $filename = 'ingresosServicios.pdf';
    
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=$filename");
    
            echo $pdfContent;
    }
    public function reporte2()
    {
        $this->load->view('estructura/admin/cabecera');
        $this->load->view('modulos/administrador/reportes/reporte2');
        $this->load->view('estructura/admin/footer');
    }
    public function llenadoTablaRep2()
    {
        $fechaDesde  = $_POST['desde']; 
        $fechaHasta  = $_POST['hasta'];  

        
        $data = $this->reportes_model->llenadoTablaRep2($fechaDesde, $fechaHasta);
        echo json_encode($data);
    }
    public function reporteServiciosVendidos()
    {
        $this->load->library('pdf');
        $fechaDesde  = $_POST['desdeList']; 
        $fechaHasta  = $_POST['hastaList'];  

        
        $data = $this->reportes_model->consultarDatosRep2($fechaDesde, $fechaHasta);
        

        $html = $this->load->view('modulos/administrador/reportes/pdf/reporteServicios', $data, true);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');

        $options = new Dompdf\Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isJavascriptEnabled', true);
        $options->set('isHtml5ParserEnabled', true);

        $dompdf = new Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);

        $dompdf->setPaper('letter', 'portrait');

        $dompdf->render();

        $pdfContent = $dompdf->output();

        $filename = 'TopServicios.pdf';
    
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=$filename");
    
            echo $pdfContent;
    }

}