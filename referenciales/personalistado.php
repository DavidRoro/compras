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
        <link href="../menu/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        
    </head>
    <body>

        <?php
        require ('../clases/conexion.php');
        $errores = array();
        $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüñÑ ]+$/";
        $patron_numeric = "[0-9]";
        $patron_ambos = "[0-9]/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüñÑ ]+$/";
        if (isset($_POST['AGREGAR'])) {
//            if (preg_match($patron_texto, $_POST['txtnombre']) && preg_match($patron_texto, $_POST['txtapelli']) && preg_match($patron_numeric, $_POST['txtci']) && preg_match($patron_ambos, $_POST['txtdireccion'])) {
            $campos = array("per_nombre" => $_POST['txtnombre'],
                "per_apelli" => $_POST['txtapelli'],
                "per_ci" => $_POST['txtci'],
                "per_direc" => $_POST['txtdirec'],
                "per_email" => $_POST['txtemail']);
            $insert = insertar("personal", $campos);
            if ($insert) {
                echo '<div class="alert alert-success" id="mensaje" role="alert">INSERTO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                header("refresh:3;url=personalistado.php");
            } else {

                echo '<div class="alert alert-success" id="mensaje" role="alert">NO PUEDE VOLVER A INGRESAR EL MISMO CI<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
            }
//            } else {
//                echo $errores[] = '<div class="alert alert-success" id="mensaje" role="alert">El campo solo puede contener letras y espacios<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//                    echo $errores[] = '<div class="alert alert-success" id="mensaje" role="alert">El campo solo puede contener numeros<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//            }
        }
        /////
        if (isset($_GET['borrar'])) {
            $id = $_GET['vcod'];
            $clasi = "personal";
            $retorno = eliminar($id, $clasi, "per_id");
            if ($retorno) {
                echo '<div class="alert alert-success" id="borrar" role="alert">ELIMINO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                header("refresh:3;url=personalistado.php");
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
                        <input class="form-control btn btn-info" name="AGREGAR" value="AGREGAR" type="submit" />
                    </div>

                </div> 

            </form>

<!--<p>         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">AGREGAR</button></p>-->
            <hr class="divider">
            
             <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-success">
                        <h6 class="m-0 font-weight-bold text-white">Listado Personal</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="data-clasi" width="100%" cellspacing="0">
                                <thead align="center">
                                <tr>
                                    <th>CODIGO</th>
                                    <th>NOMBRE Y APELLIDO</th>
                                    <th>N° DE CEDULA</th>
                                    <th>DIRECCION</th>
                                    <th>ACCIONES</th>
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
                                            <a  href="#" onclick="borrar(<?php echo $fila[0] ?>)" data-toggle="modal" data-target="#logoutModal" class="btn btn-danger btn-sm">BORRAR</a>
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
        <script src="../menu/vendor/jquery/jquery.min.js"></script>
        <script src="../menu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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

                                            function borrar(datos) {

                                                $("#si").attr('href', '?borrar=borrar&vcod=' + datos);
                                            }
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
        <script src="../personal.js"></script>

        <?php ?>
    </body>
</html>

