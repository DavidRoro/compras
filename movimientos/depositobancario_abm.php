<?php

require('../clases/conexion.php');
require('../sesiones.php');
//insertar registros
if (!empty($_POST['agregar'])) {

    $fecha = date('Y-m-d');
    $monto = $_POST['monto'];
    $combometodo = $_POST['combometodo'];
    $suc = $_POST['txtidsucursal'];



//    $check_query = "SELECT * FROM depositobancario WHERE iddepositobancario = $asig";
//    $check_result = db_query($check_query);
//
//    if (mysqli_num_rows($check_result) > 0) {
//        $_SESSION['error_message'] = "la asignacion ya existe en la base de datos. Por favor, elige otro.";
//    }

    $cabecera = db_query("INSERT INTO `compras_marce`.`depositobancario` (`dep_estado`,`dep_fecha`,`dep_monto`,`dep_metodo`,`usu_id`,`suc_id`) VALUES ('PENDIENTE','$fecha',$monto,'$combometodo',$idUsu,$suc);");
    
    
        echo "<script>location.href='depositobancario_agregar.php'</script>";
   
}

if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
//    echo $f1;
    $update = db_query("update depositobancario set dep_estado='GENERADO' where iddepositobancario=$f1");
    if ($update) {
        echo "<script>location.href='depositobancario_impresion.php?vcod=$f1'</script>";
    }
}

