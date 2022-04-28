$(document).ready(function () {
                $("#idfactura").autocomplete({
                    source: "../buscadores/buscar_nrofact.php",
                    minLength: 2
                });

                $("#idfactura").focusout(function () {
                    $.ajax({
                        url: '../buscadores/nrofact.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {idfactura: $('#idfactura').val()}
                    }).done(function (respuesta) {
                        $("#txtidcompra").val(respuesta.txtidcompra);
                        $("#prov").val(respuesta.prov);
                        $("#ruc").val(respuesta.ruc);
                    });
                });
            });