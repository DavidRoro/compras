<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Busqueda Orden</title>
        <link href="../menu/css/sb-admin-2.min.css" rel="stylesheet">

    </head>
    <script>
        function retornar(id, car, id2, pai, pai2) {
            if (!window.opener.closed) {
                window.opener.document.forms[0].txtid.value = id;
                window.opener.document.forms[0].txtmateriaprima.value = car;
                window.opener.document.forms[0].txtcantidad.value = id2;
                window.opener.document.forms[0].txtprecio.value = pai;
                window.opener.document.forms[0].txtimpuesto.value = pai2;
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
                td = tr[i].getElementsByTagName("td")[1];
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
                <h1>Busqueda Materia prima</h1>
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
                $vpresu = $_REQUEST['vcod'];

                $datos = db_query("SELECT * FROM det_ordencompra,materia_prima WHERE det_ordencompra.mat_id=materia_prima.mat_id and ord_id=$vpresu");
                ?>

                <!--b-->
                
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="myTable" width="100%" cellspacing="0">
                            <thead align="center" class="bg-success">
                                <tr>
                                    <th>ID</th>
                                    <th>DESCRIPCION</th>
                                    <th>PRECIO</th>
                                    <th>IMPUESTO</th>
                                    <th>CANTIDAD</th>
                                    <th>ACCIONES</th>

                                </tr>
                            </thead>

                            <?php
                            while ($fila = mysqli_fetch_array($datos)) {
                                ?>
                                <tbody align="center">
                                    <tr>
                                        <td><?php echo $fila[1]; ?></td>
                                        <td><?php echo $fila[6]; ?></td>
                                        <td><?php echo $fila[3]; ?></td>
                                        <td><?php echo $fila[9]; ?></td>
                                        <td><?php echo $fila[2]; ?></td>
                                        <td>
                                            <?php
                                            echo "<a href=\"javascript:retornar(" . $fila[1] . ",'" . trim($fila[6]) . "'," . $fila[2] . "," . $fila[3] . "," . $fila[9] . ");\"> " .
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
