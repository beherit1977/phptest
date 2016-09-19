$(document).ready(function(){

$(function() {
  $('#row_podolsk').hide();
  $('#row_ryazan').hide();
  $('#row_rzp').hide();
   $('#row_kostroma').hide();
  $('#type').change(function() {
    if ($('#type').val() == 'grain') {
      $('#row_podolsk').show();
    } else {
      $('#row_podolsk').hide();
    }
    if ($('#type').val() == 'phk') {
      $('#row_podolsk').show();
    } else {
      $('#row_podolsk').hide();
    }
     if ($('#type').val() == 'ryazan') {
      $('#row_ryazan').show();
    } else {
      $('#row_ryazan').hide();
    }
       if ($('#type').val() == 'rzp') {
      $('#row_rzp').show();
    } else {
      $('#row_rzp').hide();
    }
       if ($('#type').val() == 'kostroma') {
      $('#row_kostroma').show();
    } else {
      $('#row_kostroma').hide();
    }
    
    
  });
});
