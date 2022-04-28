<?php

include './cabecera.php';
require('../clases/conexion.php');
require('../sesiones.php');
//insertar registros
if (!empty($_POST['agregar'])) {
    $consulta = db_query("select * from nota_remision where rem_estado='PENDIENTE' and usu_id=$idUsu");
    if (mysqli_num_rows($consulta) > 0) {
        $consucabe = db_query("select * from nota_remision where rem_estado='PENDIENTE' and usu_id=$idUsu");
        $ID = mysqli_fetch_array($consucabe);
        $ped = $ID[0];
        $cod = $_POST['txtid'];
        $cant = $_POST['txtcantidad'];
        //insertar detalle
        $detalle = db_query(" call sp_detnotaremision($ped,$cod,$cant)");

        if ($detalle) {
            echo "<script>location.href='notaremision_agregar.php'</script>";
//            echo "<div class='alert alert-success'>INSERTO EXITOSAMENTE</div>";
//            header("refresh:3;url=notaremision_agregar.php");
        } else {
            echo "<script>alert('YA INSERTO TODOS LOS REGISTROS');location.href='notaremision_agregar.php'</script>";
        }
    } else {
        $fecha = date('Y-m-d');
//        $sucursales = $_POST['txtidsucursal'];
        $inicio = $_POST['txtinicio'];
        $fin = $_POST['txtfin'];
        $motivo = $_POST['cmbmotivo'];
        $per = $_POST['cmbpersonal'];
        $vehiculo = $_POST['cmbvehiculo'];
        //insertar cabecera 
//        $cabecera = db_query("insert into pedido(ped_fecha,ped_estado,suc_id,usu_id) values('$fecha','PENDIENTE',$sucursales,$idUsu)");
        $cabecera = db_query(" call sp_notaremision('$fecha','$inicio','$fin','$motivo','PENDIENTE',$per,$idUsu,$vehiculo)");
        //consultar cabecera
        $consucabe = db_query("select * from nota_remision where rem_estado='PENDIENTE' and usu_id=$idUsu");
        $ID = mysqli_fetch_array($consucabe);
        $ped = $ID[0];
        $cod = $_POST['txtid'];
        $cant = $_POST['txtcantidad'];
        //insertar detalle
        $detalle = db_query(" call sp_detnotaremision($ped,$cod,$cant)");
        if ($detalle) {
//            echo "<div class='alert alert-success'>SE INSERTO CORRECTAMENTE</div>";
            echo "<script>location.href='notaremision_agregar.php'</script>";
        }
    }
}

if (!empty($_GET['delete'])) {

    db_query("call sp_updatestock('$_GET[id3]','$_GET[id]','$_GET[vcanti]')");
    db_query("call sp_update_stockcompra('$_GET[id4]','$_GET[id]','$_GET[vcanti]')");
    $eliminartraslado = db_query("delete from remi_traslado where suc_id=$_GET[id4]");
    $eliminar = db_query("delete from det_notaremision where mat_id=$_GET[id]");
    if ($eliminar) {
        echo "<script>location.href='notaremision_agregar.php'</script>";
    } else {

        echo "<script>alert('No se pudieron borrar los registros del detalle')</script>";
    }
}
if (!empty($_POST['traslado'])) {
    $consuid = db_query("SELECT IFNULL(MAX(rem_id),0) as codigo FROM nota_remision;");
    $row = mysqli_fetch_array($consuid);
    $rem = $row[0];
    $cod = $_POST['txtidsuctraslado'];
//    $traslado = db_query("call sp_remitraslado($rem,$cod)");
    //////stock/////////////

    $constock = db_query("SELECT * FROM stock WHERE suc_id=$cod and mat_id='$_POST[txtid]'");
//    $rowss = mysqli_fetch_array($constock);
    if (mysqli_num_rows($constock) > 0) {
        //stock update sucursales
        db_query("call sp_updatestock($cod,'$_POST[txtid]','$_POST[txtcantidad]')");
        db_query("call sp_update_stockcompra('$_POST[txtidsucursal]','$_POST[txtid]','$_POST[txtcantidad]')");
//        db_query("call stock_insert($cod,$_POST[txtid],$_POST[txtcantidad])");
    } else {
        //stock_insert y update
        db_query("call stock_insert($cod,$_POST[txtid],$_POST[txtcantidad])");
        db_query("call sp_update_stockcompra('$_POST[txtidsucursal]','$_POST[txtid]','$_POST[txtcantidad]')");
    }
//}
    //////////////////////////////////////////////////
//    if ($traslado) {
    echo "<script>location.href='notaremision_agregar.php'</script>";
//    }
}
if (!empty($_POST['compra'])) {
    $consuid = db_query("SELECT IFNULL(MAX(rem_id),0) as codigo FROM nota_remision;");
    $row = mysqli_fetch_array($consuid);
    $rem2 = $row[0];
//        echo $rem2;
    $cod = $_POST['txtidsucursal'];
    $com = $_POST['txtidcompra'];
    $compraremi = db_query("call sp_remicompra($rem2,$com,$cod)");
    if ($compraremi) {
        echo "<script>location.href='notaremision_agregar.php'</script>";
    } else {
        echo "<script>alert('SE ENCUENTRA REGISTRADO');location.href='notaremision_agregar.php'</script>";
    }
}

///
if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
    $impre = db_query("update nota_remision set rem_estado='GENERADO' where rem_id=$f1");
    if ($impre) {
        echo "<script>location.href='notaremision_impresion.php?vcod=$f1'</script>";
    }
//    echo "<script>location.href='pedido_impresion.php?vcod=$f1'</script>";
}

if (!empty($_GET['borrar'])) {
    $select = db_query("SELECT * FROM vs_traslado where rem_id=$_GET[vcod]");
    while ($row = mysqli_fetch_array($select)) {
        $updatestock = db_query("call sp_update_stockcompra($row[1],$row[2] ,$row[3])");
    }
    $cancel = db_query("update nota_remision set rem_estado='ANULADO' where rem_id=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='notaremisionlistado.php'</script>";
    }
}
?>
				
