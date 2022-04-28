<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado Vehiculo</title>
        <link rel="stylesheet" href="../css/bootstrap1.min.css">
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../menu/vendor/jquery/jquery.min.js"></script>
        <script src="../menu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="../menu/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    </head>
    <body>

        <?php
        require ('../clases/conexion.php');
        $errores = array();
        $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöü]+$/";
        if (isset($_POST['AGREGAR'])) {
            if (preg_match($patron_texto, $_POST['txtdescri'])) {
                $campos = array("veh_descri" => $_POST['txtdescri'],
                    "veh_chapa" => $_POST['txtchapa']);
                $insert = insertar("vehiculo", $campos);
                if ($insert) {
                    echo '<div class="alert alert-success" id="mensaje" role="alert">INSERTO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                header("refresh:3;url=vehiculolistado.php");
                } else {
                    echo '<div class="alert alert-success" id="mensaje" role="alert">NO PUEDE VOLVER A INGRESAR LA MISMA DESCRIPCION<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                }
            } else {
                echo $errores[] = '<div class="alert alert-success" id="mensaje" role="alert">El nombre solo puede contener letras y espacios<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
            }
        }
        /////
        if (isset($_GET['borrar'])) {
            $id = $_GET['vcod'];
            $clasi = "vehiculo";
            $retorno = eliminar($id, $clasi, "veh_id");
            if ($retorno) {
                echo '<div class="alert alert-success" id="borrar" role="alert">ELIMINO EXITOSAMENTE<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                header("refresh:3;url=vehiculolistado.php");
            } else {
                echo '<div class="alert alert-success" id="borrar" role="alert">NO PUEDE ELIMINAR, ESTA UTILIZANDO EN OTRO FORMULARIO<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
            }
        }
        $datos = select_datos("vehiculo", "veh_id");
        ?>
        <div class="container">
            <h2>Listado Vehiculo</h2>
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
                            <input class="form-control" pattern="^[A-Za-z\s]+{2,254}" title="solo letras" type="text" name="txtchapa" id="" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese N° de chapa" value="" required="" autofocus=""> 

                        </div>

                    </div>

                    <div class="form-group">
                        <!--<label for="field-2" class="control-label"><span class="symbol required"></span></label>-->
                        <input class="form-control btn btn-info" name="AGREGAR" value="AGREGAR" type="submit" />
                        <!--<input type="button" onclick="mensaje()" value="Probar Alerta">-->
                    </div>

                </div> 

            </form>

<!--<p>         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">AGREGAR</button></p>-->
            <hr class="divider">
            
            <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-success">
                        <h6 class="m-0 font-weight-bold text-white">Listado Vehiculo</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="data-clasi" width="100%" cellspacing="0">
                                <thead align="center">
                                <tr>
                                    <th>CODIGO</th>
                                    <th>DESCRIPCION</th>
                                    <th>N° DE CHAPA</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead>
                            <?php while ($fila = mysqli_fetch_array($datos)) { ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $fila[0]; ?></td>
                                        <td><?php echo $fila[1]; ?></td>
                                        <td><?php echo $fila[2]; ?></td>
                                        <td>
                                            <a  href="../referenciales/vehiculoeditar.php?vcod=<?php echo $fila[0]; ?>" class="btn btn-warning btn-sm">EDITAR</a>
                                            <a  href="#" onclick="borrar(<?php echo $fila[0] ?>)" data-toggle="modal" data-target="#logoutModal" class="btn btn-danger btn-sm">BORRAR</a>
                                            <!--<button role="modal"  class="btn btn-danger" data-toggle="modal" data-target="#logoutModal">BORRAR</button>-->
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>

                    </div>
                </div> 
            </div> 
        </div>

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
        <script src="../vehiculo.js"></script>

        <?php
        ?>
    </body>
</html>

