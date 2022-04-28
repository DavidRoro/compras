<?php
session_start();
$idUsu=$_SESSION['usu'];
$idSuc=$_SESSION['sucid'];
$nombre=$_SESSION['nombre'];
$sucur=$_SESSION['sucursal'] ;
if(empty($_SESSION['login'])){
echo "<script>alert('No tiene permisos, Favor iniciar sesion');location.href='index.php'</script>";
}
