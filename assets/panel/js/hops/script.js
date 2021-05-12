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

  /* var table_disciples = $('#hops-disciple').DataTable({
    paging: false,
    searching: false,
    info: false,
    ajax: {
      url: '../dri/hops/sel.php',
      type: 'GET',
       dataSrc: ""
      },
    language: {
        url: "../assets/datatable/language/Spanish.json"
        },
    dom: 'Bfrip',
    buttons: {
      dom: {
        button: {
          className: 'btn btn-primary'
        }
      },
      buttons: [
        {
          // PDF
          extend: 'pdfHtml5',
          text: '<i class="material-icons" title="PDF">picture_as_pdf</i>',
          init: function(api, node, config) {
             $(node).addClass('btn-primary');
          }
        },
        {
          // Excel
          extend: 'excel',
          text: '<span class="material-icons">grid_on</span>',
          init: function(api, node, config) {
             $(node).addClass('btn-primary');
          }
        },
        {
          // Imprimir
          extend: 'print',
          text: '<i class="material-icons" title="PRINT">local_printshop</i>',
          init: function(api, node, config) {
             $(node).addClass('btn-primary');
          }
        }
      ]
    }
  }); */
  
  var table = $('#hops').DataTable({
    ajax: {
      url: '../dri/hops/sel.php',
      type: 'GET',
       dataSrc: ""
      },
    columns: [
      { data: 'id', "defaultContent": "" },
      { data: 'network_name', "defaultContent": "-" },
      { data: 'leader_name', "defaultContent": "-" },
      { data: 'leader_2_name', "defaultContent": "-" },
      { data: 'sublider_name', "defaultContent": "-" },
      { data: 'sublider_2_name', "defaultContent": "-" },
      { data: 'anfitrion_name', "defaultContent": "-" },
      { data: 'address', "defaultContent": "-" },
      { data: 'schedule', "defaultContent": "-" },
      { data: 'type', "defaultContent": "-" }
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
            
              var $urlTableDisciples = '../dri/hops/discipulos.php?id=' + data.id;
              table_disciples.ajax.url($urlTableDisciples).load();
              console.log($urlTableDisciples);
            
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
                  $.get('../dri/hops/del.php', { id: data.id }).done(function(data){
                    ExitoQuery();
                    data = null;
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
    }
  });

  var table_disciples = $('#hops-disciple').DataTable({
    paging: false,
    searching: false,
    info: false,
    ajax: {
      dataSrc: "",
      url: '../dri/redes/sel.php'
    },
    columns: [
      { data: 'id', "defaultContent": "" },
      { data: 'name', "defaultContent": "" },
      { data: 'lastname', "defaultContent": "" },
      { data: 'ident_num', "defaultContent": "" },
      { data: 'network_name', "defaultContent": "" },
      { data: 'telephone', "defaultContent": "" },
      { data: 'email', "defaultContent": "" },
    ],
    responsive: true,
    language: {
        url: "../assets/datatable/language/Spanish.json"
        },
    dom: 'Bfrip',
    buttons: {
      dom: {
        button: {
          className: 'btn btn-primary'
        }
      },
      buttons: [
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
        }
      ]
    },
    drawCallback: function(){
        table_disciples.columns( '.to-hide' ).visible( false );
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
        ExitoQuery();
        table.ajax.reload();
        $form.trigger('reset');
        $form.closest('.modal').modal('hide');
      },
      error: function(data) {
        ErrorQuery();
      },
      complete: function() { $formBtn.html($formBtnOT); }
    });

  });
  
  // FILTROS.
  $('#filter').submit(function(){
    var $val = $(this).serialize();
    table.ajax.url('../dri/hops/filter.php?' + $val).load();
  });

});