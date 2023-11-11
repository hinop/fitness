<!-- page content -->
<div class="right_col" role="main">
                
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>REGISTRO DE CLIENTE<small></small></h2>
                                    
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url();?>index.php/cliente/agregarbd" method="post" novalidate>
                                    <br>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">NOMBRES: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" class='optional' name="nombres"  type="text" required="required"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">PRIMER APELLIDO : <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" name="primerApellido" required="required" type="text" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">SEGUNDO APELLIDO : <span></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" type="text" name="segundoApellido" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">CARNET IDENTIDAD: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" class='optional' name="ci"  type="text" required="required"/></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">TELEFONO: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" type="tel" class='tel' name="telefono" required='required' data-validate-length-range="8,20" /></div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">FECHA DE NACIMIENTO: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" autocomplete="off" class='optional' name="fecha"  type="date" required="required"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">SEXO: <span></span></label>
											<div class="col-md-6 col-sm-6">
												<select class="form-control " name="sexo">
													<option value="MASCULINO">MASCULINO</option>
													<option value="FEMENINO">FEMENINO</option>
                                                    <option value="OTRO">OTRO</option>
												</select>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>