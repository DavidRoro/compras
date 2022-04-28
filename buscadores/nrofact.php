<?php
$sucu = $_POST['idfactura'];
$conexion = new mysqli('localhost:3306','root','fioreschi2017','compras')or die("ERROR " . mysqli_error()) ;

$consulta = "SELECT com_id,prv_rasocial,prv_ruc FROM vs_filtrofact WHERE com_nrofact = '$sucu'";
$result = $conexion->query($consulta);
  
$respuesta = new stdClass();
if($result->num_rows > 0){
    $fila = $result->fetch_array();
    $respuesta->txtidcompra = $fila['com_id'];
    $respuesta->prov = $fila['prv_rasocial'];
    $respuesta->ruc = $fila['prv_ruc'];
//    $respuesta->nombres = $fila['nom'];    
}
echo json_encode($respuesta);
?>