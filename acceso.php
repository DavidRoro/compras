<?php

require './clases/conexion.php';
require './clases/navegador.php';
$usu = $_POST['usuario'];
$pass = $_POST['clave'];
$sql = "select * from vs_usuario where usu_login='$usu' and usu_pass= md5('$pass') and usu_estado='ACTIVO'";
$sql2 = "select * from vs_usuario where usu_login='$usu' or usu_pass= md5('$pass') and usu_estado='ACTIVO'";
$consulta = db_query($sql);
$consulta2 = db_query($sql2);
if (mysqli_num_rows($consulta) > 0) {
    $dato = mysqli_fetch_array($consulta);
    if ($dato['usu_nav'] != '$navegador' and $dato['usu_disp'] == 1) {
        echo "<script>alert(' Ya existe una sesión activa en otro navegador')</script>";
        echo "<script>location.href='index.php'</script>";
    }

    session_start();
    $_SESSION['usu'] = $dato['usu_id'];
    $_SESSION['login'] = $dato['usu_login'];
    $_SESSION['rol'] = $dato['usu_rol'];
    $_SESSION['sucid'] = $dato['suc_id'];
    $_SESSION['sucursal'] = $dato['suc_descri'];
    $_SESSION['nombre'] = $dato['nombre'];
    // mysqli_query($con, "update usuario set usu_disp=1, usu_nav='$navegador' where usu_id='".$dato['usu_id']."'");
    actualizar_nav("usuario", "usu_disp", "usu_nav", 1, "$navegador", "usu_id", $dato['usu_id']);
    $update = "update usuario set usu_intento=1 where usu_id=" . $dato['usu_id'];
    db_query($update);
    echo "<script>location.href='menu/menu.php'</script>";
} else {
    $datos = mysqli_fetch_array($consulta2);
    if ($datos['usu_intento'] >= 3) {
        $id = $datos[0];
        echo "<script>alert(' USUARIO BLOQUEADO, COMUNIQUESE CON EL ADMINISTRADOR!!!')</script>";
        echo "<script>location.href='index.php'</script>";
        $update = "update usuario set usu_estado='BLOQUEADO' where usu_id=$id";
        db_query($update);
    }
    $update = "update usuario set usu_intento=usu_intento+1 where usu_id=" . $datos[0];
    db_query($update);
    echo "<script>alert('Verifique su usuario y contraseña!!!');location.href='index.php'</script>";
}


