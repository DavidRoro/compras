<?php

require('../clases/conexion.php');
require('../sesiones.php');
//insertar registros
if (!empty($_POST['agregar'])) {

    $fecha = date('Y-m-d');
    $fechacobro = date('Y-m-d');
    $cheque = $_POST['cheque'];
    $provee = $_POST['txtidproveedor'];

    //$cheque = filter_input(INPUT_POST, 'cheque', FILTER_SANITIZE_STRING);
    //$provee = filter_input(INPUT_POST, 'txtidproveedor', FILTER_VALIDATE_INT);
    //if ($cheque === false || $provee === false || $provee === null) {
    // Handle invalid input data, e.g., display an error message
    // echo "Invalid input data. Please check your input.";

    $check_query = "SELECT * FROM registrocheque WHERE idcheque = $cheque";
    $check_result = db_query($check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error_message'] = "El cheque_id ya existe en la base de datos. Por favor, elige otro.";
    }

    $cabecera = db_query(" call sp_registrocheque('PENDIENTE','$fecha','$fechacobro',$provee,$cheque)");
    
        echo "<script>location.href='registrocheque.php'</script>";
   
}







if (!empty($_GET['borrar'])) {
    $cancel = db_query("update registrocheque set registrocheque_estado='ANULADO' where idregistrocheque=$_GET[vcod]");
    if ($cancel) {
        echo "<script>location.href='registrocheque.php'</script>";
    }
}
///
if (!empty($_GET['imprimir'])) {
    $f1 = $_GET['vcod'];
    $update = db_query("update registrocheque set registrocheque_estado='GENERADO' where idregistrocheque=$f1");
    if ($update) {
        echo "<script>location.href='registrocheque_impresion.php?vcod=$f1'</script>";
    }

//    echo "<script>location.href='pedido_impresion.php?vcod=$f1'</script>";
}
?>
				



