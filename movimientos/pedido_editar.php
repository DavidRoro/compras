<?php
require('../clases/conexion.php');
require('../sesiones.php');
$cod = $_GET['vcod'];
$consulta = select_id("vs_pedido", "ped_id", $cod);
$cod = $fila->ped_id;
$idsucu = $fila->suc_id;
$sucursal = $fila->suc_descri;
$fecha = $fila->ped_fecha;
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Pedido</title>

        <!-- Custom fonts for this template-->
        <link href="../menu/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="../movimientos/assets/script/script2.js"></script>
        <!-- Custom styles for this template-->
        <link href="../menu/css/sb-admin-2.min.css" rel="stylesheet">
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>  
        <script src="../js/buscador_matprima.js"></script>
        <script src="../js/buscador_suc.js"></script>
        <style>

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

    <body id="page-top" class="bg-gray-100" onLoad="getTime()">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->

            <!-- Sidebar - Brand -->
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <form action="pedido_abm.php" enctype="multipart/form-data" method="GET" role="form">
                    <!-- Page Heading -->
                    <!--<h1 class="h3 mb-1 text-gray-800">DATOS DE PEDIDO</h1>-->
                    <!--<p class="mb-4">Bootstrap's default utility classes can be found on the official <a href="https://getbootstrap.com/docs">Bootstrap Documentation</a> page. The custom utilities below were created to extend this theme past the default utility classes built into Bootstrap's framework.</p>-->

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Grow In Utility -->
                        <div class="col-lg-4">

                            <div class="card position-relative">
                                <div class="card-header py-3 bg-success">
                                    <h6 class="m-0 font-weight-bold text-white">DATOS DE PEDIDO</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <code></code>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label><span><i class=""></i>Nombre y apellido:</span></label>

                                            <input type="text" name="txtnombre" value="<?= $nombre ?>" class="form-control" readonly="">
                                        </div>  
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i>Sucursal:</span></label>

                                            <input type="hidden" name="txtidsucursal" value="<?php echo $idsucu?>" id="ids" class="form-control">
                                            <input type="text" name="txtsucursal" id="sucu" value="<?= $sucursal ?>" class="form-control" required="">
                                        </div>  
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i>Fecha de Pedido:</span></label>

                                            <input type="text" value="<?php echo $fecha ?>" name="txtfecha" class="form-control" readonly="">
                                        </div>  
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--<div></div>-->
                        <!-- Fade In Utility -->
                        <div class="col-lg-8">

                            <div class="card position-relative ">
                                <div class="card-header py-3 bg-success">
                                    <h6 class="m-0 font-weight-bold text-white"><span class="fa fa-archive"></span> DETALLE PEDIDO</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <code></code>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Codigo:</span></label>

                                                <input type="text" name="txtid" id="idpro" class="form-control" readonly="">  
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Materia Prima:</span></label>

                                                <input type="text" name="txtmateriaprima" id="descripcion" class="form-control" required="">    
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Cantidad:</span></label>

                                                <input type="number" name="txtcantidad" onkeyup="validaciones();" id="" class="form-control" required="">    
                                            </div>
                                        </div>


                                        <!--</div>-->
                                    </div>
                                    <hr class="divider">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered dt-responsive nowrap" id="carrito">
                                                    <thead>
                                                        <tr>
                                                            <th><div align="center">Acción</div></th>
                                                            <th><div align="center">Codigo</div></th>
                                                            <th><div align="center">Materia Prima</div></th>
                                                            <th><div align="center">Cantidad</div></th>

                                                        </tr></thead>
                                                    <?php
                                                    $consul = db_query("select * from vs_detpedido where ped_id=$cod");
                                                    ?>
                                                    <tbody>
                                                        <?php while ($mostrardatos = mysqli_fetch_array($consul)) { ?>
                                                            <tr>
                                                                <td><div align="center"><a href="pedido_abm.php?delete=delete&id=<?php echo $mostrardatos[0] ?>"><i class="entypo-trash"></i>Borrar</a></div></td>
                                                                <td><div align="center"><?php echo $mostrardatos[1] ?></div></td>
                                                                <td><div align="center"><?php echo $mostrardatos[2] ?></div></td>
                                                                <td><div align="center"><?php echo $mostrardatos[3] ?></div></td> 
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>

                                                </table>

                                            </div>
                                        </div>

                                    </div>

                                    <div class="modal-footer"> 
                                        <button class="btn btn-info" type="text" onclick="location.href = 'pedidolistado.php'"><span class="fa fa-window-restore"></span> VOLVER</button> 
                                        <button class="btn btn-danger" type="reset"><span class="fa fa-times"></span> CANCELAR</button> 
                                        <button type="button" name="imprimir" id="btn-submit" class="btn btn-primary" onclick="location.href = 'pedido_abm.php?imprimir=imprimir&vcod=<?php echo $cod; ?>'"><span class="fa fa-save"></span> IMPRIMIR</button> 
                                        <button type="submit" name="modificar" value="modificar" id="btn-submit" class="btn btn-success" onclick="location.href = 'pedido_abm.php?modificar=modificar&vcod=<?php echo $cod; ?>'"><span class="fa fa-check"></span> ACTUALIZAR</button> 
                                        <!--<input type="submit" name="anular" id="btn-submit" class="btn btn-success glyphicon glyphicon-check" value="REGISTRAR">-->
                                    </div>
                                    <?php
//                                    if (!empty($_POST['modificar'])) {
//                                        $fecha=$_POST['txtfecha'];
//                                        $su=$_POST['txtidsucursal'];
//                                        $anular = db_query("update pedido set ped_fecha=$fecha, ped_estado='ACTIVO', suc_id=$su, usu_id=$idUsu where ped_id=" . $_POST['vcod']);
//                                        if ($anular) {
//                                            echo "<script>location.href='pedidolistado.php'</script>";
//                                        }
//                                    }
                                    ?>
                                    </form>
                                </div>

                            </div>

                        </div>
                        <!-- /.container-fluid -->

                    </div>
            </div>
            <!--
                        <a class="scroll-to-top rounded" href="#page-top">
                            <i class="fas fa-angle-up"></i>
                        </a>-->

            <!-- Logout Modal-->


            <!-- Bootstrap core JavaScript-->
            <!--<script src="../menu/vendor/jquery/jquery.min.js"></script>-->
            <script src="../menu/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <!--<script src="../menu/vendor/jquery-easing/jquery.easing.min.js"></script>-->

            <!-- Custom scripts for all pages-->
            <script src="../menu/js/sb-admin-2.min.js"></script>

    </body>

</html>
