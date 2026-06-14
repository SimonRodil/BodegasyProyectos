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
      url: '../dri/users/sel.php',
      type: 'GET',
       dataSrc: ""
      },
    columns: [
      { data: 'id', "defaultContent": "" },
      { data: 'username', "defaultContent": "" },
      { data: 'email', "defaultContent": "" }
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
                
                // cambios los valores de los input.
                if(value == null || value == 0) { value = '-'; } 
                $('[name=' + name + ']') .val(value) .closest('.form-group') .addClass('bmd-form-group is-filled'); 
                if(value == '-') { $('input[name=' + name + ']').val(null).removeClass('bmd-form-group is-filled'); } 
                
                // ahora de los selectpicker
                $('#ver-registro select[name=' + name + ']').selectpicker('val', value);
                
              });

              console.log(data);


              $('#ver-registro').modal();
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
              $('#nuevo-registro').modal();
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
                
                // cambios los valores de los input.
                if(value == null || value == 0) { value = '-'; } 
                $('[name=' + name + ']') .val(value) .closest('.form-group') .addClass('bmd-form-group is-filled'); 
                if(value == '-') { $('input[name=' + name + ']').val(null).removeClass('bmd-form-group is-filled'); } 
                
                // ahora de los selectpicker
                $('#actualizar-registro select[name=' + name + ']').selectpicker('val', value);
                
              });

              console.log(data);

              $('#actualizar-registro').modal();
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
                  $.ajax({
                    url: '../dri/users/del.php', 
                    data: { id: data.id },
                    method: 'GET',
                    success:function() { ExitoQuery(); },
                    error:function(){ ErrorQuery(); }
                  });
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

  $('form').submit(function(e){

    // Desactivadas funciones.
    e.preventDefault();

    // variables secundarias.
    var $formId = $(this).attr('id');
    var $form = $(this);
    var $formBtn = $('button[type=submit][form='+$formId+']');
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
        table.ajax.reload();
        $form.trigger('reset');
        $form.closest('.modal').modal('hide');
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

});