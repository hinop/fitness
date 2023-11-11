<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Lista de Horarios <small></small></h3>
              </div>

            
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <br>
                    
                    
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                          <a href="<?php echo base_url(); ?>index.php/horario/agregar" class="text-left">
                                <button type="button" class="btn btn-primary">
                                <i class="fa fa-plus"> Nuevo Horario</i>
                                </button>
                            </a>
                            <div class="card-box table-responsive">
                    <table id="miTabla" class="display" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Dia</th>
                          <th>Hora inicio</th>
                          <th>Hora fin</th>
                          <th></th>
                          
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
$indice = 1;
foreach ($horarios as $horario):
?>
<tr>
    <td><?php echo $indice; ?></td>
    <td><?php echo $horario->dia; ?></td>
    <td><?php echo $horario->horaInicio; ?></td>
    <td><?php echo $horario->horaFin; ?></td>
    

    <td>
        <?php echo form_open_multipart('horario/modificar'); ?>
        <input type="hidden" name="id" value="<?php echo $horario->id; ?>">
        <input type="hidden" name="idDia" value="<?php echo $horario->idDia; ?>">
        <button type="submit" class="btn btn-small btn-primary" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;border-radius: 10px;">
        <i class="fa fa-trash">
                              <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </i>
        </button>
        <?php echo form_close(); ?>
    </td>
    <td>
        <?php echo form_open_multipart('horario/eliminarbd'); ?>
        <input type="hidden" name="id" value="<?php echo $horario->id; ?>">
        <input type="hidden" name="idDia" value="<?php echo $horario->idDia; ?>">
        <button type="submit" class="btn btn-small btn-danger" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; border-radius: 10px;">
        <i class="fa fa-trash">
                              <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.3955 9.59497L9.60352 14.387" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M14.3971 14.3898L9.60107 9.59277" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                              </i>
        </button>
        <?php echo form_close(); ?>
    </td>
</tr>
<?php
$indice++;
endforeach;
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