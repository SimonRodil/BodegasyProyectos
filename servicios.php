<?php 
require ('mod/config.php'); 
?> 
<!DOCTYPE html>
<html lang="es">
  <head>
    <title><?= $system['title'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
    <link rel="icon" href="assets/images/favicon.png" type="image/png">
	  
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
  
  <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(assets/images/about_us.JPG); background-position: bottom" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
          <h1 class="mb-2">Nuestros Servicios</h1>
          <div><a href="./index.php" class="orange-color">Inicio</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">Nuestros Servicios</strong></div>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-4 mb-4">
          <a href="javascript:;" data-toggle="modal" data-target="#servicio-1" class="service text-center border rounded">
            <span class="icon flaticon-real-state"></span>
            <h2 class="service-heading">Colocaci??n de Inmuebles</h2>
            <p><span class="read-more">Saber m??s</span></p>
          </a>
        </div>
        <div class="col-lg-4 mb-4">
          <a href="javascript:;" data-toggle="modal" data-target="#servicio-2" class="service text-center border rounded">
            <span class="icon flaticon-mortgage"></span>
            <h2 class="service-heading">Arriendo de Inmuebles</h2>
            <p><span class="read-more">Saber m??s</span></p>
          </a>
        </div>
      </div>
      <div class="row d-flex justify-content-center">
        <div class="col-lg-4 mb-4">
          <a href="javascript:;" data-toggle="modal" data-target="#servicio-3" class="service text-center border rounded">
            <span class="icon flaticon-sold"></span>
            <h2 class="service-heading">Venta de Inmuebles</h2>
            <p><span class="read-more">Saber m??s</span></p>
          </a>
        </div>
        <div class="col-lg-4 mb-4">
          <a href="javascript:;" data-toggle="modal" data-target="#servicio-4" class="service text-center border rounded">
            <span class="icon flaticon-real-estate-agency"></span>
            <h2 class="service-heading">Administraci??n de Inmuebles</h2>
            <p><span class="read-more">Saber m??s</span></p>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section site-section-sm bg-primary" style="background-image: url(assets/images/bg_opacity.png)">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-8" data-aos="fade-up">
          <h2 class="text-white">Amplia Gama de Propiedades solo para t??</h2>
          <p class="lead text-white">Est??s en el sitio web donde podr??s encontrar lo que est??s buscando, tenemos todo en localces, Inmuebles, oficinas y m??s.</p>
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
            <p data-aos="fade-up" data-aos-delay="100">Somos una Red de Profesionales con la mayor experiencia en finca Ra??z y el Sector Inmobiliario. Nuestra Agencia te Ofrece Importantes Proyectos en Alquiler, Venta y Administraci??n de Bodegas, Oficinas, Locales, Lotes y Consultorios.</p>
          </div>
        </div>
        <div class="col-lg-3 mb-5 mb-lg-0">
          <div class="row mb-5">
            <div class="col-md-12">
              <h3 class="footer-heading mb-4" data-aos="fade-up">Men?? de Navegaci??n</h3>
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
                <li data-aos="fade-up" data-aos-delay="700"><a href="./contact">Cont??ctanos</a></li>
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
				  <p class="mb-0 font-weight-bold" data-aos="fade-up" data-aos-delay="1350">Tel??fono</p>
				  <p class="mb-4" data-aos="fade-up" data-aos-delay="1350"><a href="tel:0057301 532 83 00">(+57) 301 532 83 00</a></p>

				  <p class="mb-0 font-weight-bold" data-aos="fade-up" data-aos-delay="1400">Correo Electr??nico</p>
				  <p class="mb-4" data-aos="fade-up" data-aos-delay="1450"><a href="mailto:comercial@bodegasyproyectos.com">comercial@bodegasyproyectos.com</a></p>

				  <p class="mb-0 font-weight-bold" data-aos="fade-up" data-aos-delay="1500">Direcci??n</p>
				  <p class="mb-0" data-aos="fade-up" data-aos-delay="1550">Circular 2 # 70 - 24 of 806, Laureles<br>
				  Medell??n - Colombia.</p>
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

  <div id="servicio-1" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Colocaci??n de Inmuebles</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"><p>Nos interesa que los propietarios administren sus propios inmuebles por lo que ofrecemos el servicio de COLOCACI??N, el cual consiste en la promoci??n y publicidad del inmueble comercial o industrial a trav??s de canales digitales, f??sicos y con nuestros clientes. En el momento que tenemos el cliente especifico para su inmueble nosotros nos encargamos de todo el proceso de arrendamiento, el cual consiste en el estudio de viabilidad o de riesgo del cliente a trav??s de la aseguradora de su preferencia, la elaboraci??n de contratos de arrendamiento, el inventario escrito y fotogr??fico del inmueble firmado por el cliente y la entrega del inmueble. </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
      
  <div id="servicio-2" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Arriendo de Inmuebles</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"><p>Todas las empresas tienen necesidades importantes y especificas, es por esto que en BODEGAS & ESPACIOS, contamos con asesores con una alta experiencia y conocimiento en el sector inmobiliario industrial y comercial, los cuales a trav??s de un an??lisis especifico de su actividad comercial y necesidad, le ayudar??n a encontrar la ubicaci??n y las caracter??sticas adecuadas para su operaci??n, logrando as?? una mayor competitividad e impacto en el mercado. </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
      
  <div id="servicio-3" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Venta de Inmuebles</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"><p>Todas las empresas tienen necesidades importantes y especificas, es por esto que en BODEGAS & ESPACIOS, contamos con asesores con una alta experiencia y conocimiento en el sector inmobiliario industrial y comercial, los cuales a trav??s de un an??lisis especifico de su actividad comercial y necesidad, le ayudar??n a encontrar la ubicaci??n y las caracter??sticas adecuadas para su operaci??n, logrando as?? una mayor competitividad e impacto en el mercado. </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

      
  <div id="servicio-4" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Administraci??n de Inmuebles</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"><p>La administraci??n de un inmueble es una gran responsabilidad para nuestra empresa, es por esto que en BODEGAS & ESPACIOS, contamos con un gran equipo de ingenieros industriales, administradores, abogados y un eficiente departamento de mantenimientos, todos especializados en la administraci??n de inmuebles industriales y comerciales y el manejo de relaciones con nuestros clientes. <br><br>

Al escogernos para administrar tu inmueble, contar??s con todo nuestro equipo el cual se encargar?? de estar pendiente del buen estado de tu inmueble, y de la administraci??n del mismo, con el objetivo de sostener la relaci??n cordial y duradera en el tiempo con el inquilino, y de sacar el mayor provecho a sus inversiones y propiedades. <br><br>

Garantizamos el pago de su arrendamiento en los primeros 10 d??as del mes, depositados a su cuenta bancaria sin necesidad de tramites, tambi??n tramitamos el estudio de viabilidad o de riesgo del cliente, la p??liza de arrendamiento, la elaboraci??n de contratos de arrendamiento, el inventario escrito y fotogr??fico del inmueble firmado por el cliente y la entrega del inmueble. Adem??s se asignar?? un asesor el cual dar?? una atenci??n personalizada a cualquier novedad que se pueda presentar con su inmueble.

</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
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
  <script src="assets/js/main.js"></script>
  <script type="text/javascript" src="assets/libs/floating-wpp.js"></script>
  <script src="assets/js/filtrar-propiedades.js"></script>
    
  </body>
</html>