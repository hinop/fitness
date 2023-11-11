<div class="x_content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">

                        <div class="d-flex align-items-center text-center">
                            <h2 style="text-align: center;">REPORTE DE SERVICIOS MÁS VENDIDOS</h2>
                            <div class="ml-auto ">
                                <form class=""
                                    action="<?php echo base_url(); ?>index.php/reportes/reporteServiciosVendidos"
                                    autocomplete="off" method="post" target="_black">
                                    <input type="hidden" id="desdeList" name="desdeList">
                                    <input type="hidden" id="hastaList" name="hastaList">
                                    <input type="hidden" id="top" name="top1" value="3">
                                    <button type="submit" class="btn btn-primary btn-round">
                                        <i class="btn-inner">
                                            <svg class="icon-30" width="30" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M14.7369 2.76175H8.08489C6.00489 2.75375 4.30089 4.41075 4.25089 6.49075V17.2277C4.20589 19.3297 5.87389 21.0697 7.97489 21.1147C8.01189 21.1147 8.04889 21.1157 8.08489 21.1147H16.0729C18.1629 21.0407 19.8149 19.3187 19.8029 17.2277V8.03775L14.7369 2.76175Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path
                                                    d="M14.4751 2.75V5.659C14.4751 7.079 15.6241 8.23 17.0441 8.234H19.7981"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M11.6421 15.9497V9.90869" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M9.29639 13.5942L11.6414 15.9492L13.9864 13.5942"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>
                                        </i>
                                        <span>GENERAR</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-5 text-right">
                                <div class="form-group ">
                                    <label for="">
                                        <h4>Desde:</h4>
                                    </label>
                                    <?php
                                    date_default_timezone_set('America/La_Paz');

                                    ?>
                                    <input type="date" id="desde"  onchange="habilitarFechas()">
                                    <input type="hidden" id="desdeList2" name="desde">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">
                                        <h4>Hasta:</h4>
                                    </label>
                                    <?php
                                    date_default_timezone_set('America/La_Paz');

                                    ?>
                                    <input type="date" id="hasta"
                                        onchange="habilitarFechas();filtrarPorFechas()">
                                    <input type="hidden" id="hastaList2" name="hasta">
                                </div>
                            </div>
                            <div class="col-md-4 text-left">
                                <button id="btnConsultar" class="btn btn-primary">Consultar</button>
                            </div>
                        </div>
                        
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tabla" class="display" class="table table-striped table-bordered"
                                style="width:100%; text-align: center;">
                                <thead style="background-color: #14213d; color: #fff; text-align: center;">
                                    <tr>
                                        <th style="text-align: center;">Servicio</th>
                                        <th style="text-align: center;">Cantidad Vendida</th>
                                        <th style="text-align: center;">Total Recaudado</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    // Configura la tabla DataTable
    var tabla = $('#tabla').DataTable({
        lengthChange: false, // Oculta el filtro de entradas (entries)
        paging: false,
        info: false,
        ordering: false,
        searching: false,
        columnDefs: [
            { width: '120px', targets: 0 }, 
            { width: '100px', targets: 1 }, 
            { width: '100px', targets: 2 }  
        ],
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" // Carga los datos de lenguaje en español
        } // Desactiva los filtros de búsqueda en las columnas
    });

    // Manejador de eventos cuando se hace clic en el botón "Consultar".
    $('#btnConsultar').on('click', function() {
        var desde = $('#desde').val();
        var hasta = $('#hasta').val();

        // Realiza la solicitud AJAX al controlador para obtener los datos.
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/reportes/llenadoTablaRep2', // Reemplaza 'URL_DEL_CONTROLADOR' por la URL correcta del controlador.
            type: 'POST',
            data: { desde: desde, hasta: hasta },
            dataType: 'json',
            success: function(data) {
                // Llena la tabla con los datos recibidos.
                tabla.clear().draw(); // Limpia la tabla.
                data.forEach(function(item) {
                    tabla.row.add([
                        item.Servicio,
                        item.TotalCantidadVendida,
                        item.TotalRecaudado + ' Bs.'
                    ]).draw();
                });
            },
            error: function(error) {
                console.error('Error al obtener datos del servidor:', error);
            }
        });
    });
});
</script>
<script>
/*$(document).ready(function() {
    // Manejador de eventos cuando se hace clic en el botón "Consultar".
    $('#btnConsultar').on('click', function() {
        var desde = $('#desde').val();
        var hasta = $('#hasta').val();
        var top = $('#topSelect').val();

        // Realiza la solicitud AJAX al controlador para obtener los datos.
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/reportes/llenadoTablaRep2',
            type: 'POST',
            data: { desde: desde, hasta: hasta, top: top },
            dataType: 'json',
            success: function(data) {
                // Llena la tabla con los datos recibidos.
                llenarTabla(data);
            },
            error: function(error) {
                console.error('Error al obtener datos del servidor:', error);
            }
        });
    });

    // Función para llenar la tabla con los datos.
    function llenarTabla(data) {
        var tabla = $('#tabla').DataTable();
        tabla.clear().draw(); // Limpia la tabla.

        data.forEach(function(item) {
            tabla.row.add([
                item.Servicio,
                item.TotalCantidadVendida,
                item.TotalRecaudado
            ]).draw();
        });
    }
});

/*
$(document).ready(function() {
    var table = $('#tabla').DataTable({
        // Configuraciones de la tabla DataTables
        // Puedes personalizarlo según tus necesidades.
    });

    $('#btnConsultar').on('click', function() {
        var top = $('#topSelect').val();
        var desde = $('#desde').val();
        var hasta = $('#hasta').val();

        // Realiza una solicitud al servidor para obtener los datos.
        // Ajusta la URL y los datos según tu implementación real.
        $.ajax({
            url: '<?php echo base_url(); ?>index.php/reportes/llenadoTablaRep2',
            type: 'POST',
            data: { top: top, desde: desde, hasta: hasta },
            dataType: 'json',
            success: function(data) {
                table.clear().rows.add(data).draw(); // Actualiza la tabla con los datos recibidos.
            },
            error: function(error) {
                console.error('Error al obtener datos del servidor:', error);
            }
        });
    });
});
</>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Coloca aquí el código JavaScript proporcionado.
    function actualizarTabla(data) {
    var tabla = document.getElementById("tabla");
    var tbody = tabla.querySelector("tbody");
    tbody.innerHTML = ""; // Limpia el contenido actual de la tabla.

    data.forEach(function(item) {
        var row = document.createElement("tr");
        var servicioCell = document.createElement("td");
        var cantidadCell = document.createElement("td");
        var recaudadoCell = document.createElement("td");

        servicioCell.textContent = item.Servicio;
        cantidadCell.textContent = item.TotalCantidadVendida;
        recaudadoCell.textContent = item.TotalRecaudado;

        row.appendChild(servicioCell);
        row.appendChild(cantidadCell);
        row.appendChild(recaudadoCell);
        tbody.appendChild(row);
    });

    tabla.style.display = "table"; // Muestra la tabla.
}
  });
</script>



<script>

    function habilitarFechas() {
        const fechaDesde2 = document.getElementById("desde").value;
        const fechaHasta2 = document.getElementById("hasta").value;

        document.getElementById("desdeList").value = fechaDesde2;
        document.getElementById("hastaList").value = fechaHasta2;
        document.getElementById("desdeList2").value = fechaDesde2;
        document.getElementById("hastaList2").value = fechaHasta2;
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
        document.getElementById('desdeList2').value = fecha1;

        var fecha2 = restarUnDia(fechaHasta);
        document.getElementById('hastaList').value = fecha2;
        document.getElementById('hastaList2').value = fecha2;



    }
    function actualizarInput() {
        var selectElement = document.getElementById("topSelect");
        var inputElement = document.getElementById("top");

        var selectedValue = selectElement.value;
        inputElement.value = selectedValue;
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
            'background-color': '#2b2d42', // Cambia el color de fondo a azul
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

<script>
    /*$(document).ready(function () {
      // Agregar un controlador de eventos al campo de fecha "Hasta"
      $("#hasta").change(function () {
          // Obtén las fechas "Desde" y "Hasta"
          var fechaDesde = new Date($("#desde").val());
          var fechaHasta = new Date($(this).val());
  
          // Recorre todas las filas de la tabla
          $("#table tbody tr").each(function () {
              // Obtén la fecha de la fila
              var fechaFila = new Date($(this).find("td:eq(2)").text()); // Ajusta el índice según la posición de la columna de fecha
  
              // Comprueba si la fecha está dentro del rango
              if (fechaFila >= fechaDesde && fechaFila <= fechaHasta) {
                  // Muestra la fila si la fecha está dentro del rango
                  $(this).show();
              } else {
                  // Oculta la fila si la fecha está fuera del rango
                  $(this).hide();
              }
          });
  
          // Realizar el filtrado en el DataTable
          $("#table").DataTable().draw();
      });
  });
  /*$(document).ready(function () {
          // Inicializa la tabla DataTables
          var table = $('#table').DataTable();
  
          function filtrarPorFechas() {
              var fechaDesde = new Date($("#desde").val());
              var fechaHasta = new Date($("#hasta").val());
  
              table.draw(); // Vuelve a dibujar la tabla para aplicar la paginación
  
              // Escucha el evento de cambio de página en DataTables
              $('#table').on('draw.dt', function () {
                  // Filtra las filas de la tabla según las fechas
                  table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                      var fechaFila = new Date($(this.cell(rowIdx, 2).data()); // Ajusta el índice según la posición de la columna de fecha
                      if (fechaFila < fechaDesde || fechaFila > fechaHasta) {
                          this.nodes().to$().hide(); // Oculta la fila si la fecha está fuera del rango
                      } else {
                          this.nodes().to$().show(); // Muestra la fila si la fecha está dentro del rango
                      }
                  });
              });
          }
      });*/

    /*$(document).ready(function () {
        // La función que se ejecutará cuando cambie la fecha "Hasta"
        function filtrarPorFechas() {
            var fechaDesde = new Date($("#desde").val());
            var fechaHasta = new Date($("#hasta").val());
    
            $("#table tbody tr").each(function () {
                var fechaFila = new Date($(this).find("td:eq(2)").text());
    
                if (fechaFila >= fechaDesde && fechaFila <= fechaHasta) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
    
            var fechaSeleccionada = new Date(document.getElementById("desde").value);
            var fechaServicio = restarUnDia(fechaSeleccionada);
            document.getElementById('desdeList').value = fechaServicio;
    
            var fechaHasta = new Date(document.getElementById("hasta").value);
            var fecha2 = restarUnDia(fechaHasta);
            document.getElementById('hastaList').value = fecha2;
        }
    
        // Aplicar el filtro al cargar la página y cuando cambie la fecha "Desde"
        $("#desde, #hasta").change(filtrarPorFechas);
        
    });
    
      /*$(document).ready(function () {
        $("#btn-generar").click(function () {
          // Obtén las fechas "Desde" y "Hasta"
          var fechaDesde = new Date($("#desde").val());
    
          var fechaHasta = new Date($("#hasta").val());
    
    
          // Recorre todas las filas de la tabla
          $("#table tbody tr").each(function () {
            // Obtén la fecha de la fila
            var fechaFila = new Date($(this).find("td:eq(2)").text()); // Ajusta el índice según la posición de la columna de fecha
    
            // Comprueba si la fecha está dentro del rango
            if (fechaFila >= fechaDesde && fechaFila <= fechaHasta) {
              // Muestra la fila si la fecha está dentro del rango
              $(this).show();
            } else {
              // Oculta la fila si la fecha está fuera del rango
              $(this).hide();
            }
          });
          var fechaSeleccionada = new Date(document.getElementById("desde").value);
    
          var fechaServicio = restarUnDia(fechaSeleccionada);
          document.getElementById('desdeList').value = fechaServicio;
          var fechaHasta = new Date(document.getElementById("hasta").value);
    
          var fecha2 = restarUnDia(fechaHasta);
          document.getElementById('hastaList').value = fecha2;
        });
      });*/
</script>