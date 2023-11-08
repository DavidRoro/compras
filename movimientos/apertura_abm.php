
<?php

require('../clases/conexion.php');
require('../sesiones.php');
//insertar registros
if (!empty($_POST['agregar'])) {

    // Definir la zona horaria de Asunción
    $zonaHorariaAsuncion = new DateTimeZone('America/Asuncion');
// Crear un objeto DateTime en la zona horaria de Asunción
    $fechaActual = new DateTime('now', $zonaHorariaAsuncion);
// Obtener solo la hora en formato de 24 horas
    $hora = $fechaActual->format('H:i:s');
    $descri = $_POST['txtdescri'];
    $tipo = $_POST['cmbtipo'];
    $cajas = $_POST['txtidcaja'];
    $sucursales = $_POST['txtidsucursal'];
    $monto_inicial = $_POST['montoregistro'];
    $monto_cierre = $_POST['montoregistrofinal'];
    $sucursales = $_POST['txtidsucursal'];

    $cabecera = db_query(" call sp_aperturaycierre('$descri','$tipo','Activo', '$hora', $monto_inicial, $monto_cierre, $cajas, $sucursales,$idUsu)");
    //consultar cabecera

    if ($cabecera) {

        echo "<script>location.href='apertura_agregar.php'</script>";
    }
}


if (!empty($_GET['delete'])) {
    $eliminar = db_query("delete from det_pedido where mat_id=$_GET[id]");

    if ($eliminar) {
        echo "<script>location.href='pedido_agregar.php'</script>";
    } else {

        echo "<script>alert('No se pudieron borrar los registros del detalle')</script>";
    }
}
if (!empty($_GET['borrar'])) {
    $cancel = db_query("update pedido set ped_estado='ANULADO' where ped_id=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='pedidolistado.php'</script>";
    }
}
///
if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
    $update = db_query("update ordenpago set ordenpago_estado='GENERADO' where idordenpago=$f1");
    if ($update) {
        echo "<script>location.href='ordenpago_impresion.php?vcod=$f1'</script>";
    }

//    echo "<script>location.href='pedido_impresion.php?vcod=$f1'</script>";
}
?>
				
