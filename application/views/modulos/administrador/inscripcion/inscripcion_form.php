
<div class="container mt-4">
    <div class="row">
        
        <div class="col-md-12">
            <div class="card" style="margin: 2px;">
                <div class="card-header">
                    <h2>Nueva Inscripción</h2>
                </div>
                <form class=""  autocomplete="off" method="post">
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-4">
                            <!-- Contenido de la columna 1 -->
                            <label for="nombre" class="form-label">Buscar cliente por C.I. : <span class="required">*</span></label>
                            <div div class="input-group mb-2">
                                        
                            <input class="form-control" autocomplete="off" id="search" name="cliente" type="text"  value="<?php echo isset($infocliente['ci']) ? $infocliente['ci'] : ''; ?>" />
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">
                                            Crear
                                            </button>
                                        
                            </div>
                            <div id="clientes_results" class="results-container">
                                           
                                        </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                        <label for="">Nombre completo:</label>
                                        <input type="hidden" id="idCliente" name="idCliente" value="<?php echo isset($infocliente['id']) ? $infocliente['id'] : ''; ?>" />
                                        <div class="input-group">
                                        <input type="text" class="form-control" disabled="disabled" name="nombreCliente" id="nombreCliente" value="<?php echo isset($infocliente) ? $infocliente['nombres'] . ' ' . $infocliente['primerApellido'] . ' ' . $infocliente['segundoApellido'] : ''; ?>" />


                                        </div>
                                    </div>
                            <!-- Contenido de la columna 2 -->
                        </div>
                        <div class="col-md-2">
                            <label for="">Fecha:</label>
                                    <?php
                                    date_default_timezone_set('America/La_Paz');
                                    $fecha_actual = date('d-m-Y ');
                                    ?>
                                    <input type="text" id="fecha" name="fecha" value="<?php echo $fecha_actual; ?>" disabled="disabled" readonly name="fecha">
                                    <input type="hidden" id="fechaPres" name="fechaPres"><!-- Contenido de la columna 3 -->
                        </div>
                    </div>
                    <h5>Detalle de la venta</h5>
                    <hr>
                    <div class="row">
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="">Servicio:</label>
                                        <div class="input-group">
                                            <input type="text"  class="form-control" autocomplete="off" id="servicio" name="servicio">
                                            <span class="input-group-btn"></span>
                                        </div>
                                        <div id="servicios_results"></div>
                                        <input type="hidden" id="idservicio" name="idservicio">
                                        <input type="hidden" id="precio" name="precio">
                                        <input type="hidden" id="precioS" name="precioS">
                                    </div>
                                    
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label>Grupo:</label>
                                        <div class="form-group">
                                            <select class="form-control" id="grupo" name="grupo">
                                                <option value="">Selecciona un servicio primero</option>
                                            </select>
                                        </div>
                                        <input type="hidden" id="nombregrupo"name="nombregrupo">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 id="card-instructor">Instructor:</h4>
                                        </div>
                                        <div class="card-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>Día</th>
                                                        <th>Horario</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="tabla-dias">
                                                    <!-- Los datos de la tabla se llenarán con JavaScript -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                            <div class="col-md-3 col-sm-12">
                            <div class="input-group">
                                <input type="date" class="form-control" id="fechaActual" name="fechaInicio">
                                
                            </div>
                            <label class="input-group-text" for="fechaInicio">
                                    Desde </i>
                                </label>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="input-group">
                            
                                <input type="date" class="form-control" id="fechaFin" name="fechaFinalizacion">
                                
                            </div>
                            <label class="input-group-text" for="fechaFinalizacion">
                                    Hasta </i>
                                </label>
                            
                        </div>
                        
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5 col-sm-12 offset-md-2 ml-4">
        <div class="container mt-4">
        <div class="col-md-3 col-sm-12 mt-2">
    <button id="agregarBtn" class="btn btn-primary" type="button">Agregar</button>
