$(document).ready(function()
{
  $('#regione').change(function()
  {
    // alert($(this).val());
    $.ajax({
      'url':'get_province.php',
      'data':{'id_regione': $(this).val()}
    })
    .done(function (response){
      $("#provincia").html(response);
    })
    .fail(function (rsponse){
      alert('errore ');
    })
  })

  $('#provincia').change(function()
  {
    // alert($(this).val());
    $.ajax({
      'url':'get_comuni.php',
      'data':{'sigla_provincia': $(this).val()}
    })
    .done(function (response){
      $("#comune").html(response);
    })
    .fail(function (rsponse){
      alert('errore');
    })
  })

});
