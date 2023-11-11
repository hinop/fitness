 <!-- page content -->
 <div class="right_col" role="main">
                <div class="">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                        
                        <h2>Registro de Horario del servicio para  <small></small></h2>
                                <div class="clearfix"></div>
                                </div>
                               
                                <div class="x_content">
                                <?php
foreach($infoservicio->result() as $row){
?>
                                <form class="" action="<?php echo base_url();?>index.php/administrador/servicio/modificarbdH" method="post" novalidate>
                                <input type="hidden" value="<?php echo $row->id;?>" id="idServicio" name="idServicio">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label for="nombre" class="form-label">INSTRUCTOR: <span class="required">*</span></label>
                                            <input class="form-control" value="<?php echo $row->nombre;?>"autocomplete="off" id="search" name="instructor" type="text" required="required" onblur="validarNombres()" style="text-transform: uppercase;"/>
                                            <span id="errorNombres" class="error"></span>
                                            
                                            <div id="instructor_results" class="results-container"></div>
                                            <input type="hidden" value="<?php echo $row->idInstructor;?>" name="idInstructor" id="idInstructor">
                                            
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <label for="nombre" class="form-label">ESPECIALIDAD: <span class="required">*</span></label>
                                            <input class="form-control" value="<?php echo $row->especialidad;?>" autocomplete="off" id="especialidad" name="especialidad" />
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6 col-sm-6">
                                            <label for="diasSemana">Selecciona un día de la semana:</label>
                                            <select class="custom-select" name="diasSemana" id="diasSemana">
                                                <option value="1"<?php echo ($row->dia == "1") ? 'selected' : ''; ?>>LUNES</option>
                                                <option value="2"<?php echo ($row->dia == "2") ? 'selected' : ''; ?>>MARTES</option>
                                                <option value="3"<?php echo ($row->dia == "3") ? 'selected' : ''; ?>>MIÉRCOLES</option>
                                                <option value="4"<?php echo ($row->dia == "4") ? 'selected' : ''; ?>>JUEVES</option>
                                                <option value="5"<?php echo ($row->dia == "5") ? 'selected' : ''; ?>>VIERNES</option>
                                                <option value="6"<?php echo ($row->dia == "6") ? 'selected' : ''; ?>>SÁBADO</option>
                                                <option value="7"<?php echo ($row->dia == "7") ? 'selected' : ''; ?>>DOMINGO</option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <label class="col-form-label">Grupo:</label>
                                            <select class="form-control" name="grupo">
                                                <option value="Mañana"<?php echo ($row->grupo == "Mañana") ? 'selected' : ''; ?>>Mañana</option>
                                                <option value="Tarde"<?php echo ($row->grupo == "Tarde") ? 'selected' : ''; ?>>Tarde</option>
                                                <option value="Nocturno"<?php echo ($row->grupo == "Nocturno") ? 'selected' : ''; ?>>Nocturno</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6 col-sm-6">
                                            <h5>Horarios</h5>
                                            <div id="horariosDisponibles" class="mb-3"></div>
                                            <input type="hidden" id="idHorario"  value="<?php echo $row->idHorario;?>" name="idHorario">
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary">Modificar</button>
                                            <button type='reset' class="btn btn-success">Limpiar</button>
                                        </div>
                                    </div>

                                    </form>
                                    <?php

                                                }
                                                ?>

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
                .error {
    color: red;
    font-size: 14px;
                }
            </style>
            
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            
            <script>
                function validarNombres() {
    var nombres = document.getElementsByName("nombres")[0].value.trim();
    var nombresRegex = /^[A-Za-záéíóúÁÉÍÓÚ\s]{3,12}$/;
    var errorNombres = document.getElementById("errorNombres");

    if (!nombresRegex.test(nombres) || nombres === "") {
        errorNombres.innerHTML = "Nombre inválido";
        return false;
    } else {
        errorNombres.innerHTML = "";
        return true;
    }
}
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
            // Vaciar el valor de especialidad y deshabilitar el input si el input de búsqueda está vacío
            $('#especialidad').val('');
            $('#especialidad').prop('disabled', true);
            return;
        }

        $.ajax({
            url: "<?php echo base_url('index.php/administrador/instructor/search_results'); ?>",
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

                                // Cargar la especialidad automáticamente
                                $('#especialidad').val(value.especialidad);
                                // Deshabilitar el input de especialidad
                                $('#especialidad').prop('disabled', true);

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
            // Vaciar el valor de especialidad y deshabilitar el input si el input de búsqueda está vacío
            $('#especialidad').val('');
            $('#especialidad').prop('disabled', true);
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

    // Restablecer el valor de especialidad y habilitar el input cuando se cambia de instructor
    $('input[name="idinstructor"]').on('input', function() {
        $('#especialidad').val('');
        $('#especialidad').prop('disabled', false);
    });

    // ...

});   
</script>


<script>

$(document).ready(function() {
    // Manejar el evento onchange del select
    $('#diasSemana').change(function() {
        var idDia = $(this).val();
        
        // Realizar una petición AJAX para cargar los horarios disponibles
        $.ajax({
            url: "<?php echo base_url('index.php/administrador/horario/cargarHorarios'); ?>",
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