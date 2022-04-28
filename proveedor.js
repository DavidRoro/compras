
$(function(){
    panel_datos();
    
});

function panel_datos(){
    $.ajax({
        url:"../referenciales/clasificacionlistado.php"
    }).done(function(resultado){
        $("#panel-clasi").html(resultado);
        formato_tabla("#data-clasi",2);
    });
}

function formato_tabla(tabla, cantidad){
    $(tabla).DataTable({
        "lengthChange": false,
        responsive: "true",
        "iDisplayLength": cantidad,
        language: {
            "sSearch":"Buscar: ",
            "sInfo":"Mostrando resultados del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoFiltered":"(filtrado de entre _MAX_ registros)",
            "sInfoEmpty":"No hay resultados",
            "oPaginate":{
                "sNext":"Siguiente",
                "sPrevious":"Anterior"
            }
        }
    });
}


