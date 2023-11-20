<?php
require('../clases/conexion.php');
require('../sesiones.php');
$consulta = db_query("SELECT * FROM vs_notaremisionventa where remv_estado='PENDIENTE' and usu_id=$idUsu");
if (mysqli_num_rows($consulta) > 0) {
    $tomar = mysqli_fetch_array($consulta);
    $idped = $tomar[0];
//    $fecha = $tomar[1];
    $fechainicio = $tomar[2];
    $fechafin = $tomar[3];
    $motivoremi = $tomar[4];
    $per = $tomar[7];
    $veh = $tomar[5];
    $cli = $tomar[9];

//    $idorden = "";
//    $idProv = "";
//    $Prov = "";
    $venta = "";
    $trasladore = "";
//    $exportacion = "";
//    $venta = "";
//    $importacion = "";
//    $consignacion = "";
//    $transformacion = "";
//    $reparacion = "";
//    $emisor = "";
//    $exhibicion = "";
    switch ($motivoremi) {
        case "VENTA":
            $compra = "selected";
            break;
        case "TRASLADO":
            $trasladore = "selected";
            break;

    }
    $datostraslado = db_query("select * from remi_traslado where rem_id=$idped");
    if ($fila = mysqli_fetch_array($datostraslado)) {
        $traslados = $fila[1];
    } else {
        $traslados = 0;
    }
    
    ///////////////////////////
    $datoscomp = db_query("select * from vs_ventas where ventas_estado='NO UTILIZADO' OR ventas_estado='GENERADO' and  usu_id=$idUsu");
    if ($fila = mysqli_fetch_array($datoscomp)) {
        $ventita = $fila[0];
        $factnro = $fila[3];
        $cli = $fila[10];
//        $ruc = $fila[11];
    } else {
        $factnro = "";
        $cli="";
//        $ruc="";
    }
    //////////////////////////
    
    $datoscomp = db_query("select * from ventas where ventas_estado='GENERADO' and  usu_id=$idUsu");
    if ($fila = mysqli_fetch_array($datoscomp)) {
        $ventita = $fila[0];
        $factnro = $fila[3];
    } else {
        $factnro = "NO DISPONIBLE";
    }
    $datos3= db_query("select * from remi_venta where idnotaremisionventa=$idped");
    if ($fila = mysqli_fetch_array($datos3)) {
        $ventita = $fila[1];
    }
    //echo "ya tenemos el ultimo ID que es:" . $compritas;
} else {
    $datoscomp = db_query("select * from vs_ventas where ventas_estado='NO UTILIZADO' OR ventas_estado='GENERADO' and  usu_id=$idUsu");
    if ($fila = mysqli_fetch_array($datoscomp)) {
        $ventita = $fila[0];
        $factnro = $fila[3];
        $cli = $fila[10];
//        $ruc = $fila[11];
    } else {
        $factnro = "";
        $cli="";
//        $ruc="";
    }
//    $datosorden = db_query("select * from vs_ where usu_id=$idUsu and ord_estado='GENERADO'");
//    if ($fila = mysqli_fetch_array($datosorden)) {
//        $idorden = $fila[0];
//        $idProv = $fila[3];
//        $Prov = $fila[4];
//    }
    $idped = 0;
    $compra = "";
    $trasladore = "";
    $exportacion = "";
    $venta = "";
    $importacion = "";
    $consignacion = "";
    $transformacion = "";
    $reparacion = "";
    $emisor = "";
    $exhibicion = "";

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
        <script src="../js/buscador_suc.js"></script>
        <script src="../js/buscador_nrofact.js"></script>
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
                <form action="notaremisionventa_abm.php" enctype="multipart/form-data" method="POST" role="form">
                    <!-- Page Heading -->
                    <!--<h1 class="h3 mb-1 text-gray-800">DATOS DE PEDIDO</h1>-->
                    <!--<p class="mb-4">Bootstrap's default utility classes can be found on the official <a href="https://getbootstrap.com/docs">Bootstrap Documentation</a> page. The custom utilities below were created to extend this theme past the default utility classes built into Bootstrap's framework.</p>-->

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-4">

                            <div class="card position-relative">
                                <div class="card-header py-3 bg-info">
                                    <h6 class="m-0 font-weight-bold text-white"><span class="fa fa-archive"></span> DATOS DE NOTA DE REMISION</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <code></code>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i>Fecha Inicio:</span></label>
                                            <input type="date" name="txtinicio" value="<?= $fechainicio ?>" class="form-control" required="">

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i>Fecha Fin:</span></label>
                                            <input type="date" name="txtfin" value="<?= $fechafin ?>" class="form-control" required="">

                                        </div>

                                    </div>


                                    <!--                                    <div class="form-group">
                                                                            <div class="col-lg-9">
                                                                                <label><span><i class=""></i>Sucursal Traslado:</span></label>
                                                                                <input type="hidden" name="txtidsuctraslado" value="<?//= $traslados ?>" id="ids" class="form-control">
                                                                                <input type="text" name="txtsucu" id="sucu" value="" class="form-control">
                                    
                                                                            </div>
                                                                        </div>
                                    -->

                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i>Sucursal:</span></label>

                                            <input type="hidden" name="txtidsucursal" value="<?= $idSuc ?>"  class="form-control">
                                            <input type="text" name="txtsucursal"  value="<?= $sucur ?>" class="form-control" readonly="">
                                        </div>  
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-9">
                                            <label><span><i class=""></i>Fecha de Nota:</span></label>

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
                                    <h6 class="m-0 font-weight-bold text-white"><span class="fa fa-archive"></span> DETALLE NOTA DE REMISION</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <code>
                                            <div id="x">
                                                <div class="alert alert-danger">SELECCIONE OTRA OPCION</div>
                                            </div>
<!--                                            <div id="insertar">
                                                <div class="alert alert-success">INSERTO EXITOSAMENTE</div>
                                            </div>-->
                                        </code>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Motivo:</span></label>

                                                <select class="form-control" id="motivo" required="" name="cmbmotivo" onchange="tipomotivo()">  
                                                    <option  value="">SELECCIONE:</option>
                                                    <option <?= $venta ?> value="VENTA">VENTA</option>
                                                    <option <?= $trasladore ?> value="TRASLADO">TRASLADO</option>
                                                </select>                                            
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Nº de Factura:</span></label>
                                                <input class="form-control" value="<?= $factnro ?>" type="text" name="txtcompra" id="idfactura">
                                                <input class="form-control" value="<?= $ventita ?>" type="hidden" id="txtidcompra" name="txtidcompra">

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><span><i class=""></i>CLIENTE:</span></label>
                                                <!--<input class="form-control" value="<?//= $factnro ?>" type="text" name="txtcompra" id="idfactura">-->
                                                <input class="form-control" value="<?=$cli?>" type="text" id="prov" name="prov" readonly="">

                                            </div>
                                        </div>
<!--                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><span><i class=""></i>RUC:</span></label>
                                                <input class="form-control" value="<?//= $factnro ?>" type="text" name="txtcompra" id="idfactura">
                                                <input class="form-control" value="<?=$ruc?>" type="text" id="ruc" name="ruc" readonly="">

                                            </div>
                                        </div>-->

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Vehiculo:</span></label>
                                                <select class="form-control" required="" name="cmbvehiculo" >

                                                    <option value="">SELECCIONE:</option>
                                                    <?php
                                                    $mot = select_datos("vehiculo", "veh_id");
                                                    while ($fila = mysqli_fetch_array($mot)) {
                                                        $vehi = $fila[0];
                                                        if ($veh == $vehi) {
                                                            $vvehic = "selected";
                                                        } else {
                                                            $vvehic = "";
                                                        }
                                                        ?>
                                                        <option <?= $vvehic ?> value="<?php echo $fila[0]; ?>"><span class="fa fa-check"></span><?php echo $fila[1] . "- " . $fila[2]; ?></option>
                                                    <?php } ?>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Personal:</span></label>
                                                <select class="form-control" required="" name="cmbpersonal" >

                                                    <option value="">SELECCIONE:</option>
                                                    <?php
                                                    $mot = select_datos("personal", "per_id");
                                                    while ($fila = mysqli_fetch_array($mot)) {
                                                        $personal = $fila[0];
                                                        if ($per == $personal) {
                                                            $vpersonal = "selected";
                                                        } else {
                                                            $vpersonal = "";
                                                        }
                                                        ?>
                                                        <option <?= $vpersonal ?> value="<?php echo $fila[0]; ?>"><span class="fa fa-check"></span><?php echo $fila[1] . " " . $fila[2]; ?></option>
                                                    <?php } ?>

                                                </select>

                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label><span><i class=""></i>Sucursal traslado:</span></label>
                                                <input type="hidden" name="txtidsuctraslado" value="<?= $traslados ?>" id="ids" class="form-control">
                                                <input type="text" name="txtsucu" id="sucu" value="" class="form-control">  
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
                                                <label><span><i class=""></i>Productos:</span></label>

                                                <input type="text" name="txtmateriaprima" id="descripcion" class="form-control" readonly="">
                                                <small><span class="symbol required">Haga clic en el icono para buscar...</span></span> </small>
                                                <?php // $valueped=$_POST['txtidpedido'];    ?>
                                                <a id="materia" href="javascript:AbrirCentrado('../buscadores/buscar_materia.php','articulo','850','350','');">
                                                    <img  src="../Imagenes/anadir.png" border="0" alt="Buscar" />
                                                </a>

                                                <a id="comprita" href="javascript:AbrirCentrado('../buscadores/buscar_stock.php?vcod=<?= $comprita ?>','articulo','850','350','');">
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
                                                            <th><div align="center">Descripcion</div></th>
                                                            <th><div align="center">Cantidad</div></th>

                                                        </tr></thead>
                                                    <?php
                                                    $consul = db_query("select * from vs_detnotaremisionventa where idnotaremisionventa=$idped");

                                                    ?>
                                                    <tbody>
                                                        <?php while ($mostrardatos = mysqli_fetch_array($consul)) { ?>
                                                            <tr>
                                                                <td><div align="center"><a href="notaremisionventa_abm.php?delete=delete&id=<?php echo $mostrardatos[1] . "&id2=$mostrardatos[0]" . "&id3=$idSuc&id4=$traslados&vcanti=$mostrardatos[3]" ?>"><i class="entypo-trash"></i>Borrar</a></div></td>
                                                                <!--<td><div align="center"><?php //echo $mostrardatos[1]                                                       ?></div></td>-->
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
                                        <button disabled="" id="traslado" type="submit" name="traslado" id="btn-submit" class="btn btn-secondary btn-sm" value="traslado"><span class="fa fa-car"></span> ENVIO</button> 
                                        <button disabled="" id="ccompra" type="submit" name="compra" class="btn btn-info btn-sm" value="compra"><span class="fa fa-check-square"></span> RECIBIR</button> 
<!--                                        <input type="submit" name="compra" id="btn-submit" class="btn btn-success btn-sm glyphicon glyphicon-check" value="compra">-->
                                        <button class="btn btn-warning btn-sm" type="button" onclick="location.href = 'notaremisionlistado.php'"><span class="fa fa-window-restore"></span> VOLVER</button> 
                                        <button class="btn btn-danger btn-sm" type="reset"><span class="fa fa-times"></span> CANCELAR</button> 
                                        <button type="button" name="imprimir" id="btn-submit" class="btn btn-primary btn-sm" onclick="location.href = 'notaremision_abm.php?imprimir=imprimir&vcod=<?php echo $idped; ?>'"><span class="fa fa-save"></span> IMPRIMIR</button> 

                                        <div align="right"><button type="submit" id="agregar" name="agregar" value="agregar" data_toggle="modal" data_target="#registra" id="AgregaProductoVentas" class="btn btn-success btn-sm" onclick="retornar();"><span class="fa fa-check"></span> REGISTRAR</button>
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
                    <script>
                                            $('#x').hide();
                                            $('#insertar').hide();
                                            $('#materia').show();
                                            $('#materia').hide();
                                            $('#comprita').hide();
                                            $('#sucu').prop("disabled", true);
                                            $('#idfactura').prop("disabled", true);
                                            if ($('#motivo').val() == "COMPRA") {
                                                    $('#materia').hide();
                                                    $('#comprita').show();
                                                    $('#cantidad').prop("readonly", true);
                                                    $('#sucu').prop("disabled", true);
                                                    $('#ccompra').prop("disabled", false);
                                                    $('#traslado').prop("disabled", true);
                                                    $('#idfactura').prop("disabled", false);
                                                    $('#x').hide();
                                                }
                                                
                                                
                                               
                                                if ($('#motivo').val() == "TRASLADO") {

                                                    $('#materia').show();
                                                    $('#comprita').hide();
                                                    $('#sucu').prop("disabled", false);
                                                    $('#cantidad').prop("readonly", false);
                                                    $('#traslado').prop("disabled", false);
                                                    $('#ccompra').prop("disabled", true);
                                                    $('#idfactura').prop("disabled", true);

                                                }
                                                

                                            function tipomotivo() {

                                                if ($('#motivo').val() == "COMPRA") {
                                                    $('#materia').hide();
                                                    $('#comprita').show();
                                                    $('#cantidad').prop("readonly", true);
                                                    $('#sucu').prop("disabled", true);
                                                    $('#ccompra').prop("disabled", false);
                                                    $('#traslado').prop("disabled", true);
                                                    $('#idfactura').prop("disabled", false);

                                                }
                                                if ($('#motivo').val() == "TRASLADO") {

                                                    $('#materia').show();
                                                    $('#comprita').hide();
                                                    $('#sucu').prop("disabled", false);
                                                    $('#cantidad').prop("readonly", false);
                                                    $('#traslado').prop("disabled", false);
                                                    $('#ccompra').prop("disabled", true);
                                                    $('#idfactura').prop("disabled", true);

                                                }
                                                if ($('#motivo').val() == "") {
                                                    $('#x').delay(3000).slideUp(200, function () {
                                                        $(this).alert('close');
                                                    });
                                                    $('#x').show();
                                                    $('#ccompra').prop("disabled", true);
                                                    $('#idfactura').prop("disabled", true);
                                                }
//                                                $('#traslado').prop("disabled", true);
//                                                $('#ccompra').prop("disabled", true);
//                                                $('#idfactura').prop("disabled", true);
//                                                $('#sucu').prop("disabled", true);
                                            }

                    </script>

                    </body>

                    </html>
