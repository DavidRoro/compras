<?php
$ci = $_GET['term']; 
$conexion = new mysqli('localhost:3306','root','fioreschi2017','compras')or die("ERROR " . mysqli_error()) ;
$consulta = "SELECT per_id, concat(per_nombre,' ',per_apelli) as nom,per_ci FROM personal WHERE per_ci LIKE '%$ci%'";
$result = $conexion->query($consulta);
  
if($result->num_rows > 0){
    while($fila = $result->fetch_array()){
        $filas['x'] = $fila['per_ci'];
    }
echo json_encode($filas);
}
?>
