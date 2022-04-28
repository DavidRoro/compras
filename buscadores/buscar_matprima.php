<?php
$ci = $_GET['term']; 
//require '../conectar.php';
$conexion = new mysqli('localhost:3306','root','minegrito','compras_marce')or die("ERROR " . mysqli_error()) ;
$consulta = "SELECT mat_id, mat_precioc, mat_descri FROM materia_prima WHERE mat_descri LIKE '%$ci%'";
$result = $conexion->query($consulta);
  
if($result->num_rows > 0){
    while($fila = $result->fetch_array()){
        $filas['x'] = $fila['mat_descri'];
    }
echo json_encode($filas);
}
?>
