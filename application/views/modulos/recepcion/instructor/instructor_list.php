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
                                                    <h2>LISTA DE INSTRUCTORES<small></small></h2>
                                                    <br></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                         
                            <div class="card-box table-responsive">
                    <table id="miTabla" class="display"style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>NOMBRES</th>
                          <th>CI/th>
                          <th>TELEFONO</th>
                          <th>DIRECCIÓN</th>
                          <th>ESPECIALIZACIÓN</th>
                          
                        </tr>
                      </thead>
                      <tbody>
<?php
$indice=1;
foreach($instructor->result() as $row){
?>
                        <tr>
                          <td><?php echo $indice; ?></td>
                          <td><?php echo implode(" ", array($row->nombres, $row->primerApellido, $row->segundoApellido)); ?></td>
                          <td><?php echo $row->ci; ?></td>
                          <td><?php echo $row->telefono; ?></td>
                          <td><?php echo $row->direccion; ?></td>
                          <td><?php echo $row->especialidad; ?></td>

                          
                          

                       
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