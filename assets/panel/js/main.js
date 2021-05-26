// ajustes de la tabla
var data = null;

// acción después de cerrar la modal
$('.modal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
    $(this).find('form [type=checkbox]').attr('checked', false);
    $(this).find('form select').selectpicker('val', '-');
    $(this).find('form [name]').parent().removeClass('is-filled');
  
    // PROPIEDADES -- GALERIA, BORRAR LAS FOTOS.
    $('#galeria-propiedad #fotos-cargadas').empty();
  
  if($('.summernote').length > 0) {
    $('.summernote').each(function( index ) {
      $(this).summernote('destroy');
      $(this).empty();
    });
  }
	
	if($('#demo-croppie').length > 0) {
   		$('#demo-croppie').croppie('destroy');
    }
});

// eliminar el .php en el menú
$('nav [href*=".php"], [href*=".php"]').each(function(index){
    var $link = $(this).attr('href');
    var $newlink = $link.replace(".php", "");
    $(this).attr('href', $newlink);
});

$('nav [href="index"], [href="index"]').each(function(index){
    var $link = $(this).attr('href');
    var $newlink = $link.replace("index", "./");
    $(this).attr('href', $newlink);
});

// menú y sus ajustes
var ModuleURL = (location.pathname).slice((location.pathname).lastIndexOf("/") + 1);
$("ul.nav li:has(a[href='./" + ModuleURL + "'])").addClass("active");

if(ModuleURL == '') { $("ul.nav li:has(a[href='index.php'])").addClass("active"); }

$('.dropdown-menu-right a:nth-child(4)').click(function(){ 

    Swal.fire({
      title: '¿Desea cerrar sesión?',
      text: "Podrá volver a ingresar nuevamente, con su usuario y contraseña!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirmado',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        $.get('../dri/log-out.php').done(function(data){
          Swal.fire({
            title: 'Enhorabuena!',
            icon: 'success',
            text: 'Su sesión se ha cerrado correctamente.',
            onClose: () => {
              location.assign('./');
            }
          }).then((result) => {
            location.assign('./');
          });
        });
      }
    });

});

// notificaciones
function SeleccionePrimeroAlert() {
    $.notify({
      icon: "warning",
      message: "Debes <b>seleccionar un registro</b> antes de ejecutar esta acción."

    }, {
      type: "info",
      timer: 3000,
      placement: {
        from: 'top',
        align: 'right'
      },
      z_index: 2001
    });
}
// exito
function ExitoQuery() {
    Swal.fire(
      'Exitoso!',
      'Acción realizada correctamente.',
      'success'
    );
}
// error
function ErrorQuery() {
    Swal.fire(
      'Error!',
      'No se pudo completar la acción.',
      'error'
    );
}

$('#logout').click(function(){
    Swal.fire({
      title: '¿Desea cerrar sesión?',
      text: "Podrá volver a ingresar nuevamente, con su usuario y contraseña!",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirmado',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
        $.get('../dri/log-out.php').done(function(data){
          Swal.fire({
            title: 'Enhorabuena!',
            icon: 'success',
            text: 'Su sesión se ha cerrado correctamente.',
            onClose: () => {
              location.assign('./');
            }
          }).then((result) => {
            location.assign('./');
          });
        });
      }
    });
});

if($('select').length > 0){
  
  // Selectpicker
  $('select').selectpicker({ liveSearch: true, styleBase: 'form-control mt-3 for-selectpicker', style: 'form-control for-selectpicker', showTick: true }).selectpicker('val', null);
  
}

var $rs = $('#rs').text();
var $id = $('#id').text();

if($rs > 2) {
  $('[data-background-color]').attr('data-background-color', 'black');
  $('.logo img').attr('src', '../assets/images/logo-white.png');
}