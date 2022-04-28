<?php
$sucu = $_GET['term']; 
$conexion = new mysqli('localhost:3306','root','fioreschi2017','compras')or die("ERROR " . mysqli_error()) ;
$consulta = "SELECT com_nrofact FROM vs_filtrofact WHERE com_nrofact LIKE '%$sucu%'";
$result = $conexion->query($consulta);
  
if($result->num_rows > 0){
    while($fila = $result->fetch_array()){
        $filas['x'] = $fila['com_nrofact'];
    }
echo json_encode($filas);
}
?>
