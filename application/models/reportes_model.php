<?php
class Reportes_model extends CI_Model
{   
    //Reporte General
    public function consultarDatos($fechaDesde, $fechaHasta)
    {
        $query = $this->db->query("SELECT V.id AS id, CONCAT(C.nombres,' ',C.primerApellido,' ',IFNULL(C.segundoApellido,'')) AS nombre  , DATE_FORMAT(V.fecha_venta, '%d/%m/%Y') AS fechaInscripcion, V.total AS Total 
        FROM  venta V 
        INNER JOIN cliente C ON C.id = V.idCliente
        WHERE V.estado=1 AND fecha_venta BETWEEN  '$fechaDesde' AND '$fechaHasta'
        ORDER BY 1");

        if ($query->num_rows() > 0) {
            $data1 = $query->result_array();
        } else {
            $data1 = array(); 
        }

        $fechaDesdeFormateada = date('d-m-Y', strtotime($fechaDesde));
        $fechaHastaFormateada = date('d-m-Y', strtotime($fechaHasta));
        
        // Agrega las fechas formateadas a tu arreglo de datos (data)
        $data2['fechaDesde'] = $fechaDesdeFormateada;
        $data2['fechaHasta'] = $fechaHastaFormateada;


        $data = array();
        $data['data1'] = $data1;
        $data['data2'] = $data2;
        return $data;
    }
    // Reporte de ranking de servicios
    public function llenadoTablaRep2($fechaDesde, $fechaHasta)
    {
        $query = $this->db->query("SELECT S.nombre AS Servicio, IFNULL(SUM(D.cantidad),0) AS TotalCantidadVendida, 
        IFNULL(SUM(D.cantidad*D.precioUnitario),0) AS TotalRecaudado
        FROM servicio S
        LEFT JOIN detalle D ON D.idServicio = S.id
        LEFT JOIN venta V ON V.id = D.idVenta
        WHERE V.estado = 1 AND V.fecha_venta BETWEEN '$fechaDesde' AND '$fechaHasta'
        GROUP BY S.nombre
        ORDER BY 3 DESC");

        if ($query->num_rows() > 0) {
            $data = $query->result_array();
        } else {
            $data = array(); 
        }
        return $data;
    }
    public function consultarDatosRep2($fechaDesde, $fechaHasta)
    {
        $query = $this->db->query("SELECT S.nombre AS Servicio, IFNULL(SUM(D.cantidad),0) AS TotalCantidadVendida, 
        IFNULL(SUM(D.cantidad*D.precioUnitario),0) AS TotalRecaudado
        FROM servicio S
        LEFT JOIN detalle D ON D.idServicio = S.id
        LEFT JOIN venta V ON V.id = D.idVenta
        WHERE V.estado = 1 AND V.fecha_venta BETWEEN '$fechaDesde' AND '$fechaHasta'
        GROUP BY S.nombre
        ORDER BY 3 DESC");

        if ($query->num_rows() > 0) {
            $data1 = $query->result_array();
        } else {
            $data1 = array(); 
        }

        $fechaDesdeFormateada = date('d-m-Y', strtotime($fechaDesde));
        $fechaHastaFormateada = date('d-m-Y', strtotime($fechaHasta));
        
        // Agrega las fechas formateadas a tu arreglo de datos (data)
        $data2['fechaDesde'] = $fechaDesdeFormateada;
        $data2['fechaHasta'] = $fechaHastaFormateada;

        $data = array();
        $data['data1'] = $data1;
        $data['data2'] = $data2;
        return $data;
    }
}
?>