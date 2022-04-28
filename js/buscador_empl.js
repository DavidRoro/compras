$(document).ready(function () {
                $("#ci").autocomplete({
                    source: "../buscadores/buscar_personal.php",
                    minLength: 2
                });

                $("#ci").focusout(function () {
                    $.ajax({
                        url: '../buscadores/personal.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {ci: $('#ci').val()}
                    }).done(function (respuesta) {
                        $("#cod").val(respuesta.cod);
                        $("#nombres").val(respuesta.nombres);
                    });
                });
            });