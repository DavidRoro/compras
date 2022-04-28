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
//$pdf->Cell(5, $textypos, "NUMERO DE PEDIDO");


$f1 = $_GET['vcod'];
$f2 = $_GET['vid'];
$resultado = db_query("SELECT * FROM vs_pedido WHERE ped_fecha between '$f1' and '$f2'")or die(mysqli_error($con));

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
//foreach ($rows as $row) {
    
//}  

while($row = mysqli_fetch_array($resultado)) {
    $date = new DateTime($row[1]);
//    $pdf->Cell(135, 6, 'NUMERO DE PEDIDO: ' . $row[0], 1, 0, 'R', 0);
    $pdf->Ln();
    $pdf->Cell(180, 6, 'FECHA DE SOLICITUD: ' . date_format($date, 'd-m-Y').'                                                                     | NUMERO DE PEDIDO: '. $row[0], 1, 1, 'L', 0);
//$pdf->Cell(50, 6, 'USUARIO', 0, 0, 'C', 0);
//$pdf->Cell(32, 6, 'ESTADO', 0, 0, 'C', 0);
    $pdf->Ln(30);


$pdf->Ln(30);
$pdf->setY(60);
$pdf->setX(135);
$pdf->Ln(15);
/////////////////////////////
$resultado2 = db_query("SELECT * FROM vs_detpedido where ped_id=$row[0]")or die(mysqli_error());
if(!empty($resultado2)){
//// Array de Cabecera
$header = array("ITEM", "MATERIAL", "CANTIDAD");
// Column widths
$w = array(20, 95, 20);
// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 5, $header[$i], 1, 0, 'C');
$pdf->Ln();
// Data
$total = 0;
while ($rows = mysqli_fetch_array($resultado2)) {

    $pdf->Cell($w[0], 5, $rows[1], 1, 0, 'C');
    $pdf->Cell($w[1], 5, $rows[2],1, 0, 'L');
    $pdf->Cell($w[2], 5, $rows[3], 1, 0, 'C');
    $pdf->Ln(200);
}
}else{
    $pdf->Cell(32, 6, 'El pedido no posee detalles', 0, 0, 'C', 0);
    $pdf->Ln(200);
}
$pdf->Ln();
}
$pdf->Ln();
$pdf->Output();

ob_end_flush();
?>
		