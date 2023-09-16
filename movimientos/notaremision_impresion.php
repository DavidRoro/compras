<?php

require '../clases/conexion.php';
ob_start();
require '../fpdf/fpdf.php';

$pdf = new FPDF($orientation = 'P', $unit = 'mm');
// Agregamos los datos de la empresa
//$pdf->Cell(5, $textypos, "NUMERO DE PEDIDO");
//$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 15);
$textypos = 5;
$pdf->AddPage();
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
//      
$pdf->Ln(10);
//   
$pdf->Cell(30);
$pdf->SetFont('Arial', '', 10);

$pdf->setY(12);
$pdf->setX(10);
$pdf->Image('../Imagenes/images.png', 2, 5, 10);
$pdf->Cell(5, $textypos, " BEBIDAS AL PASO");
$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(30);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "DE:");
$pdf->SetFont('Arial', '', 10);
$pdf->setY(35);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "");
$pdf->setY(40);
$pdf->setX(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(30);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "RUC: 2465084-6");
$pdf->SetFont('Arial', '', 10);
$pdf->setY(35);
$pdf->setX(135);

$f1 = $_GET['vcod'];
//$f2 = $_GET['vid'];
$resultado = db_query("SELECT * FROM vs_notaremi WHERE rem_id=$f1;")or die(mysqli_error());
$resultado2 = db_query("SELECT * FROM vs_detnotaremi where rem_id=$f1")or die(mysqli_error());

if ($row = mysqli_fetch_array($resultado)) {
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(5, $textypos, "NOTA DE REMISION");
    $pdf->setY(40);
    $pdf->setX(135);
    $pdf->Cell(5, $textypos, utf8_decode("Nº ") . $row[0]);
    $pdf->setY(45);
    $pdf->setX(135);
    $pdf->Cell(5, $textypos, "");
    $pdf->setY(50);
    $pdf->setX(135);
    $date = new DateTime($row[2]);
    $date2 = new DateTime($row[3]);
    $pdf->SetFont('Arial', '', 10);
//    $pdf->Cell(135, 6, 'NUMERO DE PEDIDO: ' . $row[0], 1, 0, 'R', 0);
    $pdf->Ln();
    $pdf->Cell(180, 6, 'NOMBRE O RAZON SOCIAL: ' . $row[9] . '                                      ' . "RUC: " . $row[6] . "", 1, 1, 'L', 0);
    $pdf->Cell(180, 6, 'FECHA DE INICIO: ' . date_format($date, 'd-m-Y') . '                                                    ' . "FECHA FIN DEL TRASLADO: " . date_format($date2, 'd-m-Y') . "", 1, 1, 'L', 0);
    $pdf->Cell(180, 6, 'MARCA DE VEHICULO: ' . $row[11] . '                                                       ' . "NUMERO DE RUA: " . $row[12] . "", 1, 1, 'L', 0);
    $pdf->Cell(180, 6, 'NOMBRE O RAZON SOCIAL DEL TRANSPORTISTA: ' . $row[11] . '                      ' . "RUC DEL TRANSPORTISTA: " . $row[12] . "", 1, 1, 'L', 0);
    $pdf->Cell(180, 6, 'NOMBRE DEL CONDUCTOR: ' . $row[7] . "                         RUC: " . $row[9], 1, 0, 'L', 0);
//    $pdf->Cell(180, 6, 'MARCA DE VEHICULO: ' . $row[11] . '                                                       ' . "NUMERO DE RUA: " . $row[12] . "", 1, 1, 'L', 0);
//    $pdf->Cell(210, 6, 'DIRECCION: ' . $row[4] . "                                         TELEFONO: ", 1, 0, 'L', 0);
//    $pdf->Cell(32, 6, 'ESTADO', 0, 0, 'C', 0);
    $pdf->Ln(10);
    $traslado='';
    $compra='';
    $devo='';
    if ($row[4]=='TRASLADO') {
        $traslado='x';
    }elseif ($row[4]=='COMPRA') {
        $compra='x';
    }elseif ($row[4]=='DEVOLUCION') {
        $devo='x';
    }

    $pdf->Ln(30);
    $pdf->setY(60);
    $pdf->setX(135);
    $pdf->Ln(25);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(180, 6, 'MOTIVO DE TRASLADO  (marque una sola opcion,debera utilizar un documento por cada motivo de traslado) ' . '                      ' . "" . "", 1, 1, 'L', 0);
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(180, 6, 'venta()' . '                                                  ' . "importacion()                       " . " traslado locales empresa($traslado)" . "         emisor movil()", 0, 1, 'L', 0);
    $pdf->Cell(180, 6, 'exportacion()' . '                                       ' . "consignacion()                      " . " transformacion()" . "                         exhibicion()", 0, 1, 'L', 0);
    $pdf->Cell(180, 6, "compra($compra)" . '                                               ' . "devolucion($devo)                         " . " reparacion()" . "                                 ferias()", 0, 1, 'L', 0);
    $pdf->Cell(180, 6, 'otros( indique motivo provisto)' . '                                               ' . "          " . " Comprobante de venta:" . "", 0, 1, 'L', 0);
}
/////////////////////////////
//// Array de Cabecera
$pdf->SetFont('Arial', 'B', 10);
$header = array("CANTIDAD", "DESCRIPCION DE LA MERCADERIA");
// Column widths
$w = array(20, 160);
// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 5, $header[$i], 1, 0, 'C');
$pdf->Ln();
// Data

while ($row = mysqli_fetch_array($resultado2)) {
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell($w[0], 5, $row[3], 1, 0, 'C');
    $pdf->Cell($w[1], 5, "                                                                       " . $row[2], 1, 0, 'L');

    $pdf->Ln();
}
$pdf->Ln();



$pdf->Output('notaremision.pdf','I');

ob_end_flush();
?>
		