
        <?php
        include '../clases/cabecera.php';
        require ('../clases/conexion.php');
        include '../sesiones.php';
        $datos = db_query("select * from vs_pedidocliente where pedidocliente_estado='GENERADO' OR pedidocliente_estado='PENDIENTE' AND suc_id=$idSuc");
        ?>
        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid bg-gray-100">

                <!-- Page Heading -->
                <h1 align="center" class="h3 mb-2 text-info">Listado Pedidos de Clientes</h1>
                <p align="center"><a href="../movimientos/pedidocliente_agregar.php" class="btn btn-info">Nuevo Registro</a></p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 bg-info">
                        <h6 class="m-0 font-weight-bold text-white">Listado Pedidos de Clientes</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead align="center">
                                    <tr>
                                        <th>CODIGO</th>
                                        <th>FECHA</th>
                                        <th>ESTADO</th>
                                        <th>CLIENTE</th>
                                       
                                        <th>ACCIONES</th>

                                    </tr>
                                </thead>

                                <?php
                                while ($fila = mysqli_fetch_array($datos)) {
                                    $date = new DateTime($fila[2]);
                                    ?>
                                    <tbody align="center">
                                        <tr>
                                            <td><?php echo $fila[0]; ?></td>
                                            <td><?php echo date_format($date, 'd-m-Y'); ?></td>
                                            <?php if ($fila[1] == 'GENERADO') { ?>
                                                <td class="text-success"><?php echo $fila[1]; ?></td>
                                            <?php } else { ?>
                                                <td class="text-danger"><?php echo $fila[1]; ?></td>

                                            <?php } ?>
                                            <td><?php echo $fila[6]; ?></td>
                                            <td>
                                                <a href="pedidocliente_impresion.php?vcod=<?php echo $fila[0]; ?>" class="btn btn-info btn-sm"><span class="fa fa-download"></span></a>
                                                <a href="pedidocliente_abm.php?borrar=borrar&vcod=<?php echo $fila[0]; ?>" class="btn btn-danger btn-sm"><span class="fa fa-trash"></a>

                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <!--      <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                  </div>
                </div>
              </footer>-->
        <!-- End of Footer -->


        <!-- Scroll to Top Button-->


        <!-- Logout Modal-->

        <!-- Bootstrap core JavaScript-->
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

    </body>

</html>

