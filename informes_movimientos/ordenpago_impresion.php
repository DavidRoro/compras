<?php

require '../clases/conexion.php';
ob_start();
require '../fpdf/fpdf.php';
class PDF extends FPDF {
            function Footer() {
                $this->SetY(-15);
                $this->SetFont('Arial', '', 8);
                $this->Cell(0, 10, '' . $this->PageNo().'/{nb}', 0, 0, 'C');
            }
        }
$pdf = new PDF($orientation = 'P', $unit = 'mm');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 15);
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);
// Agregamos los datos de la empresa

//$pdf->Cell(5, $textypos, "NUMERO DE PEDIDO");


$f1 = $_GET['vcod'];
$f2 = $_GET['vid'];
$resultado = db_query("SELECT * FROM vs_ordenpago WHERE ordenpago_fecha between '$f1' and '$f2'")or die(mysqli_error($con));

//$pdf = new PDF();
//$pdf->AliasNbPages();
//$pdf->AddPage();


while ($row = mysqli_fetch_array($resultado)) {
$pdf->SetFillColor(232, 232, 232);
      
$pdf->Ln();   
$pdf->SetFont('Arial', 'B', 12);
$pdf->Image('../Imagenes/images.png', 2, 5, 10);
$pdf->Cell(5, $textypos, "Bebidas Al Paso");
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
$pdf->Cell(5, $textypos, "Tte. Rojas Silva c/acceso sur");
$pdf->setY(40);
$pdf->setX(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(30);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "RUC: 2465084-6");
$pdf->SetFont('Arial', '', 10);
$pdf->setY(35);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "ORDEN DE PAGO");
$pdf->setY(40);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "");
$pdf->setY(45);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "");
$pdf->setY(50);
$pdf->setX(135);
    $date = new DateTime($row[1]);
//    $pdf->Cell(135, 6, 'NUMERO DE PEDIDO: ' . $row[0], 1, 0, 'R', 0);
    $pdf->Ln();
    $pdf->Cell(180, 6, 'FECHA DE SOLICITUD: ' . date_format($date, 'd-m-Y') . '                                                                     | ORDEN NRO: ' . $row[0] . "| PRESU NRO:" . $row[7], 1, 1, 'L', 0);
    $pdf->Cell(180, 6, 'NOMBRE O RAZON SOCIAL: ' . $row[9] . "                                                       RUC: " . $row[5], 1, 0, 'L', 0);
//    $pdf->Cell(120, 6, 'DIRECCION: ' . $row[7] . "                                         TELEFONO: ", 1, 0, 'R', 0);
//$pdf->Cell(32, 6, 'ESTADO', 0, 0, 'C', 0);
    $pdf->Ln(10);


$pdf->Ln(30);
$pdf->setY(60);
$pdf->setX(135);
$pdf->Ln(15);
/////////////////////////////
$resultado2 = db_query("SELECT * FROM vs_detorden where ord_id=$row[0]")or die(mysqli_error($con));
//// Array de Cabecera
$header = array("CANTIDAD", "MATERIAL", "PRECIO U.", "IMPORTE");
// Column widths
$w = array(20, 95, 20, 20);
// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 5, $header[$i], 1, 0, 'C');
$pdf->Ln();
// Data
$total = 0;
//$exenta = 0;
//$iva5 = 0;
//$iva10 = 0;
//$pdf->Cell(5, $textypos, " Subtotales:", 0, 0, 'L', 0);


$pdf->Ln();
}
$pdf->Output('ordenpago.pdf','I');

ob_end_flush();
?>
		

