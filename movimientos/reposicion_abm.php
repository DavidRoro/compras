<?php

require('../clases/conexion.php');
require('../sesiones.php');
//insertar registros
if (!empty($_POST['agregar'])) {

    $fecha = date('Y-m-d');
    $monto = $_POST['monto'];
    $asig = $_POST['asig'];


    $check_query = "SELECT * FROM reposicion WHERE idreposicion = $asig";
    $check_result = db_query($check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error_message'] = "la asignacion ya existe en la base de datos. Por favor, elige otro.";
    }

    $cabecera = db_query(" call sp_reposicion('PENDIENTE','$fecha',$monto,$asig)");
    
        echo "<script>location.href='reposicion.php'</script>";
   
}

if (!empty($_GET['borrar'])) {
    $cancel = db_query("update reposicion set reposicion_estado='ANULADO' where idreposicion=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='reposicion.php'</script>";
    }
}
///
if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
    $update = db_query("update reposicion set reposicion_estado='GENERADO' where idreposicion=$f1");
    if ($update) {
        echo "<script>location.href='reposicion_impresion.php_?vcod=$f1'</script>";
    }

//    echo "<script>location.href='pedido_impresion.php?vcod=$f1'</script>";
}
?>