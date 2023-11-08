<?php

require('../clases/conexion.php');
require('../sesiones.php');
//insertar registros
if (!empty($_POST['agregar'])) {

    $fecha = date('Y-m-d');
    $monto = $_POST['monto'];
    $personal = $_POST['personal'];


    $check_query = "SELECT * FROM asignarff WHERE idasignarff = $personal";
    $check_result = db_query($check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error_message'] = "El personal ya existe en la base de datos. Por favor, elige otro.";
    }

    $cabecera = db_query(" call sp_asignarff('$fecha',$monto,'PENDIENTE',$personal)");
    
        echo "<script>location.href='asignar.php'</script>";
   
}







if (!empty($_GET['borrar'])) {
    $cancel = db_query("update asignarff set asignarff_estado='ANULADO' where idasignarff=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='asignar.php'</script>";
    }
}
///
if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
    $update = db_query("update asignarff set asignarff_estado='GENERADO' where idasignarff=$f1");
    if ($update) {
        echo "<script>location.href='asignar_impresion.php?vcod=$f1'</script>";
    }

//    echo "<script>location.href='pedido_impresion.php?vcod=$f1'</script>";
}
?>
				




