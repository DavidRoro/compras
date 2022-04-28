$(document).ready(function () {
                $("#sucu").autocomplete({
                    source: "../buscadores/buscar_sucursal.php",
                    minLength: 2
                });

                $("#sucu").focusout(function () {
                    $.ajax({
                        url: '../buscadores/sucursal.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {sucu: $('#sucu').val()}
                    }).done(function (respuesta) {
                        $("#ids").val(respuesta.ids);
//                        $("#nombres").val(respuesta.nombres);
                    });
                });
            });