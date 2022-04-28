<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Usuario</title>
        <link rel="stylesheet" href="../css/bootstrap1.min.css">
        <script src="../js/buscador_empl.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>  
        <script src="../js/buscador_empl.js"></script>
        <script src="../js/buscador_suc.js"></script>
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
            ul{
                list-style-type: none;
                /*                margin: 0;
                                padding: 0;*/

                overflow: hidden;
                background-color: lightblue;
                cursor: pointer;
                border-radius: 0 10px 0 10px;
                padding: 0 5px 0 5px;
                width: 10%;

            }
            li {
                float: left;
            }

            li a {
                display: block;
                color: white;
                text-align: center;
                padding: 10px 10px;
                text-decoration: none;
            }

            li a:hover:not(.active) {
                /*display: block;*/
                color: white;
                text-align: center;
                padding: 10px 10px;
                text-decoration: none;

            }

            .active {
                background-color: #4CAF50;
            }


        </style>
    </head>
    <body class="bg-light">
        <?php
//        include '../b';
        require ('../clases/conexion.php');
        if (isset($_POST['AGREGAR'])) {
            $usu=$_POST['txtusu'];$pass=$_POST['txtpass'];$rol=$_POST['cmbrol'];$estado=$_POST['cmbestado'];$per=$_POST['txtidpersonal'];
            $sucu=$_POST['txtidsucursal'];
            $insert = db_query("call sp_usuario('$usu', '$pass','$rol','$estado','',0,0,'$per','$sucu')");
//                    insertar("usuario", $campos);
            if ($insert) {
                echo '<div class="alert alert-success" id="mensaje" role="alert">INSERTO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//                echo "<script>location.href='?'</script>";
            } 
//            else{
//                echo '<div class="alert alert-success" id="mensaje" role="alert">NO PUEDE VOLVER A INGRESAR LA MISMA DESCRIPCION<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//            }
        }
        /////
        if (isset($_GET['borrar'])) {
            $id = $_GET['vcod'];
            //$clasi = "materia_prima";
            $retorno = eliminar($id, "usuario", "usu_id");
            if ($retorno) {
                echo '<div class="alert alert-success" id="borrar" role="alert">ELIMINO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                header("location:?");
            } else {
                echo '<div class="alert alert-success" id="borrar" role="alert">NO PUEDE ELIMINAR, ESTA UTILIZANDO EN OTRO FORMULARIO<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
            }
        }
        $datos = select_datos("usuario", "usu_id");
        ?>
        <div class="container">
            <h2>Listado Usuario</h2>
            <br>
            <!--<div class="row">-->
            <form action="#" method="POST" role="form">

                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtusu" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Nombre de usuario" value="" required="" autofocus=""> 

                        </div>

                    </div> 
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="" type="password" name="txtpass" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese contraseña" value="" required="" > 

                        </div>

                    </div> 
                    <div class="col-sm-2">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control"  type="hidden" name="txtidpersonal" id="cod" autocomplete="off" placeholder="Ingrese precio" value="" required="" autofocus=""> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}"  id="ci" type="number" name="txtci" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese C.I" value="" required="" autofocus="">

                        </div>
                    </div> 
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" id="nombres" title="solo letras" type="text" name="txtpersonal" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Nombre y Apellido" value="" required="" autofocus=""> 

                        </div>
                    </div>
                    
                    <div class="col-sm-2">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <input class="form-control"  type="hidden" name="txtidsucursal" id="ids" autocomplete="off" placeholder="" value="" required="" autofocus=""> 
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}"  id="sucu" type="text" name="txtsucursal" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Sucursal" value="" required="" autofocus="">

                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group">
                            <select class="form-control btn-success" name="cmbrol"> 
                                <option value="">SELECCIONE UN ROL :</option>
                                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                <option value="ENCARGADO DE COMPRAS">ENCARGADO DE COMPRAS</option>
                                <option value="SUPERVISOR">SUPERVISOR</option>
                            </select>
                        </div>

                    </div> 
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!--<label for="field-3" class="control-label">Clasificación: <span class="symbol required"></span></label>--> 
                            <!--<input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtprecioc" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese Descripcion" value="" required="" autofocus="">--> 
                            <select class="form-control btn-success" name="cmbestado"> 
                                <option value="">SELECCIONE ESTADO:</option>
                                <option value="ACTIVO">ACTIVO</option>
                                <option value="INACTIVO">INACTIVO</option>
                                <option value="BLOQUEADO">BLOQUEADO</option>
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
                                    <th style="text-align:center;">USUARIO</th>
                                    <th style="text-align:center;">CONTRASEÑA</th>
                                    <th style="text-align:center;">INTENTOS</th>
                                    <th style="text-align:center;">ACCIONES</th>
                                </tr>
                            </thead>
                            <?php while ($fila = mysqli_fetch_array($datos)) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $fila[0]; ?></td>
                                        <td><?php echo $fila[1]; ?></td>
                                        <td><?php echo $fila[2]; ?></td>
                                        <td><?php echo $fila[6]; ?></td>
                                        <td>
                                            <a  href="../referenciales/usuarioeditar.php?vcod=<?php echo $fila[0]; ?>" class="btn btn-warning btn-sm">EDITAR</a>
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
