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
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">N° de Chapa:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $chapa; ?> ' name="txtchapa" required="">
                            </div>
                            
                            <input type = "reset" class="btn btn-success btn-sm" value = "LIMPIAR CAMPOS" /> 
                            <input type = "submit" name="actualizar" onclick="actualizar();" class="btn btn-primary btn-sm" value = "GUARDAR" /> 
                            <?php
                            if (isset($_POST['actualizar'])) {
                                $field = array("veh_descri" => $_POST['txtdescri'],
                                         "veh_chapa" => $_POST['txtchapa']);
                                $tabla = "vehiculo";
                                edit($tabla, $field, "veh_id", $vcod);
                                echo '<div class="alert alert-success" id="mensaje" role="alert">DATOS ACTUALIZADOS<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                                header("location:vehiculoistado.php");
                            }
//                            else {
//                                echo '<div class="alert alert-success" role="alert">ERROR AL ACTUALIZAR<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//                            }
//        include './sucursalistado.php';
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

//                                function actualizar() {
//                                    $('#actualizo').load('./sucursalistado.php');
//
//                                }
                                $('mostrar').ready(function () {

                                })

        </script>

    </body>
</html>