</div>

       


            
                        
                       

                        
                    </div>
                </div>
            </div>
            
        </div>
       
    </section>
    
</div>



                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>



    

        


    
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br>

            <h5>Servicios</h5>
            <hr>

            <div class="table-responsive">
                <table class="table table-hover table-bordered tabla-especifica" id="tabla">
                    <thead>
                        <tr>
                            <th>idCliente</th>
                            <th>idServicio</th>
                            <th>fecha</th>
                            <th>Servicio</th>
                            <th>Grupo</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha fin</th>
                            <th>Precio</th>
                            <th>Descuento</th>
                            <th>Cantidad</th>
                            <th>Importe</th>
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Your table body content goes here -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="text-right">Total</th>
                            <td>
                                <input type="number" id="total" name="total" value="0"  disabled="disabled" style="border: 2px solid; outline: none; width: 90px; font-size: 15px;">
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <input class="form-control" type="hidden" autocomplete="off" name="idUsuario" value="<?php echo $this->session->userdata('id'); ?>" />
            </div>

            <div class="form-group">
                <button id="guardarInscripcion" type="submit" class="btn btn-primary btn-flat btn-guardar" type="button">Guardar</button>
                <button type='reset' class="btn btn-success">Limpiar</button>
            </div>
        </div>
    </div>
</div>

                            

                        </div>
                        
                        </div>
                       
                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                        
                       

                        
                    </div>
                </div>
            </div>
            
        </div>
       
    </section>
    
</div>


<div class="modal fade" id="modal-venta">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la orden</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button id="btn-cmodal" type="button" class="btn btn-danger pull-left btn-cerrar-imp" data-dismiss="modal">Cerrar</button>
    <button type="button" class="btn btn-primary btn-flat btn-print"><span class="fa fa-print"></span> Imprimir</button>
      </div>
    </div>
    
  </div>
 
</div>
<div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="miModalLabel">Formulario de Registro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <form  id="registroForm" method="post" novalidate>
          <span class="section">Información Personal</span>

          <div class="mb-3">
            <label for="nombres" class="form-label">Nombres:</label>
            <input type="text" class="form-control" id="nombresM" name="nombresM" required="required" />
          </div>

          <div class="mb-3">
            <label for="primerApellido" class="form-label">Primer Apellido:</label>
            <input type="text" class="form-control" id="primerApellidoM" name="primerApellidoM" required="required" />
          </div>

          <div class="mb-3">
            <label for="segundoApellido" class="form-label">Segundo Apellido:</label>
            <input type="text" class="form-control" id="segundoApellidoM" name="segundoApellidoM" />
          </div>

          <div class="mb-3">
            <label for="ci" class="form-label">Carnet de Identidad:</label>
            <input type="text" class="form-control" id="ciM" name="ciM" required="required" />
          </div>

          <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <input type="tel" class="form-control" id="telefonoM" name="telefonoM" required="required" />
          </div>

          <div class="mb-3">
            <label for="fecha" class="form-label">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" id="fechaM" name="fechaM" required="required" />
          </div>

          <div class="mb-3">
            <label for="sexo" class="form-label">Sexo:</label>
            <select class="form-select" id="sexoM" name="sexoM">
              <option value="Masculino">Masculino</option>
              <option value="Femenino">Femenino</option>
              <option value="Otro">Otro</option>
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Registrar</button>
            <button type="reset" class="btn btn-success">Limpiar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



              
