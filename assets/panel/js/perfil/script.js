$('.change-pic').click(function(){
  $('#cambiar-imagen-perfil').modal();
});

var basic = $('#demo-croppie').croppie({
  viewport: {
      width: 300,
      height: 300,
      type: 'circle'
  },
  boundary: { width: 300, height: 300 }
});

$('#input-select-image').change(function(){

  var $data = new FormData(document.getElementById('form-imagen-perfil'));

  $.ajax({
    beforeSend: function(){
      $('#select-image .loader').slideDown();
      $('#select-image #input-select-image').css('padding', '10px');
    },
    url: '../dri/users/tmp_foto.php',
    processData: false,
    contentType: false,
    type: 'post',
    data: $data,
    success: function(data){
      $('#select-image').fadeOut();
      $('#lets-croppie').fadeIn();
      basic.croppie('bind', {
        url: '../images/profile_pictures/tmp/' + data
      });
      $('.save-croppie').attr('disabled', false).addClass('btn-info').removeClass('btn-disabled');
      
      $('#select-image .loader').slideUp();
      $('#select-image #input-select-image').css('padding', '30px');
      
    }
  });

});

$('.save-croppie').click(function(){

  var $newImage = basic.croppie('result','base64');

  $newImage.then(function(value){
    $('#new-croppie').attr('src', value);
    $.ajax({
      url: '../dri/users/foto.php',
      data: {
        image: value,
        id: $id
      },
      method: 'POST'
    });
  });

  $('#cambiar-imagen-perfil').modal('hide');

  $('#form-imagen-perfil').trigger('reset');
  $('#lets-croppie').fadeOut();
  $('#select-image').fadeIn();
  $('.save-croppie').attr('disabled', true).addClass('btn-disabled').removeClass('btn-info');

});

$('.try-another-image').on('click',function(){
  $('#form-imagen-perfil').trigger('reset');
  $('#lets-croppie').fadeOut();
  $('#select-image').fadeIn();
  $('.save-croppie').attr('disabled', true).addClass('btn-disabled').removeClass('btn-info');
});

$('#update-profile').submit(function(e){

  // Desactivadas funciones.
  e.preventDefault();

  // variables secundarias.
  var $formId = $(this).attr('id');
  var $form = $(this);
  var $formBtn = $('button[type=submit]');
  var $formBtnOT = $formBtn.html();

  var $p1 = $form.find('[name=password_1]').val();
  var $p2 = $form.find('[name=password_2]').val();

  if($p1 != $p2) {
      Swal.fire(
        'Error!',
        'Las contraseñas no coinciden.',
        'error'
      );
      return;
  }

  // ajax.
  $.ajax({
    beforeSend: function() { $formBtn.html('<span class="material-icons spin">settings</i>'); },
    url: $form.attr('action'),
    type: 'json',
    cache: 'false',
    method: 'POST',
    data: $form.serialize(),
    success: function(data) {
      Swal.fire(
        'Exitoso!',
        'Acción realizada correctamente.',
        'success'
      );
    },
    error: function(data) {
      Swal.fire(
        'Error!',
        'No se pudo completar la acción.',
        'error'
      );
    },
    complete: function() { $formBtn.html($formBtnOT); }
  });

});