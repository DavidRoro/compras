<?php
//
//include '../menu/menu.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Motivo Ajuste</title>
        <link rel="stylesheet" href="../css/bootstrap1.min.css">

        <style>
            body{
                font-family: Times new Roman;
            }
            hr{
                background-color: lightgreen;
                border-width: 3px;
            }
        </style>
    </head>
    <body class="bg-light">
        <?php
//        include '../menu/menu.php';
        require ('../clases/conexion.php');
        $vcod = $_GET['vcod'];
        $datos = select_id("motivo_ajuste", "mot_id", $vcod);

        $cod = $fila->mot_id;
        $descri = $fila->mot_descri;
        ?>

        <div class="container">
            <div class="modal-body">
                <h2>Editar Motivo Ajuste</h2>
                <hr>
                <div class="row">
                    <div class="col-lg-3 ds">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Codigo:</label>
                                <input type="text" class="form-control" id="recipient-name" value='<?php echo $cod; ?> ' name="cod" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Descripcion:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $descri; ?> ' name="txtdescri" required="">
                            </div>

                            <input type = "reset" class="btn btn-success btn-sm" value = "LIMPIAR CAMPOS" /> 
                            <input type = "submit" name="actualizar" class="btn btn-primary btn-sm" value = "GUARDAR" /> 
                            <?php
                            if (isset($_POST['actualizar'])) {
                                $field = array("mot_descri" => $_POST['txtdescri']);
                                $tabla = "motivo_ajuste";
                                edit($tabla, $field, "mot_id", $vcod);
//                                echo '<br><div class="alert alert-success" role="alert">DATOS ACTUALIZADOS<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//                                echo '<div class="alert alert-success" role="alert">DATOS ACTUALIZADOS<span class="glyphicon glyphicon-exclamation-sign"></span></div>';

                                header("location:motivolistado.php");
                            }
                            ?>
                        </form>

                    </div> 
                </div>
            </div>
        </div>
<!--        <script src="../js/jquery-1.12.2.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>-->

    </body>
</html>
