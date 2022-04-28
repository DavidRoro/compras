<?php
require './conectar.php';

	session_start();
        $usu=$_SESSION['usu'];
        mysqli_query($con, "update usuario set usu_disp=0, usu_nav='', usu_intento=0 where usu_id=$usu");
	session_destroy();
        
	echo "<script>location.href='index.php'</script>"
?>