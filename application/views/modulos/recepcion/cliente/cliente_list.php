<!-- page content -->

          
            <div class="page-title">
              <div class="title_left">
                
              </div>
<br>
              
            </div>

          

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    
                  <div class="text-center">
                                                    <h2>LISTA DE CLIENTES <small></small></h2>
                                                    <br>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                          <a href="<?php echo base_url(); ?>index.php/recepcion/cliente/agregar" class="text-left">
                                <button type="button" class="btn btn-primary">
                                <i class="fa fa-plus"> Nuevo Cliente</i>
                                </button>
                            </a>
                            <br>
                            <br>
                            <div class="table-responsive" style="padding: 5px; ">
                    <table id="miTabla" class="display"style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NOMBRE </th>
                          
                          <th>CI</th>
                          <th>TELEFONO</th>
                          <th>EDAD</th>
                          <th>SEXO</th>
                          <th></th>
                          
                        </tr>
                      </thead>
                      <tbody>
<?php
$indice=1;
foreach($cliente->result() as $row){
?>
                        <tr>
                          <td><?php echo $indice; ?></td>
                          <td><?php echo implode(" ", array($row->nombres, $row->primerApellido, $row->segundoApellido)); ?></td>

                          <td><?php echo $row->ci; ?></td>
                          <td><?php echo $row->telefono; ?></td>
                          

                          <td><?php

                              $fecha_nacimiento = $row->fechaNacimiento;

                              $fecha_nacimiento = new DateTime($fecha_nacimiento);
                              $fecha_actual = new DateTime();
                              $diferencia_fechas = $fecha_nacimiento->diff($fecha_actual);
                              $edad = $diferencia_fechas->y;
                              echo $edad;

                              ?></td>
                          <td><?php echo $row->sexo; ?></td>
                          
                          <td>


                          <?php
                            echo form_open_multipart('recepcion/cliente/modificar');
                            ?>
                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

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
        