<?php

require '../clases/conexion.php';
ob_start();
require '../fpdf/fpdf.php';

//class PDF extends FPDF {
//
//    function Header() {
//        $this->Image('../Imagenes/presupuesto.png', 45, 5, 10);
//        $this->SetFont('Arial', 'B', 10);
//        $this->Cell(30);
//        $this->Cell(10, 10, 'WAL METALURGICA', 0, 0, 'C');
//        $this->Cell(10, 10, 'FIORELLA MORESCHI', 0, 0, 'C');
//        $this->Ln(20);
//    }
//
//    function Footer() {
//        $this->SetY(-15);
//        $this->SetFont('Arial', 'I', 8);
//        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
//    }
//
//}
$pdf = new FPDF($orientation = 'P', $unit = 'mm');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 15);
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);
// Agregamos los datos de la empresa
$pdf->Image('../Imagenes/images.png', 2, 5, 10);
$pdf->Cell(5, $textypos, "  BEBIDAS AL PASO");
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
$pdf->Cell(5, $textypos, "ORDEN DE COMPRA");
$pdf->setY(40);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "");
$pdf->setY(45);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "");
$pdf->setY(50);
$pdf->setX(135);
//$pdf->Cell(5, $textypos, "NUMERO DE PEDIDO");


$f1 = $_GET['vcod'];
//        $f2 = $_POST['fin'];
$resultado = db_query("SELECT * FROM vs_orden WHERE ord_id=$f1")or die(mysqli_error($con));
$resultado2 = db_query("SELECT * FROM vs_detorden where ord_id=$f1")or die(mysqli_error($con));
//$pdf = new PDF();
//$pdf->AliasNbPages();
//$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
//      
$pdf->Ln(10);
//   
$pdf->Cell(30);
$pdf->SetFont('Arial', '', 10);
if ($row = mysqli_fetch_array($resultado)) {
    $date = new DateTime($row[1]);
//    $pdf->Cell(135, 6, 'NUMERO DE PEDIDO: ' . $row[0], 1, 0, 'R', 0);
    $pdf->Ln();
    $pdf->Cell(180, 6, 'FECHA DE SOLICITUD: ' . date_format($date, 'd-m-Y') . '                                                                     | ORDEN NRO: ' . $row[0] . "| PRESU NRO:" . $row[7], 1, 1, 'L', 0);
    $pdf->Cell(180, 6, 'NOMBRE O RAZON SOCIAL: ' . $row[4] . "                                                       RUC: " . $row[5], 1, 0, 'L', 0);
//    $pdf->Cell(120, 6, 'DIRECCION: ' . $row[7] . "                                         TELEFONO: ", 1, 0, 'R', 0);
//$pdf->Cell(32, 6, 'ESTADO', 0, 0, 'C', 0);
    $pdf->Ln(10);
}

$pdf->Ln(30);
$pdf->setY(60);
$pdf->setX(135);
$pdf->Ln(15);
/////////////////////////////
//// Array de Cabecera
$header = array("CANTIDAD", "PRODUCTOS", "PRECIO U.", "IMPORTE");
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
while ($row = mysqli_fetch_array($resultado2)) {

    $pdf->Cell($w[0], 5, $row[3], 1, 0, 'C');
    $pdf->Cell($w[1], 5, $row[2], 1, 0, 'L');
    $pdf->Cell($w[2], 5, number_format($row[4], 0, ",", "."), 1, 0, 'C');
    $pdf->Cell($w[3], 5, $row[5], 1, 0, 'C');
    $total += $row[5];
    
    $pdf->Ln();
}
$pdf->Ln(10);
//$pdf->Cell(5, $textypos, " Subtotales:", 0, 0, 'L', 0);

$pdf->Cell(1, $textypos, "TOTAL: ", 0, 0, 'L', 0);
$pdf->Cell(60, $textypos, number_format($total, 0, ",", ".") . " GS", 0, 0, 'C', 0);
$pdf->Ln();
$pdf->MultiCell(184, 90, '', "T", 1);
$pdf->Ln();

$pdf->Output('orden_compra.pdf','I');
ob_end_flush();
?>
		