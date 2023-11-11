<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Fitness Factory</title>

      <!-- Library / Plugin Css Build -->
      <link rel="stylesheet" href="<?php echo base_url();?>adminTemplate/assets/css/core/libs.min.css">
      
      
      <!-- Hope Ui Design System Css -->
      <link rel="stylesheet" href="<?php echo base_url();?>adminTemplate/assets/css/hope-ui.min.css?v=4.0.0">
      
      <!-- Custom Css -->
      <link rel="stylesheet" href="<?php echo base_url();?>adminTemplate/assets/css/custom.min.css?v=4.0.0">
      
      <!-- Dark Css -->
      <link rel="stylesheet" href="<?php echo base_url();?>adminTemplate/assets/css/dark.min.css">
      
      <!-- Customizer Css -->
      <link rel="stylesheet" href="<?php echo base_url();?>adminTemplate/assets/css/customizer.min.css">
      
      <!-- RTL Css -->
      <link rel="stylesheet" href="<?php echo base_url();?>adminTemplate/assets/css/rtl.min.css">
      
      
  </head>
  <body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    
    <!-- loader END -->
    <?php
    switch($msg)
    {
        case '1':
            $mensaje="Error de ingreso.";
            $clase="warning";
            break;
        case '2':
            $mensaje="Acceso no válido.";
            $clase="danger";
            break;
        case '3':
            $mensaje="Gracias por usar el sistema.";
            $clase="primary";
            break;
        default:
            $mensaje="Inicie sesión para mantenerse conectado.";
            $clase="success";
            break;
    }

?>
      <div class="wrapper">
      <section class="login-content">
         <div class="row m-0 align-items-center bg-white vh-100">            
            
            <div class="col-md-7 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
               <img src="<?php echo base_url();?>img/login.jpg" class="img-fluid gradient-main animated-scaleX" alt="images">
            </div>
			<div class="col-md-5">
               <div class="row justify-content-center">
                  <div class="col-md-10">
                     <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                        <div class="card-body">
                           
						   <br><br>
                           <h2 class="mb-2 text-center">Iniciar Sesión</h2>
                           <p class="text-center" style="color:<?php echo $clase;?>"><?php echo $mensaje ?></p><br><br>
                           <?php

echo form_open_multipart('usuario/validarusuario', array('id'=>'form1', 'method'=>'post'));

?>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="email" class="form-label">Nombre Usuario:</label>
									   <input type="text" class="form-control" id="nombreUsuario" aria-describedby="nombreUsuario" placeholder="Ingrese su nombre usuario" name="nombreUsuario" required autocomplete="off">
                                       
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="form-group">
                                       <label for="password" class="form-label">Contraseña:</label>
									   <input type="password" class="form-control" id="contrasenia" aria-describedby="password" placeholder="Ingrese su contraseña" name="contrasenia" required autocomplete="off">
                                    </div>
                                 </div>
                                 <div class="col-lg-12 d-flex justify-content-between">
								 <br><a href="recoverpw.html">Olvidaste tu contraseña?</a>
                                 </div>
                              </div><br><br>
                              <div class="d-flex justify-content-center">
                                 <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                              </div>
                              
							  <?php
echo form_close();
?>
                        </div>
                     </div>
                  </div>
               </div>
               
            </div>
         </div>
      </section>
      </div>
    
    <!-- Library Bundle Script -->
    <script src="<?php echo base_url();?>adminTemplate/assets/js/core/libs.min.js"></script>
    
    <!-- External Library Bundle Script -->
    <script src="<?php echo base_url();?>adminTemplate/assets/js/core/external.min.js"></script>
    
    <!-- Widgetchart Script -->
    <script src="<?php echo base_url();?>adminTemplate/assets/js/charts/widgetcharts.js"></script>
    
    <!-- mapchart Script -->
    <script src="<?php echo base_url();?>adminTemplate/assets/js/charts/vectore-chart.js"></script>
    <script src="<?php echo base_url();?>adminTemplate/assets/js/charts/dashboard.js" ></script>
    
    <!-- fslightbox Script -->
    <script src="<?php echo base_url();?>adminTemplate/assets/js/plugins/fslightbox.js"></script>
    
    <!-- Settings Script -->
    <script src="<?php echo base_url();?>adminTemplate/assets/js/plugins/setting.js"></script>
    
    <!-- Slider-tab Script -->
    <script src="<?php echo base_url();?>adminTemplate/assets/js/plugins/slider-tabs.js"></script>
    
    <!-- Form Wizard Script -->
    <script src="<?php echo base_url();?>adminTemplate/assets/js/plugins/form-wizard.js"></script>
    
    <!-- AOS Animation Plugin-->
    
    <!-- App Script -->
    <script src="<?php echo base_url();?>adminTemplate/assets/js/hope-ui.js" defer></script>
    
    
  </body>
</html>

