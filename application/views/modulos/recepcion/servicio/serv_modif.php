
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Modificar Servicio</h3>
                        </div>

                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Formulario<small></small></h2>
                                    
                                    +
                                </div>
                                <div class="x_content">
                                <?php
foreach($infoservicio->result() as $row){
?>
                                    <form class="" action="<?php echo base_url();?>index.php/recepcion/servicio/modificarbd" method="post" novalidate>
                                    <span class="section">Información del Servicio</span>
                                    <div class="field item form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->id;?>" class='optional' name="id"  type="hidden" required="required"/></div>
                                        </div>
                                    <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombre: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->nombre;?>" class='optional' name="nombre" type="text" required="required" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Precio de la mensualidad:<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->precio_mes;?>" type="number"  name="mes" required='required'  /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Precio de la seccion:<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->precio_seccion;?>" type="number"  name="seccion" required='required'  /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Descripción:<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->descripcion;?>" type="text"  name="desc" required='required'  /></div>
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
            

            