</div>
        </div>
        
    </div>
    


                  
      </div>
    </div>
    <style>
        /* CSS para ocultar las tres primeras columnas (índices 0, 1 y 2) */
        table.tabla-especifica tbody th:nth-child(0),
        table.tabla-especifica tbody td:nth-child(0),
        table.tabla-especifica tbody th:nth-child(1),
        table.tabla-especifica tbody td:nth-child(1),
        table.tabla-especifica tbody th:nth-child(2),
        table.tabla-especifica tbody td:nth-child(2),
        table.tabla-especifica tbody th:nth-child(3),
        table.tabla-especifica tbody td:nth-child(3),
        table.tabla-especifica thead th:nth-child(0),
        table.tabla-especifica thead td:nth-child(0),
        table.tabla-especifica thead th:nth-child(1),
        table.tabla-especifica thead td:nth-child(1),
        table.tabla-especifica thead th:nth-child(2),
        table.tabla-especifica thead td:nth-child(2),
        table.tabla-especifica thead th:nth-child(3),
        table.tabla-especifica thead td:nth-child(3) {
            display: none;
}
    </style>
  
    <style>
                .results-container {
                    position: relative;
                }

                .result-item {
                    font-size: 16px; /* Ajusta el tamaño de fuente según tus preferencias */
                    padding: 5px;
                    border: 1px solid #ccc;
                    background-color: #fff;
                    cursor: pointer;
                }

                .result-item:hover {
                    background-color: #f0f0f0;
                }

            </style>
    <script src="<?php echo base_url();?>adminTemplate/bootstrap/bootstrap3-typeahead.js"></script>
    <script src="<?php echo base_url();?>adminTemplate/bootstrap/bootstrap3-typeahead.min.js"></script>

    
<script>
    function quitarMinutos(horaCompleta) {
  const partesHora = horaCompleta.split(':'); // Divide la hora en sus partes (horas, minutos, segundos)
  const horaSinMinutos = partesHora[0] + ':' + partesHora[1]; // Combina solo las horas y los minutos
  return horaSinMinutos;
}
</script>
<script>
$(document).ready(function () {
    $("#registrar").on("click", function () {
        // Obtener los datos del formulario
        var nombres = $("#nombresM").val();
        var primerApellido = $("#primerApellidoM").val();
        var segundoApellido = $("#segundoApellidoM").val();
        var ci = $("#ciM").val();
        var telefono = $("#telefonoM").val();
        var fechaNacimiento = $("#fechaM").val();
        var sexo = $("#sexoM").val();

        // Crear un objeto con los datos del formulario
        var formData = {
            nombres: nombres,
            primerApellido: primerApellido,
            segundoApellido: segundoApellido,
            ci: ci,
            telefono: telefono,
            fechaNacimiento: fechaNacimiento,
            sexo: sexo
        };

        // Enviar los datos al controlador PHP usando AJAX
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/cliente/agregarmodal'); ?>",
            data: formData,
            success: function (response) {
                // Aquí puedes manejar la respuesta del servidor, si es necesario
                console.log(response);
                // Cierra el modal después de realizar el registro
                $("#miModal").modal("hide");
            }
        });
    });
});

   </script> 
<script>

