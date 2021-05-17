<?php 

if(empty($_GET['propiedad'])): http_response_code(404); return; header('location: ./');
endif;

$id_propiedad = $_GET['propiedad'];

require ('mod/config.php'); 
require ('mod/propiedades.php'); 
require ('mod/users.php'); 
require ('mod/ciudades.php'); 
$con_ciudades = new Ciudades();
$con_propiedades = new Propiedades();
$query_propiedad = $con_propiedades->SelPropiedad($id_propiedad);

if(!$query_propiedad->num_rows): http_response_code(404); return; header('location: ./');
endif;

$propiedad = $query_propiedad->fetch_array();

$con_galeria = new Galeria();
$query_galeria = $con_galeria->SelGaleria($id_propiedad);
$con_users = new Users();
$query_asesor = $con_users->SelUser($propiedad['asesor']);
$query_propiedades_relativas = $con_propiedades->SelDiferentesPropiedades($propiedad['id'], 3);

?> 
<!DOCTYPE html>
<html lang="es">
  <head>
    <title><?= $system['title'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500|Material+Icons"> 
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="icon" href="assets/images/favicon.png" type="image/png">
	  
	<meta name=”robots” content="noindex, nofollow">
	  
	<meta name="keywords" content="arrienda, venta, alquiler, administracion, bodegas, locales, oficinas, consultorios, medellin, antioquia, colombia, departamentos, apartamentos, casa, lotes, oferta, promocion, comodo, varato, accesible, alcance, real estate, <?= $propiedad['ciudad'] ?>, <?= $propiedad['barrio'] ?>"/>
	  
	<meta name="description" content="Somos una empresa Inmobiliaria dedicada a la comercialización de inmuebles del sector industrial y comercial, con una amplia experiencia asesorando a las mas grandes empresas colombianas, altos directivos y grandes inversionistas en la consecución del espacio (inmueble) mas adecuado para el logro de sus objetivos y actividades comerciales. <?= $propiedad['descripcion'] ?>">
	  
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-P7QKLRJ');</script>
	<!-- End Google Tag Manager -->

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets/css/mediaelementplayer.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="assets/css/fl-bigmug-line.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/libs/floating-wpp.css">
    
  </head>
  <body>
  
	 <!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P7QKLRJ"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	  
  <div class="site-loader"></div>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    <div class="border-bottom *bg-white bg-primary text-white top-bar" data-aos="fade-down">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-6 col-md-6">
            <p class="mb-0">
              <a href="tel:3015328300" class="mr-3 text-white"><span class="text-white fl-bigmug-line-phone351"></span> <span class="d-none d-md-inline-block ml-2">(+57) 301 532 83 00</span></a>
              <a href="mailto:comercial@bodegasyproyectos.com" class="text-white"><span class="text-white fl-bigmug-line-email64"></span> <span class="d-none d-md-inline-block ml-2">comercial@bodegasyproyectos.com</span></a>
            </p>  
          </div>
          <div class="col-6 col-md-6 text-right text-white">
            <a href="https://www.facebook.com/bodegasyproyectos" class="mr-3"><span class="text-white icon-facebook"></span></a>
            <a href="https://www.linkedin.com/in/bodegasyproyectos" class="mr-3"><span class="text-white icon-linkedin"></span></a>
            <a href="https://twitter.com/bodegasyproyect" class="mr-3"><span class="text-white icon-twitter"></span></a>
            <a href="https://www.instagram.com/bodegasyproyectos/" class="mr-0"><span class="text-white icon-instagram"></span></a>
          </div>
        </div>
      </div>
      
    </div>
    <div class="site-navbar">
      <div class="container py-1">
        <div class="row align-items-center">
          <div class="col-8 col-md-8 col-lg-4" data-aos="fade-down" data-aos-delay="100">
            <h1 class=""><a href="index.php" class="h5 text-uppercase text-black"><img src="assets/images/logo.png" class="img-fluid" height="50"></a></h1>
          </div>
          <div class="col-4 col-md-4 col-lg-8">
            <nav class="site-navigation text-right text-md-right" role="navigation">

              <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="javascript:;" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>
              <?php require ('structure/menu.php'); ?>
            </nav>
          </div>


        </div>
      </div>
    </div>
  </div>


    <div class="site-blocks-cover overlay sb-small" style="background-image: url(assets/images/home-bg.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-10">
            <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Información detallada de</span>
            <h1 class="mb-2"><?= $propiedad['nombre'] ?></h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm">
      <div class="container">
        <div class="row">
          <div class="col-lg-8" style="margin-top: -150px;">
            <div class="mb-5">
              <div class="slide-one-item home-slider owl-carousel">
                <div><img src="assets/images/img_1.jpg" alt="Image" class="img-fluid"></div>
                <div><img src="assets/images/img_2.jpg" alt="Image" class="img-fluid"></div>
                <div><img src="assets/images/img_3.jpg" alt="Image" class="img-fluid"></div>
              </div>
            </div>
            <div class="bg-white">
              <div class="row *mb-5 p-md-5 p-3">
                <div class="col-md-12">
                  <img src="assets/images/propiedades/<?= $propiedad['imagen_destacada'] ?>" class="img-fluid">
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6">
                  <strong class="text-success h1 mb-3">$<?= $propiedad['precio_format'] ?></strong>
                </div>
                <div class="col-md-6">
                  <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                  <li>
                    <span class="property-specs">Ficha Técnica</span>
                    <a href="ficha-tecnica?propiedad=<?= $propiedad['id'] ?>" target="_blank">DESCARGAR</a>
                  </li>
                </ul>
                </div>
                <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Tipo de Oferta</span>
                  <strong class="d-block"><?= $propiedad['tipo_oferta_nombre'] ?></strong>
                </div>
                <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Tipo de Propiedad</span>
                  <strong class="d-block"><?= $propiedad['tipo_propiedad'] ?></strong>
                </div>
                <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Tamaño de Área</span>
                  <strong class="d-block"><?= $propiedad['area'] ?></strong>
                </div>
                <?php if($propiedad['ano'] != NULL): ?>
                <div class="col-md-6 col-lg-4 text-left border-bottom border-top py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Año</span>
                  <strong class="d-block"><?= $propiedad['ano'] ?></strong>
                </div>
                <?php endif; ?>
                <?php if($propiedad['tamano_lote'] != NULL): ?>
                <div class="col-md-6 col-lg-4 text-left border-bottom py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Tamaño de Lote</span>
                  <strong class="d-block"><?= $propiedad['tamano_lote'] ?></strong>
                </div>
                <?php endif; ?>
                <?php if($propiedad['banos'] != NULL): ?>
                <div class="col-md-6 col-lg-4 text-left border-bottom py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Baños</span>
                  <strong class="d-block"><?= $propiedad['banos'] ?></strong>
                </div>
                <?php endif; ?>
                <div class="col-md-6 col-lg-4 text-left border-bottom py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Ciudad</span>
                  <strong class="d-block"><?= $propiedad['ciudad_nombre'] ?></strong>
                </div>
                <?php if($propiedad['barrio'] != NULL): ?>
                <div class="col-md-6 col-lg-4 text-left border-bottom py-3">
                  <span class="d-inline-block text-black mb-0 caption-text">Barrio</span>
                  <strong class="d-block"><?= $propiedad['barrio_nombre'] ?></strong>
                </div>
                <?php endif; ?>
              </div>
              <h2 class="h4 text-black">Descripción de la Propiedad</h2>
              <p><?= $propiedad['descripcion']; ?></p>
              <?php if($query_galeria->num_rows): ?>
              <div class="row mt-5">
                <div class="col-12">
                  <h2 class="h4 text-black mb-3">Imagenes de la Propiedad</h2>
                </div>
                <?php foreach($query_galeria as $galeria): ?>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                  <a href="images/propiedades/fotos/<?= $galeria['imagen'] ?>" class="image-popup gal-item"><img src="assets/images/propiedades/fotos/<?= $galeria['imagen'] ?>" alt="Image" class="img-fluid"></a>
                </div>
                <?php endforeach; ?>
              </div>
              <?php endif; ?>
            </div>
          </div>
          <?php if($query_asesor->num_rows): $asesor = $query_asesor->fetch_array(); ?>
          <div class="col-lg-4 pl-md-5">
            <div class="bg-white widget border rounded informacion-asesor">
              <div class="text-center">
                <h5 class="mb-3 widget-title letter-spacing-1">Información del Asesor</h5>
                <img src="assets/images/profile_pictures/<?= $asesor['profile_pic'] ?>" width="160" class="img-fluid">
                <h4 class="mt-3"><?= $asesor['name'] ?></h4>
                  
                  <p><a href="tel:<?= $asesor['telephone'] ?>" class="pt-4 pr-2"><span class="icon-phone"></span></a> <?= $asesor['telephone'] ?></p>
                <p class="pl-0">
                  <a href="#" class="btn btn-danger"><span class="icon-instagram"></span></a> 
                  <a href="#" class="btn btn-blue-fb"><span class="icon-facebook"></span></a>
                  <a href="#" class="btn btn-info"><span class="icon-twitter"></span></a>
                  <a href="#" class="btn btn-linkedin"><span class="icon-linkedin"></span></a>
                  <a href="#" class="btn btn-primary"><span class="icon-envelope"></span></a>
                </p>
              </div>
              <hr>
              <h3 class="h4 text-black widget-title mb-3">Contacta al Asesor</h3>
              <form id="contactar-asesor" class="form-contact-agent">
                <input type="hidden" name="propiedad" value="<?= $propiedad['id'] ?>">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Teléfono</label>
                  <input type="text" name="telefono" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Mensaje</label>
                  <textarea name="mensaje" class="form-control" required style="height: 200px"></textarea>
                </div>
                <div class="form-group m-0">
                  <input type="submit" id="phone" class="btn btn-primary" value="ENVIAR MENSAJE">
                </div>
              </form>
            </div>

            <div class="bg-white widget border rounded" hidden>
              <h3 class="h4 text-black widget-title mb-3">Paragraph</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit qui explicabo, libero nam, saepe eligendi. Molestias maiores illum error rerum. Exercitationem ullam saepe, minus, reiciendis ducimus quis. Illo, quisquam, veritatis.</p>
            </div>

          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    
    <div class="site-section border-top">
      <div class="container">
        <!-- Filtro -->
        <form class="row" id="main-filter" action="filtrar-propiedades" method="POST">
          <div class="col-lg-12 text-center mb-4 site-section-title" data-aos="fade">
            <h2>¿Quieres buscar otra propiedad?</h2>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="tipo_oferta" class="form-control d-block rounded-0" required>
                <option value="-" selected>Tipo de Oferta</option>
                <option value="2">Arriendo</option>
                <option value="1">Venta</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="200">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="tipo_propiedad" class="form-control d-block rounded-0">
                <option value="-" selected>Tipo de Propiedad</option>
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
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="300">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="ciudad" class="form-control d-block rounded-0">
                <option value="-" selected>Ciudad</option>
                <?php foreach($query_ciudades as $ciudad): ?>
                <option value="<?= $ciudad['id'] ?>"><?= $ciudad['nombre'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="400">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="barrio" class="form-control d-block rounded-0">
                <option value="-" selected>Barrio</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="500">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="area" class="form-control d-block rounded-0">
                <option value="-" selected>Área (m2)</option>
                <option value="-50">Menos de 50mts</option>
                <option value="50-100">De 50 a 100mts</option>
                <option value="100-300">De 100 a 300mts</option>
                <option value="300-500">De 300 a 500mts</option>
                <option value="500-800">De 500 a 800mts</option>
                <option value="800-1500">De 800 a 1500mts</option>
                <option value="+1500">Más de 1500mts</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="600">
            <div class="select-wrap">
              <span class="icon icon-arrow_drop_down"></span>
              <select name="precio" class="form-control d-block rounded-0">
                <option value="-">Todos los precios</option>
                <option value="0-1">Entre $0 y $1 millón</option>
                <option value="1-2">Entre $1 y $2 millones</option>
                <option value="2-5">Entre $2 y $5 millones</option>
                <option value="5-10">Entre $5 y $10 millones</option>
                <option value="10-20">Entre $10 y $20 millones</option>
                <option value="20-50">Entre $20 y $50 millones</option>
                <option value="50-100">Entre $50 y $100 millones</option>
                <option value="100-200">Entre $100 y $200 millones</option>
                <option value="200-500">Entre $200 y $500 millones</option>
                <option value="500-800">Entre $500 y $800 millones</option>
                <option value="800-1000">Entre $800 y $1.000 millones</option>
                <option value="+1000">Más de $1.000 millones</option>
              </select>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="700">
            <div class="mb-4">
              <div class="form-group">
                <input type="text" name="codigo" class="form-control" placeholder="Código" title="Si rellena esta información, la información previamente indicada no será tomada en cuenta." autocomplete="disabled">
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-4 col-lg-3 mb-4" data-aos="fade-up" data-aos-delay="800">
            <button type="submit" class="btn btn-primary btn-block form-control-same-height rounded-0"><i class="icon-search"></i> Buscar</button>
          </div>
        </form>
      </div>
    </div>

    <div class="site-section site-section-sm bg-light pb-0">
      <div class="container">

        <div class="row">
          <div class="col-12">
            <div class="site-section-title mb-5">
              <h2>MIRA ESTAS OTRAS PROPIEDADES</h2>
            </div>
          </div>
        </div>
      
        <div class="row mb-5 propiedades">
          <?php foreach($query_propiedades_relativas as $propiedad): ?>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="prop-entry d-block">
              <figure>
                <img src="assets/images/propiedades/<?= $propiedad['imagen_destacada'] ?>" alt="Image" class="img-fluid">
              </figure>
              <div class="prop-text">
                <div class="inner">
                  <span class="price rounded"><?= $propiedad['precio_format'] ?></span>
                  <h3 class="title"><?= $propiedad['nombre'] ?> (<?= $propiedad['tipo_oferta_nombre'] ?>)</h3>
                  <p class="location"><?= $propiedad['ciudad_nombre'] . ', ' . $propiedad['barrio_nombre'] ?></p>
                </div>
                <div class="prop-more-info">
                  <div class="inner d-flex">
                    <div class="col">
                      <span>Área:</span>
                      <strong><?= $propiedad['area'] ?>m<sup>2</sup></strong>
                    </div>
                    <div class="col">
                      <span><button type="button" class="btn btn-sm btn-block rounded-0 color-primary" data-id="<?= $propiedad['id'] ?>"><span class="icon-search"></span></button></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

    <div class="site-section site-section-sm bg-primary" style="background-image: url(assets/images/bg_opacity.png)">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8" data-aos="fade-up">
            <h2 class="text-white">Amplia Gama de Propiedades solo para tí</h2>
            <p class="lead text-white">Estás en el sitio web donde podrás encontrar lo que estás buscando, tenemos todo en localces, bodegas, oficinas y más.</p>
          </div>
          <div class="col-md-4 text-center" data-aos="fade-up" data-aos-delay="300">
            <a href="./#filter-div" class="btn btn-outline-primary btn-block py-3 btn-lg">Empecemos a Buscar <i class="icon-search"></i></a>
          </div>
        </div>
      </div>
    </div>

  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3" data-aos="fade-up">
          <div class="mb-5">
            <h3 class="footer-heading mb-4" data-aos="fade-up">SOBRE NOSOTROS</h3>
            <p data-aos="fade-up" data-aos-delay="100">Somos una Red de Profesionales con la mayor experiencia en finca Raíz y el Sector Inmobiliario. Nuestra Agencia te Ofrece Importantes Proyectos en Alquiler, Venta y Administración de Bodegas, Oficinas, Locales, Lotes y Consultorios.</p>
          </div>
        </div>
        <div class="col-lg-3 mb-5 mb-lg-0">
          <div class="row mb-5">
            <div class="col-md-12">
              <h3 class="footer-heading mb-4" data-aos="fade-up">Menú de Navegación</h3>
            </div>
            <div class="col-md-6 col-lg-6">
              <ul class="list-unstyled">
                <li data-aos="fade-up" data-aos-delay="100"><a href="./index">Inicio</a></li>
                <li data-aos="fade-up" data-aos-delay="200"><a href="./acerca-de">Acerca de</a></li>
                <li data-aos="fade-up" data-aos-delay="300"><a href="./blog">Blog</a></li>
              </ul>
            </div>
            <div class="col-md-6 col-lg-6">
              <ul class="list-unstyled">
                <li data-aos="fade-up" data-aos-delay="500"><a href="./filtrar-propiedades?t=1">Venta</a></li>
                <li data-aos="fade-up" data-aos-delay="600"><a href="./filtrar-propiedades?t=2">Arriendo</a></li>
                <li data-aos="fade-up" data-aos-delay="700"><a href="./contact">Contáctanos</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-3 mb-5 mb-lg-0">
          <h3 class="footer-heading mb-4" data-aos="fade-up" data-aos-delay="900">Siguenos</h3>
              <div>
                <a href="#" class="pl-0 pr-3" data-aos="fade-up" data-aos-delay="1000"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3" data-aos="fade-up" data-aos-delay="1100"><span class="icon-twitter"></span></a>
                <a href="https://instagram.com/bodegasyespacios" class="pl-3 pr-3" data-aos="fade-up" data-aos-delay="1200"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3" data-aos="fade-up" data-aos-delay="1300"><span class="icon-linkedin"></span></a><br><br>
				  <p class="mb-0 font-weight-bold" data-aos="fade-up" data-aos-delay="1350">Teléfono</p>
				  <p class="mb-4" data-aos="fade-up" data-aos-delay="1350"><a href="tel:00573014674251">(+57) 3014674251</a></p>

				  <p class="mb-0 font-weight-bold" data-aos="fade-up" data-aos-delay="1400">Correo Electrónico</p>
				  <p class="mb-4" data-aos="fade-up" data-aos-delay="1450"><a href="mailto:comercial@bodegasyproyectos.com">comercial@bodegasyproyectos.com</a></p>

				  <p class="mb-0 font-weight-bold" data-aos="fade-up" data-aos-delay="1500">Dirección</p>
				  <p class="mb-0" data-aos="fade-up" data-aos-delay="1550">Circular 2 # 70 - 24 of 806, Laureles<br>
				  Medellín - Colombia.</p>
              </div>
        </div>

        <div class="col-lg-3 mb-5 mb-lg-0">
          <div class="mb-5 text-center">
            <h3 class="footer-heading mb-4" data-aos="fade-up" data-aos-delay="1600">OFERTE con NOSOTROS</h3>
            <h1 class="text-white" data-aos="fade-up" data-aos-delay="1700"><span class="icon icon-home"></span></h1>
            <h3 class="px-2" data-aos="fade-up" data-aos-delay="1800">Oferte su Propiedad con Nosotros</h3>
            <a href="./contact.php" class="btn btn-primary rounded-0 mt-4 letter-spacing-1" data-aos="fade-up" data-aos-delay="1900">OFERTAR</a>
          </div>
        </div>

      </div>
      <div class="row pt-5 mt-5 text-center">
        <div class="col-md-12">
          <p>
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Desarrollado por <a href="https://wa.me/584121656014" target="_blank" ><img src="assets/images/logo_sr.png" height="15" style="margin-bottom: 1px"></a>
          </p>
        </div>

      </div>
    </div>
  </footer>
  </div>

  <div class="wpp-plugin"></div>
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/owl.carousel.min.js"></script>
  <script src="assets/js/mediaelement-and-player.min.js"></script>
  <script src="assets/js/jquery.stellar.min.js"></script>
  <script src="assets/js/jquery.countdown.min.js"></script>
  <script src="assets/js/jquery.magnific-popup.min.js"></script>
  <script src="assets/js/bootstrap-datepicker.min.js"></script>
  <script src="assets/libs/sweetalert2.all.min.js"></script>
  <script src="assets/js/aos.js"></script>
  <script type="text/javascript" src="assets/libs/floating-wpp.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/contactar-asesor.js"></script>
    
  </body>
</html>