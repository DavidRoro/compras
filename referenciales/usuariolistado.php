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
        <!--<script src="../js/buscador_empl.js"></script>-->
        <script type="text/javascript" src="../js/jquery-2.0.0.js"></script>
        <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>  
        <script src="../js/buscador_empl.js"></script>
        <script src="../js/buscador_suc.js"></script>
        <link href="../menu/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>
    <body>
        <?php
//        include '../b';
        require ('../clases/conexion.php');
        if (isset($_POST['AGREGAR'])) {
            $usu = $_POST['txtusu'];
            $pass = $_POST['txtpass'];
            $rol = $_POST['cmbrol'];
            $estado = $_POST['cmbestado'];
            $per = $_POST['txtidpersonal'];
            $sucu = $_POST['txtidsucursal'];
            $insert = db_query("call sp_usuario('$usu', '$pass','$rol','$estado','',0,0,'$per','$sucu')");
//                    insertar("usuario", $campos);
            if ($insert) {
                echo '<div class="alert alert-success" id="mensaje" role="alert">INSERTO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                header("refresh:3;url=usuariolistado.php");
            } else {
                echo '<div class="alert alert-success" id="mensaje" role="alert">NO PUEDE VOLVER A INGRESAR EL MISMO NOMBRE DE USUARIO<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
            }
        }
        /////
        if (isset($_GET['borrar'])) {
            $id = $_GET['vcod'];
            //$clasi = "materia_prima";
            $retorno = eliminar($id, "usuario", "usu_id");
            if ($retorno) {
                echo '<div class="alert alert-success" id="borrar" role="alert">ELIMINO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                header("refresh:3;url=usuariolistado.php");
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
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" id="nombres" title="solo letras" type="text" name="txtpersonal" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Nombre y Apellido" value="" readonly="" autofocus=""> 

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
                            <select class="form-control" name="cmbrol"> 
                                <option value="">Seleccione un rol :</option>
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
                            <select class="form-control" name="cmbestado"> 
                                <option value="">Seleccione Estado:</option>
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
            
          <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-success">
                        <h6 class="m-0 font-weight-bold text-white">Listado Usuario</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="data-clasi" width="100%" cellspacing="0">
                                <thead align="center">
                                <tr>
                                    <th>CODIGO</th>
                                    <th>USUARIO</th>
                                    <th>CONTRASEÑA</th>
                                    <th>INTENTOS</th>
                                    <th>ACCIONES</th>
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
                                            <!--<a  href="#" onclick="borrar(<?php echo $fila[0] ?>)" data-toggle="modal" data-target="#logoutModal" class="btn btn-danger btn-sm">BORRAR</a>-->
                                            <a  href="?borrar=borrar&vcod=<?php echo $fila[0] ?>" class="btn btn-danger btn-sm">BORRAR</a>
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

        <!--modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mensaje</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body"><div class="alert alert-danger">Esta seguro que desea Eliminar este registro?.</div></div>
                    <div class="modal-footer">
                        <a id="si" class="btn btn-success" role="button"><span class="fa fa-check"></span>Si</a>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="fa fa-times"></span>No</button>
                    </div>
                </div>
            </div>
        </div>
        <!--modal-->

        <!--js fin-->
        <!--<script src="../js/jquery-3.5.1.min.js"></script>-->
        <!--<script src="../menu/vendor/jquery/jquery.min.js"></script>-->
        <!--<script src="../menu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
        <script>
            $("#mensaje").delay(4000).slideUp(200, function () {
                ($this).alert('close');
            });
            $("#borrar").delay(4000).slideUp(200, function () {
                ($this).alert('close');
            });



        </script>
        <script src="../menu/vendor/jquery/jquery.min.js"></script>
        <script src="../menu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../menu/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../menu/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="../menu/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../menu/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../menu/js/demo/datatables-demo.js"></script>
        <script src="../usuario.js"></script>

        <?php ?>
    </body>
</html>
