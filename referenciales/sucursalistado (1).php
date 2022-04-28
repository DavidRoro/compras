<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado Sucursal</title>
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
        if (isset($_POST['AGREGAR'])) {
            $campos = array("suc_descri" => $_POST['txtdescri'],
                "suc_direc" => $_POST['txtdirec'],
                "suc_telef" => $_POST['txttelef']);
            $insert = insertar("sucursal", $campos);
            if ($insert) {
                echo '<div class="alert alert-success" id="mensaje" role="alert">INSERTO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//                echo "<script>location.href='?'</script>";
            } else {
                echo '<div class="alert alert-success" id="mensaje" role="alert">NO PUEDE VOLVER A INGRESAR LA MISMA DESCRIPCION<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
            }
        }
        /////
        if (isset($_GET['borrar'])) {
            $id = $_GET['vcod'];
            $clasi = "sucursal";
            $retorno = eliminar($id, $clasi, "suc_id");
            if ($retorno) {
                echo '<div class="alert alert-success" id="borrar" role="alert">ELIMINO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//                header("location:?");
            } else {
                echo '<div class="alert alert-success" id="borrar" role="alert">NO PUEDE ELIMINAR, ESTA UTILIZANDO EN OTRO FORMULARIO<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
            }
        }
        $datos = select_datos("sucursal", "suc_id");
        ?>
        <div id="inserto"></div>
        <div class="container">
            <h2>Listado Sucursal</h2>
            <br>

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
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtdirec" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Direccion" value="" required="" autofocus=""> 

                        </div>

                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="tel" name="txttelef" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Telefono" value="" required="" autofocus=""> 

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
                                    <th style="text-align:center;">DESCRIPCION</th>
                                    <th style="text-align:center;">DIRECCION</th>
                                    <th style="text-align:center;">TELEFONO</th>
                                    <th style="text-align:center;">ACCIONES</th>
                                </tr>
                            </thead>
                            <?php while ($fila = mysqli_fetch_array($datos)) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $fila[0]; ?></td>
                                        <td><?php echo $fila[1]; ?></td>
                                        <td><?php echo $fila[2]; ?></td>
                                        <td><?php echo $fila[3]; ?></td>
                                        <td>
                                            <a  href="../referenciales/sucursaleditar.php?vcod=<?php echo $fila[0]; ?>" class="btn btn-warning btn-sm">EDITAR</a>
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
        <?php
        ?>
    </body>
</html>

