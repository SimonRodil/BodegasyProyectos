<?php 

session_start();

require('../mod/config.php');

# Chequeo que no haya iniciado sesión.
if(isset($_SESSION['sert_cpanel']['id']) && !empty($_SESSION['sert_cpanel']['id'])) { header ('Location: index.php'); } ?>

<!DOCTYPE>
<html>
<head>
    <meta charset="UTF-8">
  
    <meta name="theme-color" content="#d8a32b">
    <link rel="icon" sizes="192x192" type="image/png" href="../assets/panel/img/icon-192x192.png">
    <link rel="icon" sizes="228x228" type="image/png" href="../assets/panel/img/icon-228x228.png">

    <meta name="mobile-web-app-capable" content="yes">

    <!-- For IE 11, Chrome, Firefox, Safari, Opera -->
    <link rel="icon" href="../assets/panel/img/icon-16x16.png" sizes="16x16" type="image/png">
    <link rel="icon" href="../assets/panel/img/icon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="../assets/panel/img/icon-48x48.png" sizes="48x48" type="image/png">
    <link rel="icon" href="../assets/panel/img/icon-62x62.png" sizes="62x62" type="image/png">

    <meta content="width=device-width,initial-scale=1" name="viewport">
    <title><?= $system['title'] ?> :: Iniciar Sesión</title>
    <link href="../assets/panel/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <style>
      body {
        /* background: url(../assets/img/cover.jpg) center no-repeat; */
        background: url(../assets/panel/img/bg_login.jpg) #e6e6e6;
        /* background: #e6e6e6; */
        background-size: cover;
      }
    </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <!-- <div class="section"></div>-->
       <main>
        <center>
         <div class="container">
            <div  class="z-depth-3 y-depth-3 x-depth-3 grey green-text lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px; margin-top: 100px; solid #EEE; min-width: 320px">
              <div class="section"><img src="../assets/images/logo.png" width="240"></div>
              <!-- <div class="section"></div> -->
              <form>
                <div class="section"><i class="mdi-alert-error red-text"></i></div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input class='validate' type="text" name='username' id='username' required />
                      <label for='username'>Usuario / Correo Electrónico</label>
                    </div>
                  </div>
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input class='validate' type='password' name='password' id='password' required />
                      <label for='password'>Contraseña</label>
                    </div>
                  </div>
                  <center>
                    <div class='row'>
                      <button style="margin-left:65px;" disabled type='submit' class='col s6 btn btn-small blue white-text  waves-effect z-depth-1 y-depth-1'>Ingresar</button>
                    </div>
                  </center>
                </form>
                <br>
              </div>
           </div>
        </center>
      </main>
    </div>
  </div>
  
  <script type="text/javascript" src="../assets/panel/js/core/jquery.min.js"></script>
  <script type="text/javascript" src="../assets/panel/js/plugins/jquery.validate.min.js"></script>
  <script src="../assets/panel/libs/materialize.min.js"></script>
  <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script> -->
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/panel/js/plugins/sweetalert2.js"></script>
  <script>
    $(document).ready(function(){
      
      // Enable disabled buttons.
      $('button[disabled]').attr('disabled', false);
      
      $('form').submit(function(e){ 
        
            // Empieza a validar el formulario
            e.preventDefault();
            var $btn = $("button[form=form-nueva-categoria]");
            var $btnOT = $btn.html();
            var $data = $('form').serialize();

            $.ajax({
              method: "POST",
              dataType: "json",
              data: $data,
              url: "../dri/sign-in.php",
              beforeSend: function() { $btn.html('<span class="material-icons spin">sync</span>').attr('disabled', true); },
              complete: function() { $btn.html($btnOT).attr('disabled', false); },
              success: function() { let timerInterval
                Swal.fire({
                  title: 'Enhorabuena!',
                  icon: 'success',
                  text: 'Su sesión se ha iniciado correctamente.',
                  onClose: () => {
                    location.assign('./');
                  }
                }).then((result) => {
                  location.assign('./');
                });
              },
              error: function(data) { 
                Swal.fire(
                  'Error!',
                  'No se ha podido iniciar sesión correctamente...',
                  'error'
                );
              }
            });

        });  
      
    });
  </script>
</body>

</html>