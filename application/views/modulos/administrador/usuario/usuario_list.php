<!-- page content -->
<div class="right_col" role="main">
          

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><small>Usuarios</small></h2>
                    
                    <br>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                          <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Abrir Formulario</button>-->
                          <!--Modal Registro 
                               <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Formulario</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?php echo base_url(); ?>index.php/usuario/agregarbd" method="post" novalidate>
                                                    <span class="section">Información Personal</span>
                                                    <div class="mb-3">
                                                        <label for "nombres" class="form-label">Nombres: <span class="text-danger">*</span></label>
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

                                                    </div>
                                                      <div class="modal-footer d-flex justify-content-center">
                                                          
                                                          <button type="submit" class="btn btn-primary">Agregar</button>
                                                          <button type="reset" class="btn btn-success" data-bs-dismiss="modal">Limpiar</button>
                                                      </div>
                                                  </div>
                                                </form>

                                            
                                    </div>
                                </div>
-->


                            <div class="card-box table-responsive">
                            
                            
                    <table id="miTabla" class="display" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          
                          <th>Nombres</th>
                          
                          <th>C.I.</th>
                          <th>Telefono</th>
                          <th>Email</th>
                          <th>Direccion</th>
                          <th>Rol</th>
                          <th ></th>
                          <th ></th>
                        </tr>
                      </thead>
                      <tbody>
  <?php
   $indice=1;
  foreach($usuario->result() as $row){
  ?>
                        <tr>
                          <td><?php echo $indice; ?></td>
                          
                          <td><?php echo implode(" ", array($row->nombres, $row->primerApellido, $row->segundoApellido)); ?></td>
                          <td><?php echo $row->ci; ?></td>
                          <td><?php echo $row->telefono; ?></td>
                          <td><?php echo $row->email; ?></td>
                          <td><?php echo $row->direccion; ?></td>
                          <td><?php echo $row->rol; ?></td>
                          <td>
                          <?php
                            echo form_open_multipart('usuario/modificar');
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

                           
                            </td>
                            <td>
                            <?php
                            echo form_open_multipart('usuario/eliminarbd');
                            ?>
                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">

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
        
             