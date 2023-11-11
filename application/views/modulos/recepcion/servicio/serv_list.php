<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lista de Servicios <small></small></h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            
                    <br>
                    
                    
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                          <!--<a href="<?php echo base_url(); ?>index.php/recepcion/servicio/agregar" class="text-left">
                                <button type="button" class="btn btn-primary">
                                <i class="fa fa-plus"> Nuevo Servicio</i>
                                </button>
                            </a>-->
                            <div class="card-box table-responsive">
                    <table id="miTabla" class="display" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Servicio</th>
                          
                          <th>precio mensual</th>
                          <th>Descripcion</th>
                          <th>Horario</th>
                          
                        </tr>
                      </thead>
                      <tbody>
<?php
$indice=1;
foreach($servicio->result() as $row){
?>
                        <tr>
                          <td><?php echo $indice; ?></td>
                          <td><?php echo $row->nombre; ?></td>
                          
                          <td><?php echo $row->precioMensual; ?></td>
                          <td><?php echo $row->descripcion; ?></td>

                          <td>
                          <?php
                            echo form_open_multipart('recepcion/servicio/asignar');
                            ?>
                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                            <button type="submit" class="btn btn-small btn-success"><i class="fa fa-pencil"></i></button>

                            <?php
                            echo form_close();    
                            ?>
                        </td>

                          
                        </tr>
<?php
$indice++;
}
?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->