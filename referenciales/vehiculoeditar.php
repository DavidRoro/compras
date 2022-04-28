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
        <title>Editar Vehiculo</title>
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
        $datos = select_id("vehiculo", "veh_id", $vcod);

        $cod = $fila->veh_id;
        $descri = $fila->veh_descri;
        $chapa = $fila->veh_chapa;
        ?>
        <div id="actualizo"></div>
        <div class="container">
            <div class="modal-body">
                <h2>Editar Vehiculo</h2>
                <hr>
                <div class="row">
                    <form action="#" method="POST">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Codigo:</label>
                                <input type="text" class="form-control" id="recipient-name" value='<?php echo $cod; ?> ' name="cod" required="" readonly="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Descripcion:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $descri; ?> ' name="txtdescri" required="">
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">N° de Chapa:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $chapa; ?> ' name="txtchapa" required="">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type = "reset" class="btn btn-success btn-sm" value = "LIMPIAR CAMPOS" /> 
                                <input type = "submit" name="actualizar" class="btn btn-primary btn-sm" value = "GUARDAR" /> 
                                <a class="btn btn-warning btn-sm" href="../referenciales/vehiculolistado.php">VOLVER </a>
                            </div>
                        </div>

                        <?php
                        if (isset($_POST['actualizar'])) {
                            $field = array("veh_descri" => $_POST['txtdescri'],
                                "veh_chapa" => $_POST['txtchapa']);
                            $tabla = "vehiculo";
                            $actualizar = edit($tabla, $field, "veh_id", $vcod);

                            if ($actualizar) {
                                echo '<div class="alert alert-success" id="mensaje" role="alert">DATOS ACTUALIZADOS<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                            }

                                header("refresh:5;url=vehiculolistado.php");
                        }
                        ?>
                    </form>

                </div> 
            </div>
        </div>
    </div>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
                                    $("#mensaje").delay(4000).slideUp(200, function () {
                                        ($this).alert('close');
                                    });

    </script>

</body>
</html>
