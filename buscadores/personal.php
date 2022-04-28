<?php
$ci = $_POST['ci'];
$conexion = new mysqli('localhost:3306','root','fioreschi2017','compras')or die("ERROR " . mysqli_error()) ;

$consulta = "SELECT per_id, concat(per_nombre,' ',per_apelli) as nom FROM personal WHERE per_ci = '$ci'";
$result = $conexion->query($consulta);
  
$respuesta = new stdClass();
if($result->num_rows > 0){
    $fila = $result->fetch_array();
    $respuesta->cod = $fila['per_id'];
    $respuesta->nombres = $fila['nom'];    
}
echo json_encode($respuesta);
?>