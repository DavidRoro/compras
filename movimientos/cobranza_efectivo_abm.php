<?php
if (!empty($_GET['efectivo'])) {
    $f1 = $_GET['vcod'];
    $fmonto = $_GET['vmonto'];
//    echo $f1;
    $update = db_query("call sp_cobro_efectivo($_GET[vcod], $_GET[vmonto], 0);");
    if ($update) {
        echo "<script>location.href='cobranza_agregar.php</script>";
    } else {
        echo "Error en la consulta";
    }
}
