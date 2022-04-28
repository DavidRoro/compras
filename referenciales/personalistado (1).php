<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado Personal</title>
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
        $errores = array();
        $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüñÑ ]+$/";
        $patron_numeric = "[0-9]";
        $patron_ambos = "[0-9]/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüñÑ ]+$/";
        if (isset($_POST['AGREGAR'])) {
            if (preg_match($patron_texto, $_POST['txtnombre']) && preg_match($patron_texto, $_POST['txtapelli']) && preg_match($patron_numeric, $_POST['txtci']) && preg_match($patron_ambos, $_POST['txtdireccion'])) {
                $campos = array("per_nombre" => $_POST['txtnombre'],
                    "per_apelli" => $_POST['txtapelli'],
                    "per_ci" => $_POST['txtci'],
                    "per_direc" => $_POST['txtdirec'],
                    "per_email" => $_POST['txtemail']);
                $insert = insertar("personal", $campos);
                if ($insert) {
                    echo '<div class="alert alert-success" id="mensaje" role="alert">INSERTO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//                echo "<script>location.href='?'</script>";
                } else {

                    echo '<div class="alert alert-success" id="mensaje" role="alert">NO PUEDE VOLVER A INGRESAR EL MISMO CI<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                }
            } else {
                
                    echo $errores[] = '<div class="alert alert-success" id="mensaje" role="alert">El campo solo puede contener letras y espacios<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                
//                    echo $errores[] = '<div class="alert alert-success" id="mensaje" role="alert">El campo solo puede contener numeros<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                
            }

        }
        /////
        if (isset($_GET['borrar'])) {
            $id = $_GET['vcod'];
            $clasi = "personal";
            $retorno = eliminar($id, $clasi, "per_id");
            if ($retorno) {
                echo '<div class="alert alert-success" id="borrar" role="alert">ELIMINO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//                header("location:?");
            } else {
                echo '<div class="alert alert-success" id="borrar" role="alert">NO PUEDE ELIMINAR, ESTA UTILIZANDO EN OTRO FORMULARIO<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
            }
        }
        $datos = select_datos("personal", "per_id");
        ?>
        <div id="inserto"></div>
        <div class="container">
            <h2>Listado Personal</h2>
            <br>

            <form action="#" method="POST" role="form">
                <div class="row">

                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtnombre" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nombre" value="" required="" autofocus=""> 

                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtapelli" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Apellido" value="" required="" autofocus=""> 

                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="tel" name="txtci" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Cedula" value="" required="" autofocus=""> 

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="email" name="txtemail" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Correo" value="" required="" autofocus=""> 

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtdirec" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Direccion" value="" required="" autofocus=""> 

                        </div>
                    </div>

                    <div class="form-group">
                        <!--<label for="field-2" class="control-label"><span class="symbol required"></span></label>-->
                        <input class="form-control btn btn-info" onclick="insercion();" name="AGREGAR" value="AGREGAR" type="submit" />
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
                                    <th style="text-align:center;">NOMBRE Y APELLIDO</th>
                                    <th style="text-align:center;">N° DE CEDULA</th>
                                    <th style="text-align:center;">DIRECCION</th>
                                    <th style="text-align:center;">ACCIONES</th>
                                </tr>
                            </thead>
                            <?php while ($fila = mysqli_fetch_array($datos)) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $fila[0]; ?></td>
                                        <td><?php echo $fila[1] . ' ' . $fila[2]; ?></td>
                                        <td><?php echo $fila[3]; ?></td>
                                        <td><?php echo $fila[4]; ?></td>
                                        <td>
                                            <a  href="../referenciales/personaleditar.php?vcod=<?php echo $fila[0]; ?>" class="btn btn-warning btn-sm">EDITAR</a>
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
            function insercion() {
                $('#inserto').load('../referenciales/sucursallistado.php');
            }
            $("#borrar").delay(4000).slideUp(200, function () {
                ($this).alert('close');
            });
        </script>
        <?php ?>
    </body>
</html>

