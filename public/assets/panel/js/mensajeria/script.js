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
      url: '../dri/mensajeria/sel.php',
      type: 'GET',
       dataSrc: ""
      },
    columns: [
      { data: 'id', "defaultContent": "" },
      { data: 'nombre', "defaultContent": "" },
      { data: 'telefono', "defaultContent": "" },
      { data: 'registered', "defaultContent": "" }
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
                
                // cambios los valroes de los input.
                if(value == null || value == 0) { value = '-'; } 
                $('[name=' + name + ']') .val(value) .closest('.form-group') .addClass('bmd-form-group is-filled'); 
                if(value == '-') { $('input[name=' + name + ']').val(null).removeClass('bmd-form-group is-filled'); } 
                
                // ahora de los selectpicker
                $('#ver-registro select[name=' + name + ']').selectpicker('val', value);
                
              });
            
              $('#ver-registro').modal();
          },
          init: function(api, node, config) {
             $(node).removeClass('btn-info');
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
                  $.get('../dri/mensajeria/del.php', { id: data.id });
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
        },
        {
          // PDF
          extend: 'pdfHtml5',
          orientation: 'landscape',
          title: 'Lista de Propiedades',
          text: '<i class="material-icons" title="PDF">picture_as_pdf</i>',
          messageTop: function() { return 'Reporte de Datos\n' + new Date().toString() + '\nTOTAL DE REGISTROS: ' + table.data().count() },
          init: function(api, node, config) {
             $(node).addClass('btn-primary');
          }
        },
        {
          // Excel
          extend: 'excel',
          text: '<span class="material-icons">grid_on</span>',
          messageTop: function() { return 'Reporte de Datos - ' + new Date().toString() + ' - TOTAL DE REGISTROS: ' + table.data().count() },
          init: function(api, node, config) {
             $(node).addClass('btn-primary');
          }
        },
        {
          // Imprimir
          extend: 'print',
          // Landascape orientation
          customize: function(win)
          {
            var last = null;
            var current = null;
            var bod = [];

            var css = '@page { size: landscape; }',
                head = win.document.head || win.document.getElementsByTagName('head')[0],
                style = win.document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet)
            {
              style.styleSheet.cssText = css;
            } 
            else
            {
              style.appendChild(win.document.createTextNode(css));
            }

            head.appendChild(style);
          },
          text: '<i class="material-icons" title="PRINT">local_printshop</i>',
          messageTop: function() { return 'Reporte de Datos - ' + new Date().toString() + ' - TOTAL DE REGISTROS: ' + table.data().count() },
          init: function(api, node, config) {
             $(node).addClass('btn-primary');
          }
        },
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
        )
      },
      complete: function() { $formBtn.html($formBtnOT); }
    });

  });

});