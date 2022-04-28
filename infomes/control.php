<?php
                    if (isset($_POST['va'])) {
                        $ref = $_POST['ref'];
                        switch ($ref) {
                            case 0:
                                echo '<div class="alert alert-success" id="mensaje" role="alert">NO HA SELECCIONADO NINGUNA OPCION<span class="glyphicon glyphicon-exclamation-sign"></span></div>';
                                break;
                            case 1:
                                header("location:../informes/clasif.php");
                                break;
                            case 2:
                                header("location:mat_prima.php");
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
                    