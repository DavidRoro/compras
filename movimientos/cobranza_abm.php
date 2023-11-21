<?php

require('../clases/conexion.php');
include '../sesiones.php';
//insertar registros
if (!empty($_POST['agregar'])) {

    $consulta = db_query("select * from cobranzas where cob_estado='PENDIENTE' and usu_id=$idUsu");
    if (mysqli_num_rows($consulta) > 0) {
        try {
            $consucabe = db_query("select * from cobranzas where cob_estado='PENDIENTE' and usu_id=$idUsu");
            $ID = mysqli_fetch_array($consucabe);
            //        echo $ID[0];
            $txtid = $_POST['txtid'];
            $txtidpedcliente = $_POST['txtidpedcliente'];
            $txtidsuc = $_POST['txtidsucursal'];
            $txtcant = $_POST['txtcantidad'];
            $txtprecio = $_POST['txtprecio'];
            $gravadas5 = 0;
            $gravadas10 = 0;
            $exenta = 0;
            $monto = 0;
            $impuesto = $_POST['txtimpuesto'];
            $clientes = $_POST['txtclientes'];
            $condicion = $_POST['cmbtipofact'];
            $timbrado = $_POST['txtidtimbrado'];
            $pedcli = $_POST['txtidpedcliente'];

            switch ($impuesto) {
                case 10:
                    $gravadas10 = ($txtprecio * $txtcant) / 11;
                    $monto = $gravadas10;
                    break;
                case 5:
                    $gravadas5 = ($txtprecio * $txtcant) / 21;
                    $monto = $gravadas5;
                    break;
                case 'EXENTA':
                    $exenta = $txtprecio * $txtcant;
                    $monto = $exenta;
                    break;
            }

            $check_query = "SELECT * FROM det_ventas WHERE idventas = $ID[0]";
            $check_result = db_query($check_query);

            if (mysqli_num_rows($check_result) > 0) {
                $_SESSION['error_message'] = "El pedido ya fue seleccionado. Por favor, elige otro.";
                echo "<script>location.href='cobranza_agregar.php'</script>";
            }
            $detalle = db_query("call sp_detventas($ID[0],$txtid,$txtidsuc, $txtcant,$txtprecio , $gravadas5, $gravadas10, $exenta)");

            $libroventas = db_query("call sp_libroventa($ID[0],$txtidsuc,$gravadas5,$gravadas10,$exenta,$monto,'GENERADO')");

            if ($detalle) {
                echo "<script>location.href='cobranza_agregar.php'</script>";
            }
        } catch (QueryException $ex) {
            if ($ex->getCode() == '23000') {
                // Handle the unique constraint violation error
                $_SESSION['error_message'] = "El pedido ya fue seleccionado. Por favor, elige otro.";
                echo "<script>location.href='cobranza_agregar.php'</script>";
            }
        }
    } else {
        try {
            $txtidpedcliente = $_POST['txtidpedcliente'];
            $fecha = date('Y-m-d');

            //insertar cabecera 
            $cabecera = db_query(" call sp_ventas('PENDIENTE','$fecha','$_POST[txtfact]','$_POST[txtintervalo]','$_POST[txtcuotas]',0,'$_POST[cmbtipofact]','$_POST[txtidsucursal]','$idUsu','$_POST[txtclientes]','$_POST[txtidtimbrado]','$_POST[txtidpedcliente]')");
            //estado,fecha,nro,intervalo,cuota,monto,condicion,suc,usu,cliente,tim,pedcli
            //consultar cabecera
            $consucabe = db_query("select * from ventas where ventas_estado='PENDIENTE' and usu_id=$idUsu");
            $ID = mysqli_fetch_array($consucabe);
            $txtid = $_POST['txtid'];
            $txtidsuc = $_POST['txtidsucursal'];
            $txtcant = $_POST['txtcantidad'];
            $txtprecio = $_POST['txtprecio'];
            $gravadas5 = 0;
            $gravadas10 = 0;
            $exenta = 0;
            $monto = 0;
            $impuesto = $_POST['txtimpuesto'];
            switch ($impuesto) {
                case 10:
                    $gravadas10 = ($txtprecio * $txtcant) / 11;
                    $monto = $gravadas10;
                    break;
                case 5:
                    $gravadas5 = ($txtprecio * $txtcant) / 21;
                    $monto = $gravadas5;
                    break;
                case 'EXENTA':
                    $exenta = $txtprecio * $txtcant;
                    $monto = $exenta;
                    break;
            }

            //insertar detalle

            $detalle = db_query("call sp_detventas ($ID[0],$txtid,$txtidsuc, $txtcant,$txtprecio , $gravadas5, $gravadas10, $exenta)");

            $librocompras = db_query("call sp_libroventas($ID[0],$txtidsuc,$gravadas5,$gravadas10,$exenta,$monto,'GENERADO')");
            $total = db_query("SELECT sum(det_precio*det_cant) as total FROM det_ventas where idventas=$ID[0]");
            while ($row = mysqli_fetch_array($total)) {

                db_query("update ventas set venta_monto=$row[0] where idventas=$ID[0]");
            }
            if ($detalle) {
                echo "<script>location.href='cobranza_agregar.php'</script>";
            }
        } catch (QueryException $ex) {
            if ($ex->getCode() == 23000) {
                // Handle the unique constraint violation error
                $_SESSION['error_message'] = "El pedido ya fue seleccionado. Por favor, elige otro.";
                echo "<script>location.href='cobranza_agregar.php'</script>";
            }
        }
    }
}

if (!empty($_GET['delete'])) {
    $v1 = $_GET['id'];
    $v2 = $_GET['id2'];


    $total = db_query("SELECT sum(det_precio*det_cant) as total FROM det_ventas where idventas=$v2");
    while ($row = mysqli_fetch_array($total)) {
//        $row = mysqli_fetch_array($total);
        db_query("update ventas set venta_monto=venta_monto-$row[0] where idventas=$v2");
    }
    $actualizar = db_query("update libro_venta set lib_estado='ELIMINADO' where idventas=$v2;");
    $eliminar = db_query("DELETE FROM det_ventas WHERE mat_id= $v1");
    if ($eliminar) {
        echo "<script>location.href='cobranza_agregar.php'</script>";
    }
}

if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
//    echo $f1;
    $update = db_query("update ventas set ventas_estado='GENERADO' where idventas=$f1");
    if ($update) {
        echo "<script>location.href='ventas_impresion.php?vcod=$f1'</script>";
    }
}




if (!empty($_GET['borrar'])) {
    $select = db_query("SELECT * FROM det_ventas where idventas=$_GET[vcod]");
    while ($row = mysqli_fetch_array($select)) {
        $updatestock = db_query("call sp_update_stockcompra($row[2],$row[1] ,$row[3])");
    }
    $cancel = db_query("update ventas set ventas_estado='ANULADO' where idventas=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='ventalistado.php'</script>";
    }
}



