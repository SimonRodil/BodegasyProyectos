<?php 

require ('mod/config.php');
require ('mod/blog.php');
$con_blog = new Blogs();
$query_blog = $con_blog->SelBlogs();

if(!$query_blog->num_rows): header('Location: ./'); return;
endif;

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
            <h1 class="mb-2">Nuestro Blog</h1>
            <div><a href="index.php">Inicio</a> <span class="mx-2 text-white">&bullet;</span> <strong class="text-white">Blog</strong></div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section site-section-sm bg-light">
      <div class="container">
        <div class="row">
          <?php $i = 0; foreach($query_blog as $blog): $i++ ?>
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="<?= $i ?>00">
            <a href="blog-article?id=<?= $blog['id'] ?>"><img src="assets/images/blog/<?= $blog['image'] ?>" alt="Image" class="img-fluid"></a>
            <div class="p-4 bg-white">
              <span class="d-block text-secondary small text-uppercase"><?= date_format(date_create($blog['to_publish']), 'd/m/Y') ?></span>
              <h2 class="h5 text-black mb-3"><a href="blog-article?id=<?= $blog['id'] ?>"><?= $blog['title'] ?></a></h2>
              <?= trim(strip_tags($blog['content'])); ?>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
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
				  <p class="mb-4" data-aos="fade-up" data-aos-delay="1350"><a href="tel:0057301 532 83 00">(+57) 301 532 83 00</a></p>

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
  <script src="assets/js/aos.js"></script>
  <script type="text/javascript" src="assets/libs/floating-wpp.js"></script>
  <script src="assets/js/main.js"></script>
    
  </body>
</html>