import $ from 'jquery';
import Swal from 'sweetalert2';
import AOS from 'aos';

$(function() {
  "use strict";

  AOS.init({
    disable: 'phone',
    duration: 800,
    easing: 'slide',
    once: true,
    mirror: false
  });
  setTimeout(function() { AOS.refreshHard(); }, 300);

  var loaderPage = function() {
    $(".site-loader").fadeOut("slow");
  };
  loaderPage();

  var siteMenuClone = function() {
    $('.js-clone-nav').each(function() {
      var $this = $(this);
      $this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
    });

    setTimeout(function() {
      var counter = 0;
      $('.site-mobile-menu .has-children').each(function(){
        var $this = $(this);
        $this.prepend('<span class="arrow-collapse collapsed">');
        $this.find('.arrow-collapse').attr({
          'data-toggle': 'collapse',
          'data-target': '#collapseItem' + counter,
        });
        $this.find('> ul').attr({
          'class': 'collapse',
          'id': 'collapseItem' + counter,
        });
        counter++;
      });
    }, 1000);

    $('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ($this.closest('li').find('.collapse').hasClass('show')) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();
    });

    $(window).resize(function() {
      var $this = $(this), w = $this.width();
      if (w > 768) {
        if ($('body').hasClass('offcanvas-menu')) {
          $('body').removeClass('offcanvas-menu');
        }
      }
    });

    $('body').on('click', '.js-menu-toggle', function(e) {
      var $this = $(this);
      e.preventDefault();
      if ($('body').hasClass('offcanvas-menu')) {
        $('body').removeClass('offcanvas-menu');
        $this.removeClass('active');
      } else {
        $('body').addClass('offcanvas-menu');
        $this.addClass('active');
      }
    });

    $(document).mouseup(function(e) {
      var container = $(".site-mobile-menu");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('offcanvas-menu')) {
          $('body').removeClass('offcanvas-menu');
        }
      }
    });
  };
  siteMenuClone();

  var siteSliderRange = function() {
    if ($('#slider-range').length === 0) return;
    import('jquery-ui-dist/jquery-ui').then(function() {
      $("#slider-range").slider({
        range: true,
        min: 10000,
        max: 1000000,
        values: [200000, 750000],
        slide: function(event, ui) {
          $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        }
      });
      $("#amount").val("$" + $("#slider-range").slider("values", 0) +
        " - $" + $("#slider-range").slider("values", 1));
    });
  };
  siteSliderRange();

  var siteMagnificPopup = function() {
    $('.image-popup').magnificPopup({
      type: 'image',
      closeOnContentClick: true,
      closeBtnInside: false,
      fixedContentPos: true,
      mainClass: 'mfp-no-margins mfp-with-zoom',
      gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0,1]
      },
      image: {
        verticalFit: true
      },
      zoom: {
        enabled: true,
        duration: 300
      }
    });

    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
      disableOn: 700,
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false
    });
  };
  siteMagnificPopup();

  var siteCarousel = function () {
    if ($('.nonloop-block-13').length > 0) {
      $('.nonloop-block-13').owlCarousel({
        center: false,
        items: 1,
        loop: true,
        stagePadding: 0,
        autoplay: true,
        margin: 20,
        nav: false,
        dots: true,
        navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
        responsive:{
          600:{ margin: 20, stagePadding: 0, items: 1 },
          1000:{ margin: 20, stagePadding: 0, items: 2 },
          1200:{ margin: 20, stagePadding: 0, items: 3 }
        }
      });
    }

    if ($('.propiedades > .slide-one-item').length > 0) {
      $('.propiedades').addClass('owl-carousel').owlCarousel({
        loop: true,
        autoplay: true,
        pauseOnHover: true,
        dots: true,
        responsive:{
          300:{ items: 1, margin: 20 },
          700:{ items: 2, margin: 20 },
          1000:{ items: 3, margin: 20 }
        }
      });
    } else {
      $('.propiedades > .slide-one-item').addClass('col-md-4');
      $('.propiedades').addClass('row');
    }

    if ($('.nonloop-block-4').length > 0) {
      $('.nonloop-block-4').owlCarousel({
        center: true,
        items:1,
        loop:false,
        margin:10,
        nav: true,
        navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
        responsive:{
          600:{ items:1 }
        }
      });
    }



    $('.propiedades [data-id]').html('<small>VER<small>');
  };
  siteCarousel();

  var siteStellar = function() {
    if (typeof $.stellar !== 'undefined' && $.stellar.init) {
      $.stellar.init({
        responsive: false,
        parallaxBackgrounds: true,
        parallaxElements: true,
        horizontalScrolling: false,
        hideDistantElements: false,
        scrollProperty: 'scroll'
      });
    }
  };
  siteStellar();

  var siteCountDown = function() {
    if ($('#date-countdown').length > 0) {
      $('#date-countdown').countdown('2020/10/10', function(event) {
        var $this = $(this).html(event.strftime(''
          + '<span class="countdown-block"><span class="label">%w</span> weeks </span>'
          + '<span class="countdown-block"><span class="label">%d</span> days </span>'
          + '<span class="countdown-block"><span class="label">%H</span> hr </span>'
          + '<span class="countdown-block"><span class="label">%M</span> min </span>'
          + '<span class="countdown-block"><span class="label">%S</span> sec</span>'));
      });
    }
  };
  siteCountDown();

  var siteDatePicker = function() {
    if ($('.datepicker').length === 0) return;
    import('bootstrap-datepicker').then(function() {
      $('.datepicker').datepicker();
    });
  };
  siteDatePicker();

  $('a[href="#"]').click(function(){
    Swal.fire(
      'Estamos trabajando...',
      'Aún nos encontramos trabajando en esta área. 😅',
      'info'
    );
  });

  $('#main-filter').submit(function(e){
    e.preventDefault();
    var $filterForm = $(this);

    if($filterForm.find('[name="tipo_oferta"]').val() == '-' && $filterForm.find('[name="codigo"]').val() == '') {
      Swal.fire(
        'Hay un error al Buscar',
        'Debes seleccionar una de las opciones de Arrienda o Venta',
        'error'
      );
      return;
    }

    $(this).off('submit').submit();
  });
});



$(function () {
  $('.wpp-plugin').floatingWhatsApp({
    phone: '57301 532 83 00',
    popupMessage: 'Saludos 👋' + '<br><br>' + 'En que podemos ayudarte?',
    message: "",
    size: '56px',
    showPopup: true,
    showOnIE: false,
    headerTitle: $('title').text(),
    headerColor: 'rgb(9, 94, 84)',
    backgroundColor: 'crimson',
    position: 'right',
    buttonImage: '<img src="assets/images/whatsapp.svg" />'
  });
});
