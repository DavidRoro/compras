<?php
$sucu = $_POST['sucu'];
$conexion = new mysqli('localhost:3306','root','fioreschi2017','compras')or die("ERROR " . mysqli_error()) ;

$consulta = "SELECT suc_id FROM sucursal WHERE suc_descri = '$sucu'";
$result = $conexion->query($consulta);
  
$respuesta = new stdClass();
if($result->num_rows > 0){
    $fila = $result->fetch_array();
    $respuesta->ids = $fila['suc_id'];
//    $respuesta->nombres = $fila['nom'];    
}
echo json_encode($respuesta);
?>