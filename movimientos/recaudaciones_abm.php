<?php

require('../clases/conexion.php');
require('../sesiones.php');
//insertar registros
if (!empty($_POST['agregar'])) {

    $fecha = date('Y-m-d');
    $monto = $_POST['monto'];
    $concepto = $_POST['concepto'];
    $asig = $_POST['asig'];


    $check_query = "SELECT * FROM recaudaciones WHERE rec_id = $asig";
    $check_result = db_query($check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error_message'] = "la asignacion ya existe en la base de datos. Por favor, elige otro.";
    }

    $cabecera = db_query(" call sp_reposicion('PENDIENTE','$fecha',$monto,$asig)");
    
        echo "<script>location.href='reposicion.php'</script>";
   
}

