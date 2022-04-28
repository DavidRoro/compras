<?php

require '../clases/conexion.php';
ob_start();
require '../fpdf/fpdf.php';
class PDF extends FPDF {
            function Footer() {
                $this->SetY(-15);
                $this->SetFont('Arial', '', 10);
                $this->Cell(0, 10, '' . $this->PageNo().'/{nb}', 0, 0, 'R');
            }
        }
$pdf = new PDF($orientation = 'P', $unit = 'mm');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 15);
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);

$f1 = $_GET['vcod'];
$f2 = $_GET['vid'];
$resultado = db_query("SELECT * FROM vs_ajuste WHERE aju_fecha between '$f1' and '$f2'");

while ($row = mysqli_fetch_array($resultado)) {
    $pdf->SetFillColor(232, 232, 232);
    $pdf->SetFont('Arial', 'B', 12);  
    $pdf->Ln();
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
    $pdf->Cell(5, $textypos, "Dr Vasconsellos N 227, c/ Via Ferrea");
    $pdf->setY(40);
    $pdf->setX(135);
    $pdf->Cell(5, $textypos, "Tel: 021-294-380");
    $pdf->setY(45);
    $pdf->setX(135);
    $pdf->Cell(5, $textypos, "ASUNCION- PARAGUAY");
    $pdf->setY(50);
    $pdf->setX(135);
    $date = new DateTime($row[1]);
    $pdf->Ln();
    $pdf->Cell(180, 6, 'FECHA DE SOLICITUD: ' . date_format($date, 'd-m-Y') . '                                                                     | NUMERO DE AJUSTE: ' . $row[0], 1, 1, 'L', 0);
    $pdf->Cell(180, 6, 'SUCURSAL: ' . $row[4], 1, 1, 'L', 0);

    $pdf->Ln(10);


    $pdf->Ln(30);
    $pdf->setY(60);
    $pdf->setX(135);
    $pdf->Ln(15);
/////////////////////////////
    $resultado2 = db_query("SELECT * FROM vs_detajuste where aju_id=$row[0]");
//// Array de Cabecera
    $header = array("ITEM", "MATERIAL", "MOTIVO", "CANTIDAD");
// Column widths
    $w = array(20, 95, 20, 20);
// Header
    for ($i = 0; $i < count($header); $i++)
        $pdf->Cell($w[$i], 5, $header[$i], 1, 0, 'C');
    $pdf->Ln();
// Data
    $total = 0;
    while ($row = mysqli_fetch_array($resultado2)) {

        $pdf->Cell($w[0], 5, $row[1], 1, 0, 'C');
        $pdf->Cell($w[1], 5, $row[2], 1, 0, 'L');
        $pdf->Cell($w[2], 5, $row[6], 1, 0, 'C');
        $pdf->Cell($w[3], 5, $row[3], 1, 0, 'C');
        $pdf->Ln();
    }
    $pdf->Ln(10);
//$pdf->Cell(5, $textypos, " Subtotales:", 0, 0, 'L', 0);

    $pdf->Cell(30, 6, "", 0, 0, 'R', 0);
    $pdf->Cell(30, 6, "", 0, 0, 'R', 0);
    $pdf->Cell(40, 6, "", 0, 0, 'R', 0);
//$pdf->MultiCell(1, 90, '', "T", 1);
    $pdf->Ln(10);
    $pdf->Cell(1, $textypos, "", 0, 0, 'L', 0);
    if (mysqli_num_rows($resultado2) > 0) {
        $pdf->Cell(60, $textypos, "", 0, 0, 'C', 0);
        $pdf->Ln();
    } else {
        $pdf->Cell(60, $textypos, "NO POSEE DETALLES", 0, 0, 'C', 0);
        $pdf->Ln();
    }
    $pdf->MultiCell(184, 90, '', "T", 1);
    $pdf->Ln();
}
$pdf->Output('reporte_ajuste.pdf', 'I');

ob_end_flush();
?>
		