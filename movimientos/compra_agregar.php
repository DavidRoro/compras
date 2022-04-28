<?php
require('../clases/conexion.php');
require('../sesiones.php');
$consulta = db_query("SELECT * FROM vs_compra where com_estado='PENDIENTE' and usu_id=$idUsu");
if (mysqli_num_rows($consulta) > 0) {
    $tomar = mysqli_fetch_array($consulta);
    $idped = $tomar[0];
    $nrofact = $tomar[2];
    $tipoFact = $tomar[3];
    $cuotas = $tomar[4];
    $intervalo = $tomar[5];
    $idorden= $tomar[8];
    $idProv = $tomar[9];
    $Prov = $tomar[10];
    $credito="";
    $contado="";
    switch ($tipoFact){
        case "CREDITO":
                $credito = "selected";
                break;
            case "CONTADO":
                $contado = "selected";
                break;
    }
    
//    echo "ya tenemos el ultimo ID que es:" . $ultID;
} else {
    $datosorden = db_query("select * from vs_orden where usu_id=$idUsu and ord_estado='GENERADO';");
    if ($fila = mysqli_fetch_array($datosorden)) {
        $idorden = $fila[0];
        $idProv = $fila[3];
        $Prov = $fila[4];
    }else{
        $idorden = "SIN ORDEN";
        $Prov="NO DISPONIBLE";
    }
    $idped = 0;
    $nrofact="";
    $cuotas="";
    $intervalo="";
    $credito="";
    $contado="";
    
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
        <!--<script src="../js/buscador_matprima.js"></script>-->
        <!--<script src="../js/buscador_proveedor.js"></script>-->
        <link href="../select2/select2.min.css" rel="stylesheet">
        <script src="../select2/select2.full.min.js"></script>

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
                <form action="compra_abm.php" enctype="multipart/form-data" method="POST" role="form">
                    <!-- Page Heading -->
                    <!--<h1 class="h3 mb-1 text-gray-800">DATOS DE PEDIDO</h1>-->
                    <!--<p class="mb-4">Bootstrap's default utility classes can be found on the official <a href="https://getbootstrap.com/docs">Bootstrap Documentation</a> page. The custom utilities below were created to extend this theme past the default utility classes built into Bootstrap's framework.</p>-->

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-4">

                            <div class="card position-relative">
                                <div class="card-header py-3 bg-success">
                                    <h6 class="m-0 font-weight-bold text-white"><span class="fa fa-archive"></span> DATOS DE COMPRA</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <code></code>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-5">
                                            <label><span><i class=""></i>Orden Nº:</span></label>
                                            <input type="text" name="txtidorden" value="<?= $idorden ?>" id="ids" class="form-control" readonly="">

                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-8">
                                            <label><span><i class=""></i>Proveedor:</span></label>
                                            <input type="hidden" name="txtidproveedor" value="<?= $idProv ?>" id="ids" class="form-control">
                                            <input type="text" name="txtproveedor" id="sucu" value="<?= $Prov ?>" class="form-control" readonly="">

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
                                            <label><span><i class=""></i>Fecha de Compra:</span></label>

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
                                <div class="card-header py-3 bg-success">
                                    <h6 class="m-0 font-weight-bold text-white"><span class="fa fa-archive"></span> DETALLE COMPRA</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <code></code>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Nº de Factura:</span></label>

                                                <input type="text" name="txtfact" value="<?= $nrofact ?>" autofocus="" class="form-control" required="">  
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Tipo de Factura:</span></label>

                                                <select class="form-control" required="" name="cmbtipofact" onchange="if (this.value == 'CONTADO') {
                                                            document.getElementById('intervalo').readonly = true;
                                                            document.getElementById('intervalo').value=0;
                                                            document.getElementById('cuotas').readonly = true;
                                                            document.getElementById('cuotas').value=1;

                                                        } else {
                                                            document.getElementById('intervalo').disabled = false;
                                                            document.getElementById('intervalo').value = '';
                                                            document.getElementById('cuotas').disabled = false;
                                                            document.getElementById('cuotas').focus();
                                                            document.getElementById('cuotas').value = '';

                                                        }">
                                                    <option value="">SELECCIONE:</option>
                                                    <option <?= $credito ?> value="CREDITO">CREDITO</option>
                                                    <option <?= $contado ?> value="CONTADO">CONTADO</option>
                                                </select>                                            
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Cuotas:</span></label>

                                                <input type="number" name="txtcuotas" value="<?= $cuotas ?>" id="cuotas" class="form-control" required="">  
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Intervalo:</span></label>

                                                <input type="number" name="txtintervalo" value="<?= $intervalo ?>" id="intervalo" class="form-control" required="">  
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Codigo:</span></label>

                                                <input type="text" name="txtid" value="" id="idpro" class="form-control" readonly="">  
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Materia Prima:</span></label>

                                                <input type="text" name="txtmateriaprima" id="descripcion" class="form-control" readonly="">
                                                <small><span class="symbol required">Haga clic en el icono para buscar...</span></span> </small>
                                                <?php // $valueped=$_POST['txtidpedido']; ?>
                                                <a href="javascript:AbrirCentrado('../buscadores/buscar_orden.php?vcod=<?php echo $idorden ?>','articulo','850','350','');">
                                                    <img src="../Imagenes/anadir.png" border="0" alt="Buscar" />
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Cantidad:</span></label>

                                                <input type="number" name="txtcantidad" value="" id="cantidad" onkeyup="validaciones();" id="" class="form-control" readonly="">    
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Precio:</span></label>

                                                <input type="number" name="txtprecio" id="precio" value="" onkeyup="validaciones();" id="" class="form-control" readonly="">    
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
                                                            <!--<th><div align="center">Codigo</div></th>-->
                                                            <th><div align="center">Descripcion</div></th>
                                                            <th><div align="center">Cant</div></th>
                                                            <th><div align="center">Precio</div></th>
                                                            <th><div align="center">5%</div></th>
                                                            <th><div align="center">10%</div></th>
                                                            <th><div align="center">Exenta</div></th>
                                                            <th><div align="center">Subtotal</div></th>

                                                        </tr></thead>
                                                    <?php
                                                    $consul = db_query("select * from vs_detcompra where com_id=$idped");
                                                    $iva5 = 0;
                                                    $iva10 = 0;
                                                    $exenta = 0;
                                                    $sumar = 0;
                                                    ?>
                                                    <tbody>
                                                        <?php while ($mostrardatos = mysqli_fetch_array($consul)) { ?>
                                                            <tr>
                                                                <td><div align="center"><a href="compra_abm.php?delete=delete&id=<?php echo $mostrardatos[1] . "&id2=$mostrardatos[0]" ?>"><i class="entypo-trash"></i>Borrar</a></div></td>
                                                                <!--<td><div align="center"><?php //echo $mostrardatos[1]                              ?></div></td>-->
                                                                <td><div align="center"><?php echo $mostrardatos[2] ?></div></td>
                                                                <td><div align="center"><?php echo $mostrardatos[4] ?></div></td> 
                                                                <td><div align="center"><?php echo number_format($mostrardatos[5], 0, ',', '.') ?></div></td> 
                                                                <td><div align="center"><?php echo $mostrardatos[6] ?></div></td> 
                                                                <?php $iva5 += $mostrardatos[6] ?>
                                                                <td><div align="center"><?php echo $mostrardatos[7] ?></div></td> 
                                                                <?php $iva10 += $mostrardatos[7] ?>
                                                                <td><div align="center"><?php echo $mostrardatos[8] ?></div></td> 
                                                                <?php $exenta += $mostrardatos[8] ?>
                                                                <td><div align="center"><?php echo number_format($mostrardatos[9], 0, ',', '.') ?></div></td>
                                                                <?php $sumar += $mostrardatos[9] ?>

                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>

                                                </table>
                                                <div id="mensaje"></div>

                                            </div>
                                        </div>
                                        <table class='table dt-responsive ' id="carritototal">

                                            <tr>
                                                <th><span class="Estilo9"><label>Total:&nbsp;&nbsp;<?= number_format($sumar, 0, ',', '.'); ?></label></span></th>
                                                <th><span class="Estilo9"><label>Total IVA 5:&nbsp;&nbsp;<?= number_format($iva5, 0, ',', '.'); ?></label></span></th>
                                                <th><span class="Estilo9"><label>Total IVA 10:&nbsp;&nbsp;<?= number_format($iva10, 0, ',', '.'); ?></label></span></th>
                                                <th><span class="Estilo9"><label>Total EXENTA:&nbsp;&nbsp;<?= number_format($exenta, 0, ',', '.'); ?></label></span></th>

                                            </tr>
                                        </table>


                                    </div>

                                    <div class="modal-footer"> 
                                        <button class="btn btn-warning" type="button" onclick="location.href = 'compralistado.php'"><span class="fa fa-window-restore"></span> VOLVER</button> 
                                        <button class="btn btn-danger" type="reset"><span class="fa fa-times"></span> CANCELAR</button> 
                                        <button type="button" name="imprimir" id="btn-submit" class="btn btn-primary" onclick="location.href = 'compra_abm.php?imprimir=imprimir&vcod=<?php echo $idped; ?>'"><span class="fa fa-save"></span> IMPRIMIR</button> 
                                        <!--<button type="submit" name="agregar" id="btn-submit" class="btn btn-success"><span class="fa fa-check"></span> REGISTRAR</button>--> 
                                        <!--<input type="submit" name="agregar" id="btn-submit" class="btn btn-success glyphicon glyphicon-check" value="REGISTRAR">-->
                                        <div align="right"><button type="submit" name="agregar" value="agregar" data_toggle="modal" data_target="#registra" id="AgregaProductoVentas" class="btn btn-success" onclick="retornar();"><span class="fa fa-check"></span> REGISTRAR</button>
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
