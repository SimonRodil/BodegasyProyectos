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
      url: '../dri/discipulos/sel.php',
      type: 'GET',
       dataSrc: ""
      },
    columns: [
      { data: 'id', "defaultContent": "-" },
      { data: 'name', "defaultContent": "-" },
      { data: 'lastname', "defaultContent": "-" },
      { data: 'ident_num', "defaultContent": "-" },
      { data: 'network_name', "defaultContent": "-" },
      { data: 'mentor_name', "defaultContent": "-" },
      { data: 'mentor1_name', "defaultContent": "-" },
      { data: 'telephone', "defaultContent": "-" },
      { data: 'email', "defaultContent": "-" },
      { data: 'profesion', "defaultContent": "-" },
      { data: 'ministerio_name', "defaultContent": "-" },
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
            
              // Muestro el progreso de la visión.
              $.get('../dri/discipulos/pdv.php', {id: data.id})
              .done(function(resp){
                  $('#progreso-vision progress').val(resp.paso_actual)
                  $('#progreso-vision h4').html(resp.name);
              });
            
              $.each(data, function(name, value){ 
                
                if($('[name=' + name + ']:checkbox').length && value == 1) {
                  $('[name=' + name + ']:checkbox').attr('checked', true);
                }
                
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
            
              // mentor, lider, efesio.
              var $btn = $('button[attr_discipulo=efesio]');
              if(data.efesio == 0) {
                $btn.removeClass('btn-danger').addClass('btn-success');
                $btn.find('.icon-list').html('add_box');          
              } else
              if(data.efesio == 1) {
                $btn.removeClass('btn-success').addClass('btn-danger');
                $btn.find('.icon-list').html('indeterminate_check_box');
              }
            
              var $btn = $('button[attr_discipulo=lider]');
              if(data.lider == 0) {
                $btn.removeClass('btn-danger').addClass('btn-success');
                $btn.find('.icon-list').html('add_box');          
              } else
              if(data.lider == 1) {
                $btn.removeClass('btn-success').addClass('btn-danger');
                $btn.find('.icon-list').html('indeterminate_check_box');
              }
            
              var $btn = $('button[attr_discipulo=mentor]');
              if(data.mentor == 0) {
                $btn.removeClass('btn-danger').addClass('btn-success');
                $btn.find('.icon-list').html('add_box');
              } else
              if(data.mentor == 1) {
                $btn.removeClass('btn-success').addClass('btn-danger');
                $btn.find('.icon-list').html('indeterminate_check_box');          
              }

              $('#actualizar-registro').modal();
            
              $.each(data, function(name, value){ 
                
                // cambios los valroes de los input.
                if(value == null || value == 0) { value = '-'; } 
                $('[name=' + name + ']') .val(value) .closest('.form-group') .addClass('bmd-form-group is-filled'); 
                if(value == '-') { $('input[name=' + name + ']').val(null).removeClass('bmd-form-group is-filled'); } 
                
                // ahora de los selectpicker
                $('#actualizar-registro select[name=' + name + ']').selectpicker('val', value);
                
              });
            
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
                confirmButtonText: 'Confirmado',
                cancelButtonText: 'Cancelar'
              }).then((result) => {
                if (result.value) {
                  $.get('../dri/discipulos/del.php', { id: data.id }).done(function(data){
                    ExitoQuery();
                    table.ajax.reload();
                  });
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
          action: function
          (){

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
        {
          // Filtrar
          text: '<i class="material-icons" title="Filtrar">filter_list</i>',
          action: function(){

              data = null;
              $('#modal-filter').modal();

          },
          init: function(api, node, config) {
             $(node).addClass('btn-primary');
          }
        }
      ]
    },
    drawCallback: function(){
        table.columns( '.to-hide' ).visible( false );
        var $totalRows = table.data().count();
    }
  });
    
  // Or with jQuery
  $('.datepicker').datepicker({ format: 'YYYY-MM-DD', language: 'es-ES', closeAfterSelect: true });

  // submit form.
  var form_fn = $('form').submit(function(e){

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
      success: function(resp) {
        ExitoQuery();
        table.ajax.reload();
        $form.trigger('reset');
        $form.closest('.modal').modal('hide');
        
        // chequeo si no está devuelto lo de los pasos de la visión.
        if($form.attr('send') == 'new') { PVISION(resp.id); }
      },
      error: function(data) {
        ErrorQuery();
      },
      complete: function() { $formBtn.html($formBtnOT); }
    });

  });
    
  // click function -- pasos de la visión
  $('.p-vision').click(function(){
    PVISION(data.id);
  }); 
  
  
  // función pasos de la visión
  function PVISION (id) {
    
    if(id == 0 || id == null) { alert('Error, ID desconocido, la modal se cerrar.'); $('#pasos-vision').modal('hide'); return; }
    
    data = { id: id }
    
    $('.modal').modal('hide');
    
    $('#pasos-vision').modal();
    
    $.ajax({
      url: '../dri/pvision/checkStatus.php',
      data: { id: id },
      type: 'json',
      method: 'GET',
      beforeSend: function(){},
      success: function(resp) { 
        $.each(resp, function(name, value){ 
          $('#pasos-dela-vision [value=' + value.tarea + ']').attr('checked', true);
        });
      },
      error: function(){ErrorQuery();},
      complete: function() {},
    });
    
  }
  
  // Pasos de la vision steps.
  $("#pasos-dela-vision").steps({
      headerTag: "h3",
      bodyTag: "section",
      transitionEffect: "slideLeft",
      autoFocus: true,
      enableFinishButton: false,
      startIndex: 0,
      onStepChanging: function (event, currentIndex, newIndex)
      {
        var $checkboxes = $("#pasos-dela-vision-p-" + currentIndex).find('input[type=checkbox]').length;
        var $checkboxesChecked = ($("#pasos-dela-vision-p-" + currentIndex).find('input[type=checkbox]:checked').length);
        if(newIndex > currentIndex) {
          if($checkboxes == $checkboxesChecked) { return true; } else {
            Swal.fire(
              'Error!',
              'Debes rellenar todos los campos, antes de pasar al siguiente paso.',
              'error'
            );
          } 
        } else { return true; }
    
      },
      labels: {
        next: 'Siguiente',
        previous: 'Anterior',
        finish: 'Listo'
      }
  });
  
  // funcion -- listas

  $('.changeStatus').on('click', function(){
    var $tarea = $(this).val();
    var $id = data.id;
    $.get('../dri/pvision/changeStatus.php', { id: $id, tarea: $tarea });
  });
  
  // funcion -- listas -- botones

  $('.btn-list').click(function(){
    
    var $btn = $(this);
    var $attr_discipulo = $btn.attr('attr_discipulo');
    
    $.ajax({
      url: '../dri/discipulos/lista.php?id=' + data.id,
      type: 'json',
      method: 'POST',
      data: {
        id: data.id,
        attr: $attr_discipulo
      },
      beforeSend: function(){ $btn.attr('disabled', true); },
      success: function(data) {
        ExitoQuery();
        if(data.nuevo_estatus == 0) {
          $btn.removeClass('btn-danger').addClass('btn-success');
          $btn.find('.icon-list').html('add_box');          
        } else
        if(data.nuevo_estatus == 1) {
          $btn.removeClass('btn-success').addClass('btn-danger');
          $btn.find('.icon-list').html('indeterminate_check_box');
        }
      },
      error: function(data){ ErrorQuery(); },
      complete: function() { $btn.attr('disabled', false); },
    });
    
  });
  
  // FILTROS.
  $('#filter').submit(function(){
    var $val = $(this).serialize();
    table.ajax.url('../dri/discipulos/filter.php?' + $val).load();
  });
});
