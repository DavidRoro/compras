<?php
require('../clases/conexion.php');
require('../sesiones.php');
$consulta = db_query("SELECT * FROM vs_cobranzas where cob_estado='PENDIENTE' and usu_id=$idUsu");
if (mysqli_num_rows($consulta) > 0) {
    $tomar = mysqli_fetch_array($consulta);
    $idped = $tomar[0];
    $nrofact = $tomar[5];
//    $nrotimbrado = $tomar[15];
    $idpedcliente = $tomar[6];
    $idProv = $tomar[10];
    $idventas = $tomar[1];
    //$idfor = $tomar[2];
    //$Prov = $tomar[10];



//    echo "ya tenemos el ultimo ID que es:" . $ultID;
} else {
    $datosorden = db_query("select * from ventas where ventas_estado='GENERADO';");
    if ($fila = mysqli_fetch_array($datosorden)) {
        $idventas = $fila[0];
        $nrofact = $fila[3];
        $idProv = $fila[9];
        //$Prov = $fila[4];
    } else {
        $idventas = "SIN VENTAS";
        //$Prov = "NO DISPONIBLE";
    }
    $idped = 0;
    $nrofact = "";
    $cuotas = "";
    $idProv = null;
    $credito = "";
    $contado = "";
    $idpedcliente = null;

//    $nombre = "";
//    $sucur = "";
}
?>
<!DOCTYPE html>
<html lang="es">

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
        <script src="../js/script.js"></script>
        <!-- Custom styles for this template-->
        <link href="../menu/css/sb-admin-2.min.css" rel="stylesheet">
        <script type="text/javascript" src="../js/jquery-2.0.0.js"></script>
        <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>  
        <!--<script src="../js/jquery-3.5.1.min.js"></script>-->
        <script src="../js/buscador_matprima.js"></script>
        <!--<script src="../js/buscador_proveedor.js"></script>-->
        <link href="../select2/select2.min.css" rel="stylesheet">
        <script src="../select2/select2.full.min.js"></script>
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
        <script>
            function AbrirCentrado(Url, NombreVentana, width, height, extras) {
                var largo = width;
                var altura = height;
                var adicionales = extras;
                var top = (screen.height - altura) / 2;
                var izquierda = (screen.width - largo) / 2;
                nuevaVentana = window.open('' + Url + '', '' + NombreVentana + '', 'width=' + largo + ',height=' + altura + ',top=' + top + ',left=' + izquierda + ',features=' + adicionales + '' + ',status=yes, scrollbars=yes, resize=yes, menubar=no');
                nuevaVentana.focus();
            }
            // In your Javascript (external .js resource or <script> tag)
            $(document).ready(function () {
                $('.js-example-basic-single').select2();
            });

            function handleSelectChange() {
                var select = document.getElementById('cmbtipocobro');
                var efectivoBtn = document.getElementById('btn-efectivo');
                var chequeBtn = document.getElementById('btn-cheque');
                var tarjetaBtn = document.getElementById('btn-tarjetas');

                // Obtener el valor seleccionado
                var selectedValue = select.value;

                // Desactivar todos los botones
                efectivoBtn.disabled = true;
                chequeBtn.disabled = true;
                tarjetaBtn.disabled = true;

                // Activar el botón correspondiente según la opción seleccionada
                if (selectedValue === '1') {
                    efectivoBtn.disabled = false;
                } else if (selectedValue === '2') {
                    chequeBtn.disabled = false;
                } else if (selectedValue === '3') {
                    tarjetaBtn.disabled = false;
                }
            }
            function enviar() {
                // Obtener el valor del campo de entrada
                var precio = document.getElementById('txtcantidad').value;

                // Construir la URL con el valor de vmonto
                var url = "cobranza_abm.php?efectivo=efectivo&vcod=<?php echo $idped; ?>&vmonto=" + precio;
                console.log("URL:", url);
                // Redirigir a la nueva URL
                window.location.href(url);
            }

        </script>
    </head>

    <body id="page-top" class="bg-gray-100" onLoad="getTime()">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->

            <!-- Sidebar - Brand -->
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                <form action="cobranza_abm.php" enctype="multipart/form-data" method="POST" role="form">
                    <!-- Page Heading -->
                    <!--<h1 class="h3 mb-1 text-gray-800">DATOS DE PEDIDO</h1>-->
                    <!--<p class="mb-4">Bootstrap's default utility classes can be found on the official <a href="https://getbootstrap.com/docs">Bootstrap Documentation</a> page. The custom utilities below were created to extend this theme past the default utility classes built into Bootstrap's framework.</p>-->

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-4">

                            <div class="card position-relative">
                                <div class="card-header py-3 bg-info">
                                    <h6 class="m-0 font-weight-bold text-white"><span class="fa fa-archive"></span> DATOS DE COBRANZA</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <code></code>

                                    </div>



                                    <div class="form-group">
                                        <div class="col-lg-8">
                                            <label><span><i class=""></i>Cliente:</span></label>
                                            <select class=" form-control" required="" name="txtclientes">
                                                <option value="">Seleccione:</option>
                                                <?php
                                                $prove = db_query("select * from clientes order by idclientes");
                                                while ($fila = mysqli_fetch_array($prove)) {
                                                    $clientes = $fila[0];
                                                    if ($idProv == $clientes) {
                                                        $vprov = "selected";
                                                    } else {
                                                        $vprov = "";
                                                    }
                                                    ?>

                                                    <option <?= $vprov ?> value="<?php echo $fila[0]; ?>"> <?php echo $fila[1]; ?></option>

                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i>Sucursal:</span></label>

                                            <input type="hidden" name="txtidsucursal" value="<?= $idSuc ?>" id="ids" class="form-control">
                                            <input type="text" name="txtsucursal" id="sucu" value="<?= $sucur ?>" class="form-control" readonly="">
                                        </div>  
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i>Fecha de Venta:</span></label>

                                            <input type="text" id="fecharegistro" class="form-control" readonly="">
                                        </div>  
                                    </div>                                    
                                    <!--<button data-toggle="" data-target="" class="btn btn-warning"><i class="fa fa-window-restore"></i></button>-->
                                </div>  
                            </div>

                        </div>

                        <!--<div></div>-->

                        <!--FIN-->


                        <div class="col-lg-8">

                            <div class="card position-relative ">
                                <div class="card-header py-3 bg-info">
                                    <h6 class="m-0 font-weight-bold text-white"><span class="fa fa-archive"></span> DETALLE COBRANZAS</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <code>
                                            <?php
                                            if (isset($_SESSION['error_message'])) {
                                                //echo "<span class='alert alert-danger'>" . $_SESSION['error_message'] . "</span>";
                                                echo '<div class = "alert alert-danger alert-dismissible fade show" role = "alert">'
                                                . $_SESSION['error_message'] . '
                                                    <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">
                                                <span aria-hidden = "true">&times;
                                                </span>
                                                </button>
                                                </div>';
                                                unset($_SESSION['error_message']);
                                            }
                                            ?>
                                        </code>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Nº de Factura:</span></label>

                                                <input type="hidden" name="txtidventas" value="<?= $idventas ?>" autofocus="" class="form-control" required="">  
                                                <input type="text" name="txtfact" value="<?= $nrofact ?>" autofocus="" class="form-control" required="">  
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Tipo de Cobro:</span></label>

                                                <select class="form-control" required="" id="cmbtipocobro" name="cmbtipocobro" onchange="handleSelectChange()">
                                                    <option value="">Seleccione:</option>
                                                    <?php
                                                    $prove = db_query("select * from forma_cobro order by for_cob_id");
                                                    while ($fila = mysqli_fetch_array($prove)) {
                                                        $cobro = $fila[0];
                                                        if ($idfor == $cobro) {
                                                            $vprov = "selected";
                                                        } else {
                                                            $vprov = "";
                                                        }
                                                        ?>

                                                        <option <?= $vprov ?> value="<?php echo $fila[0]; ?>"> <?php echo $fila[1]; ?></option>

                                                    <?php } ?>
                                                </select>                                            
                                            </div>
                                        </div>



                                                    <input type="hidden" name="txtid" value="" id="idpro" class="form-control" readonly="">  
<!--                                                </div>
                                            </div>-->
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label><span><i class=""></i>Eliga Cuenta A Cobrar:</span></label>

                                                    <input type="text" name="txtmateriaprima" id="descripcion" class="form-control">
                                                    <small><span class="symbol required">Haga clic en el icono para buscar...</span></span> </small>

                                                    <a href="javascript:AbrirCentrado('../buscadores/buscar_ctacobrar.php?vcod=<?php echo $idventas ?>','articulo','850','350','');">
                                                        <img src="../Imagenes/anadir.png" border="0" alt="Buscar" />
                                                    </a>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label><span><i class=""></i>Estado:</span></label>

                                                    <input type="text" name="txtprecio" id="precioc" value="" class="form-control" readonly="">    
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label><span><i class=""></i>Monto:</span></label>

                                                    <input type="number" name="txtcantidad" value="" id="txtcantidad" onkeyup="validaciones();" id="" class="form-control">    
                                                </div>
                                            </div>


                                            <input type="hidden" name="txtimpuesto" value=""> 

                                            <!--</div>-->
                                            </div>
                                            <hr class="divider">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered dt-responsive nowrap" id="carrito">
                                                            <thead>
                                                                <tr>
                                                                    <th><div align="center">Acción</div></th>
                                                                    <th><div align="center">Codigo</div></th>
                                                                    <th><div align="center">Forma de Cobro</div></th>
                                                                    <th><div align="center">Monto a Pagar</div></th>
                                                                    <th><div align="center">Monto a Cobrar</div></th>
                                                                    <th><div align="center">Vuelto</div></th>
                                                                    <

                                                                </tr></thead>
                                                            <?php
                                                            $consul = db_query("select * from vs_detcobranzas where cob_id=$idped");
                                                          
                                                            ?>
                                                            <tbody>
                                                                <?php while ($mostrardatos = mysqli_fetch_array($consul)) { ?>
                                                                    <tr>
                                                                        <td><div align="center"><a href="cobranza_abm.php?delete=delete&id=<?php echo $mostrardatos[1] . "&id2=$mostrardatos[0]" ?>"><i class="entypo-trash"></i>Borrar</a></div></td>
                                                                        <!--<td><div align="center"><?php //echo $mostrardatos[1]                                       ?></div></td>-->
                                                                        <td><div align="center"><?php echo $mostrardatos[1] ?></div></td>
                                                                        <td><div align="center"><?php echo $mostrardatos[2] ?></div></td> 
                                                                        <td><div align="center"><?php echo number_format($mostrardatos[3], 0, ',', '.') ?></div></td> 
                                                                        <td><div align="center"><?php echo $mostrardatos[4] ?></div></td> 
                                                                       
                                                                        <td><div align="center"><?php echo $mostrardatos[5] ?></div></td> 
                                                                       
                                                                      
                                                                        

                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>

                                                        </table>
                                                        <div id="mensaje"></div>

                                                    </div>
                                                </div>
                                                <table class='table dt-responsive ' id="carritototal">

                                                    <tr>
                                                       
                                                    </tr>
                                                </table>


                                            </div>

                                            <div class="modal-footer"> 

                                                <div align="right"><button type="submit" name="agregar" value="agregar" data_toggle="modal" data_target="#registra" id="AgregaProductoVentas" class="btn btn-success" onclick="retornar();"> AGREGAR</button>
                                                    
                                                    <input type="submit" name="cheque" id="btn-cheque" class="btn btn-primary glyphicon glyphicon-check" value="CHEQUE">
                                                    <input type="submit" name="tarjeta" id="btn-tarjetas" class="btn btn-warning glyphicon glyphicon-check" value="TARJETA">
                                                    <input type="submit" name="efectivo" id="btn-tarjetas" class="btn btn-warning glyphicon glyphicon-check" value="EFECTIVO">
                                                            
                                                    <button class="btn btn-danger" type="reset"><span class="fa fa-times"></span> CANCELAR</button> 
                                                    <button type="button" name="imprimir" id="btn-submit" class="btn btn-primary" onclick="location.href = 'compra_abm.php?imprimir=imprimir&vcod=<?php echo $idped; ?>'"><span class="fa fa-save"></span> IMPRIMIR</button> 
                                                </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                            <!-- /.container-fluid -->

                        </div>
                    </div>


                    <div class="modal fade" id="registra" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title custom_align" id="heading"> INSERCIÓN EXITOSA!!! </h4>
                                </div>
                                <div class="modal-body">
                                    <span class="fa fa-check">OK</span>
                                    <a class="btn btn-info" href="pedido_agregar.php">ACEPTAR</a>
                                </div>
                            </div>
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
        <!--                    <script>
                                            function retornar{
                                                $('#mensaje').fadeIn(3000, 'pedido_agregar.php');
        
                                            }
                    </script>-->

                    </body>

                    </html>


