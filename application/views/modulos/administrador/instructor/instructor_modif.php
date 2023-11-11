
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Actualizar datos del instructor</h3>
                       
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    
                                    
                                </div>
                                <div class="x_content">
                                <?php
foreach($infoinstructor->result() as $row){
?>
                                    <form class="" action="<?php echo base_url();?>index.php/instructor/modificarbd" method="post" novalidate>
                                        
                                        <div class="field item form-group">
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->id;?>" class='optional' name="id"  type="hidden" required="required"/></div>
                                        </div>
                                        
                                        
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nombres: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->nombres;?>" class='optional' name="nombres" type="text" required="required"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Primer Apellido<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->primerApellido;?>" name="primerApellido" required="required" type="text" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Segundo Apellido:<span></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->segundoApellido;?>" type="text" name="segundoApellido" /></div>
                                        </div>

                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Carnet de Identidad: <span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->ci;?>" class='optional' name="ci" type="text" required="required"/></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Telefono<span class="required">*</span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->telefono;?>" type="tel" class='tel' name="telefono" required='required' data-validate-length-range="8,20" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">Domicilio:<span></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->direccion;?>" type="text" name="direccion" /></div>
                                        </div>
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align">especialidad:<span></span></label>
                                            <div class="col-md-6 col-sm-6">
                                                <input class="form-control" value="<?php echo $row->especialidad;?>" type="text" name="especialidad" /></div>
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
            