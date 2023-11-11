<div class="x_content">
  <div class="page-inner">
    <div class="container"> 
    <div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <form action="<?php echo base_url(); ?>index.php/reportes/reporteGeneral" autocomplete="off" method="post" target="_black">
          <div class="d-flex align-items-center text-center">
            <h2 style="text-align: center;">REPORTE GENERAL</h2>
          </div>
          <div class="ml-auto">
            <input type="hidden" id="desdeList" name="desdeList">
            <input type="hidden" id="hastaList" name="hastaList">
            <button type="submit" class="btn btn-primary btn-round custom-button ml-auto">
              <i class="btn-inner">
                <svg class="icon-30" width="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <!-- Contenido del botón -->
                </svg>
              </i>
              <span>GENERAR</span>
            </button>
          </div>
        </form>
      </div>
      <br>
      <div class="row">
        <div class="col-md-6 text-right">
          <div class="form-group">
            <label for="">
              <h4>Desde:</h4>
            </label>
            <?php
            date_default_timezone_set('America/La_Paz');
            ?>
            <input type="date" id="desde" name="desde" onchange="habilitarFechas()">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="">
              <h4>Hasta:</h4>
            </label>
            <?php
            date_default_timezone_set('America/La_Paz');
            ?>
            <input type="date" id="hasta" name="hasta" onchange="habilitarFechas();filtrarPorFechas()">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


    <!--<div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <form class="" action="<?php echo base_url(); ?>index.php/reportes/reporteGeneral"autocomplete="off"method="post" target="_black">
              <div class="d-flex align-items-center text-center">
                <h2 style="text-align: center;">REPORTE GENERAL </h2>
                <div class="ml-auto ">
                <input type="hidden" id="desdeList" name="desdeList">
                <input type="hidden" id="hastaList" name="hastaList">
                <div class="ml-auto text-right">
                  <button type="submit" class="btn btn-primary btn-round custom-button" >
                  <i class="btn-inner">
                      <svg class="icon-30" width="30" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M14.7369 2.76175H8.08489C6.00489 2.75375 4.30089 4.41075 4.25089 6.49075V17.2277C4.20589 19.3297 5.87389 21.0697 7.97489 21.1147C8.01189 21.1147 8.04889 21.1157 8.08489 21.1147H16.0729C18.1629 21.0407 19.8149 19.3187 19.8029 17.2277V8.03775L14.7369 2.76175Z"
                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M14.4751 2.75V5.659C14.4751 7.079 15.6241 8.23 17.0441 8.234H19.7981"
                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11.6421 15.9497V9.90869" stroke="currentColor" stroke-width="1.5"
                          stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9.29639 13.5942L11.6414 15.9492L13.9864 13.5942" stroke="currentColor"
                          stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                      </svg>
                    </i>
                    <span>GENERAR</span>
                  </button>
                  </div>
                </div>
                </div>
              </div>-->
              <br>
              <div class="row">
                <div class="col-md-6 text-right">
                  <div class="form-group ">
                    <label for="">
                      <h4>Desde:</h4>
                    </label>
                    <?php
                    date_default_timezone_set('America/La_Paz');

                    ?>
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">
                      <h4>Hasta:</h4>
                    </label>
                    <?php
                    date_default_timezone_set('America/La_Paz');

                    ?>
                    
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="table2" class="display" class="table table-striped table-bordered" style="width:100%">
                <thead style="background-color: #14213d; color: #fff;">
                  <tr>
                    <th>No</th>
                    <th>Cliente</th>
                    <th>Fecha Inscripcion</th>
                    <th>Total</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $indice = 1;
                  foreach ($inscripcion->result() as $row) {

                    
                    ?>
                    <tr>
                          <td><?php echo $indice; ?></td>
                          <td><?php echo $row->nombre_completo; ?></td>
                          <td><?php echo $row->fecha_venta; ?></td>
                          <td><?php echo $row->total; ?></td>
                          <td>
                          
                          <?php
                            echo form_open_multipart('inscripcion/comprobante', array('target' => '_blank'));
                            ?>
                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                            <button type="submit" class="btn btn-small btn-success"><i class="fa fa-pencil">
                            <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.7161 16.2234H8.49609" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M15.7161 12.0369H8.49609" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M11.2521 7.86011H8.49707" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M15.909 2.74976C15.909 2.74976 8.23198 2.75376 8.21998 2.75376C5.45998 2.77076 3.75098 4.58676 3.75098 7.35676V16.5528C3.75098 19.3368 5.47298 21.1598 8.25698 21.1598C8.25698 21.1598 15.933 21.1568 15.946 21.1568C18.706 21.1398 20.416 19.3228 20.416 16.5528V7.35676C20.416 4.57276 18.693 2.74976 15.909 2.74976Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </i></button>

                            <?php
                            echo form_close();    
                            ?>
                            

                          </form>

                        </div>
                      </td>

                    </tr>
                    <?php
                    $indice++;
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  -->
    </div>
    
  </div>

</div>

<style>
  .custom-button {
  float: right;
}
</style>



<script>

function habilitarFechas() {
    const fechaDesde2 = document.getElementById("desde").value;
    const fechaHasta2 = document.getElementById("hasta").value;

    document.getElementById("desdeList").value = fechaDesde2;
    document.getElementById("hastaList").value = fechaHasta2;
    var fechaDesde = new Date(document.getElementById('desde').value);
    var fechaHasta = document.getElementById('hasta');

    if (fechaDesde) {
      fechaHasta.min = document.getElementById('desde').value;
      fechaHasta.disabled = false;
    } else {
      fechaHasta.min = '';
      fechaHasta.disabled = true;
    }

    var fecha1 = restarUnDia(fechaDesde);
    document.getElementById('desdeList').value = fecha1;


    var fecha2 = restarUnDia(fechaHasta);
    document.getElementById('hastaList').value = fecha2;


  }
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
    var table = $('#table2').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        pageLength: 10,

        
    });
    
    
    $('#table thead th').css({
        'background-color': '#14213d', // Cambia el color de fondo a azul
        'color': '#fff' // Cambia el color del texto a blanco
    });

    // Agregar controladores de eventos a los campos "Desde" y "Hasta"
    $("#desde, #hasta").change(function () {
        // Obtén las fechas "Desde" y "Hasta"
        var fechaDesde = new Date($("#desde").val());
        var fechaHasta = new Date($("#hasta").val());

        // Aplica el filtro en todas las páginas del DataTable
        table.search('').draw();
        table.columns(2).search('').draw();

        // Filtro personalizado para buscar dentro del rango de fechas
        $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
            var fechaFila = new Date(data[2]); // Ajusta el índice según la posición de la columna de fecha
            return fechaFila >= fechaDesde && fechaFila <= fechaHasta;
        });

        // Realizar el filtrado en el DataTable
        table.draw();

        // Elimina el filtro personalizado después de realizar el filtrado
        $.fn.dataTable.ext.search.pop();
    });
});
</script>


 