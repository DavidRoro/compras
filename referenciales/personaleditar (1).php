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
        <title>Editar Personal</title>
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
        $datos = select_id("personal", "per_id", $vcod);

        $cod = $fila->per_id;
        $nombre = $fila->per_nombre;
        $apelli = $fila->per_apelli;
        $ci = $fila->per_ci;
        $dire = $fila->per_direc;
        $email = $fila->per_email;
        ?>
        <div id="actualizo"></div>
        <div class="container">
            <div class="modal-body">
                <h2>Editar Personal</h2>
                <hr>
                <div class="row">
                    <div class="col-lg-3 ds">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Codigo:</label>
                                <input type="text" class="form-control" id="recipient-name" value='<?php echo $cod; ?> ' name="cod" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nombre:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $nombre; ?> ' name="txtnombre" required="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Apellido:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $apelli; ?> ' name="txtapelli" required="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">CI:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $ci; ?> ' name="txtci" required="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">DIRECCION:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $dire; ?> ' name="txtdirec" required="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">E-MAIL:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $email; ?> ' name="txtemail" required="">
                            </div>

                            <input type = "reset" class="btn btn-success btn-sm" value = "LIMPIAR CAMPOS" /> 
                            <input type = "submit" name="actualizar" onclick="actualizar();" class="btn btn-primary btn-sm" value = "GUARDAR" /> 
                            <?php
                            if (isset($_POST['actualizar'])) {
                                $field = array("per_nombre" => $_POST['txtnombre'],
                                    "per_apelli" => $_POST['txtapelli'],
                                    "per_ci" => $_POST['txtci'],
                                    "per_direc" => $_POST['txtdirec'],
                                    "per_email" => $_POST['txtemail']);
                                $tabla = "personal";
                                edit($tabla, $field, "per_id", $vcod);
                                echo '<div class="alert alert-success" id="mensaje" role="alert">DATOS ACTUALIZADOS<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                                header("location:personalistado.php");
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
