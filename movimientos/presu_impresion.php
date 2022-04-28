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
$pdf->Cell(5, $textypos, "  WAL METALURGICA");
$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(30);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "DE:");
$pdf->SetFont('Arial', '', 10);
$pdf->setY(35);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "FIORELLA MORESCHI");
$pdf->setY(40);
$pdf->setX(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(30);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "RUC: 80005145-9");
$pdf->SetFont('Arial', '', 10);
$pdf->setY(35);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "NOTA DE PRESUPUESTO");
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
$resultado = db_query("SELECT * FROM vs_presu WHERE pre_id=$f1")or die(mysqli_error($con));
$resultado2 = db_query("SELECT * FROM vs_detpresu where pre_id=$f1")or die(mysqli_error($con));
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
    $pdf->Cell(180, 6, 'FECHA DE SOLICITUD: ' . date_format($date, 'd-m-Y') . '                                                                     | NRO PRES: ' . $row[0] . "| PEDIDO NRO:" . $row[8], 1, 1, 'L', 0);
    $pdf->Cell(180, 6, 'NOMBRE O RAZON SOCIAL: ' . $row[5] . "                                                       RUC: " . $row[6], 1, 0, 'L', 0);
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
$header = array("CANTIDAD", "MATERIAL", "PRECIO U.", "EXENTA", "IVA 5%", "IVA10%");
// Column widths
$w = array(20, 95, 20, 20, 20, 20);
// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 5, $header[$i], 1, 0, 'C');
$pdf->Ln();
// Data
$total = 0;
$exenta = 0;
$iva5 = 0;
$iva10 = 0;
while ($row = mysqli_fetch_array($resultado2)) {

    $pdf->Cell($w[0], 5, $row[3], 1, 0, 'C');
    $pdf->Cell($w[1], 5, $row[2], 1, 0, 'L');
    $pdf->Cell($w[2], 5, number_format($row[4], 0, ",", "."), 1, 0, 'C');
    $pdf->Cell($w[3], 5, $row[7], 1, 0, 'C');
    $pdf->Cell($w[4], 5, $row[6], 1, 0, 'C');
    $pdf->Cell($w[5], 5, $row[5], 1, 0, 'C');
    $total += $row[8];
    $exenta += $row[7];
    $iva5 += $row[5];
    $iva10 += $row[6];
    $pdf->Ln();
}
$pdf->Ln(10);
//$pdf->Cell(5, $textypos, " Subtotales:", 0, 0, 'L', 0);

$pdf->Cell(30, 6, "T. EXENTA:  " . number_format($exenta, 0, ",", ".") . " GS", 0, 0, 'R', 0);
$pdf->Cell(30, 6, "T. IVA 5%: " . number_format($iva5, 0, ",", ".") . " GS", 0, 0, 'R', 0);
$pdf->Cell(40, 6, "T. IVA10%: " . number_format($iva10, 0, ",", ".") . " GS", 0, 0, 'R', 0);
//$pdf->MultiCell(1, 90, '', "T", 1);
$pdf->Ln(10);
$pdf->Cell(1, $textypos, "TOTAL: ", 0, 0, 'L', 0);
$pdf->Cell(60, $textypos, number_format($total, 0, ",", ".") . " GS", 0, 0, 'C', 0);
$pdf->Ln();
$pdf->MultiCell(184, 90, '', "T", 1);
$pdf->Ln();

$pdf->Output('presupuesto.pdf','I');
ob_end_flush();
?>
		