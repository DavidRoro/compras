<?php

//        ob_start();
        require '../clases/conexion.php';
        ob_start();
        require '../fpdf/fpdf.php';

        class PDF extends FPDF {

            function Header() {
                $this->Image('../Imagenes/documento.png', 30, 5, 15);
                $this->SetFont('Arial', 'B', 20);
                $this->Cell(30);
                $this->Cell(120, 10, 'Reporte de Personal', 0, 0, 'C');
                $this->Ln(20);
            }

            function Footer() {
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
            }

        }
        $resultado =db_query("select * from personal order by per_id");
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
///////////////////////////
        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(20);
        $pdf->Cell(10, 6, 'COD', 1, 0, 'C', 1);
        $pdf->Cell(50, 6, 'NOMBRE Y APELLIDO', 1, 0, 'C', 1);
        $pdf->Cell(30, 6, 'C.I', 1, 0, 'C', 1);
        $pdf->Cell(50, 6, 'DIRECCION', 1, 0, 'C', 1);
        $pdf->Cell(35, 6, 'E-MAIL', 1, 0, 'C', 1);
        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 10);
        while ($row = mysqli_fetch_array($resultado)) {
            $pdf->Cell(20);
            $pdf->Cell(10, 6, $row[0], 0, 0, 'C',0);
            $pdf->Cell(50, 6, utf8_decode(trim($row[1].' '.$row[2])), 0, 0, 'C',0);
            $pdf->Cell(30, 6, trim($row[3]), 0, 0, 'C',0);
            $pdf->Cell(50, 6, utf8_decode($row[4]), 0, 0, 'C',0);
            $pdf->Cell(35, 6, utf8_decode($row[5]), 0, 0, 'C',0);
            $pdf->Ln(10);
        }
        $pdf->Output('reporte_personal.pdf', 'I');
        ob_end_flush();
        
