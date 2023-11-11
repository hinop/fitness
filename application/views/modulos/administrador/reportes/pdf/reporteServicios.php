<?php
$total2 = 0;
$Total3 = 0; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="<?php echo base_url(); ?>img/image.png" type="image/ico" />
    <title>FITNESS FACTORY</title>
    <style>
        @import url('fonts/BrixSansRegular.css');
        @import url('fonts/BrixSansBlack.css');

        * {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		p,
		label,
		span,
		table {
			font-family: 'BrixSansRegular';
			font-size: 11pt;
		}

		.h2 {
			font-family: 'BrixSansBlack';
			font-size: 16pt;
		}

		.h3 {
			font-family: 'BrixSansBlack';
			font-size: 12pt;
			display: block;
			background: #74121d;
			color: #FFF;
			text-align: center;
			padding: 3px;
			margin-bottom: 5px;
		}

		#page_pdf {
			width: 95%;
			margin: 15px auto 10px auto;
		}

		#factura_head,
		#factura_cliente,
		#factura_detalle {
			width: 100%;
			margin-bottom: 10px;
		}



		.info_empresa {
			width: 50%;
			text-align: center;
		}

		.info_factura {
			width: 25%;
		}

		.info_cliente {
			width: 100%;
		}

		.datos_cliente {
			width: 100%;
		}

		.datos_cliente tr td {
			width: 50%;
		}

		.datos_cliente {
			padding: 10px 10px 0 10px;
		}

		.datos_cliente label {
			width: 75px;
			display: inline-block;
		}

		.datos_cliente p {
			display: inline-block;
		}

		.textright {
			text-align: right;
		}

		.textleft {
			text-align: left;
		}

		.textcenter {
			text-align: center;
		}

		.round {
			border-radius: 0px;
			border: 1px solid #0a4661;
			overflow: hidden;
			padding-bottom: 15px;
		}

		.round p {
			padding: 0 15px;
		}

		#factura_detalle {
			border-collapse: collapse;
		}

		#factura_detalle thead th {
			background: #2b2d42;
			color: #FFF;
			padding: 5px;
		}

		#detalle_productos tr:nth-child(even) {
			background: #edf2f4;
		}

		#detalle_totales span {
			font-family: 'BrixSansBlack';
		}

		.nota {
			font-size: 8pt;
		}

		.label_gracias {
			font-family: verdana;
			font-weight: bold;
			font-style: italic;
			text-align: center;
			margin-top: 20px;
		}

		.anulada {
			position: absolute;
			left: 50%;
			top: 50%;
			transform: translateX(-50%) translateY(-50%);
		}
    </style>
</head>

<body>

    <div id="page_pdf">
        <table id="factura_head">
            <tr>
                <td class="logo_factura">
                    <div>
                        <img src="<?php echo base_url(); ?>img/log.png" width="75%;">
                    </div>
                </td>
                <td class="info_empresa">
                    <div>
                        <span class="h2">REPORTE DE SERVICIOS MÁS VENDIDOS </span>
                        <p>Gimnasio Fitness Factory </p>
                    </div>
                </td>
                <td class="info_factura">
                    <div class="round">
                        <span class="h3">Detalle</span>
                        <p>Fecha Desde: <strong name="desde"><?php echo $data2['fechaDesde'] ?></strong></p>
                        <p> Fecha Hasta: <strong name="hasta"><?php echo $data2['fechaHasta'] ?></strong></p>
                    </div>
                </td>
            </tr>
        </table>
        <table id="factura_cliente">
        </table>

        <table id="factura_detalle" style="width:100%;">
            <thead>
                <tr>
                    <th class="textcenter" width="120%">Servicio</th>
                    <th class="textcenter" width="100%">Cantidad</th>
                    <th class="textcenter" width="100%"> Total Recaudado</th>
                </tr>
            </thead>
            <tbody id="detalle_productos">
                <?php foreach ($data1 as $item) : ?>
                    <tr>
                        <td class="textcenter"><?php echo $item['Servicio']; ?></td>
                        <td class="textcenter"><?php echo $item['TotalCantidadVendida']; ?></td>
                        <td class="textcenter"><?php echo $item['TotalRecaudado']; ?> Bs.</td>


                    </tr>
                    <?php $total2 = round($total2 + $item['TotalRecaudado'], 2); ?>
                <?php endforeach; ?>

                <?php

                $Total3 = $total2;
                $totalFormateado = number_format($Total3, 2, '.', ','); // Formatea con comas como separadores de miles y punto como separador decimal

                ?>
            </tbody>
            <tfoot id="detalle_totales">
                <tr>

                    <td colspan="2" class="textright"><span><h3>TOTAL:</h3></span></td>
                    <td class="textcenter"><span><h3><?php echo $totalFormateado; ?> Bs.</h3></span></td>
                </tr>
            </tfoot>
        </table><br>

        <br>
        <br>
        <div>
            <footer>
                <p class="nota">Reporte Generado el : <?php
                                                        date_default_timezone_set('America/La_Paz'); // Establecer la zona horaria a "America/La_Paz"
                                                        $fecha_hora_actual = date('d-m-Y H:i:s'); // Obtener la fecha y hora actual en un solo formato

                                                        echo  $fecha_hora_actual;
                                                        ?> </p>

                <p class="nota"> Usuario: <?php
                                            //$this->session->set_userdata('nombreUsuario', $row->nombreUsuario);
                                            echo $this->session->userdata('nombreUsuario');
                                            ?></p>
            </footer>
        </div>


    </div>

