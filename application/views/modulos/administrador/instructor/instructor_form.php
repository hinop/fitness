                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h2>Registro de instructor<small></small></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="x_content">
                                <form class="mx-auto" action="<?php echo base_url(); ?>index.php/instructor/agregarbd" method="post" novalidate>
                                    
                                    

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombres: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" class='optional' name="nombres"  type="text" required="required"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">PrimerApellido : <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" name="primerApellido" required="required" type="text" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Segundo Apellido : <span></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" type="text" name="segundoApellido" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Carnet de Identidad: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" class='optional' name="ci"  type="text" required="required"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Numero de Contacto: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" type="numeric"  name="telefono" required='required' data-validate-length-range="8,20" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Domicilio: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" type="text"  name="direccion" required='required' data-validate-length-range="8,20" /></div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Especialidad: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" type="text" class='tel' name="especialidad" required='required' data-validate-length-range="8,20" /></div>
                                        </div>
                                        <div class="ln_solid">
                                            <div class="form-group text-center">
                                                    <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                    <button type="reset" class="btn btn-success">Limpiar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
                                                    
                                                    
                                        
                                        
                                      <!--  <div class="ln_solid">
                                            <div class="form-group">
                                                <div class="col-md-6 offset-md-3">
                                                    <button type='submit' class="btn btn-primary">Agregar</button>
                                                    <button type='reset' class="btn btn-success">Limpiar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->