<?php session_start();

# Chequeo que no haya iniciado sesión.
if(!isset($_SESSION['sert_cpanel']['id']) && empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); } ?>

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
  <link href="../assets/panel/datatable/datatables.min.css" rel="stylesheet" />
  <link href="../assets/panel/css/datepicker.min.css" rel="stylesheet" />
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" /> -->
  <!-- Select Picker -->
  <link rel="stylesheet" href="../assets/panel/css/bootstrap-select.css">
  <style>
    .datepicker-container {
      z-index: 2000 !important;
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="../" class="simple-text logo-normal">
          <img src="../images/logo.png" class="img-fluid" height="50">
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
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-success">
                  <h4 class="card-title">Registro de Mentores/Lideres</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Nombre
                        </th>
                        <th>
                          Apellido
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
      <div id="ver-registro" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Ver Registro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Guardar Cambios</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <div id="nuevo-registro" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Nuevo Registro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-nuevo-registro" action="../dri/mentores/new.php">
                <div class="row">
                  <div class="col-md-3 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nombre</label>
                      <input type="text" class="form-control" name="name" required>
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Apellido</label>
                      <input type="text" class="form-control" name="lastname" required>
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Cédula</label>
                      <input type="text" class="form-control" name="ident_num">
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Teléfono</label>
                      <input type="text" class="form-control" name="telephone">
                    </div>
                  </div>
                </div>
                <div class="row mt-lg-3">
                  <div class="col-md-8 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Correo Electrónico</label>
                      <input type="email" class="form-control" name="email">
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Fecha de Nacimiento</label>
                      <input type="text" class="form-control datepicker" name="birthdate">
                    </div>
                  </div>
                </div>
                <div class="row mt-lg-3">
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label>Red</label>
                      <select name="network" class="form-control" required><option>-</option></select>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label>Casa de Paz</label>
                      <select name="hop" class="form-control"><option>-</option></select>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label>Ministerio donde Sirve</label>
                      <select name="ministerio" class="form-control">
                        <option null>-</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mt-lg-3">
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label>Mentor de Red</label>
                      <select name="mentor_2" class="form-control"><option>-</option></select>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label>Mentor Inmediato</label>
                      <select name="mentor_1" class="form-control"><option>-</option></select>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-6" hidden>
                    <div class="form-group">
                      <label>Asignación del Ministerio</label>
                      <input type="text" name="asignacion_ministerio">
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label>¿Diacono o Anciano?</label>
                      <select name="diacono_anciano" class="form-control">
                        <option>-</option>
                        <option>Diacono</option>
                        <option value="anciano">Anciano</option>
                      </select>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" form="form-nuevo-registro" class="btn btn-primary">Guardar Cambios</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <div id="actualizar-registro" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Actualizar Registro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form-actualizar-registro" action="../dri/mentores/upd.php">
                <div class="row">
                  <input type="hidden" name="id">
                  <div class="col-md-3 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nombre</label>
                      <input type="text" class="form-control" name="name" required>
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Apellido</label>
                      <input type="text" class="form-control" name="lastname" required>
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Cédula</label>
                      <input type="text" class="form-control" name="ident_num">
                    </div>
                  </div>
                  <div class="col-md-3 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Teléfono</label>
                      <input type="text" class="form-control" name="telephone">
                    </div>
                  </div>
                </div>
                <div class="row mt-lg-3">
                  <div class="col-md-8 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Correo Electrónico</label>
                      <input type="email" class="form-control" name="email">
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Fecha de Nacimiento</label>
                      <input type="text" class="form-control datepicker" name="birthdate">
                    </div>
                  </div>
                </div>
                <div class="row mt-lg-3">
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label>Red</label>
                      <select name="network" class="form-control" required><option>-</option></select>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label>Casa de Paz</label>
                      <select name="hop" class="form-control"><option>-</option></select>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label>Ministerio donde Sirve</label>
                      <select name="ministerio" class="form-control">
                        <option null>-</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mt-lg-3">
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label>Mentor de Red</label>
                      <select name="mentor_2" class="form-control"><option>-</option></select>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label>Mentor Inmediato</label>
                      <select name="mentor_1" class="form-control"><option>-</option></select>
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-6" hidden>
                    <div class="form-group">
                      <label>Asignación del Ministerio</label>
                      <input type="text" name="asignacion_ministerio">
                    </div>
                  </div>
                  <div class="col-md-4 col-xs-6">
                    <div class="form-group">
                      <label>¿Diacono o Anciano?</label>
                      <select name="diacono_anciano" class="form-control">
                        <option>-</option>
                        <option>Diacono</option>
                        <option value="anciano">Anciano</option>
                      </select>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" form="form-actualizar-registro" class="btn btn-primary">Guardar Cambios</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      <div id="eliminar-registro" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Eliminar Registro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Guardar Cambios</button>
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
  <script src="../assets/panel/js/main.js"></script>
  <script src="../assets/panellibs/datepicker.min.js"></script>
  <script src="../assets/panellibs/datepicker.es-ES.min.js"></script>
  <!-- Datatable! -->
  <script src="../assets/paneldatatable/datatables.min.js"></script>
  <!-- Form, Modal, Scripts -->
  <script src="../assets/panel/js/mentores/script.js"></script>
</body>

</html>