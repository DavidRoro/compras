<?php

$usuario = "root";
$contraseña = "minegrito";
$servidor = "localhost:3306";
$bd = "compras_marce";
$con = mysqli_connect($servidor, $usuario, $contraseña, $bd) or die("ERROR " . mysqli_error());
?>
