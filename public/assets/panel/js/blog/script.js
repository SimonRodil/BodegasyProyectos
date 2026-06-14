$(document).ready(function() {
  $('table').on( 'click', 'tr', function () { 
     if ( $(this).hasClass('selected') ) {
         $(this).removeClass('selected');
         data = undefined;
     } else {
         table.$('tr.selected').removeClass('selected');
         $(this).addClass('selected');
         data = $('table').DataTable().row('.selected').data();
     }
  });
  var table = $('table').DataTable({
    ajax: {
      url: '../dri/blogs/sel.php',
      type: 'GET',
       dataSrc: ""
      },
    columns: [
      { data: 'title', "defaultContent": "-" },
      { data: 'registered', "defaultContent": "-" }
    ],
    responsive: true,
    language: {
        url: "../assets/panel/datatable/language/Spanish.json"
        },
    select: true,
    dom: 'Bfrip',
    buttons: {
      dom: {
        button: {
          className: 'btn btn-primary'
        }
      },
      buttons: [
        {
          // Ver
          text: '<i class="material-icons" title="Ver">remove_red_eye</i>',
          className: "",
          action: function(){

              if (!data) {
                SeleccionePrimeroAlert();
                return;
              }
 
              $.each(data, function(name, value){ 
                try {
                  // cambios los VALORES de los input.
                  if(value == null || value == 0) { value = '-'; } 
                  $('[name=' + name + ']').val(value).closest('.form-group').addClass('bmd-form-group is-filled'); 
                  if(value == '-') { $('input[name=' + name + ']').val(null).removeClass('bmd-form-group is-filled'); } 
                } catch (error) {
                  console.error(error);
                  // expected output: ReferenceError: nonExistentFunction is not defined
                  // Note - error messages will vary depending on browser
                }
              });
            
                
              if(data.image != null) {
                $('#ver-registro [name=image]').attr('src', '../assets/images/blog/' + data.image);
              }
            
              $('.summernote').summernote({ airMode: true });
                
              $('#ver-registro').modal();
          },
          init: function(api, node, config) {
             $(node).removeClass('btn-info');
          }
        },
        {
          // Registrar
          text: '<span class="material-icons" title="Registrar">add_circle</span>',
          className: "",
          action: function(){
            
              $('.summernote').summernote({
                toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['view', ['codeview']]],
                lang: 'es-ES',
                height: '200'
              });
              $('#nuevo-registro').modal();
          },
          init: function(api, node, config) {
              $(node).addClass('btn-success').attr('rel', 'tooltip').attr('data-original-title', 'Registrar');
          }
        },
        {
          // Actualizar
          text: '<i class="material-icons" title="Actualizar">border_color</i>',
          className: "",
          action: function(){

              if (!data) {
                SeleccionePrimeroAlert();
                return;
              }
            
              $.each(data, function(name, value){ 
                try {
                  // cambios los VALORES de los input.
                  if(value == null || value == 0) { value = '-'; } 
                  $('[name=' + name + ']').val(value).closest('.form-group').addClass('bmd-form-group is-filled'); 
                  if(value == '-') { $('input[name=' + name + ']').val(null).removeClass('bmd-form-group is-filled'); } 
                } catch (error) {
                  console.error(error);
                  // expected output: ReferenceError: nonExistentFunction is not defined
                  // Note - error messages will vary depending on browser
                }
              });
            
              $('.summernote').summernote({
                toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['view', ['codeview']]],
                lang: 'es-ES',
                height: '200'
              });
            
              $(".summernote").summernote("code", data.content);
            
              $('#actualizar-registro').modal();
            
              console.log(data);
          },
          init: function(api, node, config) {
             $(node).addClass('btn-info');
          }
        },
        {
          // Eliminar
          text: '<i class="material-icons" title="Eliminar">delete_forever</i>',
          action: function(){

              if (!data) {
                SeleccionePrimeroAlert();
                return;
              }
            
              Swal.fire({
                title: 'Está seguro?',
                text: "Luego de realizar esta acción no hay vuelta atras!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmado'
              }).then((result) => {
                if (result.value) {
                  $.get('../dri/blogs/del.php', { id: data.id });
                  Swal.fire(
                    'Exitoso!',
                    'Acción realizada correctamente.',
                    'success'
                  )
                  table.ajax.reload();
                }
              });
              
              console.log(data);

          },
          init: function(api, node, config) {
             $(node).addClass('btn-danger');
          }
        },
        {
          // Refrescar
          text: '<i class="material-icons" title="Actualizar">refresh</i>',
          action: function(){

              table.ajax.reload();
              data = null;

          },
          init: function(api, node, config) {
             $(node).addClass('btn-primary');
          }
        }
      ]
    }
  });
  
  $('[name=to_publish]').datepicker({
    format: 'yyyy-mm-dd',
    language: 'es-ES'
  })

  $('form').submit(function(e){

    // Desactivadas funciones.
    e.preventDefault();
    
    // variables secundarias.
    var $formId = $(this).attr('id');
    var $form = $(this);
    var $formBtn = $('button[type=submit][form='+$formId+']');
    var $formBtnOT = $formBtn.html();
    var idForm = document.getElementById($formId);
    var $data = new FormData(idForm);

    // ajax.
    $.ajax({
      beforeSend: function() { $formBtn.html('<span class="material-icons spin">settings</i>'); },
      url: $form.attr('action'),
      processData: false,
      contentType: false,
      type: 'post',
      data: $data,
      success: function(resp) {
        Swal.fire(
          'Exitoso!',
          'Acción realizada correctamente.',
          'success'
        );
        table.ajax.reload();
        $form.trigger('reset');
        $form.closest('.modal').modal('hide');
      },
      error: function(resp) {
        Swal.fire(
          'Error!',
          'No se pudo completar la acción.',
          'error'
        )
      },
      complete: function() { $formBtn.html($formBtnOT); }
    });

  });

});