</body>

</html>
<?php
function numeroEnLetras($numero, $moneda = 'BOLIVIANOS')
{
    /*$parte_entera = floor($numero);
    $parte_decimal = round(($numero - $parte_entera) * 100);

    $letras_entera = convertirNumeroALetras($parte_entera);
    $letras_decimal = $parte_decimal;

    $resultado = "SON: $letras_entera $letras_decimal/100 $moneda";

    return $resultado;*/

    //$numero = 200; // 200 representa 200.00
    $parte_entera = floor($numero);
    $parte_decimal = round(($numero - $parte_entera) * 100);

    if ($parte_decimal == 0) {
        $letras_decimal = '00';
    } else {
        $letras_decimal = $parte_decimal;
    }

    $letras_entera = convertirNumeroALetras($parte_entera);


    $resultado = "SON: $letras_entera $letras_decimal/100 BOLIVIANOS";

    echo $resultado;
}
function convertirNumeroALetras($numero)
{
    $unidad = array('Cero', 'Uno', 'Dos', 'Tres', 'Cuatro', 'Cinco', 'Seis', 'Siete', 'Ocho', 'Nueve');
    $decena = array('', '', 'Veinte', 'Treinta', 'Cuarenta', 'Cincuenta', 'Sesenta', 'Setenta', 'Ochenta', 'Noventa');
    $centena = array('', 'Ciento', 'Doscientos', 'Trescientos', 'Cuatrocientos', 'Quinientos', 'Seiscientos', 'Setecientos', 'Ochocientos', 'Novecientos');

    if ($numero < 10) {
        return $unidad[$numero];
    } elseif ($numero < 20) {
        return 'Dieci' . $unidad[$numero - 10];
    } elseif ($numero < 30) {
        return 'Veinti' . $unidad[$numero - 20];
    } elseif ($numero < 40) {
        return 'Trenta y ' . $unidad[$numero - 30];
    } elseif ($numero < 50) {
        return 'Cuarenta y ' . $unidad[$numero - 40];
    } elseif ($numero < 60) {
        return 'Cincuenta y ' . $unidad[$numero - 50];
    } elseif ($numero < 70) {
        return 'Sesenta y ' . $unidad[$numero - 60];
    } elseif ($numero < 80) {
        return 'Setenta y ' . $unidad[$numero - 70];
    } elseif ($numero < 90) {
        return 'Ochenta y ' . $unidad[$numero - 80];
    } elseif ($numero < 100) {
        return 'Noventa y ' . $unidad[$numero - 90];
    } elseif ($numero == 100) {
        return 'Cien';
    } elseif ($numero > 100 && $numero < 200) {
        return 'Ciento ' . convertirNumeroALetras($numero - 100);
    } elseif ($numero >= 200 && $numero <= 900) {
        $centenas = floor($numero / 100);
        return $centena[$centenas] . ' ' . convertirNumeroALetras($numero - ($centenas * 100));
    }
}

?>