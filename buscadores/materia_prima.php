<?php
$ci = $_POST['descripcion'];

$conexion = new mysqli('localhost:3306','root','minegrito','compras_marce')or die("ERROR " . mysqli_error()) ;

$consulta = "SELECT mat_id, mat_descri FROM materia_prima WHERE mat_descri LIKE '%$ci%'";
$result = $conexion->query($consulta);
  
$respuesta = new stdClass();
if($result->num_rows > 0){
    $fila = $result->fetch_array();
    $respuesta->idpro = $fila['mat_id'];
//    $respuesta->precioc = $fila['mat_precioc'];    
}
echo json_encode($respuesta);
?>