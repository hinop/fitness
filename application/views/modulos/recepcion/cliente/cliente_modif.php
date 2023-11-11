
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Actualizar datos del Cliente</h3>
                        </div>

                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    
                                    
                                </div>
                                <div class="x_content">
                                <?php
foreach($infocliente->result() as $row){
?>
                                    <form class="" action="<?php echo base_url();?>index.php/recepcion/cliente/modificarbd" method="post" novalidate>
                                        <br>
                                        <div class="field item form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->id;?>" class='optional' name="id"  type="hidden" required="required"/></div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-4">
                                                    <div class="field item form-group">
                                                        <label class="col-form-label">NOMBRES: <span class="required">*</span></label>
                                                        <input class="form-control" value="<?php echo $row->nombres;?>" autocomplete="off" class='optional' name="nombres" type="text" required="required"onblur="validarNombres()" style="text-transform: uppercase;"/>
                                                        <span id="errorNombres" class="error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="field item form-group">
                                                        <label class="col-form-label">PRIMER APELLIDO: <span class="required">*</span></label>
                                                        <input class="form-control" value="<?php echo $row->primerApellido;?>" autocomplete="off" name="primerApellido" required="required" type="text" style="text-transform: uppercase;" onblur="validarPrimerApellido()" />
                                                        <span id="errorApellido" class="error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="field item form-group">
                                                        <label class="col-form-label">SEGUNDO APELLIDO: <span></span></label>
                                                        <input class="form-control" value="<?php echo $row->segundoApellido;?>" autocomplete="off" type="text" name="segundoApellido" style="text-transform: uppercase;" onblur="validarSegundoApellido()" />
                                                        <span id="errorApellido2" class="error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="field item form-group">
                                                        <label class="col-form-label">CARNET DE IDENTIDAD: <span class="required">*</span></label>
                                                        <input class="form-control" value="<?php echo $row->ci;?>" autocomplete="off" class='optional' name="ci" type="text" required="required" onblur="validarCarnet()" style="text-transform: uppercase;"/>
                                                        <span id="errorCarnet" class="error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="field item form-group">
                                                        <label class="col-form-label">TELEFONO: <span class="required">*</span></label>
                                                        <input class="form-control" value="<?php echo $row->telefono;?>" autocomplete="off" type="tel" class='tel' name="telefono" required='required' data-validate-length-range="8,20" onblur="validarTelefono()"  />
                                                        <span id="errorTelefono" class="error"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="field item form-group">
                                                        <label class="col-form-label">FECHA DE NACIMIENTO : <span class="required">*</span></label>
                                                        <input class="form-control" value="<?php echo $row->fechaNacimiento;?>" autocomplete="off" class='optional' name="fecha" type="date" required="required" onblur="validarFechaNacimiento()"/>
                                                        <span id="errorFecha" class="error"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="field item form-group">
                                                        <label class="col-form-label">SEXO: <span></span></label>
                                                        <select class="form-control" name="sexo">
                                                            <option value="MASCULINO"<?php echo ($row->sexo == "MASCULINO") ? 'selected' : ''; ?>>MASCULINO</option>
                                                            <option value="FEMENINO"<?php echo ($row->sexo == "FEMENINO") ? 'selected' : ''; ?>>FEMENINO</option>
                                                            <option value="OTRO"<?php echo ($row->sexo == "OTRO") ? 'selected' : ''; ?>>OTRO</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        
                                        
                                        <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Modificar</button>
                                                    <button type='reset' class="btn btn-success">Limpiar</button>
                                                </div>
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

// Función de validación para el formulario completo
function validarFormulario() {
    return (
        validarCarnet() &&
        validarNombres() &&
        validarPrimerApellido() &&
        validarSegundoApellido() &&
        validarTelefono()
    );
}
</script>