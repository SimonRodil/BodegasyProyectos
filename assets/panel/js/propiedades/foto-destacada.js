function AsignarFotoDestacada(id, tf) {
  // Muestro la imagen destacada.
  if(data.imagen_destacada != null) {
	  
	  $('#imagen-destacada-img').attr('src', '../images/propiedades/' + data.imagen_destacada).show();
	  
  } else {
	  
	  $('#imagen-destacada-img').attr('src', '../images/propiedades/default.png').show();
	  
  }
	
  $('#foto-destacada').modal();
  $('#form-foto-destacada').trigger('reset');
  $('#lets-croppie').fadeOut();
  $('#select-foto-destacada').fadeIn();
  $('.save-croppie').attr('disabled', true).addClass('btn-disabled').removeClass('btn-info');

  var basic = $('#demo-croppie').croppie({
    viewport: {
        width: 300,
        height: 300,
        type: 'square'
    },
    boundary: { width: 300, height: 300 }
  });

  $('#input-foto-destacada').change(function(){

    var $data = new FormData(document.getElementById('form-foto-destacada'));

    $.ajax({
      beforeSend: function(){
        $('#select-foto-destacada .loader').slideDown();
        $('#select-foto-destacada #input-foto-destacada').css('padding', '10px');
      },
      url: '../dri/propiedades/tmp_foto.php',
      processData: false,
      contentType: false,
      type: 'post',
      data: $data,
      success: function(data){
        $('#select-foto-destacada').fadeOut();
        $('#lets-croppie').fadeIn();
        basic.croppie('bind', {
          url: '../images/propiedades/tmp/' + data
        }).then(function(){
          $('.save-croppie').attr('disabled', false).addClass('btn-info').removeClass('btn-disabled');
          $('#select-foto-destacada .loader').slideUp();
          $('#select-foto-destacada #input-foto-destacada').css('padding', '30px');
        });

      },
      error: function(){
        ErrorQuery();
        $('#select-foto-destacada').fadeIn();
        $('#lets-croppie').fadeOut();
      }
    });

  });

  $('.save-croppie').click(function(){

	  
  try {
	var $newImage = basic.croppie('result', {type: 'base64',format: 'jpeg', size: { width: 600, height: 600}});
	var $propiedad = $('#form-foto-destacada [name=propiedad]').val();

	$newImage.then(function(value){
	  //console.log(value);
	  $('#new-croppie').attr('src', value);
	  $.ajax({
		url: '../dri/propiedades/foto_destacada.php',
		data: {
		  image: value,
		  id: $propiedad
		},
		method: 'POST',
		 success: function(response){
	  		$('#imagen-destacada-img').attr('src', value);
			data.imagen_destacada = response.imagen_destacada;
		 },
		 error: function(){
			ErrorQuery();
		 }
	  });
	});

  } catch { return true; }

    ExitoQuery();
    if(tf == true) {
        $('#foto-destacada.modal').on('hidden.bs.modal', function () {
		  console.log('La galeria de la propiedad a editar es: ' + id);
          GaleriaDeLaPropiedad(id);
        });
    }

    $('#foto-destacada').modal('hide');

    $('#form-foto-destacada').trigger('reset');
    $('#lets-croppie').fadeOut();
    $('#select-foto-destacada').fadeIn();
    $('.save-croppie').attr('disabled', true).addClass('btn-disabled').removeClass('btn-info');

  });

  $('.try-another-image').on('click',function(){
    $('#form-foto-destacada').trigger('reset');
    $('#lets-croppie').fadeOut();
    $('#select-foto-destacada').fadeIn();
    $('.save-croppie').attr('disabled', true).addClass('btn-disabled').removeClass('btn-info');
  });
  
}