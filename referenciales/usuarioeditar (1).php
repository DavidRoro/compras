<?php
//
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
        <title>Editar Usuario</title>
        <link rel="stylesheet" href="../css/bootstrap1.min.css">
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>  
        <script src="../js/buscador_empl.js"></script>
        <script src="../js/buscador_suc.js"></script>
        <style>
            body{
                font-family: Times new Roman;
            }
            hr{
                background-color: lightgreen;
                border-width: 3px;
            }
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
        </style>
    </head>
    <body class="bg-light">
        <?php
//        include '../menu/menu.php';
        require ('../clases/conexion.php');
        $vcod = $_GET['vcod'];
        $datos = select_id("vs_usuario", "usu_id", $vcod);

        $cod = $fila->usu_id;
        $login = $fila->usu_login;
        $pass = $fila->usu_pass;
        $rol = $fila->usu_rol;
        $estado = $fila->usu_estado;
        $intento = $fila->usu_intento;
        $per = $fila->per_id;
        $per_nombres = $fila->nombre;
        $ci = $fila->per_ci;
        $suc = $fila->suc_id;
        $sucursal = $fila->suc_descri;
        //
        $value10 = 0;
        $value5 = 0;
        $valuee = 0;
        $activo = "";
        $inactivo = "";
        $bloqueado = "";
        switch ($rol) {
            case 'ADMINISTRADOR':
                $value10 = "selected";
                break;
            case 'ENCARGADO DE COMPRAS':
                $value5 = "selected";
                break;
            case 'SUPERVISOR':
                $valuee = "selected";
                break;
        }
        switch ($estado) {
            case 'ACTIVO':
                $activo = "selected";
                break;
            case 'INACTIVO':
                $inactivo = "selected";
                break;
            case 'BLOQUEADO':
                $bloqueado = "selected";
                break;
        }
        ?>
        <div id="actualizo"></div>
        <div class="container">
            <div class="modal-body">
                <h2>Editar Usuario</h2>
                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Codigo:</label>
                                <input type="text" class="form-control" id="recipient-name" value='<?php echo $cod; ?> ' name="cod" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nombre de Usuario:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $login; ?> ' name="txtusu" required="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Contraseña:</label>
                                <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="recipient-name" value='<?php echo $pass; ?> ' name="txtpass" required="">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">ROL:</label>
                                <select class="form-control" id="country" name="cmbrol" required>
                                    <option <?= $value10 ?> value="ADMINISTRADOR">ADMINISTRADOR</option>
                                    <option <?= $value5 ?> value="ENCARGADO DE COMPRAS">ENCARGADO DE COMPRAS</option>
                                    <option <?= $valuee ?> value="SUPERVISOR">SUPERVISOR</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" name="cmbestado" class="col-form-label">Estado:</label>
                                <select class="form-control" id="country" name="cmbestado" required>
                                    <option <?= $activo ?> value="ACTIVO">ACTIVO</option>
                                    <option <?= $inactivo ?> value="INACTIVO">INACTIVO</option>
                                    <option <?= $bloqueado ?> value="BLOQUEADO">BLOQUEADO</option>
                                </select>
                            </div>
                            <!--n-->
                            <!--<div class="col-sm-2">-->

                            <!--</div>--> 
                            <!--v-->
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Personal:</label>
                                    <input class="form-control"  type="hidden" name="txtidpersonal" id="cod" autocomplete="off" placeholder="Ingrese precio" value="<?php echo $per; ?>" required="" autofocus=""> 
                                    <input class="form-control" pattern="^[A-Za-z\s]+{2,254}"  type="number" name="txtci" id="ci" onKeyUp="this.value = this.value.toUpperCase();" autocomplete="off" placeholder="Ingrese C.I" value="" required="" autofocus="">

                                </div>
                                    
                                <div class="form-group">                                
                                    <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="nombres" value='<?php echo $per_nombres ?> ' name="txtpersonal" required="">
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Sucursal:</label>

                                    <input class="form-control"  type="hidden" name="txtidsucursal" id="ids" autocomplete="off" placeholder="" value="<?php echo $suc; ?>" required=""> 

                                    <input type="text" class="form-control" onKeyUp="this.value = this.value.toUpperCase();" id="sucu" value='<?php echo $sucursal; ?> ' name="txtsucursal" required="">
                                </div>

                                <input type = "reset" class="btn btn-success btn-sm" value = "LIMPIAR CAMPOS" /> 
                                <input type = "submit" name="actualizar" onclick="actualizar();" class="btn btn-primary btn-sm" value = "GUARDAR" /> 
                                <?php
                                if (isset($_POST['actualizar'])) {
//                                $field = array("usu_login" => $_POST['txtusu'],
//                                    "usu_pass" => md5($_POST['txtpass']),
//                                    "usu_rol" => $_POST['cmbrol'],
//                                    "usu_estado" => $_POST['cmbestado'],
//                                    "usu_intento" => 0,
//                                    "per_id" => $_POST['txtidpersonal'],
//                                    "suc_id" => $_POST['txtidsucursal']);
//                                $tabla = "sucursal";
//                                edit($tabla, $field, "suc_id", $vcod);
                                    $usu = $_POST['txtusu'];
                                    $pass = $_POST['txtpass'];
                                    $roles = $_POST['cmbrol'];
                                    $estados = $_POST['cmbestado'];
                                    $per = $_POST['txtidpersonal'];
                                    $sucu = $_POST['txtidsucursal'];
                                    $insert = db_query("call sp_update('$usu','$pass','$roles','$estados',0,$per,$sucu,$cod)");
                                    echo '<div class="alert alert-success" id="mensaje" role="alert">DATOS ACTUALIZADOS<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//                                header("location:proveedorlistado.php");
                                }
//                            else {
//                                echo '<div class="alert alert-success" role="alert">ERROR AL ACTUALIZAR<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
//                            }
//        include './sucursalistado.php';
                                ?>
                        </form>

                    </div> 
                </div>
            </div>
        </div>
    <!--</div>-->
    <!--<script src="../js/jquery-3.5.1.min.js"></script>-->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script>
                            $("#mensaje").delay(4000).slideUp(200, function () {
                                ($this).alert('close');
                            });

//                                function actualizar() {
//                                    $('#actualizo').load('./sucursalistado.php');
//
//                                }
//                                $('mostrar').ready(function () {
//
//                                })

    </script>

</body>
</html>
