 <!-- page content -->
 <div class="right_col" role="main">
                <div class="">
                <?php
foreach($infoservicio->result() as $row){
?>
                    
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                        
                        <h2>Registro de Horario del servicio para <?php echo $row->nombre; ?> <small></small></h2>
                                <div class="clearfix"></div>
                                </div>
                               
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url();?>index.php/servicio/asignarbd" method="post" novalidate>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                
                                            <input type="hidden" name="idservicio" value="<?php echo $row->id;?>">
<br>
                                                <div class="form-group">
                                                    <label for="nombre" class="form-label">Instructor: <span class="required">*</span></label>
                                                    <input   class="form-control" autocomplete="off" id="search" name="instructor" type="text" required="required" />
                                                    <!--<datalist id="instructor_results"  class="results-container">
                                                        
                                                    </datalist>-->
                                                    <div id="instructor_results" class="results-container">
                                                        <!-- La lista de resultados se mostrará aquí -->
                                                    </div>

                                                </div>
                                                <input type="hidden" name="idinstructor" >


                                            <div class="col-md-6 col-sm-6">
                                                
                                            <div class="form-group">
                                                <label for="diasSemana">Selecciona un día de la semana:</label>
                                                <select class="custom-select" name="diasSemana" id="diasSemana">
                                                    <option value="1">Lunes</option>
                                                    <option value="2">Martes</option>
                                                    <option value="3">Miércoles</option>
                                                    <option value="4">Jueves</option>
                                                    <option value="5">Viernes</option>
                                                    <option value="6">Sábado</option>
                                                    <option value="7">Domingo</option>
                                                </select>
                                            </div>
                                                                                            
                                                
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="mb-3">
                                                
                                                    <!--<datalist id="instructor_results"  class="results-container">
                                                        
                                                    </datalist>-->
                                                    <h5>horarios</h5>
                                                    <div id="horariosDisponibles">
                                                        <!-- La lista de resultados se mostrará aquí -->
                                                    </div>
                                                </div>
                                                <input type="hidden"id="idHorario" name="idHorario">
                                                        <!-- La lista de resultados se mostrará aquí -->
                                                    </div>
                                            
                                                
                                            </div>
                                            
                                        </div>

                                        <div class="row">
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Grupo:<span></span></label>
											<div class="col-md-6 col-sm-6">
												<select class="form-control " name="grupo">
													<option value="Mañana">Mañana</option>
													<option value="Tarde">Tarde</option>
                                                    <option value="Nocturno">Nocturno</option>
												</select>
											</div>
                                        </div>
                                            
                                        </div>
                                        
                                        


                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Agregar</button>
                                                    <button type='reset' class="btn btn-success">Limpiar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php

}
?>

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

$(document).ready(function() {
    // Manejar el evento onchange del select
    $('#diasSemana').change(function() {
        var idDia = $(this).val();
        
        // Realizar una petición AJAX para cargar los horarios disponibles
        $.ajax({
            url: "<?php echo base_url('index.php/horario/cargarHorarios'); ?>",
            type: 'POST',
            data: { idDia: idDia },
            dataType: 'json',
            success: function(data) {
                // Limpiar el div de horarios disponibles
                $('#horariosDisponibles').empty();

                // Agregar los horarios disponibles al div
                $.each(data, function(index, horario) {
                    // Crear un elemento <p> con un atributo data-id que almacena el ID del horario en la tabla
                    var $p = $('<p>', {
                        text: convertirHoraAMinutos(horario.horaInicio) + ' - ' + convertirHoraAMinutos(horario.horaFin),
                        'data-id': horario.id // ID de la tabla
                    });

                    // Agregar un evento click para manejar la selección
                    $p.on('click', function() {
                        // Obtener el ID de la tabla del atributo data-id
                        var idHorario = $(this).data('id');

                        // Actualizar el valor en el div "horariosDisponibles"
                        $('#horariosDisponibles').text($(this).text());

                        // Actualizar el valor en el input "idHorario"
                        $('#idHorario').val(idHorario);
                    });

                    // Aplicar un estilo simple en línea
                    $p.css({
                        cursor: 'pointer',
                        padding: '5px',
                        border: '1px solid #ccc',
                        margin: '5px',
                        borderRadius: '5px',
                        backgroundColor: '#f0f0f0'
                    });

                    $('#horariosDisponibles').append($p);
                });
            }
        });
    });
});
function convertirHoraAMinutos(hora) {
    // Dividir la cadena de hora en horas, minutos y segundos
    var partes = hora.split(':');

    if (partes.length === 3) {
        var horas = parseInt(partes[0]);
        var minutos = parseInt(partes[1]);

        // Formatear la hora en "hora:minutos"
        var horaMinutos = horas + ':' + (minutos < 10 ? '0' : '') + minutos;

        return horaMinutos;
    } else {
        // Manejar un formato de hora incorrecto
        return "Formato de hora incorrecto";
    }
}




</script>