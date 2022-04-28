$(document).ready(function(){
    $( "#descripcion" ).autocomplete({
      source: "../buscadores/buscar_matprima.php",
      minLength: 2
    });
  
    $("#descripcion").focusout(function(){
      $.ajax({
            url:'../buscadores/materia_prima.php',
          type:'POST',
          dataType:'json',
          data:{ descripcion:$('#descripcion').val()}
      }).done(function(respuesta){
          $("#idpro").val(respuesta.idpro);
//          $("#precioc").val(respuesta.precioc);
      });
    });
});