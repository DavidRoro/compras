<?php
//require '../clases/conexion.php';
require '../conectar.php';
session_start();
$rol = $_SESSION['rol'];
$id = $_SESSION['usu'];
$sql = "select * from vs_usuario where usu_id='" . $id . "' usu_rol='" . $rol . "' and usu_estado='ACTIVO'";
//db_query($sql);
mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Menu</title>

        <!-- Custom fonts for this template-->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script type="text/javascript">
            $("#listado").hide();
            function listado() {

                $("#listado").load('../compralistado.php');
            }

            function desahabilitado() {

                $("#listado").show();
            }
            function listado2() {

                $("#desahabilitado").load('../menu.php');
            }
            function clasi() {

                $("#listado").load('../referenciales/clasificacionlistado.php');
            }
            function ref() {
                $("#listado").load('../infomes/informes_referenciales.php');
            }


        </script>

    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav sidebar sidebar-dark accordion" style="background: gray;" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class=""><img src="../Imagenes/carrito.png" width="24" height="24"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">SISTEMA DE COMPRAS</div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="../menu/menu.php">
                        <i><img src="../Imagenes/lista.png" width="24" height="24"></i>
                        <span>Inicio</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <?php if ($rol == 'ADMINISTRADOR') { ?>
                    <div class="sidebar-heading">
                        Mantenimiento y seguridad
                    </div>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fas fa-fw fa-cog"></i>
                            <span>Mantenimiento General</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">

                                <a class="collapse-item" target="myFrame" href="../referenciales/personalistado.php">
                                    <img src="../Imagenes/Usuario-especialista.png" width="24" height="24"> Personal</a>
                                <a class="collapse-item" target="myFrame" href="../referenciales/proveedorlistado.php">
                                    <img src="../Imagenes/prov.png" width="24" height="24">
                                    Proveedor</a>
                                <a class="collapse-item" target="myFrame" href="../referenciales/vehiculolistado.php">
                                    <img src="../Imagenes/prov.png" width="24" height="24">
                                    Vehiculo

                                </a>
                                <a class="collapse-item" target="myFrame" href="../referenciales/usuariolistado.php">
                                    <img src="../Imagenes/usuario.png" width="24" height="24">
                                    Usuario</a>
                            </div>
                        </div>
                    </li>


                    <!-- Nav Item - Utilities Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fas fa-fw fa-wrench"></i>
                            <span>Mantenimiento Stock</span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">

                                <a class="collapse-item" target="myFrame" href="../referenciales/clasificacionlistado.php">
                                    <img src="../Imagenes/flecha-derecha.png" width="16" height="16">
                                    Clasificación</a>
                                <a class="collapse-item" target="myFrame" href="../referenciales/materiaprimalistado.php">
                                    <img src="../Imagenes/flecha-derecha.png" width="16" height="16">
                                    Productos</a>
                                <a class="collapse-item" target="myFrame" href="../referenciales/sucursalistado.php">
                                    <img src="../Imagenes/flecha-derecha.png" width="16" height="16">
                                    Sucursal</a>
                                <a class="collapse-item" target="myFrame" href="../referenciales/motivolistado.php">
                                    <img src="../Imagenes/flecha-derecha.png" width="16" height="16">	
                                    Motivo Ajuste</a>
                            </div>
                        </div>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Gestion de Compras
                    </div>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsed" aria-expanded="true" aria-controls="collapsed">
                            <i class="fas fa-fw fa-archive"></i>
                            <span>Documentos internos</span>
                        </a>
                        <div id="collapsed" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">

                                <a class="collapse-item" target="myFrame" href="../movimientos/pedidolistado.php">
                                    <img src="../Imagenes/pedido.png" width="24" height="24">
                                    Pedido</a>
                                <a class="collapse-item" target="myFrame" href="../movimientos/presupuestolistado.php">
                                    <img src="../Imagenes/presupuesto.png" width="24" height="24">
                                    Presupuesto</a>
                                <a class="collapse-item" target="myFrame" href="../movimientos/ordencompralistado.php">
                                    <img src="../Imagenes/ordencompra.png" width="24" height="24">
                                    Orden de Compra</a>
                            </div>
                        </div>

                    </li>

                    <!-- Nav Item - Charts -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                            <i class="fas fa-fw fa-archive"></i>
                            <span>Comprobantes Compra</span>
                        </a>
                        <div id="collapse" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">

                                <a class="collapse-item" target="myFrame" href="../movimientos/compralistado.php">
                                    <img src="../Imagenes/orden.png" width="24" height="24">
                                    Factura</a>
                                <a class="collapse-item" target="myFrame" href="../movimientos/notacreditolistado.php">
                                    <img src="../Imagenes/documento.png" width="16" height="16">
                                    Nota de Credito-Debito</a>
                            </div>
                        </div>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#uno" aria-expanded="true" aria-controls="uno">
                            <i class="fas fa-fw fa-archive"></i>
                            <span>Control Interno de Stock</span>
                        </a>
                        <div id="uno" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">

                                <a class="collapse-item" href="../movimientos/ajustelistado.php" target="myFrame">
                                    <img src="../Imagenes/onebit_21.png" width="24" height="24">
                                    Ajuste de Stock</a>
                                <a class="collapse-item" target="myFrame" href="../movimientos/notaremisionlistado.php">
                                    <img src="../Imagenes/documento.png" width="24" height="24">
                                    Nota de Remision</a>
                            </div>
                        </div>

                    </li>
                    <!-- Divider -->
                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="sidebar-heading">
                        Gestión de Informes
                    </div>
                    <!--onclick="ref();"-->
                    <li class="nav-item">
                        <a class="nav-link" href="../infomes/informes_referenciales.php" target="myFrame">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Informes Referenciales</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../informes_movimientos/informes_movimientos.php" target="myFrame">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Informes Gestión de Compras</span></a>
                    </li>



                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

                </ul>


            <?php } ?>
            <?php if ($rol == 'ENCARGADO DE COMPRAS') { ?>
                <div class="sidebar-heading">
                    Mantenimiento y seguridad
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" target="myFrame" href="../boton.php" onclick="desahabilitado();" id="elemento" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Mantenimiento General</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item" href="#">
                                <img src="../Imagenes/Usuario-especialista.png" width="24" height="24"> Personal</a>
                            <a class="collapse-item"  onclick="listado();" href="#">
                                <img src="../Imagenes/prov.png" width="24" height="24">
                                Proveedor</a>
                            <a class="collapse-item" href="#">
                                <img src="../Imagenes/prov.png" width="24" height="24">
                                Vehiculo

                            </a>
                            <a class="collapse-item" href="#">
                                <img src="../Imagenes/usuario.png" width="24" height="24">
                                Usuario</a>
                        </div>
                    </div>
                </li>


                <!-- Nav Item - Utilities Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" target="myFrame" href="../boton.php" onclick="desahabilitado();" data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Mantenimiento Stock</span>
                    </a>
                    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item" href="#">
                                <img src="../Imagenes/flecha-derecha.png" width="16" height="16">
                                Clasificación</a>
                            <a class="collapse-item" href="#">
                                <img src="../Imagenes/flecha-derecha.png" width="16" height="16">
                                Materia Prima</a>
                            <a class="collapse-item" href="#">
                                <img src="../Imagenes/flecha-derecha.png" width="16" height="16">
                                Sucursal</a>
                            <a class="collapse-item" href="#">
                                <img src="../Imagenes/flecha-derecha.png" width="16" height="16">	
                                Motivo Ajuste</a>
                        </div>
                    </div>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Gestion de Compras
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsed" aria-expanded="true" aria-controls="collapsed">
                        <i class="fas fa-fw fa-archive"></i>
                        <span>Documentos internos</span>
                    </a>
                    <div id="collapsed" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item" target="myFrame" href="../movimientos/pedidolistado.php">
                                <img src="../Imagenes/pedido.png" width="24" height="24">
                                Pedido</a>
                            <a class="collapse-item" target="myFrame" href="../movimientos/presupuestolistado.php">
                                <img src="../Imagenes/presupuesto.png" width="24" height="24">
                                Presupuesto</a>
                            <a class="collapse-item" target="myFrame" href="../movimientos/ordencompralistado.php">
                                <img src="../Imagenes/ordencompra.png" width="24" height="24">
                                Orden de Compra</a>
                        </div>
                    </div>

                </li>

                <!-- Nav Item - Charts -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                        <i class="fas fa-fw fa-archive"></i>
                        <span>Comprobantes Compra</span>
                    </a>
                    <div id="collapse" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item" target="myFrame" href="../movimientos/compralistado.php">
                                <img src="../Imagenes/orden.png" width="24" height="24">
                                Factura</a>
                            <a class="collapse-item" target="myFrame" href="../movimientos/notacreditolistado.php">
                                <img src="../Imagenes/documento.png" width="16" height="16">
                                Nota de Credito-Debito</a>
                        </div>
                    </div>

                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#uno" aria-expanded="true" aria-controls="uno">
                        <i class="fas fa-fw fa-archive"></i>
                        <span>Control Interno de Stock</span>
                    </a>
                    <div id="uno" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">

                            <a class="collapse-item" target="myFrame" href="../movimientos/ajustelistado.php">
                                <img src="../Imagenes/onebit_21.png" width="24" height="24">
                                Ajuste de Stock</a>
                            <a class="collapse-item" target="myFrame" href="../movimientos/notaremisionlistado.php">
                                <img src="../Imagenes/documento.png" width="24" height="24">
                                Nota de Remision</a>
                        </div>
                    </div>

                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <div class="sidebar-heading">
                    Gestión de Informes
                </div>

                <li class="nav-item">
                    <!--onclick="desahabilitado();"-->
                    <a class="nav-link" href="../boton.php" target="myFrame">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Informes Referenciales</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" target="myFrame" href="../informes_movimientos/informes_movimientos.php" >
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Informes Gestión de Compras</span></a>
                </li>



                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
        <?php } ?>

        <?php if ($rol == 'SUPERVISOR') { ?>
            <div class="sidebar-heading">
                Mantenimiento y seguridad
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../boton.php"  target="myFrame" id="elemento" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Mantenimiento General</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="#">
                            <img src="../Imagenes/Usuario-especialista.png" width="24" height="24"> Personal</a>
                        <a class="collapse-item"  onclick="listado();" href="#">
                            <img src="../Imagenes/prov.png" width="24" height="24">
                            Proveedor</a>
                        <a class="collapse-item" href="#">
                            <img src="../Imagenes/prov.png" width="24" height="24">
                            Vehiculo

                        </a>
                        <a class="collapse-item" href="#">
                            <img src="../Imagenes/usuario.png" width="24" height="24">
                            Usuario</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../boton.php" target="myFrame" data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Mantenimiento Stock</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="#">
                            <img src="../Imagenes/flecha-derecha.png" width="16" height="16">
                            Clasificación</a>
                        <a class="collapse-item" href="#">
                            <img src="../Imagenes/flecha-derecha.png" width="16" height="16">
                            Materia Prima</a>
                        <a class="collapse-item" href="#">
                            <img src="../Imagenes/flecha-derecha.png" width="16" height="16">
                            Sucursal</a>
                        <a class="collapse-item" href="#">
                            <img src="../Imagenes/flecha-derecha.png" width="16" height="16">	
                            Motivo Ajuste</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestion de Compras
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsed" aria-expanded="true" aria-controls="collapsed">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Documentos internos</span>
                </a>
                <div id="collapsed" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" target="myFrame" href="../movimientos/pedidolistado.php">
                            <img src="../Imagenes/pedido.png" width="24" height="24">
                            Pedido</a>
                        <a class="collapse-item" target="myFrame" href="../movimientos/presupuestolistado.php">
                            <img src="../Imagenes/presupuesto.png" width="24" height="24">
                            Presupuesto</a>
                        <a class="collapse-item" target="myFrame" href="../movimientos/ordencompralistado.php">
                            <img src="../Imagenes/ordencompra.png" width="24" height="24">
                            Orden de Compra</a>
                    </div>
                </div>

            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true" aria-controls="collapse">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Comprobantes Compra</span>
                </a>
                <div id="collapse" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" target="myFrame" href="../movimientos/compralistado.php">
                            <img src="../Imagenes/orden.png" width="24" height="24">
                            Factura</a>
                        <a class="collapse-item" target="myFrame" href="../movimientos/notacreditolistado.php">
                            <img src="../Imagenes/documento.png" width="16" height="16">
                            Nota de Credito-Debito</a>
                    </div>
                </div>

            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#uno" aria-expanded="true" aria-controls="uno">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Control Interno de Stock</span>
                </a>
                <div id="uno" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" target="myFrame" href="../movimientos/ajustelistado.php">
                            <img src="../Imagenes/onebit_21.png" width="24" height="24">
                            Ajuste de Stock</a>
                        <a class="collapse-item" target="myFrame" href="../movimientos/notaremisionlistado.php">
                            <img src="../Imagenes/documento.png" width="24" height="24">
                            Nota de Remision</a>
                    </div>
                </div>

            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">
                Gestión de Informes
            </div>

            <li class="nav-item">
                <a class="nav-link" href="../boton.php" target="myFrame">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Informes Referenciales</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../boton.php" target="myFrame">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Informes Gestión de Compras</span></a>
            </li>



            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
    <?php } ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm bg-success"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts --> 

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo 'Personal: ' . $_SESSION['nombre'] . '- ' . $_SESSION['rol'] . ' | Sucursal: ' . $_SESSION['sucursal']; ?></span>
                            <img class="img-profile rounded-circle" src="../Imagenes/usuario_1.png" width="24" height="24">
                        </a>

                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <!-- <a class="dropdown-item" href="#">
                              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                              Profile
                            </a>
                            <a class="dropdown-item" href="#">
                              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                              Settings
                            </a>
                            -->                          
                            <a class="dropdown-item" href="../ayudas/Ayuda_labcompras.htm">


                                <i class="fas fa-help-me fa-sm fa-fw mr-2 text-gray-400">
                                    <img src="../Imagenes/pregunta.png" width="16" height="16" alt="pregunta"/></i>Ayuda
                            </a> 

                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Salir
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            
   <!--style="height: 550px; width: 100%;"-->

            <div class="container-fluid" style="height: 550px; width: 100%;">
                <!--<div class="m-4" >-->
                <iframe name="myFrame" style="height: 100%; width: 100%;border: 0;">
                    <div id="listado">
                        <i class=" glyphicon glyphicon-alert"></i>NO TIENE ACCESO A ESTE FORMULARIO
                    </div>
                </iframe>
                <!--</div>-->

                <!--<div id="listado"></div>-->
                <div id="panel-clasi">

                </div>
                <div id="panel-sucursal">

                </div>
                <!-- Content Row -->
                <div class="row">  </div>




            </div>


        </div>







    </div>
    </div>
        <!-- Footer -->
        <!--      <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2020</span>
                  </div>
                </div>
              </footer>-->
        <!-- End of Footer -->

    
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
                    <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Esta seguro que desea salir?.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../logout.php">Salir</a>
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

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
