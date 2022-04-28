<?php
$ci = $_GET['term']; 
$conexion = new mysqli('localhost:3306','root','fioreschi2017','compras')or die("ERROR " . mysqli_error()) ;
$consulta = "SELECT prv_id,prv_rasocial FROM proveedor WHERE prv_rasocial LIKE '%$ci%'";
$result = $conexion->query($consulta);
  
if($result->num_rows > 0){
    while($fila = $result->fetch_array()){
        $filas['x'] = $fila['prv_rasocial'];
    }
echo json_encode($filas);
}
?>