document.getElementById('agregarBtn').addEventListener('click', function () {
    // Obtener el valor de servicio antes de limpiar
    var servicio = document.getElementById('servicio').value;

    var idCliente = document.getElementById('idCliente').value;

    // Verificar si los campos "idCliente" y "servicio" están vacíos
    if (idCliente.trim() === '' || servicio.trim() === '') {
        alert("Los campos D.N.I y servicio no pueden estar vacíos. Por favor, completa ambos campos.");
        return; // Detiene el proceso si los campos están vacíos
    }

    // Obtener el resto de los valores necesarios
    var idServicio = document.getElementById('idservicio').value;
    var fecha = document.getElementById('fecha').value;
    var grupo = document.getElementById('nombregrupo').value;
    var fechaInicio = document.getElementById('fechaActual').value;
    var fechaFin = document.getElementById('fechaFin').value;
    var precio = document.getElementById('precio').value;
    
    var descuento = ''; // Deja en blanco
    var cantidad = '1'; // Deja en blanco
    var importe = ''; // Deja en blanco

    var tabla = document.getElementById('tabla').getElementsByTagName('tbody')[0];
    var newRow = tabla.insertRow(tabla.rows.length);

    var cells = [];
    for (var i = 0; i < 12; i++) {
        cells[i] = newRow.insertCell(i);
    }

    cells[0].innerHTML = idCliente;
    cells[1].innerHTML = idServicio;
    cells[2].innerHTML = fecha;
    cells[3].innerHTML = servicio;
    cells[4].innerHTML = grupo;
    cells[5].innerHTML = fechaInicio;
    cells[6].innerHTML = fechaFin;
    /*//precio
    var precioInput = document.createElement('input');
    precioInput.type = 'number';
    precioInput.value = precio;
    precioInput.id = 'precio2';
    precioInput.disabled = true;
*/
    cells[7].innerHTML = precio;
     
    // Crear un input para el descuento
    var descuentoInput = document.createElement('input');
    descuentoInput.type = 'number';
    descuentoInput.min = 0;
    descuentoInput.max = 100;
    descuentoInput.value = 0;
    descuentoInput.id = 'descuento';

    /*descuentoInput.addEventListener('input', function () {
        var descuentoValue = parseFloat(this.value);
        var precioValue = parseFloat(precio);

        if (!isNaN(descuentoValue) && !isNaN(precioValue)) {
            var importeValue = precioValue * (1 - descuentoValue / 100);
            importeInput.value = importeValue;
            
            // Recalculate the total when the discount changes
            recalculateTotal();
        }
    });*/
    descuentoInput.addEventListener('input', function () {
    var descuentoValue = parseFloat(this.value);
    var precioValue = parseFloat(precio);

    if (!isNaN(descuentoValue) && !isNaN(precioValue)) {
        var importeValue = precioValue * (1 - descuentoValue / 100);
        importeInput.value = importeValue.toFixed(2); // Formatear a dos decimales
        recalculateTotal(); // Recalcular el total cuando cambia el descuento
    }
});
 

    var importeInput = document.createElement('input');
    importeInput.type = 'number';
    importeInput.min = 0;
    importeInput.value = precio;
    importeInput.id = 'importe';
    importeInput.style.width = '80px';
    importeInput.setAttribute('readonly', 'readonly');
importeInput.setAttribute('disabled', 'disabled');

    cells[8].appendChild(descuentoInput);
    cells[9].innerHTML = cantidad;
    cells[10].appendChild(importeInput);

    // Agregar un botón para eliminar la fila
    var eliminarButton = document.createElement('button');
eliminarButton.className = 'btn btn-danger';

// Agregar el SVG como contenido del botón
eliminarButton.innerHTML = `
    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M14.3955 9.59497L9.60352 14.387" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M14.3971 14.3898L9.60107 9.59277" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
        <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
    </svg>`;

eliminarButton.addEventListener('click', function () {
    // Obtener la fila a la que pertenece el botón y eliminarla
    var fila = this.parentNode.parentNode;
    fila.parentNode.removeChild(fila);
    
    // Recalculate the total when a row is removed
    recalculateTotal();
});

cells[11].appendChild(eliminarButton);

    configurarFechas();

    // Limpiar los valores de los input después de agregar la fila
    document.getElementById('servicio').value = '';
    document.getElementById('grupo').value = '';

    // Restablecer el campo "servicio" a su valor original
    document.getElementById('servicio').value = servicio;

    // Function to recalculate the total
    function recalculateTotal() {
        var totalImporte = 0;
        var tabla = document.getElementById('tabla').getElementsByTagName('tbody')[0];
        var filas = tabla.getElementsByTagName('tr');
        for (var i = 0; i < filas.length; i++) {
            var importeCell = filas[i].getElementsByTagName('td')[10]; // 10 is the index for the importe column
            var importeInput = importeCell.getElementsByTagName('input')[0];
            var importeValue = parseFloat(importeInput.value);
            if (!isNaN(importeValue)) {
                totalImporte += importeValue;
            }
        }
        // Update the total input with the calculated totalImporte
        document.getElementById('total').value = totalImporte;
    }

    recalculateTotal(); // Call this initially to set the initial total value
});









      



