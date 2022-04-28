<?php

require('../clases/conexion.php');
include '../sesiones.php';
//insertar registros
if (!empty($_POST['agregar'])) {
    $consulta = db_query("select * from presupuesto where pre_estado='PENDIENTE' and usu_id=$idUsu");
    if (mysqli_num_rows($consulta) > 0) {
        $consucabe = db_query("select * from presupuesto where pre_estado='PENDIENTE' and usu_id=$idUsu");
        $ID = mysqli_fetch_array($consucabe);
//        echo $ID[0];
        $txtid = $_POST['txtid'];
        $txtcant = $_POST['txtcantidad'];
        $txtprecio = $_POST['txtprecio'];
        $gravadas5 = 0;
        $gravadas10 = 0;
        $exenta = 0;
        $impuesto = $_POST['txtimpuesto'];
        switch ($impuesto) {
            case 10:
                $gravadas10 = ($txtprecio * $txtcant) / 11;
                break;
            case 5:
                $gravadas5 = ($txtprecio * $txtcant) / 21;
                break;
            case 'EXENTA':
                $exenta = $txtprecio * $txtcant;
                break;
        }
        $detalle = db_query("call compras.sp_detpresu($ID[0],$txtid, $txtcant,$txtprecio , $gravadas5, $gravadas10, $exenta)");

        if ($detalle) {
            echo "<script>location.href='presupuesto_agregar.php'</script>";
        }
    } else {
        $fecha = date('Y-m-d');
        //insertar cabecera 
        $cabecera = db_query(" call sp_presu('$fecha','PENDIENTE',0,'$_POST[txtidproveedor]','$_POST[txtidpedido]','$_POST[txtidsucursal]','$idUsu')");
        //consultar cabecera
        $consucabe = db_query("select * from presupuesto where pre_estado='PENDIENTE' and usu_id=$idUsu");
        $ID = mysqli_fetch_array($consucabe);
        $txtid = $_POST['txtid'];
        $txtcant = $_POST['txtcantidad'];
        $txtprecio = $_POST['txtprecio'];
        $gravadas5 = 0;
        $gravadas10 = 0;
        $exenta = 0;
        $impuesto = $_POST['txtimpuesto'];
        switch ($impuesto) {
            case 10:
                $gravadas10 = ($txtprecio * $txtcant) / 11;
                break;
            case 5:
                $gravadas5 = ($txtprecio * $txtcant) / 21;
                break;
            case 'EXENTA':
                $exenta = $txtprecio * $txtcant;
                break;
        }
        //insertar detalle
        $detalle = db_query("call compras.sp_detpresu($ID[0],$txtid, $txtcant,$txtprecio , $gravadas5, $gravadas10, $exenta)");
        $total = db_query("SELECT sum(det_precio*det_cant) as total FROM compras.det_presupuesto where pre_id=$ID[0]");
        while ($row = mysqli_fetch_array($total)) {
//        $row = mysqli_fetch_array($total);
            db_query("update presupuesto set pre_monto=$row[0] where pre_id=$ID[0]");
        }
        if ($detalle) {
            echo "<script>location.href='presupuesto_agregar.php'</script>";
        }
    }
}

if (!empty($_GET['delete'])) {
    $v1 = $_GET['id'];
    $v2 = $_GET['id2'];

//DELETE FROM compras.det_ajustestock WHERE mat_id= 3 and suc_id =1;
    $total = db_query("SELECT sum(det_precio*det_cant) as total FROM det_presupuesto where pre_id=$v2");
    while ($row = mysqli_fetch_array($total)) {
//        $row = mysqli_fetch_array($total);
        db_query("update presupuesto set pre_monto=pre_monto-$row[0] where pre_id=$v2");
    }
        $eliminar = db_query("DELETE FROM det_presupuesto WHERE mat_id= $v1");
    if ($eliminar) {
        echo "<script>location.href='presupuesto_agregar.php'</script>";
    }
}

if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
//    echo $f1;
    $update = db_query("update presupuesto set pre_estado='GENERADO' where pre_id=$f1");
    if ($update) {
        echo "<script>location.href='presu_impresion.php?vcod=$f1'</script>";
    }
}

if (!empty($_GET['borrar'])) {
//    $cancel = db_query("update ajuste_stock set aju_estado='ANULADO' where aju_id=$_GET[vcod]");
//    $select = db_query("SELECT * FROM det_ajustestock where aju_id=$_GET[vcod]");
//    while ($row = mysqli_fetch_array($select)) {
//        $updatestock = db_query("call sp_updatestock($row[2],$row[1] ,$row[4])");
//    }
    $cancel = db_query("update presupuesto set pre_estado='ANULADO' where pre_id=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='presupuestolistado.php'</script>";
    }
}
				
				
				
				
				