<?php

include '../clases/conexion.php';
$consulta= db_query("select * from det_pedido, materia_prima where ped_id=1");
if (mysqli_num_rows($consulta)) {
    $row=mysqli_fetch_array($consulta);
    $pedido=$row[0];
    $pedido=$row[1];
    $pedido=$row[1];
}
