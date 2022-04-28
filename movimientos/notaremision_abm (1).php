<?php

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
//        $sucursales = $_POST['txtidsucursal'];
        //insertar detalle
        $detalle = db_query(" call sp_detorden($ped,$cod,$cant)");

        if ($detalle) {
            echo "<script>location.href='notaremision_agregar.php'</script>";
        }
    } else {
        $fecha = date('Y-m-d');
//        $sucursales = $_POST['txtidsucursal'];
        $per = $_POST['cmbpersonal'];
        $inicio = $_POST['txtinicio'];
        $fin = $_POST['txtfin'];
        $motivo = $_POST['cmbmotivo'];
        $vehiculo = $_POST['cmbvehiculo'];
        //insertar cabecera 
//        $cabecera = db_query("insert into pedido(ped_fecha,ped_estado,suc_id,usu_id) values('$fecha','PENDIENTE',$sucursales,$idUsu)");
        $cabecera = db_query(" call sp_notaremision('$fecha',$inicio','$fin','$motivo','PENDIENTE',$per,$idUsu,$vehiculo)");
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
    $eliminar = db_query("delete from det_notaremision where mat_id=$_GET[id]");

    if ($eliminar) {
        echo "<script>location.href='notaremision_agregar.php'</script>";
    } else {

        echo "<script>alert('No se pudieron borrar los registros del detalle')</script>";
    }
}
if (!empty($_GET['traslado'])) {
        $consuid = db_query("SELECT IFNULL(MAX(rem_id),0) as codigo FROM nota_remision;");
        $row=mysqli_fetch_array($consuid);
        $ped=$row[0];
    $cod=$_POST['txtidsuctraslado'];
    $traslado = db_query("call sp_remitraslado($ped,$cod)");
    if ($traslado) {
        echo "<script>location.href='notaremision_agregar.php'</script>";
    }
}
if (!empty($_GET['compra'])) {
        $consuid = db_query("SELECT IFNULL(MAX(rem_id),0) as codigo FROM nota_remision;");
        $row=mysqli_fetch_array($consuid);
        $ped=$row[0];
    $cod=$_POST['txtidsucursal'];
    $com=$_POST['txtidcompra'];
    $compraremi = db_query("call sp_remicompra($ped,$com,$cod)");
    if ($compraremi) {
        echo "<script>location.href='notaremision_agregar.php'</script>";
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
?>
				
