<?php
//include '../menu/menu.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Informe de Clasificacion</title>
        <link href="../menu/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="../js/script.js"></script>
        <!-- Custom styles for this template-->
        <link href="../menu/css/sb-admin-2.min.css" rel="stylesheet">

    </head>
    <body class="bg-gray-100">
        <?php
                    if (isset($_POST['va'])) {
                        $ref = $_POST['ref'];
                        switch ($ref) {
                            case 0:
                                echo '<div class="alert alert-success" id="mensaje" role="alert">NO HA SELECCIONADO NINGUNA OPCION<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                                break;
                            case 1:
                                header("location:clasif.php");
//                                
                                break;
                            case 2:
                                header("location:productos.php");
                                break;
                            case 3:
                                header("location:sucur.php");

                                break;
                            case 4:
                                header("location:mot_ajuste.php");

                                break;
                            case 5:
                                header("location:pers.php");
                                break;
                            case 6:
                                header("location:prov.php");
                                break;
                            case 7:
                                header("location:veh.php");
                                break;
                            case 8:
                                header("location:usu.php");
                                break;
                        }
                    }
//                    
                    ?>
     <div class="container">
            <!--            <br>
                        <br>-->
            <div class="container-fluid">
                <form action="#" method="post">
                    <!-- Page Heading -->
                    <!--<h1 class="h3 mb-1 text-gray-800">DATOS DE PEDIDO</h1>-->
                    <!--<p class="mb-4">Bootstrap's default utility classes can be found on the official <a href="https://getbootstrap.com/docs">Bootstrap Documentation</a> page. The custom utilities below were created to extend this theme past the default utility classes built into Bootstrap's framework.</p>-->

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Grow In Utility -->
                        <div class="col-lg-5">

                            <div class="card position-relative">
                                <div class="card-header py-3 bg-info">
                                    <h6 class="m-0 font-weight-bold text-white"><span class="fa fa-archive"></span> INFORMES REFERENCIALES</h6>
                                </div>
                                <div class="card-body center-block">
                                    <div class="mb-3">
                                        <code></code>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i>INFORME DE:</span></label>
                                                                                    
                                        </div>  
                                    </div>
                                    <select class="form-control" id="ref" name="ref">
                                        <option value="">SELECCIONE UNA OPCION:</option>
                                        <option value="1">CLASIFICACION</option>
                                        <option value="2">PRODUCTOS</option>
                                        <option value="3">SUCURSAL</option>
                                        <option value="4">MOTIVO AJUSTE</option>
                                        <option value="5">PERSONAL</option>
                                        <option value="6">PROVEEDOR</option>
                                        <option value="7">VEHICULO</option>
                                        <option value="8">USUARIO</option>
                                    </select>
                                </div>

                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i></span></label>
                                            <!--                                            <button type="submit" name="informe" value="informe" class="btn btn-success">
                                                                                            <i class="fa fa-print"></i> Listar
                                                                                        </button>      
                                            --> 
                                    <input type="submit" name="va" class="btn btn-info" value="IMPRIMIR" />

                                        </div>  
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
                    
        <div class="list"></div>
        <!--<script src="../js/bootstrap.bundle.min.js"></script>-->
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script>
            $("#mensaje").delay(4000).slideUp(200, function () {
                ($this).alert('close');
            });
            $("#borrar").delay(4000).slideUp(200, function () {
                ($this).alert('close');
            });

        </script>

    </body>
</html>

