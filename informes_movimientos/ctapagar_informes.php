<?php

//        ob_start();
require '../clases/conexion.php';
ob_start();
require '../fpdf/fpdf.php';

class PDF extends FPDF {

    function Header() {
        $this->Image('../Imagenes/images.png', 30, 5, 15);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(30);
        $this->Cell(120, 10, 'Reporte de Cuenta a pagar', 0, 0, 'C');
        $this->Ln(20);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, ' ' . $this->PageNo().'/{nb}', 0, 0, 'C');
    }

}

$f1 = $_GET['vcod'];
$f2 = $_GET['vid'];
$resultado = db_query("select * from vs_ctapagar WHERE cuo_fecha between '$f1' and '$f2'");
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
///////////////////////////
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10);
$pdf->Cell(30, 6, 'COD FACT', 1, 0, 'C', 1);
$pdf->Cell(25, 6, utf8_decode('CUOTA Nº'), 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'CUOTA FECHA', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'MONTO', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'SALDO', 1, 0, 'C', 1);
//        $pdf->Cell(30, 6, '', 1, 0, 'C', 1);
//        $pdf->Cell(40, 6, 'E-MAIL', 1, 0, 'C', 1);
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 10);
$monto=0;
while ($row = mysqli_fetch_array($resultado)) {
   
    $date = new DateTime($row[5]);
    $pdf->Cell(10);
    $pdf->Cell(30, 6, $row[2], 0, 0, 'C', 0);
    $pdf->Cell(25, 6, utf8_decode($row[0]), 0, 0, 'C', 0);
    $pdf->Cell(40, 6, date_format($date, 'd-m-Y'), 0, 0, 'C', 0);
    $pdf->Cell(30, 6, number_format($row[6],0,",","."), 0, 0, 'C', 0);
    $pdf->Cell(30, 6, number_format($row[7],0,",","."), 0, 0, 'C', 0);
//            $pdf->Cell(40, 6, utf8_decode($row[6]), 0, 0, 'C',0);
    
       $monto+=$row[6]; 
    
    $pdf->Ln(10);
}
    $pdf->Ln();
    $pdf->Cell(100, 6, "", 0, 0, 'R', 0);
    $pdf->Cell(100, 6, "TOTAL: ".number_format($monto, 0, ",", ".") . " GS", 0, 0, 'C', 0);
    $pdf->Ln();
    $pdf->MultiCell(184, 90, '', "T", 1);


$pdf->Output('reporte_ctapagar.pdf', 'I');
ob_end_flush();

