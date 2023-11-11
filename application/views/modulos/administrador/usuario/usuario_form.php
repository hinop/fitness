<!-- page content -->
<div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Nuevo Usuario</h3>
                            <!--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">Formulario</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url(); ?>index.php/usuario/agregarbd" method="post" novalidate>
                                                <span class="section">Información Personal</span>
                                                <div class="mb-3">
                                                    <label for="nombres" class="form-label">Nombres: <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="nombres" id="nombres" autocomplete="off" required="required">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="primerApellido" class="form-label">Primer Apellido<span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="primerApellido" id="primerApellido" autocomplete="off" required="required">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="segundoApellido" class="form-label">Segundo Apellido:</label>
                                                    <input type="text" class="form-control" name="segundoApellido" id="segundoApellido" autocomplete="off">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="ci" class="form-label">Carnet de Identidad: <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="ci" id="ci" autocomplete="off" required="required">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="telefono" class="form-label">Teléfono <span class="text-danger">*</span></label>
                                                    <input type="tel" class="form-control" name="telefono" id="telefono" autocomplete="off" required="required" data-validate-length-range="8,20">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Correo Electrónico: <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" name="email" id="email" autocomplete="off" required="required">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="direccion" class="form-label">Dirección: <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="direccion" id="direccion" autocomplete="off" required="required">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="rol" class="form-label">Rol:</label>
                                                    <select class="form-select" name="rol" id="rol">
                                                        <option value="Administrador">Administrador</option>
                                                        <option value="Recepcionista">Recepcionista</option>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Abrir Formulario</button>
                                            <button type="submit" class="btn btn-primary">Agregar</button>
                                            <button type="reset" class="btn btn-success" data-bs-dismiss="modal">Limpiar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Formulario<small></small></h2>
                                    
                                </div>
                                <div class="x_content">
                                    <form class="" action="<?php echo base_url();?>index.php/usuario/agregarbd" method="post" novalidate>
                                        <span class="section">Información Personal</span>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombres: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="nombres" autocomplete="off" type="text" required="required"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Primer Apellido<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="primerApellido" autocomplete="off" required="required" type="text" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Segundo Apellido:<span></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="text" name="segundoApellido" autocomplete="off"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Carnet de Identidad: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="ci" autocomplete="off" type="text" required="required"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Telefono<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" type="tel" class='tel' autocomplete="off" name="telefono" required='required' data-validate-length-range="8,20" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Correo Electrónico: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" name="email" class='email' autocomplete="off" required="required" type="email" /></div>
                                        </div>
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Direccion: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" class='optional' name="direccion" autocomplete="off" type="text" required="required"/></div>
                                        </div>
                                       
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Rol:<span></span></label>
											<div class="col-md-6 col-sm-6">
												<select class="form-control " name="rol">
													<option value="Administrador">Administrador</option>
													<option value="Secretario">Recepcionista</option>
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
            