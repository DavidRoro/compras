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
            $txtid = $_POST['cmbtipocobro'];
            $txtidventas = $_POST['txtidventas'];
            $txtidsuc = $_POST['txtidsucursal'];
            // monto a cobrar
            $txtmonto = $_POST['txtcantidad'];
            // monto recibido
            $txtrecibido = $_POST['txtrecibido'];
            $montop = 0;

            // si $txtrecibido = 35.000 es menor a  $txtmonto = 70000 se tiene que
            // guardar en monto pendiente

            if ($txtrecibido < $txtmonto) {
                $montop = ($txtmonto - $txtrecibido);
            }
            $check_query = "SELECT * FROM det_cobranzas WHERE for_cob_id = $txtid";
            $check_result = db_query($check_query);

            if (mysqli_num_rows($check_result) > 0) {
                $_SESSION['error_message'] = "La cobranza ya fue seleccionado. Por favor, elige otro.";
                echo "<script>location.href='cobranza_agregar.php'</script>";
            }
            $detalle = db_query("call sp_det_cobranzas($ID[0],$txtid,$txtrecibido,$txtmonto , 0,$montop)");

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

            $fecha = date('Y-m-d');

            //insertar cabecera 

            $cabecera = db_query(" call compras_marce.sp_cobranzas('$_POST[txtidventas], '$fecha', 0, 'PENDIENTE','$_POST[txtidsucursal]' ,'$idUsu');");

            //consultar cabecera
            $consucabe = db_query("select * from cobranzas where cob_estado='PENDIENTE' and usu_id=$idUsu");
            $ID = mysqli_fetch_array($consucabe);
            $txtid = $_POST['cmbtipocobro'];
            //$txtidsuc = $_POST['txtidsucursal'];
            $txtmonto = $_POST['txtcantidad'];
            $txtrecibido = $_POST['txtrecibido'];
            $montop = 0;
            if ($txtrecibido < $txtmonto) {
                $montop = $txtrecibido - $txtmonto;
            }

            //insertar detalle

            $detalle = db_query("call sp_det_cobranzas($ID[0],$txtid,$txtrecibido,$txtmonto , 0,$montop)");

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

    $eliminar = db_query("DELETE FROM `compras_marce`.`det_cobranzas` WHERE (`cob_id` = '$v1') and (`for_cob_id` = '$v2');");
    if ($eliminar) {
        echo "<script>location.href='cobranza_agregar.php'</script>";
    }
}

if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
//    echo $f1;
    $update = db_query("update cobranzas set cob_estado='Pagado' where cob_id=$f1");
    if ($update) {
        echo "<script>location.href='cobranza_impresion.php?vcod=$f1'</script>";
    }
}




if (!empty($_GET['borrar'])) {

    $cancel = db_query("update cobranzas set cob_estado='ANULADO' where cob_id=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='cobranza_listado.php'</script>";
    }
}



