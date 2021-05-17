<?php session_start();

# Chequeo que no haya iniciado sesión.
if(!isset($_SESSION['sert_cpanel']['id']) && empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); } 

require ('../mod/config.php');
require ('../mod/users.php');

$con_users = new Users();
$query_user = $con_users->Seluser($_SESSION['sert_cpanel']['id']);

if($query_user->num_rows):
  $user = $query_user->fetch_array();
else:
  http_response_code(404);
endif;

if($user['rank'] == 1) {
  $rank = 'Asesor';
} else {
  $rank = 'Asesor Ejecutivo';
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="theme-color" content="#d8a32b">
  <link rel="icon" sizes="192x192" type="image/png" href="../assets/panel/img/icon-192x192.png">
  <link rel="icon" sizes="228x228" type="image/png" href="../assets/panel/img/icon-228x228.png">

  <meta name="mobile-web-app-capable" content="yes">

  <!-- For IE 11, Chrome, Firefox, Safari, Opera -->
  <link rel="icon" href="../assets/panel/img/icon-16x16.png" sizes="16x16" type="image/png">
  <link rel="icon" href="../assets/panel/img/icon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="../assets/panel/img/icon-48x48.png" sizes="48x48" type="image/png">
  <link rel="icon" href="../assets/panel/img/icon-62x62.png" sizes="62x62" type="image/png">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?= $system['title'] ?> :: Panel de Control
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  
  <!-- CSS Files -->
  <link href="../assets/panel/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/panel/demo/demo.css" rel="stylesheet" />
  <link href="../assets/panel/css/croppie.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange" data-background-color="green" data-image="../assets/panel/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="../" class="simple-text logo-normal">
          <img src="../assets/images/logo.png" class="img-fluid" height="50">
        </a></div>
      <div class="sidebar-wrapper">
        <?php require ('structure/menu.php'); ?>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Panel de Control</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Menú de nav.</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Cuenta
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="perfil.php">Mi Perfil</a>
                  <a class="dropdown-item" href="#">Configuración</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Editar mi Perfíl (<?= $user['username'] ?>)</h4>
                  <p class="card-category">¡Aquí podrás editar la información de tu perfil como asesor!</p>
                </div>
                <div class="card-body">
                  <form id="update-profile" method="POST" action="../dri/users/upd_perfil.php">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nombre y Apellido</label>
                          <input type="text" class="form-control" name="name" value="<?= $user['name'] ?>" required>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Teléfono</label>
                          <input type="text" class="form-control" name="telephone" value="<?= $user['telephone'] ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Correo electrónico</label>
                          <input type="email" name="email" class="form-control" required value="<?= $user['email'] ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nueva Contraseña</label>
                          <input type="password" class="form-control" name="password_1">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirmación de Contraseña</label>
                          <input type="password" class="form-control" name="password_2">
                        </div>
                      </div>
                      <div class="col-md-12 mb-2">
                          <small style="opacity: 0.7">SI NO SE DESEA REALIZAR NINGÚN CAMBIO EN LA CONTRASEÑA PUEDE DEJAR EN BLANCO.</small>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Facebook</label>
                          <input type="text" class="form-control" name="facebook" value="<?= $user['facebook'] ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Instagram</label>
                          <input type="text" class="form-control" name="instagram" value="<?= $user['instagram'] ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Twitter</label>
                          <input type="text" class="form-control" name="twitter" value="<?= $user['twitter'] ?>">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">LinkedIn</label>
                          <input type="text" class="form-control" name="linkedin" value="<?= $user['linkedin'] ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Sobre mí</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Pon acá algo que quieras que la gente vea en tu perfil.</label>
                            <textarea name="about_me" class="form-control" rows="3" maxlength="200"><?= $user['about_me'] ?></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-success pull-right">Actualizar Cambios</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="javascript:;" class="change-pic">
                    <img class="img" src="../assets/images/profile_pictures/<?= ($user['profile_pic'] != '') ? $user['profile_pic'] : 'default.jpg' ?>" id="new-croppie" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray"><?= $rank ?></h6>
                  <h4 class="card-title"><?= $user['name'] ?></h4>
                  <p class="card-description">
                    <?= $user['about_me'] ?>
                  </p>
                  <a href="javascript:;" class="btn btn-primary btn-round change-pic"><span class="material-icons">camera</span>  <span class="mx-2">Cambiar Imagen</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="cambiar-imagen-perfil" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cambiar foto de Perfil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="select-image">
                <form id="form-imagen-perfil" enctype="multipart/form-data">
                  <div class="col-md-12 from-group">
                    <input type="file" name="image" class="form-group" id="input-select-image" style="padding: 30px; border: 2px #eaeaea dashed">
                  </div>
                </form>
                <div class="text-center loader" style="display: none"><span class="material-icons spin">settings</span></div>
              </div>
              <div id="lets-croppie" style="width: auto; height: auto; display: none" class="text-center">
                <div id="demo-croppie">
                </div>
                <button type="button" class="btn btn-danger try-another-image">INTENTAR CON OTRA FOTO.</button>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-disabled save-croppie" disabled>Guardar Recorte</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="#">
                  <?= $system['title'] ?>
                </a>
              </li>
              <li>
                <a href="#">
                  Reportar Falla
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, hecho con <i class="material-icons">favorite</i> por
            <a href="https://instagram.com/simonrodil" target="_blank">Simón Rodil</a> para <?= $system['title'] ?>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/panel/js/core/jquery.min.js"></script>
  <script src="../assets/panel/js/core/popper.min.js"></script>
  <script src="../assets/panel/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/panel/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/panel/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/panel/js/plugins/sweetalert2.all.min.js"></script>
  <!-- Forms Validations Plugin -->
  <!-- <script src="../assets/panel/js/plugins/jquery.validate.min.js"></script> -->
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/panel/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <!-- <script src="../assets/panel/js/plugins/bootstrap-datetimepicker.min.js"></script> -->
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script> -->
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/panel/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="../assets/panel/js/plugins/core.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/panel/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/panel/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Main Scripts! -->
  <script src="../assets/panel/js/croppie.min.js"></script>
  <script src="../assets/panel/js/main.js"></script>
  <script src="../assets/panel/js/perfil/script.js"></script>
</body>

</html>