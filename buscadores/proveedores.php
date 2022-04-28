<?php
$ci = $_POST['prov'];
$conexion = new mysqli('localhost:3306','root','fioreschi2017','compras')or die("ERROR " . mysqli_error()) ;

$consulta = "SELECT prv_id FROM proveedor WHERE prv_rasocial= '$ci'";
$result = $conexion->query($consulta);
  
$respuesta = new stdClass();
if($result->num_rows > 0){
    $fila = $result->fetch_array();
    $respuesta->idproveedor = $fila['prv_id'];
//    $respuesta->precioc = $fila['mat_precioc'];    
}
echo json_encode($respuesta);
?>