<?php

require('../clases/conexion.php');
include '../sesiones.php';
//insertar registros
if (!empty($_POST['agregar'])) {
    $consulta = db_query("select * from ajuste_stock where aju_estado='PENDIENTE' and usu_id=$idUsu");
    if (mysqli_num_rows($consulta) > 0) {
        $consucabe = db_query("select * from ajuste_stock where aju_estado='PENDIENTE' and usu_id=$idUsu");
        $ID = mysqli_fetch_array($consucabe);
//        echo $ID[0];
        $detalle = db_query("insert into det_ajustestock(aju_id,mat_id,suc_id,mot_id,det_cant,det_obs) values ($ID[0]," . $_POST['txtid'] . ", " . $_POST['txtidsucursal'] . ", " . $_POST['cmbmotivo'] . ", " . $_POST['txtcantidad'] . ", '" . $_POST['txtobs'] . "')");

        if ($detalle) {
            echo "<script>location.href='ajuste_agregar.php'</script>";
        }
    } else {
        $fecha = date('Y-m-d');
        //insertar cabecera 
        $cabecera = db_query("insert into ajuste_stock(aju_fecha,aju_estado,suc_id,usu_id) values('$fecha','PENDIENTE','$_POST[txtidsucursal]','$idUsu')");
        //consultar cabecera
        $consucabe = db_query("select * from ajuste_stock where aju_estado='PENDIENTE' and usu_id=$idUsu");
        $ID = mysqli_fetch_array($consucabe);
        //insertar detalle
        $detalle = db_query("insert into det_ajustestock(aju_id,mat_id,suc_id,mot_id,det_cant,det_obs) values ($ID[0]," . $_POST['txtid'] . ", " . $_POST['txtidsucursal'] . ", " . $_POST['cmbmotivo'] . ", " . $_POST['txtcantidad'] . ", '" . $_POST['txtobs'] . "')");
        if ($detalle) {
            echo "<script>location.href='ajuste_agregar.php'</script>";
        }
    }
}

if (!empty($_GET['delete'])) {
    $v1 = $_GET['id'];
    $v2 = $_GET['suc'];

    $eliminar = db_query("DELETE FROM det_ajustestock WHERE mat_id= $v1 and suc_id =$v2");
//DELETE FROM compras.det_ajustestock WHERE mat_id= 3 and suc_id =1;

    if ($eliminar) {
        echo "<script>location.href='ajuste_agregar.php'</script>";
    }
}

if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
//    echo $f1;
    $update = db_query("update ajuste_stock set aju_estado='FINALIZADO' where aju_id=$f1");
    if ($update) {
        echo "<script>location.href='ajuste_impresion.php?vcod=$f1'</script>";
    }
}

if (!empty($_GET['borrar'])) {
//    $cancel = db_query("update ajuste_stock set aju_estado='ANULADO' where aju_id=$_GET[vcod]");
    $select = db_query("SELECT * FROM det_ajustestock where aju_id=$_GET[vcod]");
    while ($row = mysqli_fetch_array($select)) {
        $updatestock = db_query("call sp_updatestock($row[2],$row[1] ,$row[4])");
    }
    $cancel = db_query("update ajuste_stock set aju_estado='ANULADO' where aju_id=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='ajustelistado.php'</script>";
    }
}
				
				
				
				
				