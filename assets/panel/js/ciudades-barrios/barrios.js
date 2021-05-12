$(document).ready(function() {
  $('table.barrios').on( 'click', 'tr', function () { 
     if ( $(this).hasClass('selected') ) {
         $(this).removeClass('selected');
         data = undefined;
     } else {
         table_barrios.$('tr.selected').removeClass('selected');
         $(this).addClass('selected');
         data = $('table.barrios').DataTable().row('.selected').data();
     }
  });
  var table_barrios = $('table.barrios').DataTable({
    ajax: {
      url: '../dri/ciudades/sel.php',
      type: 'GET',
       dataSrc: ""
      },
    columns: [
      { data: 'nombre', "defaultContent": "" }
    ],
    responsive: true,
    language: {
        url: "../assets/datatable/language/Spanish.json"
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
                
                // cambios los valroes de los input.
                if(value == null || value == 0) { value = '-'; } 
                $('[name=' + name + ']') .val(value) .closest('.form-group') .addClass('bmd-form-group is-filled'); 
                if(value == '-') { $('input[name=' + name + ']').val(null).removeClass('bmd-form-group is-filled'); } 
                
              });

              $('#ver-ciudad').modal();
          },
          init: function(api, node, config) {
             $(node).removeClass('btn-default');
          }
        },
        {
          // Registrar
          text: '<span class="material-icons" title="Registrar">add_circle</span>',
          className: "",
          action: function(){
              $('#nueva-ciudad').modal();
          },
          init: function(api, node, config) {
             $(node).addClass('btn-success');
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
                
                // cambios los valroes de los input.
                if(value == null || value == 0) { value = '-'; } 
                $('[name=' + name + ']') .val(value) .closest('.form-group') .addClass('bmd-form-group is-filled'); 
                if(value == '-') { $('input[name=' + name + ']').val(null).removeClass('bmd-form-group is-filled'); } 
                
              });

              $('#actualizar-ciudad').modal();

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
                  $.get('../dri/ciudades/del.php', { id: data.id });
                  Swal.fire(
                    'Exitoso!',
                    'Acción realizada correctamente.',
                    'success'
                  )
                  table_barrios.ajax.reload();
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

              table_barrios.ajax.reload();
              data = null;

          },
          init: function(api, node, config) {
             $(node).addClass('btn-primary');
          }
        }
      ]
    }
  });

  $('#form-nuevo-barrio, #form-actualizar-barrio').submit(function(e){

    // Desactivadas funciones.
    e.preventDefault();

    // variables secundarias.
    var $formId = $(this).attr('id');
    var $form = $(this);
    var $formBtn = $('button[type=submit][form='+$formId+']');
    var $formBtnOT = $formBtn.html();

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
        table_barrios.ajax.reload();
        $form.trigger('reset');
        $form.closest('.modal').modal('hide');
      },
      error: function(data) {
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