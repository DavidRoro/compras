$(document).ready(function () {
    var token = $('meta[name="csrf-token"]').attr("content");
    $("#descripcion").autocomplete({
        source: "../buscadores/buscar_matprima.php",
        minLength: 2
    });

    $("#descripcion").focusout(function () {
        $.ajax({
            url: '../buscadores/materia_prima.php',
            type: 'POST',
            dataType: 'json',
            data: {_token: token, descripcion: $('#descripcion').val()},
            success: function (respuesta) {
                $("#idpro").val(respuesta.idpro);
                $("#mat_precioc").val(respuesta.mat_precioc);
                console.log(respuesta);
                // Verifica si el campo 'precioc' está definido en la respuesta antes de asignarlo


            }
        });
    });
});