</script>

    <script>
         function configurarFechas() {
            var fechaActualInput = document.getElementById('fechaActual');
            var fechaFinInput = document.getElementById('fechaFin');

            var actualizarFechaFin = function() {
                var fechaActual = new Date(fechaActualInput.value);
                var fechaFin = new Date(fechaActual);
                fechaFin.setMonth(fechaFin.getMonth() + 1);
                fechaFin.setDate(fechaFin.getDate() + 1);// Agrega un mes

                // Fecha mínima para fechaActual
                var minDate = new Date();
                minDate.setHours(0, 0, 0, 0);
                fechaActualInput.min = minDate.toISOString().split('T')[0];

                var formatoFecha = function(date) {
                    var yyyy = date.getFullYear();
                    var mm = (date.getMonth() + 1).toString().padStart(2, '0');
                    var dd = date.getDate().toString().padStart(2, '0');
                    return yyyy + '-' + mm + '-' + dd;
                };

                fechaFinInput.value = formatoFecha(fechaFin);
                fechaFinInput.min = formatoFecha(fechaActual);
            };

            fechaActualInput.addEventListener('input', actualizarFechaFin);

            // Mostrar la fecha actual inicialmente
            var fechaActualInicial = new Date();
            fechaActualInicial.setHours(0, 0, 0, 0);
            fechaActualInput.value = fechaActualInicial.toISOString().split('T')[0];
            
            // Configurar fechas inicialmente
            actualizarFechaFin();
        }

        // Llama a la función para configurar las fechas cuando se carga la página
        configurarFechas();
    </script>




    <script>
// Función de validación para el Carnet de Identidad
function validarCarnet() {
    var carnet = document.getElementById("carnet").value.trim();
    var carnetRegex = /^[0-9]+$/;
    var errorCarnet = document.getElementById("errorCarnet");

    if (!carnetRegex.test(carnet) ) {
        errorCarnet.innerHTML = "Nit inválido.";
        return false;
    } else {
        errorCarnet.innerHTML = "";
        return true;
    }
}

