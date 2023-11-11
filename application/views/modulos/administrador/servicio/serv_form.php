

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    
                    
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                        <h2>Registro de servicio<small></small></h2>
                                <div class="clearfix"></div>
                                </div>
                                <div class="x_content"><br>
                                    <form class="" action="<?php echo base_url();?>index.php/servicio/agregarbd" method="post" novalidate>
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="nombre" class="form-label">Nombre: <span class="required">*</span></label>
                                                    <input class="form-control" autocomplete="off" name="nombre" type="text" required="required" />
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-sm-6">
                                                <div class="form-group">
                                                    <label for="mes" class="form-label">Precio Mensualidad:<span class="required">*</span></label>
                                                    <input class="form-control" type="number" autocomplete="off" name="mes" required='required' />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            
                                            <div class="col-md-9 col-sm-9">
                                                <div class="form-group">
                                                    <label for="dispo" class="form-label">Descripción:<span class="required">*</span></label>
                                                    <input class="form-control" type="text" autocomplete="off" name="des" required='required' />
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


                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
