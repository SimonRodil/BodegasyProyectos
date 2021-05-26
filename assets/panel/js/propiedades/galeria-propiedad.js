function GaleriaDeLaPropiedad(id) {
  // Mudado al inicio, por mejoras del sistema.
  // $('#form-galeria-propiedad [name=propiedad]').val(id);
  $('#galeria-propiedad').modal();
}

$('#input-foto-galeria').change(function(){
  
  if($(this).val() == '') { return; };

  var $data = new FormData(document.getElementById('form-galeria-propiedad'));
  var $inputFile = $(this);

  $.ajax({
    beforeSend: function(){
      $('#select-foto-galeria .loader').slideDown();
      $inputFile.attr('disabled', true);
    },
    url: '../dri/propiedades/galeria/new.php',
    processData: false,
    contentType: false,
    type: 'post',
    data: $data,
    success: function(resp){
      if(resp.id == 0) { ErrorQuery(); return; }
      $('#galeria-propiedad #fotos-cargadas').append('<div class="box"><img src="../assets/images/propiedades/fotos/' + resp.base64 + '"><div class="close" data-id="' + resp.id + '"></div></div>');
      $('#select-foto-galeria .loader').slideUp();
      deleteImage();
      ExitoQuery();
    },
    error: function(){ ErrorQuery(); },
    complete: function(){ $inputFile.attr('disabled', false).val(null); }
  });

});

// eliminar imagen.
function deleteImage(){
  $('#galeria-propiedad #fotos-cargadas .close').on('click', function(){

    var $btn = $(this);
    var $id = $btn.attr('data-id');
    if($id != '') {
      $.get('../dri/propiedades/galeria/del.php', { id: $id });
      $btn.closest('.box').fadeOut('fasr');
      ExitoQuery();
    } else {
      ErrorQuery();
    }

  });
}

$('.modal-to-planos').click(function(){
  var $propiedad = $('#form-galeria-propiedad [name=propiedad]').val(id);
  $('#galeria-propiedad').modal('hide');
  ExitoQuery();
});