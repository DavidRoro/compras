<?php
$sucu = $_GET['term']; 
$conexion = new mysqli('localhost:3306','root','fioreschi2017','compras')or die("ERROR " . mysqli_error()) ;
$consulta = "SELECT suc_descri FROM sucursal WHERE suc_descri LIKE '%$sucu%'";
$result = $conexion->query($consulta);
  
if($result->num_rows > 0){
    while($fila = $result->fetch_array()){
        $filas['x'] = $fila['suc_descri'];
    }
echo json_encode($filas);
}
?>
