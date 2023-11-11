 <!-- page content -->
 <div class="right_col card" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                            <div class="text-center">
                                                    <h2>LISTA DE INSCRIPCIONES<small></small></h2>
                                                    <br>
</div>
                                <div class="x_title">
                                
                                    <div class="clearfix"></div>
                                    <a href="<?php echo base_url(); ?>index.php/recepcion/inscripcion/agregar" class="text-left">
                                <button type="button" class="btn btn-primary">
                                <i class="fa fa-plus"> Nuevo Inscripcion</i>
                                </button>
                            </a>
                                </div>
                                <div class="x_content">
                                <div class="container mt-4">
        
                        
                       
                                
                                <div class="table-responsive">
                                <table  id="miTabla" class="display">
                                    <thead>
                                        <tr>
                                        <th>N°</th>
                                            <th>Cliente</th>
                                            <th>Fecha Inscripcion</th>
                                            <th>Total</th>
                                            <th ></th>
                                            <th ></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$indice=1;
foreach($inscripcion->result() as $row){
?>  
                                    <tr>
                          <td><?php echo $indice; ?></td>
                          <td><?php echo $row->nombre_completo; ?></td>
                          <td><?php echo $row->fecha_venta; ?></td>
                          <td><?php echo $row->total; ?></td>
                          <td>
                          <!--- coprobante---------->
                          <?php
                            echo form_open_multipart('recepcion/inscripcion/comprobante', array('target' => '_blank'));
                            ?>
                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                            <button type="submit" class="btn btn-small btn-success"style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 10px;">
                            <i class="fa fa-trash">
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
                                </i>
                            </button>

                            <?php
                            echo form_close();    
                            ?>
                            <!----------- anular----------->
                          </td>
                          <td>
                           <!-- Eliminar------> 
                            <?php
                            echo form_open_multipart('recepcion/inscripcion/eliminarbd');
                            ?>
                            
                            <button type="submit" class="btn btn-small btn-danger" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 10px;">
                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">
<i class="fa fa-trash">
                              <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.3955 9.59497L9.60352 14.387" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M14.3971 14.3898L9.60107 9.59277" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </i>
                            </button>

                            <?php
                            echo form_close();    
                            ?>
                                        
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
                    </div>
                </div>
            </div>
            
                        
                       

                        
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


    </div>
    <script src="<?php echo base_url();?>adminTemplate/bootstrap/bootstrap3-typeahead.js"></script>
    <script src="<?php echo base_url();?>adminTemplate/bootstrap/bootstrap3-typeahead.min.js"></script>

    <





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
    
    $(document).ready(function() {
        $('#ci').on('input', function() {
            var ci = $(this).val();
            if (ci.length >= 1) {
                $.post('<?php echo base_url('index.php/recepcion/cliente/buscar'); ?>', {
                        ci: ci
                    },
                    function(data) {
                        var result = '';
                        var clientes = JSON.parse(data);
                        for (var i = 0; i < clientes.length; i++) {
                            result += '<p class="cliente-item" data-ci="' + clientes[i].ci + '" data-id="' + clientes[i].id + '" data-nombre="' + clientes[i].nombres + '" data-apellidoP="' + clientes[i].primerApellido + '" data-apellidoM="' + clientes[i].segundoApellido + '">' + clientes[i].ci + '</p>';
                        }
                        $('#result').html(result);
                    });
            } else {
                // Vaciar el campo razonSocial cuando ci esté vacío
                $('#result').empty();
                $('#ci').val('');
                $('#id').val('');
                $('#nombre').val('');
            }
        });

        $('#result').on('click', '.cliente-item', function() {
            var selectedCI = $(this).data('ci');
            var selectedID = $(this).data('id');
            var selectedN = $(this).data('nombre');
            var selectedAP = $(this).data('apellidoP');
            var selectedAM = $(this).data('apellidoM');
            


            $('#ci').val(selectedCI);
            $('#id').val(selectedID);
            $('#nombre').val(selectedN);
            $('#primerApellido').val(selectedAP);
            $('#segundoApellido').val(selectedAM);
            $('#result').empty();
            
        });

    });
</script>
<script>
    $(document).ready(function () {
        var resultsContainer = $('#servicios_results');
        var selectedResult = false;

        $('#grupo').on('change', function () {
            var idServicio = $('#idservicio').val();
            var grupo = $(this).val();

            if (idServicio && grupo) {
                obtenerDatosCard(idServicio, grupo);
            }
        });

        function obtenerDatosCard(idServicio, grupo) {
            $.ajax({
                url: "<?php echo base_url('index.php/recepcion/servicio/datos_card'); ?>",
                method: "POST",
                data: { idServicio: idServicio, grupo: grupo },
                success: function (data) {
                    var datos = JSON.parse(data);
                    if (datos) {
                        // Actualiza el contenido de la tarjeta con los datos obtenidos
                        actualizarCard(datos);
                    }
                }
            });
        }

        function actualizarCard(datos) {
            // Actualiza el contenido del card con los datos recibidos
            var instructorInfo = "Instructor: " + datos.nombres + " " + datos.primerApellido + " " + datos.segundoApellido;
            $('#card-instructor').text(instructorInfo);

            // Actualiza la tabla con los datos de días, hora de inicio y hora de finalización
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



   