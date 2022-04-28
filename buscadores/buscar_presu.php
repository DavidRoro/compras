<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Busqueda Pedido</title>
        <link href="../menu/css/sb-admin-2.min.css" rel="stylesheet">

    </head>
    <script>
        function retornar(id, id2, pai) {
            if (!window.opener.closed) {
                window.opener.document.forms[0].txtidpresu.value = id;
//                window.opener.document.forms[0].txtfecha.value = car;
                window.opener.document.forms[0].txtidproveedor.value = id2;
                window.opener.document.forms[0].txtproveedor.value = pai;
//                window.opener.document.forms[0].txtimpuesto.value = pai2;
                window.opener.focus();
                window.close();
            }
        }
        function myFunction() {
            // Declare variables 
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("th")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

    </script>
    <body>
        <div class="container">
            <div class="card-body">
            <center>
                <h1>Busqueda Presupuesto</h1>
                <hr class="divider">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="form-group">
                            <!--<label><span><i class=""></i>Buscar:</span></label>-->
                            <input  type="text" class="form-control" id="myInput" onkeyup="myFunction()" placeholder="Ingrese Descripción">  
                        </div>
                    </div>
                </div>

                <!--                <br>
                                <br>-->
                <?php
                include '../clases/conexion.php';
//                $vpresu = $_REQUEST['vcod'];

                $datos = db_query("SELECT * FROM presupuesto,proveedor where presupuesto.prv_id=proveedor.prv_id and pre_estado='GENERADO'");
                ?>

                <!--b-->
                
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead align="center" class="bg-success">
                                <tr>
                                    <th>ID</th>
                                    <!--<th>FECHA</th>-->
                                    <th>ID PROVEEDOR</th>
                                    <!--<th>IMPUESTO</th>-->
                                    <th>RAZON SOCIAL</th>
                                    <th>ACCIONES</th>

                                </tr>
                            </thead>

                            <?php
                            while ($fila = mysqli_fetch_array($datos)) {
                                ?>
                                <tbody align="center">
                                    <tr>
                                        <td><?php echo $fila[0]; ?></td>
                                        <!--<td><?php // echo $fila[1]; ?></td>-->
                                        <!--<td><?php // echo $fila[5]; ?></td>-->
                                        <td><?php echo $fila[8]; ?></td>
                                        <td><?php echo $fila[9]; ?></td>
                                        <td>
                                            <?php
                                            echo "<a href=\"javascript:retornar(" . $fila[0] .  "," . $fila[8] . ",'" . $fila[9] . "');\"> " .
                                            "<img src='../Imagenes/positivo.png' border='0'> " . "</a>";
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>

            </center>
        </div>
    </body>
</html>
