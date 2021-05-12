<?php session_start();

# Chequeo que no haya iniciado sesión.
if(!isset($_SESSION['sert_cpanel']['id']) && empty($_SESSION['sert_cpanel']['id'])) { header ('Location: sign-in.php'); }

require ('../mod/config.php');
require ('../mod/propiedades.php');
require ('../mod/ciudades.php');

$con_propiedades = new Propiedades();
$con_ciudades = new Ciudades();

# Query de las ciudades
$query_ciudades = $con_ciudades->SelCiudades();

if(isset($_GET['propiedad'])):
$propiedad = $_GET['propiedad'];
else:
$propiedad = null;
endif;

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
  <!--  -->
  <!-- CSS Files -->
  <link href="../assets/panel/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/panel/demo/demo.css" rel="stylesheet" />
  <!-- jQuery Steps -->
  <link href="../assets/panel/css/jquery.steps.css" rel="stylesheet" />
  <!-- DataTable -->
  <link href="../assets/panel/datatable/datatables.min.css" rel="stylesheet" />
  <!-- Select Picker -->
  <link rel="stylesheet" href="../assets/panel/css/bootstrap-select.css">
  <!-- Croppie -->
  <link rel="stylesheet" href="../assets/panel/css/croppie.css">
  
  <style>
    #galeria-propiedad #fotos-cargadas { 
      margin-bottom: 5px;
      padding-bottom: 5px;
      border-bottom: 1px solid #f0f0f0;
    }
    
    #galeria-propiedad #fotos-cargadas .box {
      padding: 5px;
      background: #eaeaea;
      border-radius: 5px;
      width: 90px;
      height: 110px;
      display: inline-block;
      margin: 2.5px;
    }
    
    #galeria-propiedad #fotos-cargadas .close:after {
      content: 'x';
    }
    
    #galeria-propiedad #fotos-cargadas .close {
      border-top: 1px solid #aaaaaa;
      text-align: center;
      font-size: 20px;
      float: inherit;
    }

    #galeria-propiedad #fotos-cargadas img {
      width: 80px;
      height: 80px;
      border: 1px solid #eaeaea;
    }
    
    .modal form input[type=file] {
      padding: 30px; 
      border: 2px #eaeaea dashed;
      width: 100%;
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
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    En desarrollo...
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">#1</a>
                  <a class="dropdown-item" href="#">#2</a>
                  <a class="dropdown-item" href="#">#3</a>
                  <a class="dropdown-item" href="#">#4</a>
                  <a class="dropdown-item" href="#">#5</a>
                </div>
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
                  <h4 class="card-title ">Registro de Propiedades</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" propiedad="34">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Nombre
                        </th>
                        <th>
                          Tipo de Propiedad
                        </th>
                        <th>
                          Tipo de Oferta
                        </th>
                        <th>
                          Precio
                        </th>
                        <th class="to-hide">
                          Ciudad
                        </th>
                        <th class="to-hide">
                          Barrio
                        </th>
                        <th class="to-hide">
                          Área
                        </th>
                        <th class="to-hide">
                          Año
                        </th>
                        <th class="to-hide">
                          Tamaño de Lote
                        </th>
                        <th class="to-hide">
                          Asesor
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
              <form id="ver-registro">
                <div class="row">
                  <input type="hidden" name="asesor" value="<?= $_SESSION['sert_cpanel']['id']; ?>">
                  <div class="col-lg-9 mb-1">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nombre de la Propiedad</label>
                      <input type="text" class="form-control" name="nombre" required>
                    </div>
                  </div>
                  <div class="col-lg-3 mb-1">
                    <div class="form-group">
                      <label class="bmd-label-floating">Asesor</label>
                      <input type="text" class="form-control" name="asesor_nombre" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Descripción</label>
                      <textarea class="form-control" name="descripcion" required rows="4"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Dirección</label>
                      <textarea class="form-control" name="direccion" required rows="4"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-6 col-xs-6">
                    <div class="form-group">
                      <label>Ciudad</label>
                      <select name="ciudad" class="form-control" required disabled>
                        <?php foreach($query_ciudades as $ciudad): ?>
                        <option value="<?= $ciudad['id'] ?>"><?= $ciudad['nombre'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 col-xs-6">
                    <div class="form-group">
                      <label>Barrio</label>
                      <select name="barrio" class="form-control" disabled>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-6 col-xs-6">
                    <div class="form-group">
                      <label>Tipo de Propiedad</label>
                      <input type="text" class="form-control" name="tipo_propiedad" required>
                    </div>
                  </div>
                  <div class="col-lg-6 col-xs-6">
                    <div class="form-group">
                      <label>Tipo de Oferta</label>
                      <input type="text" class="form-control" name="tipo_oferta_nombre" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-3 col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tamaño de Lote</label>
                      <input type="number" class="form-control" min="1" name="tamano_lote">
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Área (m2)</label>
                      <input type="number" class="form-control" min="1" name="area" required>
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Año</label>
                      <input type="number" maxlength="4" class="form-control" name="ano">
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Baños</label>
                      <input type="number" maxlength="1" class="form-control" name="banos">
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">URL del Video (Youtube, etc)</label>
                      <input type="text" class="form-control" min="1" name="video">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Precio</label>
                      <input type="number" class="form-control" min="1" name="precio" required>
                    </div>
                  </div>
                </div>
              </form>
              <div class="row">
                <div class="col-lg-6">
                  <button type="button" class="btn btn-success btn-block ver-foto-destacada">Ver Foto Destacada</button>
                </div>
                <div class="col-lg-6">
                  <button type="button" class="btn btn-success btn-block ver-galeria">Ver Galeria de la Propiedad</button>
                </div>
              </div>
            </div>
            <div class="modal-footer">
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
              <form id="form-nuevo-registro" action="../dri/propiedades/new.php" send="new">
                <div class="row">
                  <input type="hidden" name="asesor" value="<?= $_SESSION['sert_cpanel']['id']; ?>">
                  <div class="col-lg-12 mb-1">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nombre de la Propiedad</label>
                      <input type="text" class="form-control" name="nombre" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Descripción</label>
                      <textarea class="form-control" name="descripcion" required rows="4"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Dirección</label>
                      <textarea class="form-control" name="direccion" required rows="4"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-6 col-xs-6">
                    <div class="form-group">
                      <label>Ciudad</label>
                      <select name="ciudad" class="form-control" required>
                        <?php foreach($query_ciudades as $ciudad): ?>
                        <option value="<?= $ciudad['id'] ?>"><?= $ciudad['nombre'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 col-xs-6">
                    <div class="form-group">
                      <label>Barrio</label>
                      <select name="barrio" class="form-control">
                        
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-6 col-xs-6">
                    <div class="form-group">
                      <label>Tipo de Propiedad</label>
                      <select name="tipo_propiedad" class="form-control" required>
                        <option>Bodegas</option>
                        <option>Oficinas</option>
                        <option>Locales</option>
                        <option>Lotes</option>
                        <option>Apartamentos</option>
                        <option>Casas</option>
                        <option>Consultorios</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 col-xs-6">
                    <div class="form-group">
                      <label>Tipo de Oferta</label>
                      <select name="tipo_oferta" class="form-control" required>
                        <option value="2">Arriendo</option>
                        <option value="1">Venta</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-3 col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tamaño de Lote</label>
                      <input type="number" class="form-control" min="1" name="tamano_lote">
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Área (m2)</label>
                      <input type="number" class="form-control" min="1" name="area" required>
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Año</label>
                      <input type="number" maxlength="4" class="form-control" name="ano">
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Baños</label>
                      <input type="number" maxlength="1" class="form-control" name="banos">
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">URL del Video (Youtube, etc)</label>
                      <input type="text" class="form-control" min="1" name="video">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Precio</label>
                      <input type="number" class="form-control" min="1" name="precio" required>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" form="form-nuevo-registro" class="btn btn-success">Guardar y Continuar</button>
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
              <form id="form-actualizar-registro" action="../dri/propiedades/upd.php">
                <input type="hidden" name="id">
                <div class="row">
                  <div class="col-lg-12 mb-1">
                    <div class="form-group">
                      <label class="bmd-label-floating">Nombre de la Propiedad</label>
                      <input type="text" class="form-control" name="nombre" required>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Descripción</label>
                      <textarea class="form-control" name="descripcion" required rows="4"></textarea>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Dirección</label>
                      <textarea class="form-control" name="direccion" required rows="4"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-6 col-xs-6">
                    <div class="form-group">
                      <label>Ciudad</label>
                      <select name="ciudad" class="form-control" required>
                        <?php foreach($query_ciudades as $ciudad): ?>
                        <option value="<?= $ciudad['id'] ?>"><?= $ciudad['nombre'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 col-xs-6">
                    <div class="form-group">
                      <label>Barrio</label>
                      <select name="barrio" class="form-control">
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-6 col-xs-6">
                    <div class="form-group">
                      <label>Tipo de Propiedad</label>
                      <select name="tipo_propiedad" class="form-control" required>
                        <option>Bodegas</option>
                        <option>Oficinas</option>
                        <option>Locales</option>
                        <option>Lotes</option>
                        <option>Apartamentos</option>
                        <option>Casas</option>
                        <option>Consultorios</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6 col-xs-6">
                    <div class="form-group">
                      <label>Tipo de Oferta</label>
                      <select name="tipo_oferta" class="form-control" required>
                        <option value="2">Arriendo</option>
                        <option value="1">Venta</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-3 col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tamaño de Lote</label>
                      <input type="number" class="form-control" min="1" name="tamano_lote">
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Área (m2)</label>
                      <input type="number" class="form-control" min="1" name="area" required>
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Año</label>
                      <input type="number" maxlength="4" class="form-control" name="ano">
                    </div>
                  </div>
                  <div class="col-lg-3 col-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Baños</label>
                      <input type="number" maxlength="1" class="form-control" name="banos">
                    </div>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">URL del Video (Youtube, etc)</label>
                      <input type="text" class="form-control" min="1" name="video">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Precio</label>
                      <input type="number" class="form-control" min="1" name="precio" required>
                    </div>
                  </div>
                </div>
              </form>
              <div class="row">
                <div class="col-lg-6">
                  <button type="button" class="btn btn-success btn-block editar-foto-destacada">Editar Foto Destacada</button>
                </div>
                <div class="col-lg-6">
                  <button type="button" class="btn btn-success btn-block editar-galeria">Editar Galeria de la Propiedad</button>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" form="form-actualizar-registro" class="btn btn-primary">Guardar Cambios</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
      
      <div id="foto-destacada" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Asignar Foto destacada</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="select-foto-destacada" class="text-center">
				<img class="img-fluid" id="imagen-destacada-img" style="display: none" width="300" height="300">
                <form id="form-foto-destacada" enctype="multipart/form-data">
                  <input type="hidden" name="propiedad" value="">
                  <div class="col-md-12 from-group">
                    <input type="file" name="image" class="form-group" id="input-foto-destacada">
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
      
      <div id="galeria-propiedad" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Fotos de la Propiedad</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="fotos-cargadas">
              </div>
              <div id="select-foto-galeria">
                <form id="form-galeria-propiedad" enctype="multipart/form-data">
                  <input type="hidden" name="propiedad" value="19">
                  <div class="col-md-12 from-group">
                    <input type="file" name="image" class="form-group" id="input-foto-galeria">
                  </div>
                </form>
                <div class="text-center loader" style="display: none"><span class="material-icons spin">settings</span></div>
              </div>
            </div>
            <div class="modal-footer">
              <!-- <button type="button" class="btn btn-success modal-to-planos">Aceptar</button> -->
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
  <!--  jQuery Steps    -->
  <script src="../assets/panel/js/core/jquery.steps.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/panel/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/panel/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Main Scripts! -->
  <!-- Datatable! -->
  <script src="../assets/paneldatatable/datatables.min.js"></script>
  <script src="../assets/panel/js/main.js"></script>
  <script src="../assets/panel/js/croppie.min.js"></script>
  <script src="../assets/panellibs/datepicker.min.js"></script>
  <script src="../assets/panellibs/datepicker.es-ES.min.js"></script>
  <!-- Form, Modal, Scripts -->
  <script src="../assets/panel/js/propiedades/script.js"></script>
  <script src="../assets/panel/js/propiedades/foto-destacada.js"></script>
  <script src="../assets/panel/js/propiedades/galeria-propiedad.js"></script>
</body>

</html>