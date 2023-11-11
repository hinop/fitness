


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="x_content">
        <h4>Registro de horario</h4>
        <form class="form-horizontal" action="<?php echo base_url();?>index.php/horario/agregarbd" method="post" novalidate>
          <br>
          
          <div class="col-md-6 col-sm-6">
             <div class="mb-3">
                <label for="hora">Hora Inicio : <span class="required">*</span></label>
                  <input type="time" class="form-control text-center" id="horaI" name="horaI">
              </div>
              <div class="mb-3">
                    <label for="hora">Hora  finalización : <span class="required">*</span></label>
                      <input type="time" class="form-control text-center" id="horaF" name="horaF">
                  </div>
              </div>

                 <div class="col-md-6 col-sm-6">
                 <div class="form-group">
                                                <label for="diasSemana">Selecciona un día de la semana:</label>
                                                <select class="custom-select" name="dia" id="diasSemana">
                                                    <option  value="1">Lunes</option>
                                                    <option  value="2">Martes</option>
                                                    <option  value="3">Miércoles</option>
                                                    <option  value="4">Jueves</option>
                                                    <option  value="5">Viernes</option>
                                                    <option  value="6">Sábado</option>
                                                    <option  value="7">Domingo</option>
                                                </select>
                                            </div>
                  
                </div>
          <div class="mb-3">
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary">Agregar</button>
              <button type="reset" class="btn btn-success">Limpiar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
