<?php

require('../clases/conexion.php');
require('../sesiones.php');
//insertar registros
if (!empty($_POST['agregar'])) {

    $fecha = date('Y-m-d');
    $descripcion = $_POST['descripcion'];
    $monto = $_POST['monto'];
    $repo = $_POST['repo'];


    $check_query = "SELECT * FROM rendicion WHERE idreposicion = $repo";
    $check_result = db_query($check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error_message'] = "La reposicion ya existe en la base de datos. Por favor, elige otro.";
        echo "<script>location.href='rendicion_agregar.php'</script>";
    }
    // Retrieve the amount associated with the selected option
    $repo = db_query("select * from reposicion where idreposicion = $repo");
    $fila = mysqli_fetch_array($repo);
    $optionAmount = $fila[3];

    if ($monto > $optionAmount) {
        $_SESSION['error_monto'] = "El monto ingresado supera el monto de la reposicion. Por favor, ingrese un monto menor.";
        echo "<script>location.href='rendicion_agregar.php'</script>";
    } else {
        $cabecera = db_query(" call sp_rendicion('PENDIENTE','$fecha','$descripcion',$monto,$repo)");
        if ($cabecera) {
            echo "<script>location.href='rendicion_agregar.php'</script>";
        }
    }
}

				

