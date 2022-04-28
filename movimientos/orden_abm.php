<?php

require('../clases/conexion.php');
require('../sesiones.php');
//insertar registros
if (!empty($_POST['agregar'])) {
    $consulta = db_query("select * from orden_compra where ord_estado='PENDIENTE' and usu_id=$idUsu");
    if (mysqli_num_rows($consulta) > 0) {
        $consucabe = db_query("select * from orden_compra where ord_estado='PENDIENTE' and usu_id=$idUsu");
        $ID = mysqli_fetch_array($consucabe);
        $ped = $ID[0];
        $cod = $_POST['txtid'];
        $cant = $_POST['txtcantidad'];
        $precio = $_POST['txtprecio'];
        $subtotales = $cant * $precio;
        //insertar detalle
        $detalle = db_query(" call sp_detorden($ped,$cod,$cant,$precio,$subtotales)");

        if ($detalle) {
            echo "<script>location.href='ordencompra_agregar.php'</script>";
        }
    } else {
        $fecha = date('Y-m-d');
        $sucursales = $_POST['txtidsucursal'];
        $presu = $_POST['txtidpresu'];
        $provee = $_POST['txtidproveedor'];
        //insertar cabecera 
//        $cabecera = db_query("insert into pedido(ped_fecha,ped_estado,suc_id,usu_id) values('$fecha','PENDIENTE',$sucursales,$idUsu)");
        $cabecera = db_query(" call sp_orden('$fecha','PENDIENTE',$presu,$provee,$sucursales,$idUsu)");
        //consultar cabecera
        $consucabe = db_query("select * from orden_compra where ord_estado='PENDIENTE' and usu_id=$idUsu");
        $ID = mysqli_fetch_array($consucabe);
        $ped = $ID[0];
        $cod = $_POST['txtid'];
        $cant = $_POST['txtcantidad'];
        $precio = $_POST['txtprecio'];
        $subtotales = $cant * $precio;
        //insertar detalle
        $detalle = db_query(" call sp_detorden($ped,$cod,$cant,$precio,$subtotales)");
        if ($detalle) {
//            echo "<div class='alert alert-success'>SE INSERTO CORRECTAMENTE</div>";
            echo "<script>location.href='ordencompra_agregar.php'</script>";
        }
    }
}

if (!empty($_GET['delete'])) {
    $eliminar = db_query("delete from det_ordencompra where mat_id=$_GET[id]");

    if ($eliminar) {
        echo "<script>location.href='ordencompra_agregar.php'</script>";
    } else {

        echo "<script>alert('No se pudieron borrar los registros del detalle')</script>";
    }
}
if (!empty($_GET['borrar'])) {
    $cancel = db_query("update orden_compra set ord_estado='ANULADO' where ord_id=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='ordencompralistado.php'</script>";
    }
}
///
if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
    $update = db_query("update orden_compra set ord_estado='GENERADO' where ord_id=$f1");
    if ($update) {
        echo "<script>location.href='orden_impresion.php?vcod=$f1'</script>";
    }

//    echo "<script>location.href='pedido_impresion.php?vcod=$f1'</script>";
}
?>
				
