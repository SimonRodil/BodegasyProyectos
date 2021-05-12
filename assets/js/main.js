 AOS.init({
  disable: 'phone',
 	duration: 800,
 	easing: 'slide',
  anchorPlacement: 'top-bottom'
 });

  // Cuando tocan para ver los detalles de una propiedad
  function clickPropiedades() { $('.propiedades .prop-entry').css('cursor', 'pointer').click(function(){
    var $id = $(this).find('[data-id]').attr('data-id');
    /* Swal.fire(
      'Estamos trabajando...',
      'Aún nos encontramos trabajando en esta área. 😅',
      'info'
    ); */
    location.assign('detalles-propiedad?propiedad=' + $id);
  }); }

jQuery(document).ready(function($) {

	"use strict";

	// Loading page
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
          'data-toggle' : 'collapse',
          'data-target' : '#collapseItem' + counter,
        });

        $this.find('> ul').attr({
          'class' : 'collapse',
          'id' : 'collapseItem' + counter,
        });

        counter++;

      });

    }, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
      var $this = $(this);
      if ( $this.closest('li').find('.collapse').hasClass('show') ) {
        $this.removeClass('active');
      } else {
        $this.addClass('active');
      }
      e.preventDefault();  
      
    });

		$(window).resize(function() {
			var $this = $(this),
				w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})

		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();

			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$this.removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$this.addClass('active');
			}
		}) 

		// click outisde offcanvas
		$(document).mouseup(function(e) {
	    var container = $(".site-mobile-menu");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {
	      if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
	    }
		});
	}; 
	siteMenuClone();


	var sitePlusMinus = function() {
		$('.js-btn-minus').on('click', function(e){
			e.preventDefault();
			if ( $(this).closest('.input-group').find('.form-control').val() != 0  ) {
				$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) - 1);
			} else {
				$(this).closest('.input-group').find('.form-control').val(parseInt(0));
			}
		});
		$('.js-btn-plus').on('click', function(e){
			e.preventDefault();
			$(this).closest('.input-group').find('.form-control').val(parseInt($(this).closest('.input-group').find('.form-control').val()) + 1);
		});
	};
	// sitePlusMinus();


	var siteSliderRange = function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 10000,
      max: 1000000,
      values: [ 200000, 750000 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
	};
	siteSliderRange();
  

	var siteMagnificPopup = function() {
		$('.image-popup').magnificPopup({
	    type: 'image',
	    closeOnContentClick: true,
	    closeBtnInside: false,
	    fixedContentPos: true,
	    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
	     gallery: {
	      enabled: true,
	      navigateByImgClick: true,
	      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
	    },
	    image: {
	      verticalFit: true
	    },
	    zoom: {
	      enabled: true,
	      duration: 300 // don't foget to change the duration also in CSS
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
		if ( $('.nonloop-block-13').length > 0 ) {
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
	        600:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 1
	        },
	        1000:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 2
	        },
	        1200:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 3
	        }
		    }
			});
		}

		if ( $('.propiedades > .slide-one-item').length > 4 ) {
			$('.propiedades').addClass('owl-carousel').owlCarousel({
		    center: true,
		    loop: true,
		    autoplay: true,
		    pauseOnHover: true,
        dots: true,
        dotsEach: true,
		    animateOut: 'fadeOut',
		    animateIn: 'fadeIn',
		    responsive:{
	        300:{
	        	margin: 40,
	        	stagePadding: 0,
	          items: 1
	        },
	        700:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 2
	        },
	        1000:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 3
	        } /*,
	        1200:{
	        	margin: 20,
	        	stagePadding: 0,
	          items: 3
	        } */
		    }
		  });
	  } else {
      $('.propiedades > .slide-one-item').addClass('col-md-4');
      $('.propiedades').addClass('row');
    }


	  if ( $('.nonloop-block-4').length > 0 ) {
		  $('.nonloop-block-4').owlCarousel({
		    center: true,
		    items:1,
		    loop:false,
		    margin:10,
		    nav: true,
				navText: ['<span class="icon-arrow_back">', '<span class="icon-arrow_forward">'],
		    responsive:{
	        600:{
	          items:1
	        }
		    }
			});
		}
    
    // eliminar el .php en el menú
    $('ul.site-menu [href*=".php"], [href*=".php"]').each(function(index){
        var $link = $(this).attr('href');
        var $newlink = $link.replace(".php", "");
        $(this).attr('href', $newlink);
    });

    $('ul.site-menu [href="index"], [href="index"]').each(function(index){
        var $link = $(this).attr('href');
        var $newlink = $link.replace("index", "./");
        $(this).attr('href', $newlink);
    });

    // menú y sus ajustes
    var ModuleURL = (location.pathname).slice((location.pathname).lastIndexOf("/") + 1);
    $("ul.site-menu li:has(a[href='./" + ModuleURL + "'])").addClass("active");

    clickPropiedades();
    
    $('.propiedades [data-id]').html('<small>VER<small>');

	};
	siteCarousel();

	var siteStellar = function() {
		$(window).stellar({
	    responsive: false,
	    parallaxBackgrounds: true,
	    parallaxElements: true,
	    horizontalScrolling: false,
	    hideDistantElements: false,
	    scrollProperty: 'scroll'
	  });
	};
	siteStellar();

	var siteCountDown = function() {

		if ( $('#date-countdown').length > 0 ) {
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

		if ( $('.datepicker').length > 0 ) {
			$('.datepicker').datepicker();
		}

	};
	siteDatePicker();


  // working on it.
  $('a[href=#]').click(function(){
    Swal.fire(
      'Estamos trabajando...',
      'Aún nos encontramos trabajando en esta área. 😅',
      'info'
    );
  });
  
  $('#main-filter').submit(function(e){
    
    e.preventDefault();
    var $filterForm = $(this);
    
    if($filterForm.find('[name=tipo_oferta]').val() == '-' && $filterForm.find('[name=codigo]').val() == '') {
      Swal.fire(
        'Hay un error al Buscar',
        'Debes seleccionar una de las opciones de Arrienda o Venta',
        'error'
      );
      return;
    }
    
    /* Swal.fire(
      'Estamos trabajando...',
      'Aún nos encontramos trabajando en esta área. 😅',
      'info'
    ); */
    
    $(this).unbind('submit').submit();
    
  });

});

  // Ciudades y Barrios Coord.
  $('[name=ciudad]').change(function(){

    var $form = $(this).closest('form');
    var $selBarrio = $form.find('[name=barrio]');
    var $ciudad = $(this).val();

    if($ciudad != null) {
      $.ajax({
        beforeSend: function() { $selBarrio.empty(); },
        url: 'dri/barrios/sel.php',
        method: 'GET',
        data: { ciudad: $ciudad },
        complete: function(data) {
          $selBarrio.append("<option value='-'>Barrio</option>");
          $.each(data.responseJSON, function(index, value){
            $selBarrio.append("<option value='" + value.id + "'>" + value.nombre + "</option>");
          });
          return;
        }
      }); 
    }
  });

  $('[name=codigo]').on('focus',function(){
    $('select').css('opacity', '0.5');
  }, function(){
    $('select').css('opacity', 1);
  });

  $('[name=codigo]').on('keyup', function(){
    if($(this).val() != '') {
      $('select').parent().parent().slideUp();
    } else {
      $('select').parent().parent().slideDown();
    }
  });

document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

function isUrlValid(url) {
    return /^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i.test(url);
}

$('.asesores a').each(function(){
  if(!isUrlValid($(this).attr('href'))) {
    $(this).attr('href', '#').removeAttr('target').attr('disabled', true);
  }
});

$(function () {
    $('.wpp-plugin').floatingWhatsApp({
        phone: '573014674251',
        popupMessage: 'Saludos 👋' + '<br><br>' + 'En que podemos ayudarte?',
        message: "",
        size: '56px',
        showPopup: true,
        showOnIE: false,
        headerTitle: 'Bodegas y Espacios',
        headerColor: 'rgb(9, 94, 84)',
        backgroundColor: 'crimson',
        position: 'right',
        buttonImage: '<img src="assets/images/whatsapp.svg" />'
    });
});