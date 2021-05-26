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
      url: '../dri/propiedades/sel.php',
      type: 'GET',
       dataSrc: ""
      },
    columns: [
      { data: 'id', "defaultContent": "-" },
      { data: 'nombre', "defaultContent": "-" },
      { data: 'tipo_propiedad', "defaultContent": "-" },
      { data: 'tipo_oferta_nombre', "defaultContent": "-" },
      { data: 'precio', "defaultContent": "-" },
      { data: 'ciudad_nombre', "defaultContent": "-" },
      { data: 'barrio_nombre', "defaultContent": "-" },
      { data: 'address', "defaultContent": "-" },
      { data: 'area', "defaultContent": "-" },
      { data: 'ano', "defaultContent": "-" },
      { data: 'tamano_lote', "defaultContent": "-" },
      { data: 'asesor_nombre', "defaultContent": "-" },
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
			  $('#nuevo-registro form').trigger('reset');
			  $('#nuevo-registro form .form-group').removeClass('is-filled');
			  data = null;
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
                
                // cambios los valroes de los input.
                if(value == null || value == 0) { value = '-'; } 
                $('[name=' + name + ']') .val(value) .closest('.form-group') .addClass('bmd-form-group is-filled'); 
                if(value == '-') { $('input[name=' + name + ']').val(null).removeClass('bmd-form-group is-filled'); } 
                
                // ahora de los selectpicker
                $('#actualizar-registro select[name=' + name + ']').selectpicker('val', value);
                
              });
            
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
                confirmButtonText: 'Confirmado',
                cancelButtonText: 'Cancelar'
              }).then((result) => {
                if (result.value) {
                  $.get('../dri/propiedades/del.php', { id: data.id }).done(function(resp){
                    if(resp == 1) {
                      ExitoQuery();
                      table.ajax.reload();
                      return;
                    } else {
                      ErrorQuery();
                      table.ajax.reload();
                    }
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
          text: '<i class="material-icons" title="PDF">picture_as_pdf</i>',
          action: function
          (){

              if (!data) {
                SeleccionePrimeroAlert();
                return;
              }
              window.open("../ficha-tecnica?propiedad=" + data.id);

          },
          init: function(api, node, config) {
             $(node).addClass('btn-primary');
          }
        }, /*
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
        }, */
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
        var $totalRows = table.data().count();
    }, 
    initComplete:function(settings, json){
        
        // Oculto los campos que no se usan.
        table.columns( '.to-hide' ).visible( false );
        var $totalRows = table.data().count();
        if($rs < 2) {
            table.button( 8 ).enable( false );
        }
      
        // Chequeo el rango del usuario
        if($rs < 2) {
          table.ajax.url('../dri/propiedades/filter.php?asesor=' + $id).load();
        }
      
        // Chequeo que haya una propiedad en vista previa.
        /* if(!isNaN($('table[propiedad]').attr('propiedad'))) {
          var $id = $('table[propiedad]').attr('propiedad');
          var $td = $('table tr td:contains("' + $id + '")').parent();
          $td.remove();
          var data = table.row($td).data();
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
        } */
      
    }
  });

  // submit form.
  var form_fn = $('form').submit(function(e){

    // Desactivadas funciones.
    e.preventDefault();

    // variables secundarias.
    var $formId = $(this).attr('id');
    var $form = $(this);
    var $formBtn = $('button[type=submit][form='+$formId+']');
    var $formBtnOT = $formBtn.html();
    var $formReq = $form.find('[name][required]').val();
    
    // ajax.
    $.ajax({
      beforeSend: function() { $formBtn.html('<span class="material-icons spin">settings</i>'); },
      url: $form.attr('action'),
      type: 'json',
      cache: 'false',
      method: 'POST',
      data: $form.serialize(),
      complete: function() { $formBtn.html($formBtnOT); $('[name=barrio]').empty(); },
	  success: function(resp) {
        table.ajax.reload();
        $form.trigger('reset');
        $form.closest('.modal').modal('hide');
        
        if($form.attr('send') == 'new') {
          AsignarFotoDestacada(resp.id, true);
		  console.log('El ID de la propiedad registrada es:' + resp.id);
			
			// Agrego acá la opci´no del ID por que está fallando en las funciones demasiado.
			$('#form-foto-destacada [name=propiedad]').val(resp.id);
			$('#form-galeria-propiedad [name=propiedad]').val(resp.id);
			
        } else {
          ExitoQuery();
        }
      },
      error: function(data) {
        ErrorQuery();
      }
    });

  });
  
  // FILTROS.
  $('#filter').submit(function(){
    var $val = $(this).serialize();
    table.ajax.url('../dri/propiedades/filter.php?' + $val).load();
  });
      
  // Ciudades y Barrios Coord.  
  $('[name=ciudad]').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
    var $form = $(this).closest('form');
    var $selBarrio = $form.find('[name=barrio]');
    var $ciudad = $(this).val();
    
    if(data) {
    var $barrio = data.barrio;
    }

    if($ciudad != null) {
      $.ajax({
        beforeSend: function() { $selBarrio.empty().prop('disabled', true); $selBarrio.selectpicker('refresh'); },
        url: '../dri/barrios/sel.php',
        method: 'GET',
        data: { ciudad: $ciudad },
        complete: function(data) {
          $selBarrio.append("<option value='-'>Sin seleccionar</option>");
          $.each(data.responseJSON, function(index, value){
            $selBarrio.append("<option value='" + value.id + "'>" + value.nombre + "</option>");
            $selBarrio.prop('disabled', false); $selBarrio.selectpicker('refresh');
          });
          if($barrio != null) {
            $selBarrio.selectpicker('val', $barrio);
            $barrio = null;
          }
          return;
        }
      }); 
    }
  });

  
});

$('.editar-galeria').click(function(){
  // $('#actualizar-registro').modal('hide');
  $('#form-galeria-propiedad [name=propiedad]').val(data.id);
  GaleriaDeLaPropiedad(data.id);
  $.ajax({
    method: 'POST',
    url: '../dri/propiedades/galeria/sel.php',
    dataType: 'json',
    data: { id: data.id },
    success: function(resp) {
      $.each(resp, function(index, value){
        $('#galeria-propiedad #fotos-cargadas').append('<div class="box"><img src="../images/propiedades/fotos/' + value.imagen + '"><div class="close" data-id="' + value.id + '"></div></div>');
      });
    },
    complete: function() { deleteImage(); }
  });
});

$('.editar-foto-destacada').click(function(){
  // $('#actualizar-registro').modal('hide');
  $('#form-foto-destacada [name=propiedad]').val(data.id);
  AsignarFotoDestacada(data.id, false);
});

$('.ver-galeria').click(function(){
  // $('#actualizar-registro').modal('hide');
  $('#form-galeria-propiedad [name=propiedad]').val(data.id);
  GaleriaDeLaPropiedad(data.id);
  $.ajax({
    method: 'POST',
    url: '../dri/propiedades/galeria/sel.php',
    dataType: 'json',
    data: { id: data.id },
    success: function(resp) {
      $.each(resp, function(index, value){
        $('#galeria-propiedad #fotos-cargadas').append('<div class="box"><img src="../images/propiedades/fotos/' + value.imagen + '"><div class="close" data-id="' + value.id + '"></div></div>');
      });
    },
    complete: function() { deleteImage(); }
  });
});

$('.ver-foto-destacada').click(function(){
  // $('#actualizar-registro').modal('hide');
  $('#form-foto-destacada [name=propiedad]').val(data.id);
  AsignarFotoDestacada(data.id, false);
});