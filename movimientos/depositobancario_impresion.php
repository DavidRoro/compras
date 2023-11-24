<?php

require '../clases/conexion.php';
ob_start();
require '../fpdf/fpdf.php';


$pdf = new FPDF($orientation = 'P', $unit = 'mm');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 15);
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);
// Agregamos los datos de la empresa
$pdf->Image('../Imagenes/vino.png', 2, 5, 10);
$pdf->Cell(5, $textypos, "  BODEGA AL PASO");
$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(30);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "DE:");
$pdf->SetFont('Arial', '', 10);
$pdf->setY(35);
$pdf->setX(10);
$pdf->Cell(5, $textypos, "MARCELO ROMERO");
$pdf->setY(40);
$pdf->setX(10);
$pdf->SetFont('Arial', 'B', 10);
$pdf->setY(30);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "RUC: 2465064-6");
$pdf->SetFont('Arial', '', 10);
$pdf->setY(35);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "Tte. Rojas Silva c/acceso sur");
$pdf->setY(40);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "Tel: 0981190954");
$pdf->setY(45);
$pdf->setX(135);
$pdf->Cell(5, $textypos, "ASUNCION- PARAGUAY");
$pdf->setY(50);
$pdf->setX(135);

$f1 = $_GET['vcod'];

$resultado = db_query("SELECT * FROM depositobancario WHERE iddepositobancario=$f1")or die(mysqli_error($con));
//$resultado2 = db_query("SELECT * FROM vs_detpedido where ped_id=$f1")or die(mysqli_error($con));

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 12);
//      
$pdf->Ln(10);
//   
$pdf->Cell(30);
$pdf->SetFont('Arial', '', 10);
if ($row = mysqli_fetch_array($resultado)) {
    $date = new DateTime($row['dep_fecha']);
//    $pdf->Cell(135, 6, 'NUMERO DE PEDIDO: ' . $row[0], 1, 0, 'R', 0);
    $pdf->Ln();
    $pdf->Cell(180, 6, 'FECHA DE SOLICITUD: ' . date_format($date, 'd-m-Y') . '                                                                     | NUMERO DE DEPOSITO: ' . $row[0], 1, 1, 'L', 0);
    $pdf->Ln();
    $pdf->Cell(70, 6, 'USUARIO: ' . $row[5], 1, 1, 'L', 0);
    $pdf->Ln();
    $pdf->Cell(70, 6, 'ESTADO: ' . $row[1], 1, 1, 'L', 0);
    $pdf->Ln(10);
}

$pdf->Ln(30);
$pdf->setY(60);
$pdf->setX(135);
$pdf->Ln(15);
/////////////////////////////

$pdf->Output('depositobancario.pdf', 'I');


ob_end_flush();
?>
		

