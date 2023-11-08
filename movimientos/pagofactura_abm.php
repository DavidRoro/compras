<?php

require('../clases/conexion.php');
include '../sesiones.php';
//insertar registros
if (!empty($_POST['agregar'])) {
    $consulta = db_query("select * from pagosfactura where pagofactura_estado='PENDIENTE' and usu_id=$idUsu");
    if (mysqli_num_rows($consulta) > 0) {
        $consucabe = db_query("select * from pagosfactura where pagofactura_estado='GENERADO' and usu_id=$idUsu");
        $ID = mysqli_fetch_array($consucabe);  
        $txtfecha = $_POST['txtfecha'];
        $combotipo = $_POST['combotipo'];
        $txtfechapago = $_POST['txtfechapago'];
        $txtidcuenta= $_POST['txtcuenta'];
        $txtidcompra= $_POST['txtcompra'];   
        }
        
        $txtctapagar= $_POST['txtpagar'];
        
        
        $detalle = db_query("call sp_detpagofactura($ID[0],$txtctapagar,$txtidcompra,$idSuc)");
       
//        }
        if ($detalle) {
            echo "<script>location.href='pago_factura_agregar.php'</script>";
        }
    } else {
        try {

            $fecha = date('Y-m-d');

            //insertar cabecera 
            $cabecera = db_query(" call sp_pagofactura($fecha','$_POST[combotipo]','$fechapago','$_POST[txtcuenta]´,´$_POST[txtcompra]´)");

            //consultar cabecera
            $consucabe = db_query("select * from pagosfactura where pagosfactura_estado='PENDIENTE'");
            $ID = mysqli_fetch_array($consucabe);
            $txtfecha = $_POST['txtfecha'];
        $combotipo = $_POST['combotipo'];
        $txtfechapago = $_POST['txtfechapago'];
        $txtidcuenta= $_POST['txtcuenta'];
        $txtidcompra= $_POST['txtcompra'];   

            
            
           
            //insertar detalle
            
            $detalle = db_query("call sp_detpagofactura($ID[0],$txtctapagar,$txtidcompra,$idSuc)");


            if ($detalle) {
                echo "<script>location.href='pago_factura_agregar.php'</script>";
            }
        } catch (Exception $ex) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }

if (!empty($_GET['delete'])) {
    $v1 = $_GET['id'];
    $v2 = $_GET['id2'];

   
    $eliminar = db_query("DELETE FROM det_pagofactura WHERE idpagosfactura= $v1");
    if ($eliminar) {
        echo "<script>location.href='pago_factura_agregar.php'</script>";
    }
}

if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
//    echo $f1;
    $update = db_query("update pagosfactura set pagosfactura_estado='GENERADO' where idpagosfactura=$f1");
    if ($update) {
        echo "<script>location.href='pagosfactura_impresion.php?vcod=$f1'</script>";
    }
}

if (!empty($_GET['borrar'])) {
    $select = db_query("SELECT * FROM det_pagofactura where idpagosfactura=$_GET[vcod]");
   
    $cancel = db_query("update pagosfactura set pagosfactura_estado='ANULADO' where idpagosfactura=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='pagofactura_listado.php'</script>";
    }
}

