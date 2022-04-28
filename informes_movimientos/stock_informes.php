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
        $this->Cell(120, 10, 'Reporte de Stock', 0, 0, 'C');
        $this->Ln(20);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0, 10, '' . $this->PageNo().'/{nb}', 0, 0, 'C');
    }

}

//$f1 = $_GET['vcod'];
//$f2 = $_GET['vid'];
$resultado = db_query("select * from vs_stock");
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
///////////////////////////
$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(10);
$pdf->Cell(30, 6, 'ID', 1, 0, 'C', 1);
$pdf->Cell(25, 6, utf8_decode('SUCURSAL'), 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'DESCRIPCION', 1, 0, 'C', 1);
$pdf->Cell(30, 6, 'CANTIDAD', 1, 0, 'C', 1);
//$pdf->Cell(30, 6, 'SALDO', 1, 0, 'C', 1);
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 10);
$monto=0;
while ($row = mysqli_fetch_array($resultado)) {
   
//    $date = new DateTime($row[5]);
    $pdf->Cell(10);
    $pdf->Cell(30, 6, $row[0], 0, 0, 'C', 0);
    $pdf->Cell(25, 6, trim(utf8_decode($row[1])), 0, 0, 'C', 0);
    $pdf->Cell(40, 6, $row[3], 0, 0, 'C', 0);
    $pdf->Cell(30, 6, $row[4], 0, 0, 'C', 0);
//    $pdf->Cell(30, 6, number_format($row[7],0,",","."), 0, 0, 'C', 0);
//            $pdf->Cell(40, 6, utf8_decode($row[6]), 0, 0, 'C',0);
    
    
    $pdf->Ln(10);
}
    

$pdf->Output('reporte_stock.pdf', 'I');
ob_end_flush();

