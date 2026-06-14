      $('#form-contact').submit(function(e){

        // Desactivo el formulario.
        e.preventDefault();

        // variables necesarias.
        var $form = $(this);
        var $btnOT = $form.find('button[type="submit"]').html();

        $.ajax({
          beforeSend: function() { $form.find('button[type="submit"]').attr('disabled', true).html('...'); }, 
          url: './dri/contact.php',
          method: 'POST',
          data: $form.serialize(),
          dataType: 'json',
          success: function(data) {
            Swal.fire(
              'Enhorabuena!',
              'El mensaje se ha enviado exitosamente!',
              'success'
            );
            $form.trigger('reset');
          },
          error: function(err) {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'En algo ha fallado procesar esta solicitud, intenta nuevamente!',
              footer: '<i>Sí el error persiste, intenta contactarnos por nuestras redes sociales.</i>'
            })
          },
          complete: function() { $form.find('button[type="submit"]').attr('disabled', false).html($btnOT); }
        }).then(function(){
          // guardar en la base de datos.
          $.ajax({
            method: 'POST',
            data: $form.serialize(),
            url: 'dri/contact/new.php'
          });
        });
      });