<?php
// materia_prima.php
$ci = $_POST['descripcion'];

$conexion = new mysqli('localhost:3306', 'root', 'minegrito', 'compras_marce') or die("ERROR " . mysqli_error());

$consulta = "SELECT mat_id, mat_descri, mat_precioc FROM materia_prima WHERE mat_descri = '$ci'";
$result = $conexion->query($consulta);

$respuesta = new stdClass();
if ($result) {
    if ($result->num_rows > 0) {
        $fila = $result->fetch_array();
        $respuesta->idpro = $fila[0];
        $respuesta->precioc = $fila[2];
    } else {
        $respuesta->error = "No se encontraron resultados.";
    }
} else {
    $respuesta->error = "Error en la consulta: " . $conexion->error;
}

echo json_encode($respuesta);
