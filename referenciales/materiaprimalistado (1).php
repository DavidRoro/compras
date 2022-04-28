<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Materia Prima</title>
        <link rel="stylesheet" href="../css/bootstrap1.min.css">
        <style>
            body{
                background-color: white;
            }
            td{
                color: gray;
            }
            h2,table,p,label,h5,button,input{
                font-family: Times new Roman;
                text-align: center;
            }
            input{
                text-align: left;

            }
            thead{
                background-color: darkcyan;
            }
        </style>
    </head>
    <body class="bg-light">
        <?php
        require ('../clases/conexion.php');
        $errores = array();
        $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöü ]+$/";
        $patron_numerico= "/^[0123456789-]+$/";
//        $patron_uni= "/^[0123456789-]+$/";
        if (isset($_POST['AGREGAR'])) {
            if (preg_match($patron_texto, $_POST['txtdescri']) && preg_match($patron_numerico, $_POST['txtprecioc'])) {
                $campos = array("mat_descri" => $_POST['txtdescri'],
                    "mat_precioc" => $_POST['txtprecioc'],
                    "mat_unimed" => $_POST['txtunimed'],
                    "mat_impuesto" => $_POST['cbnimpuesto'],
                    "cla_id" => $_POST['cbnclasi']);
                $insert = insertar("materia_prima", $campos);
            } else {
                echo $errores[] = '<div class="alert alert-success" id="mensaje" role="alert">El nombre solo puede contener letras y espacios<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
            }
//            if ($insert) {
//                echo '<div class="alert alert-success" id="mensaje" role="alert">INSERTO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
////                echo "<script>location.href='?'</script>";
//            } else {
//                echo '<div class="alert alert-success" id="mensaje" role="alert">NO PUEDE VOLVER A INGRESAR LA MISMA DESCRIPCION<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//            }
        }
        /////
        if (isset($_GET['borrar'])) {
            $id = $_GET['vcod'];
            //$clasi = "materia_prima";
            $retorno = eliminar($id, "materia_prima", "mat_id");
            if ($retorno) {
                echo '<div class="alert alert-success" id="borrar" role="alert">ELIMINO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                header("location:?");
            } else {
                echo '<div class="alert alert-success" id="borrar" role="alert">NO PUEDE ELIMINAR, ESTA UTILIZANDO EN OTRO FORMULARIO<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
            }
        }
        $datos = select_datos("vs_matprima", "mat_id");
        ?>
        <div class="container">
            <h2>Listado Materia Prima</h2>
            <br>
            <!--<div class="row">-->
            <form action="#" method="POST" role="form">

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtdescri" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Descripcion" value="" required="" autofocus=""> 

                        </div>

                    </div> 
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtunimed" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Unidad de Medida" value="" required="" autofocus=""> 

                        </div>

                    </div> 
                    <div class="col-sm-2">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtprecioc" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese precio" value="" required="" autofocus=""> 

                        </div>

                    </div> 
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <!--<input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtprecioc" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Descripcion" value="" required="" autofocus="">--> 
                            <select class="form-control btn-info" name="cbnimpuesto"> 
                                <option value="">SELECCIONE:</option>
                                <option value="10">IVA 10</option>
                                <option value="5">IVA 5</option>
                                <option value="EXENTA">EXENTA</option>
                            </select>
                        </div>

                    </div> 
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <!--<input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtprecioc" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Descripcion" value="" required="" autofocus="">--> 
                            <select class="form-control btn-info" name="cbnclasi"> 
                                <option value="">SELECCIONE:</option>
                                <?php
                                $clasi = select_datos("clasificacion", "cla_id");
                                while ($fila = mysqli_fetch_array($clasi)) {
                                    ?>
                                    <option value="<?php echo $fila[0]; ?>"><?php echo $fila[1]; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div> 
                    <div class="form-group">
                        <!--<label for="field-2" class="control-label"><span class="symbol required"></span></label>-->
                        <input class="form-control btn btn-sm btn-info" name="AGREGAR" value="AGREGAR" type="submit" />
                    </div>
                </div> 

            </form>

    <!--<p>         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">AGREGAR</button></p>-->
            <hr class="divider">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead style="text-align:center;">
                                <tr>
                                    <th style="text-align:center;">CODIGO</th>
                                    <th style="text-align:center;">DESCRIPCION</th>
                                    <th style="text-align:center;">PRECIO COMPRA</th>
                                    <th style="text-align:center;">CLASIFICACION</th>
                                    <th style="text-align:center;">ACCIONES</th>
                                </tr>
                            </thead>
                            <?php while ($fila = mysqli_fetch_array($datos)) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $fila[0]; ?></td>
                                        <td><?php echo $fila[1]; ?></td>
                                        <td><?php echo number_format($fila[2], 0, ',', '.'); ?></td>
                                        <td><?php echo $fila[6]; ?></td>
                                        <td>
                                            <a  href="../referenciales/materiaprimaeditar.php?vcod=<?php echo $fila[0]; ?>" class="btn btn-warning btn-sm">EDITAR</a>
                                            <a  href="?borrar=borrar&vcod=<?php echo $fila[0]; ?>" class="btn btn-danger btn-sm">BORRAR</a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>

                    </div>
                </div> 
            </div> 
        </div>
        <div id="x"></div>


        <!--js fin-->
<!--        <script src="../js/jquery-1.12.2.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>-->
        <script>
            $("#mensaje").delay(4000).slideUp(200, function () {
                ($this).alert('close');
            });
            $("#borrar").delay(4000).slideUp(200, function () {
                ($this).alert('close');
            });
        </script>
        <?php
        ?>
    </body>
</html>
