                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>Registro de instructor<small></small></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="x_content">
                            <form class="mx-auto" action="<?php echo base_url(); ?>index.php/recepcion/instructor/agregarbd" method="post" novalidate>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="field item form-group">
                                                    <label class="col-form-label">NOMBRES: <span class="required">*</span></label>
                                                    <input class="form-control" autocomplete="off" class='optional' name="nombres" type="text" required="required" onblur="validarNombres()" style="text-transform: uppercase;"/>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="field item form-group">
                                                    <label class="col-form-label">PRIMER APELLIDO: <span class="required">*</span></label>
                                                    <input class="form-control" autocomplete="off" name="primerApellido" required="required" type="text" style="text-transform: uppercase;" onblur="validarPrimerApellido()"/>
                                                    <span id="errorApellido" class="error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="field item form-group">
                                                    <label class="col-form-label">SEGUNDO APELLIDO: <span></span></label>
                                                    <input class="form-control" autocomplete="off" type="text" name="segundoApellido" style="text-transform: uppercase;" onblur="validarSegundoApellido()" />
                                                    <span id="errorApellido2" class="error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="field item form-group">
                                                    <label class="col-form-label">CARNET DE IDENTIDAD: <span class="required">*</span></label>
                                                    <input class="form-control" autocomplete="off" class='optional' name="ci" type="text" required="required" onblur="validarCarnet()" style="text-transform: uppercase;" />
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="field item form-group">
                                                    <label class="col-form-label">TELEFONO: <span class="required">*</span></label>
                                                    <input class="form-control" autocomplete="off" type="numeric" name="telefono" required='required' data-validate-length-range="8,20" onblur="validarTelefono()" />
                                                    <span id="errorTelefono" class="error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="field item form-group">
                                                    <label class="col-form-label">DOMICILIO: <span class="required">*</span></label>
                                                    <input class="form-control" autocomplete="off" type="text" name="direccion" required='required' onblur="validarDomicilio()"data-validate-length-range="8,20" style="text-transform: uppercase;" />
                                                    <span id="errorDomicilio" class="error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="field item form-group">
                                                    <label class="col-form-label">ESPECIALIDAD: <span class="required">*</span></label>
                                                    <input class="form-control" autocomplete="off" type="text" class='tel' name="especialidad" required='required' onblur="validarEspecialidad()" data-validate-length-range="8,20" style="text-transform: uppercase;"/>
                                                    <span id="errorEspecialidad" class="error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ln_solid">
                                            <div class="form-group text-center">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">AGREGAR</button>
                                                    <button type="reset" class="btn btn-success">LIMPIAR</button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                              
            <style>
    .error {
    color: red;
    font-size: 14px;
    /* Otros estilos personalizados que desees aplicar al mensaje de error */
}

</style>                      
                                                    
 
                            <script>
// Función de validación para el Carnet de Identidad
function validarCarnet() {
    var carnet = document.getElementById("carnet").value.trim();
    var carnetRegex = /^[A-Za-z0-9-]+$/;
    var errorCarnet = document.getElementById("errorCarnet");

    if (!carnetRegex.test(carnet) || carnet.length > 10 || carnet === "") {
        errorCarnet.innerHTML = "Carnet inválido.";
        return false;
    } else {
        errorCarnet.innerHTML = "";
        return true;
    }
}

// Función de validación para Nombres
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

// Función de validación para Primer Apellido
function validarPrimerApellido() {
    var primerApellido = document.getElementsByName("primerApellido")[0].value.trim();
    var apellidoRegex = /^[A-Za-záéíóúÁÉÍÓÚ\s]{3,12}$/;
    var errorApellido = document.getElementById("errorApellido");

    if (!apellidoRegex.test(primerApellido) || primerApellido === "") {
        errorApellido.innerHTML = "Primer Apellido inválido";
        return false;
    } else {
        errorApellido.innerHTML = "";
        return true;
    }
}

// Función de validación para Segundo Apellido
function validarSegundoApellido() {
    var segundoApellido = document.getElementsByName("segundoApellido")[0].value.trim();
    var apellidoRegex = /^[A-Za-záéíóúÁÉÍÓÚ\s]{0,12}$/;
    var errorApellido2 = document.getElementById("errorApellido2");

    if (segundoApellido !== "" && !apellidoRegex.test(segundoApellido)) {
        errorApellido2.innerHTML = "Segundo Apellido inválido";
        return false;
    } else {
        errorApellido2.innerHTML = "";
        return true;
    }
}


// Función de validación para Teléfono
function validarTelefono() {
    var telefono = document.getElementsByName("telefono")[0].value.trim();
    var telefonoRegex = /^\d{8,20}$/;
    var errorTelefono = document.getElementById("errorTelefono");

    if (!telefonoRegex.test(telefono) || telefono === "") {
        errorTelefono.innerHTML = "Teléfono inválido";
        return false;
    } else {
        errorTelefono.innerHTML = "";
        return true;
    }
}
function validarDomicilio() {
    var domicilio = document.getElementsByName("direccion")[0].value.trim();
    var errorDomicilio = document.getElementById("errorDomicilio");

    if (domicilio === "") {
        errorDomicilio.innerHTML = "Domicilio no puede estar vacío.";
        return false;
    } else {
        errorDomicilio.innerHTML = "";
        return true;
    }
}

// Función de validación para Especialidad
function validarEspecialidad() {
    var especialidad = document.getElementsByName("especialidad")[0].value.trim();
    var errorEspecialidad = document.getElementById("errorEspecialidad");

    if (especialidad === "") {
        errorEspecialidad.innerHTML = "Especialidad no puede estar vacía.";
        return false;
    } else {
        errorEspecialidad.innerHTML = "";
        return true;
    }
}

// Actualización de la función de validación para el formulario completo
function validarFormulario() {
    return (
        validarCarnet() &&
        validarNombres() &&
        validarPrimerApellido() &&
        validarSegundoApellido() &&
        validarTelefono() &&
        validarDomicilio() &&
        validarEspecialidad()
    );
}
</script>                                       
                                        
                                