// Función de validación para Nombres
function validarNombres() {
    var nombres = document.getElementsByName("nombres")[0].value.trim();
    var nombresRegex =/^[A-Za-zÁáÉéÍíÓóÚúÑñ\s']+$/;
    var errorNombres = document.getElementById("errorNombres");

    if (!nombresRegex.test(nombres) || nombres === "") {
        errorNombres.innerHTML = "Razón Social inválido";
        return false;
    } else {
        errorNombres.innerHTML = "";
        return true;
    }
}

// Función de validación para el formulario completo
function validarFormulario() {
    return (
        validarCarnet() &&
        validarNombres() 
    );
}
</script>


<script>
    
    $(document).ready(function () {
    var resultsContainer = $('#clientes_results');
    var selectedResult = false;

    $('#search').on('input', function () {
        var query = $(this).val();

        if (selectedResult) {
            resultsContainer.empty();
            resultsContainer.hide();
            return;
        }

        if (query === '') {
            resultsContainer.empty();
            resultsContainer.hide();
            return;
        }

        $.ajax({
            url: "<?php echo base_url('index.php/cliente/search_results'); ?>",
            method: "POST",
            data: { query: query },
            success: function (data) {
                resultsContainer.empty();
                var results = JSON.parse(data);
                if (results.length > 0) {
                    $.each(results, function (key, value) {
                        var optionValue = '';

                        if (/^\d+$/.test(query) && value.ci.includes(query)) {
                            optionValue = value.ci;
                        } else if (new RegExp(query, 'i').test(value.nombres) || new RegExp(query, 'i').test(value.primerApellido) || new RegExp(query, 'i').test(value.segundoApellido)) {
                            optionValue = value.nombres + ' ' + value.primerApellido + ' ' + value.segundoApellido;
                        }

                        if (optionValue) {
                            var resultItem = $('<div class="result-item"></div>').text(optionValue);
                            resultItem.on('click', function() {
                                $('#search').val(optionValue);

                                // Cargar el nombre completo del cliente en el input con id "nombreCliente"
                                $('#nombreCliente').val(value.nombres + ' ' + value.primerApellido + ' ' + value.segundoApellido);
                                
                                // Cargar el id del cliente en el input con id "idCliente"
                                $('#idCliente').val(value.id);

                                resultsContainer.empty();
                                resultsContainer.hide();
                                selectedResult = true;
                            });
                            resultsContainer.append(resultItem);
                        }
                    });
                    resultsContainer.show();
                } else {
                    resultsContainer.hide();
                }
            }
        });
    });

    $('#search').on('input', function() {
        if ($(this).val() === '') {
            selectedResult = false;
        }
    });

    $('#search').on('blur', function () {
        setTimeout(function() {
            if (!resultsContainer.is(':hover')) {
                resultsContainer.empty();
                resultsContainer.hide();
            }
        }, 100);
    });
});

    




    


   
</script>
<script>
    
    $(document).ready(function () {
    var resultsContainer = $('#servicios_results');
    var selectedResult = false;
    

    $('#servicio').on('input', function () {
        var query = $(this).val();

        if (selectedResult) {
            resultsContainer.empty();
            resultsContainer.hide();
            return;
        }

        if (query === '') {
            resultsContainer.empty();
            resultsContainer.hide();
            return;
        }

        $.ajax({
            url: "<?php echo base_url('index.php/servicio/search_results'); ?>",
            method: "POST",
            data: { query: query },
            success: function (data) {
                resultsContainer.empty();
                var results = JSON.parse(data);
                if (results.length > 0) {
                    $.each(results, function (key, value) {
                        var optionValue = '';

                        if (new RegExp(query, 'i').test(value.nombre)) {
                            optionValue = value.nombre;
                        }

                        if (optionValue) {
                            
                            var resultItem = $('<div class="result-item"></div>').text(optionValue);
                            
                            resultItem.on('click', function () {
                                $('#servicio').val(optionValue);
                                $('input[name="idservicio"]').val(value.id);
                                $('input[name="precioS"]').val(value.precioSeccion);
                                        
                                $('input[name="precio"]').val(value.precioMensual);

                                resultsContainer.empty();
                                resultsContainer.hide();
                                selectedResult = true;

                                // Una vez seleccionado el servicio, obtén y carga los grupos
                                obtenerGrupos(value.id);
                            });
                            resultsContainer.append(resultItem);
                        }
                    });
                    resultsContainer.show();
                } else {
                    resultsContainer.hide();
                }
            }
        });
    });

    $('#servicio').on('input', function () {
        if ($(this).val() === '') {
            selectedResult = false;
        }
    });

    $('#servicio').on('blur', function () {
        setTimeout(function () {
            if (!resultsContainer.is(':hover')) {
                resultsContainer.empty();
                resultsContainer.hide();
            }
        }, 100);
    });

    $('#grupo').on('change', function () {
        var idServicio = $('#idservicio').val();
        var grupo = $(this).val();

        if (idServicio && grupo) {
            obtenerDatosCard(idServicio, grupo);
        }
    });
    
    $('#grupo').on('change', function () {
        var idServicio = $('#idservicio').val();
        var grupo = $(this).val();
        if (idServicio && grupo) {
            // Guardar el valor del grupo en el input "nombregrupo"
            $('#nombregrupo').val($(this).find('option:selected').text());
            obtenerDatosCard(idServicio, grupo);
        }
    });
    function obtenerGrupos(servicioId) {
        $.ajax({
            url: "<?php echo base_url('index.php/servicio/get_grupos'); ?>",
            method: "POST",
            data: { idservicio: servicioId },
            success: function (data) {
                var grupos = JSON.parse(data);
                var selectGrupo = $('#grupo');
                selectGrupo.empty();
                if (grupos.length > 0) {
                    $.each(grupos, function (key, value) {
                        selectGrupo.append($('<option>', {
                            value: value.id,
                            text: value.grupo
                        }));
                    });
                } else {
                    selectGrupo.append($('<option>', {
                        value: '',
                        text: 'No hay grupos disponibles'
                    }));
                }
            }
        });
    }

    function obtenerDatosCard(idServicio, grupo) {
        $.ajax({
            url: "<?php echo base_url('index.php/servicio/datos_card'); ?>",
            method: "POST",
            data: { idservicio: idServicio, grupo: grupo },
            success: function (data) {
                var datos = JSON.parse(data);
                if (datos) {
                    // Actualiza el contenido del card con los datos obtenidos
                    actualizarCard(datos);
                }
            }
        });
    }

    function actualizarCard(datos) {
        // Actualiza el contenido del card con los datos del instructor
        var instructorInfo = "Instructor: " + datos[0].nombres + " " + datos[0].primerApellido+ " " + datos[0].segundoApellido;
            console.log('Información del instructor:', instructorInfo);

            $('#card-instructor').text(instructorInfo);

            var tabla = $('#tabla-dias');
            tabla.empty();

            datos.forEach(function(item) {
                var fila = $("<tr></tr>");
                fila.append("<td>" + item.dia+ "</td>");
                fila.append("<td>" + quitarMinutos(item.horaInicio) + "-"+ quitarMinutos(item.horaFin)+ "</td>");
                
                tabla.append(fila);
            });





    }
    function actualizaCard(datos) {
    console.log('Datos recibidos:', datos);

    var instructorInfo = "Instructor: " + datos.nombres + " " + datos.primerApellido;
    console.log('Información del instructor:', instructorInfo);

    var tabla = $('#tabla-dias');
    tabla.empty();
    $.each(datos.dias, function (key, value) {
        var fila = $("<tr></tr>");
        fila.append("<td>" + value.dia + "</td>");
        fila.append("<td>" + value.horaInicio + "</td>");
        fila.append("<td>" + value.horaFin + "</td>");
        tabla.append(fila);
    });
}
});

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">


$(document).ready(function () {
    $('#guardarInscripcion').click(function () {
        var detalles = [];

        // Recorre las filas de la tabla y obtiene los datos
        $('.tabla-especifica tbody tr').each(function () {
            var idServicio = $(this).find('td:eq(1)').text();
            var cantidad = $(this).find('td:eq(9)').text();
            var precioUnitario = $(this).find('td:eq(7)').text();
            var fechaInicio = $(this).find('td:eq(5)').text();
            var fechaFin = $(this).find('td:eq(6)').text();
            var descuento = $(this).find('td:eq(8) input').val(); // Nota: el descuento puede estar en un input

            var detalle = {
                idServicio: idServicio,
                cantidad: cantidad,
                precioUnitario: precioUnitario,
                fechaInicio: fechaInicio,
                fechaFin: fechaFin,
                descuento: descuento
            };

            detalles.push(detalle);
        });

        var idCliente = $('#idCliente').val();
        var idUsuario = $('#idUsuario').val();
        var fecha = $('#fecha').val();
        var total = $('#total').val();

        // Envía los datos al controlador a través de AJAX
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url(); ?>index.php/inscripcion/nuevaInscripcion",
            data: {
                idCliente: idCliente,
                idUsuario: idUsuario,
                fecha: fecha,
                total: total,
                detalles: detalles
            },
            success: function (response) {
    if (response.status === 'success') {
        
        var idVenta = response.idVenta;
        var comprobanteUrl = "<?php echo base_url(); ?>index.php/inscripcion/comprobante?id=" + idVenta;
        window.open(comprobanteUrl, '_blank');
        window.location.href = "<?php echo base_url(); ?>index.php/inscripcion/index";
    } else {
        alert('Error en la transacción');
    }
}
        });
    });
});
</script>


   