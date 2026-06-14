$('#contactar-asesor').submit(function(e){
    // Desactivadas funciones.
    e.preventDefault();

    // variables secundarias.
    var $formId = $(this).attr('id');
    var $form = $(this);
    var $formBtn =  $form.find('button[type=submit]');
    var $formBtnOT = $formBtn.html();
    var $formReq = $form.find('[name][required]').val();
    
    // ajax.
    $.ajax({
      beforeSend: function() { $formBtn.html('<span class="material-icons spin">settings</i>'); },
      url: 'dri/mensajeria/new.php',
      type: 'json',
      cache: 'false',
      method: 'POST',
      data: $form.serialize(),
      success: function(resp) {
        $form.trigger('reset');
        Swal.fire(
          'Enhorabuena',
          'Se ha procesado correctamente.',
          'success'
        );
      },
      error: function(data) {
        Swal.fire(
          'Error',
          'No se pudo procesar el mensaje.',
          'error'
        );
      },
      complete: function() { $formBtn.html($formBtnOT); }
    });
});