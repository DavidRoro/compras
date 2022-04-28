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
        <title>Editar Clasificacion</title>
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
        <script>
            function clasi() {

                $("#listado").load('../referenciales/clasificacionlistado.php');
            }
        </script>
    </head>
    <body class="bg-light">
        <?php
//        include '../menu/menu.php';
        require ('../clases/conexion.php');
        $vcod = $_GET['vcod'];
        $datos = select_id("clasificacion", "cla_id", $vcod);

        $cod = $fila->cla_id;
        $descri = $fila->cla_descri;
        ?>
        <div class="listado"></div>
        <div class="container">
            <div class="modal-body">
                <h2>Editar Clasificación</h2>
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
                            <br>
                            <br>

                            <input type = "submit"  name="actualizar" class="btn btn-primary btn-sm" value = "GUARDAR" /> 
                            <a class="btn btn-warning btn-sm" href="../referenciales/clasificacionlistado.php">VOLVER </a>
                            <?php
                            if (isset($_POST['actualizar'])) {
                                $field = array("cla_descri" => $_POST['txtdescri']);
                                $tabla = "clasificacion";
                                $a = edit($tabla, $field, "cla_id", $vcod);

                                if ($a) {
                         echo '<br><br><div class="alert alert-success" role="alert">DATOS ACTUALIZADOS<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                                }
                                header("refresh:5;url=clasificacionlistado.php");
                            }
                            ?>
                        </form>

                    </div> 
                </div>
            </div>
        </div>
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>

    </body>
</html>
