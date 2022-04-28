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
        <title>Editar Proveedor</title>
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
        $datos = select_id("proveedor", "prv_id", $vcod);

        $cod = $fila->prv_id;
        $nombre = $fila->prv_rasocial;
        $apelli = $fila->prv_apelli;
        $ci = $fila->prv_ruc;
        $dire = $fila->prv_direc;
        $telefono = $fila->prv_telef;
        $email = $fila->prv_email;
        ?>
        <?php
                    if (isset($_POST['actualizar'])) {
                        $field = array("prv_rasocial" => $_POST['txtnombre'],
                            "prv_apelli" => $_POST['txtapelli'],
                            "prv_ruc" => $_POST['txtruc'],
                            "prv_direc" => $_POST['txtdirec'],
                            "prv_telef" => $_POST['txttelef'],
                            "prv_email" => $_POST['txtemail']);
                        $tabla = "proveedor";
                        $a = edit($tabla, $field, "prv_id", $vcod);
                        if ($a) {
                            echo '<div class="alert alert-success" id="mensaje" role="alert">DATOS ACTUALIZADOS<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                        
                            header("refresh:5;url=proveedorlistado.php");
                        }
                        
                        
                    }
//                           
                    ?>
        <div id="actualizo"></div>
        <div class="container">
            <div class="modal-body">
                <h2>Editar Proveedor</h2>
                <hr>
                <div class="row">
                    <div class="col-lg-3 ds">
                        <form action="#" method="POST">

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Codigo:</label>
                                <input type="text" class="form-control" id="recipient-name" value='<?php echo $cod; ?> ' name="cod" required="" readonly="">
                            </div>
                    </div>

                    <div class="col-lg-3 ds">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $nombre; ?> ' name="txtnombre" required="">
                        </div>
                    </div>

                    <div class="col-lg-3 ds">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Apellido:</label>
                            <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $apelli; ?> ' name="txtapelli" required="">
                        </div>
                    </div>

                    <div class="col-lg-3 ds">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">CI:</label>
                            <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $ci; ?> ' name="txtruc" required="">
                        </div>
                    </div>

                    <div class="col-lg-3 ds">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">DIRECCION:</label>
                            <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $dire; ?> ' name="txtdirec" required="">
                        </div>
                    </div>

                    <div class="col-lg-3 ds">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">TELEFONO:</label>
                            <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $telefono; ?> ' name="txttelef" required="">
                        </div>
                    </div>

                    <div class="col-lg-3 ds">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">E-MAIL:</label>
                            <input type="email" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $email; ?> ' name="txtemail" required="">
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="form-group">
                            <hr class="divider">
                            <input type = "reset" class="btn btn-success btn-sm" value = "LIMPIAR CAMPOS" /> 
                            <input type = "submit" name="actualizar" class="btn btn-primary btn-sm" value = "GUARDAR" />
                        </div>
                    </div>
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
