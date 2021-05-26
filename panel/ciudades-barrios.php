<?php session_start();

# Chequeo que no haya iniciado sesión.
if(!isset($_SESSION['sert_cpanel']['id']) && empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); }

if($_SESSION['sert_cpanel']['id'] != 1) { echo http_response_code(404); header ('Location: ./'); }

require ('../mod/config.php'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/panel/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/panel/img/favicon.png">
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
  <link href="../assets/panel/datatable/datatables.min.css" rel="stylesheet" />
  <link href="../assets/panel/css/datepicker.min.css" rel="stylesheet" />
  
  <!-- Select Picker -->
  <link rel="stylesheet" href="../assets/panel/css/bootstrap-select.css">
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
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Cuenta
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="perfil.php">Mi Perfil</a>
                  
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Registro de Ciudades</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table barrios">
                      <thead class="text-primary">
                        <th>
                          Nombre
                        </th>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Ciudades -->
      <div id="ver-ciudad" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ver Registro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="ver-registro-ciudad">
                <input type="hidden" name="id">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nombre</label>
                      <input type="text" class="form-control" name="nombre" disabled>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <div id="nueva-ciudad" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Nueva Ciudad</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-nueva-ciudad" action="../dri/ciudades/new.php">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nombre</label>
                      <input type="text" class="form-control" name="nombre">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" form="form-nueva-ciudad" class="btn btn-primary">Guardar Cambios</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <div id="actualizar-ciudad" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Actualizar Ciudad</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-actualizar-ciudad" action="../dri/ciudades/upd.php">
                <input type="hidden" name="id">
                <div class="row">
                  <div class="col-md-3 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nombre</label>
                      <input type="text" class="form-control" name="nombre">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" form="form-actualizar-ciudad" class="btn btn-primary">Guardar Cambios</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Barrios -->
      <div id="ver-barrio" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ver Barrio</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="ver-registro-barrio">
                <input type="hidden" name="id">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nombre</label>
                      <input type="text" class="form-control" name="nombre" disabled>
                    </div>
                  </div>
                </div>
              </form>
              <table class="table ciudades">
                <thead class=" text-primary">
                  <th>
                    Nombre
                  </th>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <div id="nuevo-barrio" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Nuevo Barrio</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-nuevo-barrio" action="../dri/barrios/new.php">
                <input type="hidden" name="ciudad">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nombre</label>
                      <input type="text" class="form-control" name="nombre">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" form="form-nuevo-barrio" class="btn btn-primary">Guardar Cambios</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <div id="actualizar-barrio" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Actualizar Barrio</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-actualizar-barrio" action="../dri/barrios/upd.php">
                <input type="hidden" name="id">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nombre</label>
                      <input type="text" class="form-control" name="nombre">
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" form="form-actualizar-barrio" class="btn btn-primary">Guardar Cambios</button>
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
  <script src="../assets/panel/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/panel/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/panel/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/panel/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/panel/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="../assets/panel/js/plugins/core.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/panel/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/panel/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Datatable! -->
  <script src="../assets/panel/datatable/datatables.min.js"></script>
  <!-- Main Scripts! -->
  <script src="../assets/panel/js/main.js"></script>
  <!-- Form, Modal, Scripts -->
  <script src="../assets/panel/js/ciudades-barrios/ciudades.js"></script>
</body>

</html>