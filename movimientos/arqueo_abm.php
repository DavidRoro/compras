<?php

require('../clases/conexion.php');
require('../sesiones.php');
//insertar registros
if (!empty($_POST['agregar'])) {

    $fecha = date('Y-m-d');
    $concepto = $_POST['concepto'];
    $saldo = 0;
    $debe = 0;
    $haber = 0;
    $cmbtipo = $_POST['cmbtipo'];

// Obtener el último saldo de la base de datos
    $result = db_query("SELECT saldo FROM conciliacion ORDER BY idconciliacion DESC LIMIT 1");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $saldoAnterior = $row['saldo'];

        // Calcular el nuevo saldo
        if ($cmbtipo === 'DEBE') {
            $debe = isset($_POST['debe']) ? $_POST['debe'] : 0;
            $saldo = $saldoAnterior + $debe;
        } else {
            $haber = isset($_POST['haber']) ? $_POST['haber'] : 0;
            $saldo = $saldoAnterior - $haber;
        }
    }else{
         if ($cmbtipo === 'DEBE') {
            $debe = isset($_POST['debe']) ? $_POST['debe'] : 0;
            $saldo = $debe;
            
         } else {
            $haber = isset($_POST['haber']) ? $_POST['haber'] : 0;
            $saldo = $haber;
           
         
         }
    }

    $cabecera = db_query("INSERT INTO `compras_marce`.`conciliacion` (`conci_estado`,`conci_fecha`,`conci_concepto`,`debe`,`haber`,`saldo`) VALUES ('PENDIENTE','$fecha', '$concepto',$debe,$haber, $saldo);");


    echo "<script>location.href='conciliacion_agregar.php'</script>";
}

if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
//    echo $f1;
    $update = db_query("update conciliacion set conci_estado='GENERADO' where idconciliacion=$f1");
    if ($update) {
        echo "<script>location.href='conciliacion_impresion.php?vcod=$f1'</script>";
    }
}    

if (!empty($_GET['borrar'])) {

    $cancel = db_query("delete from conciliacion where idconciliacion=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='conciliacion_agregar.php'</script>";
    }
}
