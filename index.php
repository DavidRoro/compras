<?php
session_start();
include './clases/navegador.php';
//if ($_SESSION) {
//    session_destroy(); 
//}
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
        <title>Acceso</title>
        <meta name="viewport" content="width= device-width, initial-scale=1"/>
        <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body{
            	background: lightgreen;
                padding-top: 40px;
                padding-bottom: 40px;
            }
            .login{
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }
            #sha{
                max-width: 340px;
                -webkit-box-shadow: 0px 0px 18px 0px rgba(48, 50, 50, 0.48);
                -mos-box-shadow: 0px 0px 18px 0px rgba(48, 50, 50, 0.48);
                box-shadow: 0px 0px 18px 0px rgba(48, 50, 50, 0.48);
                border-radius: 6%;
            }
            #avatar{
            	width: 96px;
            	height: 96px;
            	margin: 0px auto 10px;
            	display: block;
            	border-radius: 50%;
            }
        </style>
    </head>
    <body>
        <div class="container well" id="sha">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <img src="Imagenes/usuario_1.png" class="img-responsive" id="avatar">
                    
                </div>
            </div>
            <form method="post" action="acceso.php" class="login">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="usuario" required="" autofocus="" placeholder="Ingrese su usuario"/>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                    
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="clave" required=""  placeholder="Ingrese su contraseña"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <button class="btn btn-lg btn-success btn-block" type="submit">
                    Inicie Sesión
                </button>
                <?php if (!empty($_SESSION['error'])) {?>
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign"></span>
                <?php echo $_SESSION['error'];?>    
                </div>
                <?php }?>
            </form>
                
        </div>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery-1.12.2.min.js"></script>
    </body>
</html>
