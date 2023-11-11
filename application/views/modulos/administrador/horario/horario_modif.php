
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h5>Modificar horario</h5>
                        </div>

                        
                    </div>
                    <div class="clearfix"></div>

                    
                                
    <?php
    // Verificamos si $infohorario no es null
    if ($infohorario !== null) {
    ?>
    <form class="" action="<?php echo base_url();?>index.php/horario/modificarbd" method="post" novalidate>
        
        <div class="field item form-group">
            <div class="col-md-6 col-sm-6">
                <input class="form-control" value="<?php echo $infohorario->id;?>" name="id" type="hidden" required="required" />
            </div>
        </div>

        <div class="col-md-6 col-sm-6">
            <div class="mb-3">
                <label for="hora">Hora Inicio : <span class="required">*</span></label>
                <input type="time" class="form-control text-center" value="<?php echo $infohorario->horaInicio;?>" name="hora_inicio" required="required">
            </div>
            <div class="mb-3">
                <label for "hora">Hora finalización : <span class="required">*</span></label>
                <input type="time" class="form-control text-center" value="<?php echo $infohorario->horaFin;?>" name="hora_fin" required="required">
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
        <div class="form-group">
            <label for="diasSemana">Selecciona un día de la semana:</label><br>
            <select class="custom-select" name="dia" id="diasSemana">
                <option value="1" <?php echo ($infohorario->idDia == 1) ? 'selected' : ''; ?>>Lunes</option>
                <option value="2" <?php echo ($infohorario->idDia == 2) ? 'selected' : ''; ?>>Martes</option>
                <option value="3" <?php echo ($infohorario->idDia == 3) ? 'selected' : ''; ?>>Miércoles</option>
                <option value="4" <?php echo ($infohorario->idDia == 4) ? 'selected' : ''; ?>>Jueves</option>
                <option value="5" <?php echo ($infohorario->idDia == 5) ? 'selected' : ''; ?>>Viernes</option>
                <option value="6" <?php echo ($infohorario->idDia == 6) ? 'selected' : ''; ?>>Sábado</option>
                <option value="7" <?php echo ($infohorario->idDia == 7) ? 'selected' : ''; ?>>Domingo</option>
            </select>
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
    } else {
        // Maneja el caso en el que $infohorario es null
        echo "No se encontraron datos para el horario y día proporcionados.";
    }
    ?>
</div>

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            