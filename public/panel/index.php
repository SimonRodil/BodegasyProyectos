<?php session_start();

# Chequeo que no haya iniciado sesión.
if(!isset($_SESSION['sert_cpanel']['id']) && empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); } 

require('../mod/config.php');
require('../mod/propiedades.php');
require('../mod/users.php');
require('../mod/mensajeria.php');
$con_propiedades = new Propiedades();
$con_users = new Users();
$con_mensajeria = new Mensajes();
$query_users = $con_users->SelUsers();

if($_SESSION['sert_cpanel']['rank'] > 1):
  $query_propiedades = $con_propiedades->SelPropiedades();
else:
  $query_propiedades = $con_propiedades->SelPropiedadesPorAsesor($_SESSION['sert_cpanel']['id']);
endif; 

$query_mensajes = $con_mensajeria->SelMensajesPorAsesor($_SESSION['sert_cpanel']['id']);

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
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange" data-background-color="white" data-image="../assets/panel/img/sidebar-1.jpg">
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
            <div class="col-lg-12">
              <h2>¡Bienvenido nuevamente, <?= $_SESSION['sert_cpanel']['name'] ?>!</h2>
              <hr>
              <div class="row">
                <div class="col-lg-4">
                  <div class="card card-stats">
                    <div class="card-header card-header-primary card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">house</i>
                      </div>
                      <p class="card-category">Propiedades Registrados</p>
                      <h3 class="card-title"><?= $query_propiedades->num_rows ?></h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons text-success">add</i>
                        <a href="propiedades.php">Ver todo...</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">supervised_user_circle</i>
                      </div>
                      <p class="card-category">Asesores Registrados</p>
                      <h3 class="card-title"><?= $query_users->num_rows ?></h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons text-success">add</i>
                        <a href="users.php">Ver todo...</a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                      <div class="card-icon">
                        <i class="material-icons">speaker_notes</i>
                      </div>
                      <p class="card-category">Mensajes Recibidos</p>
                      <h3 class="card-title"><?= $query_mensajes->num_rows ?></h3>
                    </div>
                    <div class="card-footer">
                      <div class="stats">
                        <i class="material-icons text-success">add</i>
                        <a href="mensajeria.php">Ver todo...</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Últimas Propiedades Registradas</h4>
                  <p class="card-category">Estos son los últimos 10 registros que se han recibido.</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-success">
                      <th>Nombre</th>
                      <th>Tipo de Oferta</th>
                      <th>Asesor</th>
                    </thead>
                    <tbody>
                      <?php foreach($query_propiedades as $propiedad): ?>
                      <tr>
                        <td><?= $propiedad['nombre'] ?></td>
                        <td><?= $propiedad['tipo_oferta_nombre'] ?></td>
                        <td><?= $propiedad['asesor_nombre'] ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Últimos Mensajes Registrados</h4>
                  <p class="card-category">Estos son los últimos 10 registros que se han recibido.</p>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-success">
                      <th>Nombre</th>
                      <th>Teléfono</th>
                      <th>Fecha y Hora</th>
                    </thead>
                    <tbody>
                      <?php foreach($query_mensajes as $mensaje): ?>
                      <tr>
                        <td><?= $mensaje['nombre'] ?></td>
                        <td><?= $mensaje['telefono'] ?></td>
                        <td><?= $mensaje['registered'] ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
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
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/panel/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Main Scripts! -->
  <script src="../assets/panel/js/main.js"></script>
</body>

</html>