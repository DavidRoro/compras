<?php

require('../clases/conexion.php');
include '../sesiones.php';
//insertar registros
if (!empty($_POST['agregar'])) {
    $consulta = db_query("select * from compra where com_estado='PENDIENTE' and usu_id=$idUsu");
    if (mysqli_num_rows($consulta) > 0) {
        $consucabe = db_query("select * from compra where com_estado='PENDIENTE' and usu_id=$idUsu");
        $ID = mysqli_fetch_array($consucabe);
//        echo $ID[0];
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
        $detalle = db_query("call sp_detcompra($ID[0],$txtid,$txtidsuc, $txtcant,$txtprecio , $gravadas5, $gravadas10, $exenta)");
       // $consultalibro = db_query("SELECT * FROM libro_compra where lib_id= com_id=$ID[0]");
        $librocompras = db_query("call sp_librocompra($ID[0],$txtidsuc,$gravadas5,$gravadas10,$exenta,$monto,'GENERADO')");
//        $total = db_query("SELECT sum(det_precio*det_cant) as total FROM compras.det_compra where com_id=$ID[0]");
//        while ($row = mysqli_fetch_array($total)) {
////        $row = mysqli_fetch_array($total);
//            db_query("update compra set com_monto=$row[0] where com_id=$ID[0]");
//        }
        if ($detalle) {
            echo "<script>location.href='compra_agregar.php'</script>";
        }
    } else {
        $fecha = date('Y-m-d');
        
        //insertar cabecera 
        $cabecera = db_query(" call sp_compra('$_POST[txtidsucursal]','$fecha','$_POST[txtfact]','$_POST[cmbtipofact]','$_POST[txtcuotas]','$_POST[txtintervalo]','PENDIENTE',0,'$_POST[txtidorden]','$_POST[txtidproveedor]','$idUsu')");

//consultar cabecera
        $consucabe = db_query("select * from compra where com_estado='PENDIENTE' and usu_id=$idUsu");
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
        $detalle = db_query("call sp_detcompra($ID[0],$txtid,$txtidsuc, $txtcant,$txtprecio , $gravadas5, $gravadas10, $exenta)");
        $librocompras = db_query("call sp_librocompra($ID[0],$txtidsuc,$gravadas5,$gravadas10,$exenta,$monto,'GENERADO')");
        $total = db_query("SELECT sum(det_precio*det_cant) as total FROM compras.det_compra where com_id=$ID[0]");
        while ($row = mysqli_fetch_array($total)) {
//        $row = mysqli_fetch_array($total);
            db_query("update compra set com_monto=$row[0] where com_id=$ID[0]");
        }
        if ($detalle) {
            echo "<script>location.href='compra_agregar.php'</script>";
            
        }
    }
}

if (!empty($_GET['delete'])) {
    $v1 = $_GET['id'];
    $v2 = $_GET['id2'];

//DELETE FROM compras.det_ajustestock WHERE mat_id= 3 and suc_id =1;
    $total = db_query("SELECT sum(det_precio*det_cant) as total FROM det_compra where com_id=$v2");
    while ($row = mysqli_fetch_array($total)) {
//        $row = mysqli_fetch_array($total);
        db_query("update compra set com_monto=com_monto-$row[0] where com_id=$v2");
    }
    $actualizar= db_query("update libro_compra set lib_estado='ELIMINADO' where com_id=$v2;");
    $eliminar = db_query("DELETE FROM det_compra WHERE mat_id= $v1");
    if ($eliminar) {
        echo "<script>location.href='compra_agregar.php'</script>";
    }
}

if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
//    echo $f1;
    $update = db_query("update compra set com_estado='GENERADO' where com_id=$f1");
    if ($update) {
        echo "<script>location.href='compra_impresion.php?vcod=$f1'</script>";
    }
}

if (!empty($_GET['borrar'])) {
    $select = db_query("SELECT * FROM det_compra where com_id=$_GET[vcod]");
    while ($row = mysqli_fetch_array($select)) {
        $updatestock = db_query("call sp_update_stockcompra($row[2],$row[1] ,$row[3])");
    }
    $cancel = db_query("update compra set com_estado='ANULADO' where com_id=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='compralistado.php'</script>";
    }
}
