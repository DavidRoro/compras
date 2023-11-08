<?php

require('../clases/conexion.php');
require('../sesiones.php');
//insertar registros
if (!empty($_POST['agregar'])) {
   
        $fecha = date('Y-m-d');
        $fechapago= date('Y-m-d');
        $descri= $_POST['descri'];
        $nro= $_POST['nro'];
        $importe= $_POST['importe'];
        $medio= $_POST['medio'];      
        $provee = $_POST['txtidproveedor'];
        //insertar cabecera 
//        $cabecera = db_query("insert into pedido(ped_fecha,ped_estado,suc_id,usu_id) values('$fecha','PENDIENTE',$sucursales,$idUsu)");
        $cabecera = db_query(" call sp_ordenpago('PENDIENTE','$fecha','$fechapago','$descri',$nro,$importe,'$medio',$provee)");
        
        if ($cabecera) {
//            echo "<div class='alert alert-success'>SE INSERTO CORRECTAMENTE</div>";
            echo "<script>location.href='ordendepago.php'</script>";
        }
    
}

//if (!empty($_GET['delete'])) {
//    $eliminar = db_query("delete from det_ordencompra where mat_id=$_GET[id]");
//
//    if ($eliminar) {
//        echo "<script>location.href='ordencompra_agregar.php'</script>";
//    } else {
//
//        echo "<script>alert('No se pudieron borrar los registros del detalle')</script>";
//    }
//}
if (!empty($_GET['borrar'])) {
    $cancel = db_query("update ordenpago set ordenpago_estado='ANULADO' where idordenpago=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='ordendepago.php'</script>";
    }
}
///
if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
    $update = db_query("update ordenpago set ordenpago_estado='GENERADO' where idordenpago=$f1");
    if ($update) {
        echo "<script>location.href='ordenpago_impresion.php?vcod=$f1'</script>";
    }

//    echo "<script>location.href='pedido_impresion.php?vcod=$f1'</script>";
}
?>
				


