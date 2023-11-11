<?php if (isset($servicio)): ?>
    <?php
    foreach($servicio->result() as $row){
    $id_ = $row->id;
    $nombre_ = $row->nombre;
    }
    ?>
    
<?php endif ?>

<?php if (isset($info)): ?>
    <?php
    foreach($info as $row){
    $id_info = $row['id'];
    $nombre_info = $row['nombre'];
  }
    ?>
    
<?php endif ?>



<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">

              <h3>Lista de horarios de <?php echo isset($nombre_) ? $nombre_ : $nombre_info; ?> <small></small></h3>

              <!--<h3>Lista de horarios de <?php echo $row->nombre;?>  <small></small></h3>-->

              </div>

            
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <br>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                          <?php
                            echo form_open_multipart('servicio/horario');
                            ?>
                            <input type="hidden" name="id" value="<?php echo isset($id_) ? $id_ : $id_info; ?>" >

                            <button type="submit" class="btn btn-small btn-success"><i class="fa fa-pencil">Agregar Horario</i></button>
                            
                            <?php
    echo form_close();
    ?>
                            <div class="d-flex justify-content-end">
                              
                              <input type="hidden" name="id" value="<?php echo isset($id_) ? $id_ : $id_info; ?>">
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">
                                Agrupar
                              </button>
                              <?php echo form_close(); ?>
                          </div>
                          <!-------- modal ------------>
                          

                                                      
                    <div class="card-box table-responsive">
                    <table id="miTabla" class="display" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Dia</th>
                          <th>Horario</th>
                          
                          <th>Grupo</th>
                          <th>Instructor</th>
                          <th ></th>
                          <th ></th>
                          <th ></th>
                        </tr>
                      </thead>
                      <tbody>
                      

<?php
$indice = 1;
foreach ($infoservicio as $row) {
    // Obtén información del instructor
    $idinstructor = $row['idInstructor'];
    $instructor_info = $this->instructor_model->obtenerinstructorinfo($idinstructor);

    // Obtén información del servicio
    $servicio_id = $row['idServicio'];
    $servicio_info = $this->servicio_model->obtenerservicioinfo($servicio_id);

    // Obtén información del horario
    $horario_id = $row['idHorario'];
    $horario_info = $this->horario_model->obtenerhorarioinfo($horario_id);

    $grupo=$row['grupo'];
    
    // Ahora puedes usar $instructor_info, $servicio_info, y $horario_info en tu tabla
?>
                        <tr>
                          <td><?php echo $indice; ?></td>
                          <td><?php echo $horario_info->dia; ?></td>
                          <td><?php echo date('H:i', strtotime($horario_info->horaInicio)) . ' - ' . date('H:i', strtotime($horario_info->horaFin)); ?></td>
                          <td><?php echo $grupo  ?></td>
                          <td><?php echo $instructor_info->nombres . ' ' . $instructor_info->primerApellido; ?></td>


                          <td>
                          <?php
                            echo form_open_multipart('servicio/asignar');
                            ?>
                            <input type="hidden" name="id" value="<?php echo $servicio_info->id; ?>">
                            <input type="hidden" name="idInstructor" value="<?php echo $instructor_info->id; ?>">
                            <input type="hidden" name="idHorario" value="<?php echo $horario_info->id; ?>">
                            <button type="submit" class="btn btn-small btn-success"><i class="fa fa-pencil"></i></button>

                            <?php
                            echo form_close();    
                            ?>
                        </td>

                          <td>
                          <?php
                            echo form_open_multipart('servicio/modificar');
                            ?>
                            <input type="hidden" name="id" value="<?php echo $servicio_info->id; ?>">
                            <input type="hidden" name="idInstructor" value="<?php echo $instructor_info->id; ?>">
                            <input type="hidden" name="idHorario" value="<?php echo $horario_info->id; ?>">

                            <button type="submit" class="btn btn-small btn-success"><i class="fa fa-pencil"></i></button>

                            <?php
                            echo form_close();    
                            ?>
                        </td>
                        <td>
                            <?php
                            echo form_open_multipart('servicio/eliminarbd');
                            ?>
                            <input type="hidden" name="id" value="<?php echo $servicio_info->id; ?>">
                            <input type="hidden" name="idInstructor" value="<?php echo $instructor_info->id; ?>">
                            <input type="hidden" name="idHorario" value="<?php echo $horario_info->id; ?>">

                            <button type="submit" class="btn btn-small btn-danger"><i class="fa fa-trash"></i></button>

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
