<?php if (isset($servicio)): ?>
    <?php
    foreach($servicio->result() as $row){
    $id_ = $row->id;
    $nombre_ = $row->nombre;
    }
    ?>
    
<?php endif ?>

<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">

              

              <!--<h3>Lista de horarios de <?php echo $row->nombre;?>  <small></small></h3>-->

              </div>

            
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <br>
                  <h3>Lista de horarios de <?php echo  $nombre_ ?> <small></small></h3>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                          <?php
                            echo form_open_multipart('servicio/horario');
                            ?>
                            <input type="hidden" name="id" value="<?php echo  $id_  ?>" >

                            <button type="submit" class="btn btn-small btn-success"><i class="fa fa-pencil">Agregar Horario</i></button>
                            
                            <?php
    echo form_close();
    ?>
                            <div class="d-flex justify-content-end">
                              
                              
                              
                              <?php echo form_close(); ?>
                          </div>
                          <!-------- modal ------------>
                          
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">
                              CREAR HORARIO
                          </button>
                                                      
                    <div class="card-box table-responsive">
                    <table id="miTabla" class="display" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>DIA</th>
                          <th>HORARIO</th>
                          
                          <th>GRUPO</th>
                          <th>INSTRUCTOR</th>
                          
                          <th ></th>
                          <th ></th>
                        </tr>
                      </thead>
                      <tbody>
                      

