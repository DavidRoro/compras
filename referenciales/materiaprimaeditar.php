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
        $datos = select_id("vs_matprima", "mat_id", $vcod);

        $cod = $fila->mat_id;
        $descri = $fila->mat_descri;
        $precio = $fila->mat_precioc;
        $unidad = $fila->mat_unimed;
        $impuesto = $fila->mat_impuesto;
        $cla_id = $fila->cla_id;
//        $email = $fila->prv_email;
        $value10 = 0;
        $value5 = 0;
        $valuee = 0;
        switch ($impuesto) {
            case 10:
                $value10 = "selected";
                break;
            case 5:
                $value5 = "selected";
                break;
            case 'EXENTA':
                $valuee = "selected";
                break;
        }
        ?>
        <div id="actualizo"></div>
        <div class="container">
            <div class="modal-body">
                <h2>Editar Materia Prima</h2>
                <hr>


                <!--                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label> 
                                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtclasi" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Descripcion" value="" required="" autofocus=""> 
                
                                        </div>
                
                                    </div>
                -->
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Codigo:</label>
                                <input type="text" class="form-control" id="recipient-name" value='<?php echo $cod; ?> ' name="cod" required="" readonly="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Descripcion:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $descri; ?> ' name="txtdescri" required="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Precio Compra:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $precio; ?> ' name="txtprecioc" required="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Unidad de medida:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $unidad; ?> ' name="txtunimed" required="">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Tipo de Impuesto:</label>
                                <select class="form-control" id="country" name="cbnimpuesto" required>
                                    <option <?= $value10 ?> value="10">IVA 10</option>
                                    <option <?= $value5 ?> value="5">IVA 5</option>
                                    <option <?= $valuee ?> value="1">EXENTA</option>
                                </select>                           
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Clasificacion:</label>
                                <select class="form-control" id="country" name="cbnclasi" required>
                                    <option value="">SELECCIONE:</option>
                                    <?php
                                    $vclasi = "";
//                                    $consul = "select * from clasificacion order by cla_id;";
                                    $clasif = db_query("select * from clasificacion");
                                    while ($fila = mysqli_fetch_object($clasif)) {
                                        $cla = $fila->cla_id;
                                        if ($cla_id == $cla) {
                                            $vclasi = "selected";
                                        } else {
                                            $vclasi = "";
                                        }

                                        echo"<option $vclasi value='$fila->cla_id'>$fila->cla_descri</option>";
                                        ?>                                    
                                    <?php } ?>

                                </select>                           
                            </div>
                        </div>

                        <div class="col-sm-9">
                            <div class="form-group">
                                <hr class="divider bg-light">
                                <a class="btn btn-info btn-sm" alt="" href="materiaprimalistado.php">VOLVER</a>
                                <input type = "reset" class="btn btn-danger btn-sm glyphicon" value = "LIMPIAR CAMPOS" /> 
                                <input type = "submit" name="actualizar" class="btn btn-success btn-sm" value = "GUARDAR" /> 
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['actualizar'])) {
                            $field = array("mat_descri" => $_POST['txtdescri'],
                                "mat_precioc" => $_POST['txtprecioc'],
                                "mat_unimed" => $_POST['txtunimed'],
                                "mat_impuesto" => $_POST['cbnimpuesto'],
                                "cla_id" => $_POST['cbnclasi']);
                            $tabla = "materia_prima";
                            $actualizar = edit($tabla, $field, "mat_id", $vcod);
                            if ($actualizar) {
                                echo '<div class="alert alert-success" id="mensaje" role="alert">DATOS ACTUALIZADOS<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                            }
                            header("refresh:5;url=materiaprimalistado.php");
                           
                        }
//                            else {
//                                echo '<div class="alert alert-success" role="alert">ERROR AL ACTUALIZAR<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//                            }
//        include './sucursalistado.php';
                        ?>
                    </div> 
                </form>


            </div>
        </div>
        <!--</div>-->
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
//                                $('mostrar').ready(function () {
//
//                                })

        </script>

    </body>
</html>
