<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado Clasificación</title>
        <!--<link rel="stylesheet" href="../css/bootstrap.min.css">-->
        <link rel="stylesheet" href="../css/bootstrap1.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
        $errores=array();
        $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöü]+$/";

        if (isset($_POST['AGREGAR'])) {
            if (preg_match($patron_texto, $_POST['txtclasi'])) {
                $campos = array("cla_descri" => $_POST['txtclasi']);
                $insert = insertar("clasificacion", $campos);
                 if ($insert) {
                echo '<div class="alert alert-success" id="mensaje" role="alert">INSERTO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//                echo "<script>location.href='?'</script>";
            } else {
                echo '<div class="alert alert-success" id="mensaje" role="alert">NO PUEDE ELIMINAR ESTA DESCRIPCION ESTA UTILIZANDO EN OTRO FORMULARIO<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
            }
            }else{
               echo $errores[]='<div class="alert alert-success" id="mensaje" role="alert">El nombre solo puede contener letras y espacios<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
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
            $clasi = "clasificacion";
            $retorno = eliminar($id, $clasi, "cla_id");
            if ($retorno) {
                echo '<div class="alert alert-success" id="borrar" role="alert">ELIMINO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                header("location:?");
            } else {
                echo '<div class="alert alert-success" id="borrar" role="alert">NO PUEDE ELIMINAR, ESTA UTILIZANDO EN OTRO FORMULARIO<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
            }
        }
        $datos = select_datos("clasificacion", "cla_id");
        ?>
        <div class="container">
            <h2>Listado clasificación</h2>
            <br>

            <form action="#" method="POST" role="form">
                <div class="row">
                    <!--                                        <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label> 
                                                                    <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtclasi" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese clasificacion" value="" required="" autofocus=""> 
                                        
                                                                </div>-->
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtclasi" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Descripcion" value="" required="" autofocus=""> 

                        </div>

                    </div>

                    <div class="form-group">
                        <!--<label for="field-2" class="control-label"><span class="symbol required"></span></label>-->
                        <input class="form-control btn btn-info" name="AGREGAR" value="AGREGAR" type="submit" />
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
                                    <th style="text-align:center;">ACCIONES</th>
                                </tr>
                            </thead>
                            <?php while ($fila = mysqli_fetch_array($datos)) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $fila[0]; ?></td>
                                        <td><?php echo $fila[1]; ?></td>
                                        <td>
                                            <a  href="../referenciales/clasificacioneditar.php?vcod=<?php echo $fila[0]; ?>" class="btn btn-warning btn-sm">EDITAR</a>
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

