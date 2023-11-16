$(document).ready(function(){
    $("#descripcion").autocomplete({
        source: "../buscadores/buscar_matprima.php",
        minLength: 2
    });

    $("#descripcion").focusout(function(){
        $.ajax({
            url: '../buscadores/materia_prima.php',
            type: 'POST',
            dataType: 'json',
            data: { descripcion: $('#descripcion').val() }
        }).done(function(respuesta){
            $("#idpro").val(respuesta.idpro);
            // Verifica si el campo 'precioc' está definido en la respuesta antes de asignarlo
            if (respuesta.hasOwnProperty('precioc')) {
                $("#precioc").val(respuesta.precioc);
            } else {
                // Puedes manejar el caso donde 'precioc' no está presente, por ejemplo, limpiar el campo
                $("#precioc").val('');
            }
        });
    });
});
