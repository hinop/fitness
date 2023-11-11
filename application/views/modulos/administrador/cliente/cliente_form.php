<!-- page content -->
<div class="right_col" role="main">
                
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>REGISTRO DE CLIENTE<small></small></h2>
                                    
                                </div>
                                <div class="x_content">
                                <div class="container mt-5">
                                            <form class="row g-3" action="<?php echo base_url();?>index.php/cliente/agregarbd" method="post" novalidate>
                                                <!-- Primera Fila -->
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="nombres" class="form-label">NOMBRES: <span class="required">*</span></label>
                                                        <input type="text" class="form-control" autocomplete="off" name="nombres" required="required"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="primerApellido" class="form-label">PRIMER APELLIDO: <span class="required">*</span></label>
                                                        <input type="text" class="form-control" autocomplete="off" name="primerApellido" required="required"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="segundoApellido" class="form-label">SEGUNDO APELLIDO:</label>
                                                        <input type="text" class="form-control" autocomplete="off" name="segundoApellido"/>
                                                    </div>
                                                </div>

                                                <!-- Segunda Fila -->
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="ci" class="form-label">CARNET IDENTIDAD: <span class="required">*</span></label>
                                                        <input type="text" class="form-control" autocomplete="off" name="ci" required="required"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3">
                                                        <label for="telefono" class="form-label">TELEFONO: <span class="required">*</span></label>
                                                        <input type="tel" class="form-control" autocomplete="off" name="telefono" required="required" data-validate-length-range="8,20"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                <div class="mb-3">
                                                    <label for="fecha" class="form-label">FECHA DE NACIMIENTO: <span class="required">*</span></label>
                                                    <input type="date" class="form-control" autocomplete="off" name="fecha" required="required"/>
                                                </div>
                                            </div>

                                            <!-- Tercera Fila -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="sexo" class="form-label">SEXO:</label>
                                                    <select class="form-select" name="sexo">
                                                        <option value="MASCULINO">MASCULINO</option>
                                                        <option value="FEMENINO">FEMENINO</option>
                                                        <option value="OTRO">OTRO</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Botones -->
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <button type='submit' class="btn btn-primary">Agregar</button>
                                                    <button type='reset' class="btn btn-success">Limpiar</button>
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