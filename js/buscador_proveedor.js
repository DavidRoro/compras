$(document).ready(function(){
    $( "#prov" ).autocomplete({
      source: "../buscadores/buscar_proveedor.php",
      minLength: 2
    });
  
    $("#prov").focusout(function(){
      $.ajax({
            url:'../buscadores/proveedores.php',
          type:'POST',
          dataType:'json',
          data:{ prov:$('#prov').val()}
      }).done(function(respuesta){
          $("#idproveedor").val(respuesta.idproveedor);
//          $("#precioc").val(respuesta.precioc);
      });
    });
});