<?php
$indice = 1;
foreach ($infoservicio as $row) {
    // Obtén información del instructor
    $idinstructor = $row['idInstructor'];
    $instructor_info = $this->instructor_model->obtenerinstructorinfo($idinstructor);

    // Obtén información del servicio
    $servicio_id = $row['idServicio'];
    $servicio_info = $this->servicio_model->obtenerservicioinfo($servicio_id);

    // Obtén información del horario
    $horario_id = $row['idHorario'];
    $horario_info = $this->horario_model->obtenerhorarioinfo($horario_id);

    $grupo=$row['grupo'];
    
    // Ahora puedes usar $instructor_info, $servicio_info, y $horario_info en tu tabla
?>
                        <tr>
                          <td><?php echo $indice; ?></td>
                          <td><?php echo $horario_info->dia; ?></td>
                          <td><?php echo date('H:i', strtotime($horario_info->horaInicio)) . ' - ' . date('H:i', strtotime($horario_info->horaFin)); ?></td>
                          <td><?php echo $grupo  ?></td>
                          <td><?php echo $instructor_info->nombres . ' ' . $instructor_info->primerApellido; ?></td>


                          

                          <td>
                          <?php
                            echo form_open_multipart('servicio/modificar');
                            ?>
                            <input type="hidden" name="id" value="<?php echo $servicio_info->id; ?>">
                            <input type="hidden" name="idInstructor" value="<?php echo $instructor_info->id; ?>">
                            <input type="hidden" name="idHorario" value="<?php echo $horario_info->id; ?>">

                            <button type="submit" class="btn btn-small btn-success"><i class="fa fa-pencil"></i></button>

                            <?php
                            echo form_close();    
                            ?>
                        </td>
                        <td>
                            <?php
                            echo form_open_multipart('servicio/eliminarbd');
                            ?>
                            <input type="hidden" name="id" value="<?php echo $servicio_info->id; ?>">
                            <input type="hidden" name="idInstructor" value="<?php echo $instructor_info->id; ?>">
                            <input type="hidden" name="idHorario" value="<?php echo $horario_info->id; ?>">

                            <button type="submit" class="btn btn-small btn-danger"><i class="fa fa-trash"></i></button>

                            <?php
                            echo form_close();    
                            ?>
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
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
<div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="miModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="miModalLabel">Mi Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <!-- Contenido del modal -->
                <h2>Registro de Horario del servicio para <?php echo  $nombre_ ?> <small></small></h2>
                                <div class="clearfix"></div>
                                </div>
                               
                                <div class="x_content">

                                <div class="container">
    <form class="row g-3"  method="post" novalidate>
        
        <div class="col-md-6">
            <!-- referencia de servicio --->
        <input type="text" name="idservicio" value="<?php echo  $id_  ?>">
            <div class="mb-3">
                <label for="campo1" class="form-label">INSTRUCTOR :</label>
                <input   class="form-control" autocomplete="off" id="search" name="instructor" type="text" required="required" />
                <div id="instructor_results" class="results-container">
                                                        <!-- La lista de resultados se mostrará aquí -->
                </div>
            </div>
        </div>
        

        <div class="col-md-6">
            <!-- referencia de instructor --->
        <input type="text" name="idinstructor" >
            <div class="mb-3">
                <label for="campo2" class="form-label">ESPECIALIDAD :</label>
                <input type="text" class="form-control" name="especialidad" id="especialidad"  disabled/>
            </div>
        </div>

        <!-- Segunda Fila -->
        <div class="col-md-6">
            <div class="mb-3">
                <label for="campo3" class="form-label">GRUPO :</label>
                <input type="text" class="form-control" id="grupo"name="grupo" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="campo4" class="form-label">DISPONIBILIDAD :</label>
                <input type="text" class="form-control" id="disponibilidad" name="disponibilidad" />
            </div>
        </div>

        
        <!-- Tercera Fila -->
        <div class="col-md-4">
            <!-- refecncia horario -->
        <input type="text"id="idHorario" name="idHorario">
            <div class="mb-3">
            <label for="diasSemana">DÍA :</label>
                    <select class="custom-select" name="diasSemana" id="diasSemana">
                    <option value="1">LUNES</option>
                    <option value="2">MARTES</option>
                    <option value="3">MIÉRCOLES</option>
                    <option value="4">JUEVES</option>
                    <option value="5">VIERNES</option>
                    <option value="6">SÁBADO</option>
                    <option value="7">DOMINGO</option>
                    </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mb-3">
                
                <label for="horariosDisponibles" class="form-label">HORARIOS DISPONIBLES :</label>
                <select class="form-select" id="horariosDisponibles" name="idHorario">
                    <!-- Los horarios disponibles se cargarán aquí mediante JavaScript -->
                </select>
            </div>
        </div>
        <!-- Botón Agregar -->
        <div class="col-md-4">
        <div class="mb-3">
                <button type='button' id="agregarFila" class="btn btn-primary">Agregar</button>
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
                            <th>idHorario</th>
                            <th>idServicio</th>
                            <th>idInstructor</th>
                            
                            <th>DÍA</th>
                            <th>HORARIO</th>
                            
                            <th>Opción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Your table body content goes here -->
                    </tbody>
</table>
</div>
                    <div class="form-group">
                <button id="guardarInscripcion" type="submit" class="btn btn-primary btn-flat btn-guardar" type="button">Guardar</button>
               
            </div>
</form>
        

                                    
                                    <br>
                                    
                                </div>


                                </div>
                            </div>
                        </div>



                    </div>
                </div>
      
            </div>
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
            
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            
            <script>
        $(document).ready(function() {
            $("#agregarFila").on("click", function() {
                // Obtener valores de los elementos del formulario
                var idHorario = $("#idHorario").val();
                var idservicio = $("input[name='idservicio']").val();
                var idinstructor = $("input[name='idinstructor']").val();
               
                var diasSemana = $("#diasSemana option:selected").text();
                var horariosDisponibles = $("#horariosDisponibles option:selected").text();

                // Crear nueva fila en la tabla con los valores del formulario
                var newRow = $("<tr>");
                newRow.append("<td>" + idHorario + "</td>");
                newRow.append("<td>" + idservicio + "</td>");
                newRow.append("<td>" + idinstructor + "</td>");
                
                newRow.append("<td>" + diasSemana + "</td>");
                newRow.append("<td>" + horariosDisponibles + "</td>");
                newRow.append("<td><button class='eliminarFila btn btn-danger'>Eliminar</button></td>");

                // Agregar la nueva fila a la tabla
                $("#tabla tbody").append(newRow);

                // Limpiar valores del formulario
                
                
                $("#idHorario").val("");
                $("#diasSemana").val("");
                $("#horariosDisponibles").val("");

                // Deshabilitar los campos específicos
                $("#search, #grupo, #disponibilidad").prop("disabled", true);
            });

            // Agregar la funcionalidad de eliminar fila
            $("#tabla").on("click", ".eliminarFila", function() {
                $(this).closest("tr").remove();
            });
            $("#tabla").on("click", ".eliminarFila", function() {
            $(this).closest("tr").remove();

            // Verificar si hay filas en la tabla
            if ($("#tabla tbody tr").length === 0) {
                // Si no hay filas, habilitar los campos específicos
                $("#search, #grupo, #disponibilidad").prop("disabled", false);
            }
        });
        });
    </script>      
<script>
    $(document).ready(function () {
    var resultsContainer = $('#instructor_results');
    var selectedResult = false; // Variable para rastrear si se ha seleccionado un resultado

    $('#search').on('input', function () {
        var query = $(this).val();

        // Ocultar la lista si se ha seleccionado un resultado
        if (selectedResult) {
            resultsContainer.empty();
            resultsContainer.hide();
            return;
        }

        // Ocultar la lista si el input está vacío
        if (query === '') {
            resultsContainer.empty();
            resultsContainer.hide();

            // Vaciar el valor del input 'especialidad'
            $('#especialidad').val('');
            
            return;
        }

        $.ajax({
            url: "<?php echo base_url('index.php/instructor/search_results'); ?>",
            method: "POST",
            data: { query: query },
            success: function (data) {
                resultsContainer.empty(); // Limpiar opciones anteriores
                var results = JSON.parse(data);
                if (results.length > 0) {
                    $.each(results, function (key, value) {
                        var optionValue = '';

                        // Verificar si la consulta coincide con CI
                        if (/^\d+$/.test(query) && value.ci.includes(query)) {
                            optionValue = 'DNI: ' + value.ci;
                        }
                        // Verificar si la consulta coincide con nombre o apellido
                        else if (new RegExp(query, 'i').test(value.nombres) || new RegExp(query, 'i').test(value.primerApellido) || new RegExp(query, 'i').test(value.segundoApellido)) {
                            optionValue = value.nombres + ' ' + value.primerApellido + ' ' + value.segundoApellido;
                        }

                        if (optionValue) {
                            var resultItem = $('<div class="result-item"></div>').text(optionValue);
                            resultItem.on('click', function() {
                                $('#search').val(optionValue);
                                $('input[name="idinstructor"]').val(value.id);

                                // Actualizar el valor del input 'especialidad'
                                $('#especialidad').val(value.especialidad);

                                resultsContainer.empty();
                                resultsContainer.hide();
                                selectedResult = true;
                            });
                            resultsContainer.append(resultItem);
                        }
                    });
                    resultsContainer.show(); // Mostrar la lista de resultados
                } else {
                    resultsContainer.hide(); // Ocultar la lista si no hay resultados
                }
            }
        });
    });

    // Restablecer el estado de selección cuando se borra el contenido del input
    $('#search').on('input', function() {
        if ($(this).val() === '') {
            selectedResult = false;
        }
    });

    // Ocultar la lista cuando se pierde el foco en el input
    $('#search').on('blur', function () {
        // Utilizamos un temporizador para permitir que se maneje primero el clic en el resultado
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
    <!-- Asegúrate de que jQuery esté incluido -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function () {
    // Evento cuando cambia el día
    $('#diasSemana').change(function() {
        var idDia = $(this).val();

        // Realizar una solicitud AJAX para obtener los horarios disponibles
        $.ajax({
            url: "<?php echo base_url('index.php/horario/cargarHorarios'); ?>",
            type: 'POST',
            data: { idDia: idDia },
            dataType: 'json',
            success: function(data) {
                // Obtener el select de los horarios
                var horariosSelect = $('#horariosDisponibles');

                // Limpiar opciones anteriores
                horariosSelect.empty();

                // Agregar la opción "Seleccione un horario" al principio
                horariosSelect.append('<option value="">Seleccione un horario</option>');

                // Llenar el select con los horarios disponibles
                $.each(data, function(index, horario) {
                    var option = $('<option>', {
                        value: horario.id,
                        text: convertirHoraAMinutos(horario.horaInicio) + ' - ' + convertirHoraAMinutos(horario.horaFin)
                    });
                    horariosSelect.append(option);
                });

                // Evento cuando cambia el horario
                horariosSelect.change(function() {
                    var selectedHorario = $(this).val();
                    $('#idHorario').val(selectedHorario);
                });
            }
        });
    });

    // Función para convertir la hora a minutos
    function convertirHoraAMinutos(hora) {
        var partes = hora.split(':');
        if (partes.length === 3) {
            var horas = parseInt(partes[0]);
            var minutos = parseInt(partes[1]);
            var horaMinutos = horas + ':' + (minutos < 10 ? '0' : '') + minutos;
            return horaMinutos;
        } else {
            return "Formato de hora incorrecto";
        }
    }
});
</script>
<script>
$(document).ready(function () {
    // Función para obtener los datos de la tabla
    function obtenerDatosTabla() {
        var datosTabla = [];
        $('#tabla tbody tr').each(function () {
            var idHorario = $(this).find('td:eq(0)').text();
            var idServicio = $(this).find('td:eq(1)').text();
            var idInstructor = $(this).find('td:eq(2)').text();
            
            

            datosTabla.push({
                idServicio: idServicio,
                idInstructor: idInstructor,
                idHorario: idHorario
                
                
            });
        });

        return datosTabla;
    }

    // Función para enviar los datos al controlador
    $('#guardarInscripcion').on('click', function () {
        // Obtener datos del formulario
        var grupo = $('#grupo').val();
        var disponibilidad = $('#disponibilidad').val();
        var datosTabla = obtenerDatosTabla();

        // Enviar datos mediante AJAX
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('index.php/servicio/asignarbd'); ?>', // Reemplaza 'ruta_a_tu_controlador' con la ruta correcta
            data: {
                grupo: grupo,
                disponibilidad: disponibilidad,
                datosTabla: datosTabla
            },
            success: function (response) {
                // Manejar la respuesta del controlador
                var idVenta = response.id;
                window.location.href = "<?php echo base_url(); ?>index.php/servicio/index";
            },
            error: function (error) {
              window.location.href = "<?php echo base_url(); ?>index.php/servicio/index";
            }
        });
    });
});
</script>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar cambios</button>
            </div>
        </div>
    </div>
</div>
