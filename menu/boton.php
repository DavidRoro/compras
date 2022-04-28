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
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="../movimientos/assets/script/script2.js"></script>
        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">

    </head>

    <body id="page-top" class="bg-gray-100" onLoad="getTime()">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->

            <!-- Sidebar - Brand -->
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

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

                                        <input type="text" name="txtnombre" class="form-control" readonly="">
                                    </div>  
                                </div>


                                <div class="form-group">
                                    <div class="col-lg-9">
                                        <label><span><i class=""></i>Sucursal:</span></label>

                                        <input type="hidden" name="txtidsucursal" id="cod" class="form-control">
                                        <input type="text" name="txtsucursal" id="sucu" class="form-control">
                                    </div>  
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-9">
                                        <label><span><i class=""></i>Fecha de Pedido:</span></label>

                                        <input type="text" id="fecharegistro" class="form-control" readonly="">
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

                                            <input type="text" name="txtid" class="form-control" readonly="">  
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label><span><i class=""></i>Materia Prima:</span></label>

                                            <input type="text" name="txtmateriaprima" class="form-control" required="">    
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label><span><i class=""></i>Cantidad:</span></label>

                                            <input type="number" name="txtcantidad" class="form-control" required="">    
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
                                                ?>
                                                <tbody>
                                                    <?php //while($mostrardatos=mysqli_fetch_array($consul)){ ?>
                                                    <tr>
                                                        <td><div align="center"><a href="abm_ventas.php?delete=delete&id=<?php echo $mostrardatos['idproducto'] ?>"><i class="entypo-trash"></i>Borrar</a></div></td>
    <!--<td><div align="center"><?php //echo $mostrardatos['idventa']   ?></div></td>-->
                                                        <td><div align="center"><?php //echo $mostrardatos['idproducto']   ?></div></td>
                                                        <td><div align="center"><?php //echo $mostrardatos['descripcion']   ?></div></td>
                                                        <td><div align="center"><?php //echo number_format($mostrardatos['precio'],0,',','.')   ?></div></td>
                                                        <!-- <td><div align="center"><?php //echo $mostrardatos['cantidad']   ?></div></td> -->
                                                        <!-- <td><div align="center"><?php //echo number_format($mostrardatos['cantidad']*$mostrardatos['precio'],0,',','.')   ?></div></td> -->
                                                        <?php //$sumar += $mostrardatos['subtotal'] ?>
                                                    </tr>
                                                    <?php //} ?>
                                                </tbody>

                                            </table>

                                        </div>
                                    </div>

                                </div>

                                <div class="modal-footer"> 
                                    <button class="btn btn-danger" type="reset" onclick="location.href = 'abm_ventas.php?cancel=cancel&cod=<?php //echo $ultID ?>'"><span class="fa fa-times"></span> CANCELAR</button> 
                                    <button type="button" name="finalizar" id="btn-submit" class="btn btn-primary" onclick="location.href = 'abm_ventas.php?finalizar=finalizar&vcod=<?php //echo $ultID ?>&vtotal=<?= $sumar ?>'"><span class="fa fa-save"></span> IMPRIMIR</button> 
                                    <button type="button" name="finalizar" id="btn-submit" class="btn btn-success" onclick="location.href = 'abm_ventas.php?finalizar=finalizar&vcod=<?php //echo $ultID ?>&vtotal=<?= $sumar ?>'"><span class="fa fa-check"></span> REGISTRAR</button> 

                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->

                <!-- End of Footer -->

                <!--</div>-->
                <!-- End of Content Wrapper -->

                <!--</div>-->
                <!-- End of Page Wrapper -->

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Logout Modal-->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                <a class="btn btn-primary" href="login.html">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>

                </body>

                </html>
