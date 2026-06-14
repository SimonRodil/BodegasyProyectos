import $ from 'jquery';

$(function(){
  var $ciudad = $('#main-filter [name="ciudad"]').attr('chosen');
  var $selBarrio = $('#main-filter [name="barrio"]');
  if($ciudad != null && $ciudad != '-' && $ciudad != '') {
    $.ajax({
      beforeSend: function() { $selBarrio.empty(); },
      url: '/api/barrios/' + $ciudad,
      method: 'GET'
    }).done(function(data) {
      $selBarrio.append("<option value='-'>Barrio</option>");
      $.each(data, function(index, value){
        $selBarrio.append("<option value='" + value.id + "'>" + value.nombre + "</option>");
      });
    }).always(function(){
      $('#main-filter select').each(function(index, element){
        var $value = $(element).attr('chosen');
        if($value != '-' && $value != '') {
          $(element).val($value);
        }
      });
    });
  } else {
    $('#main-filter select').each(function(index, element){
      var $value = $(element).attr('chosen');
      if($value != '-' && $value != '') {
        $(element).val($value);
      }
    });
  }

  $('[data-action="pagination"]').click(function(){
    var $pagina = $(this).text();
    var $itemPag = $(this);
    var $sectionRow = $('.prop-entry').closest('.row');
    var $data = $('#main-filter').serialize();
    $.ajax({
      beforeSend: function() { $sectionRow.css('opacity', '0.5'); $('[data-action="pagination"]').removeClass('active'); },
      url: '/api/filtrar-propiedades?pagina=' + $pagina,
      method: 'POST',
      data: $data
    }).done(function(resp) {
      $sectionRow.empty();
      $.each(resp, function(index, value){
        var $item = '<div class="col-md-6 col-lg-4 mb-4"><div class="prop-entry d-block"><figure><img src="assets/images/propiedades/' + value.imagen_destacada + '" alt="Image" class="img-fluid"></figure><div class="prop-text"><div class="inner"><span class="price rounded">$' + value.precio_format + '</span><h3 class="title">' + value.nombre + ' (' + value.tipo_oferta_nombre + ')</h3><p class="location">' + value.ciudad_nombre + '</p></div><div class="prop-more-info"><div class="inner d-flex"><div class="col"><span>Área:</span><strong>' + value.area + 'm<sup>2</sup></strong></div><div class="col text-right"><button type="button" class="btn btn-primary btn-sm rounded-0" data-id="' + value.id + '"><span class="icon-search"></span></button></div></div></div></div> </div>';
        $sectionRow.prepend($item);
      });
    }).always(function() { $sectionRow.css('opacity', '1'); $itemPag.addClass('active'); clickPropiedades(); });
  });
});
