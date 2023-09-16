<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>i</title>
        <link href="../menu/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <script src="../js/script.js"></script>
        <!-- Custom styles for this template-->
        <link href="../menu/css/sb-admin-2.min.css" rel="stylesheet">
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/buscador_matprima.js"></script>
        <script src="../js/buscador_suc.js"></script>

    </head>
    <body class="bg-gray-100">
        <?php
        if (isset($_POST['informe'])) {
            $mov = $_POST['mov'];
            $ini = $_POST['txtinicio'];
            $fin = $_POST['txtfin'];
//            $devo='DEVOLUCIONES';
            switch ($mov) {
                case 0:
                    echo '<div class="alert alert-success" id="mensaje" role="alert">NO HA SELECCIONADO NINGUNA OPCION<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                    break;
                case 1:
//            $ini = $_POST['txtinicio'];
//            $fin = $_POST['txtfin'];
                    header("location:../informes_movimientos/pedido_informes.php?vcod=$ini&vid=$fin");
//            header("location:./pedido_informes.php?vcod=$ini&vid=$fin");
//                            echo "<script>location.href:'pedido_informes.php?vcod=$ini&vid=$fin'<script>";
                    break;
                case 2:
                    header("location:../informes_movimientos/presu_informes.php?vcod=$ini&vid=$fin");
                    break;
                case 3:
                    header("location:../informes_movimientos/orden_informes.php?vcod=$ini&vid=$fin");

                    break;
                case 4:
                    header("location:../informes_movimientos/compra_informes.php?vcod=$ini&vid=$fin");

                    break;
                case 5:
                    header("location:../informes_movimientos/ctapagar_informes.php?vcod=$ini&vid=$fin");
                    break;
                case 6:
                    header("location:../informes_movimientos/librocompras_informes.php?vcod=$ini&vid=$fin");
                    break;
                case 7:
                    header("location:../informes_movimientos/notacredito_informes.php?vcod=$ini&vid=$fin");
                    break;
                case 8:
                    header("location:../informes_movimientos/notaremision_informes.php?vcod=$ini&vid=$fin");
                    break;
                case 9:
                    header("location:../informes_movimientos/ajuste_informes.php?vcod=$ini&vid=$fin");

                    break;
                case 10:

                    header("location:../informes_movimientos/stock_informes.php");
                    break;
                case 11:

                    header("location:../informes_movimientos/notacrecompra.php");
                    break;
            }
        }
        ?>
        <div class="container">
            <!--            <br>
                        <br>-->
            <div class="container-fluid">
                <form action="#" method="post">
                    <!-- Page Heading -->
                    <!--<h1 class="h3 mb-1 text-gray-800">DATOS DE                                    PEDIDO</h1>-->
                    <!--<p class="mb-4">Bootstrap's default utility classes can be found on the official <a href="https://getbootstrap.com/docs">Bootstrap Documentation</a> page. The custom utilities below were created to extend this theme past the default utility classes built into Bootstrap's framework.</p>-->

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Grow In Utility -->
                        <div class="col-lg-5">

                            <div class="card position-relative">
                                <div class="card-header py-3 bg-info">
                                    <h6 class="m-0 font-weight-bold text-white"><span class="fa fa-archive"></span> INFORMES COMPRAS</h6>
                                </div>
                                <div class="card-body center-block">
                                    <div class="mb-3">
                                        <code>
                                            <div class="alert alert-danger" id="mensaje">NO HA SELECCIONADO NINGUNA OPCION</div>

                                        </code>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i>INFORME DE:</span></label>
                                            <select class="form-control" name="mov" onchange="if (this.value == 10) {
                                                        document.getElementById('efe').disabled = true;
                                                        document.getElementById('efe2').disabled = true;
                                                    } else {
                                                        document.getElementById('efe').disabled = false;
                                                        document.getElementById('efe2').disabled = false;

                                                    }

                                                    if (this.value == 0) {
                                                        $('#mensaje').show();
                                                    } else {
                                                        $('#mensaje').hide();
                                                    }

                                                    ">
                                                <option value="0">SELECCIONE :</option>
                                                <option value="1">PEDIDO</option>
                                                <option value="2">PRESUPUESTO</option>
                                                <option value="3">ORDEN COMPRA</option>
                                                <option value="4">COMPRA</option>
                                                <option value="5">CUENTA A PAGAR</option>
                                                <option value="6">LIBRO DE COMPRAS</option>
                                                <option value="7">NOTA DE CREDITO</option>
                                                <option value="8">NOTA DE REMISION</option>
                                                <option value="9">AJUSTE STOCK</option>
                                                <option value="10">STOCK</option>
                                                <option value="11">DEVOLUCIONES</option>
                                            </select>                                        
                                        </div>  
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i>DESDE:</span></label>

                                            <input type="date" id="efe" name="txtinicio" value="" required="" disabled="" class="form-control">
                                        </div>  
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i>HASTA:</span></label>
                                            <input type="date" id="efe2" name="txtfin" value="" required="" disabled="" class="form-control">
                                        </div>  
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i></span></label>
                                            <!--                                            <button type="submit" name="informe" value="informe" class="btn btn-success">
                                            <i class="fa fa-print"></i> Listar
                                            </button>      
                                            --> 
                                            <input type="submit" name="informe" class="btn btn-info" value="IMPRIMIR" />

                                        </div>  
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
        </div>
        <script>
            $('#mensaje').hide();
        </script>
    </body>
</html>
