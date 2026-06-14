import $ from 'jquery';

$(function(){
  $('#main-filter select').each(function(index, element){
    var $value = $(element).attr('chosen');
    if($value !== undefined && $value != '-' && $value != '') {
      $(element).val($value);
    }
  });
});
