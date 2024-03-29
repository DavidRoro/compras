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
                $this->Cell(120, 10, 'Reporte de Productos', 0, 0, 'C');
                $this->Ln(20);
            }

            function Footer() {
                $this->SetY(-15);
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
            }

        }
        $resultado =db_query("select * from vs_matprima order by cla_id");
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
///////////////////////////
        $pdf->SetFillColor(232, 232, 232);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(20);
        $pdf->Cell(30, 6, 'CODIGO', 1, 0, 'C', 1);
        $pdf->Cell(40, 6, 'DESCRIPCION', 1, 0, 'C', 1);
        $pdf->Cell(30, 6, 'PRECIO C', 1, 0, 'C', 1);
        $pdf->Cell(30, 6, 'IMPUESTO', 1, 0, 'C', 1);
        $pdf->Cell(40, 6, 'CLASIFICACION', 1, 0, 'C', 1);
        $pdf->Ln(10);

        $pdf->SetFont('Arial', '', 10);
        while ($row = mysqli_fetch_array($resultado)) {
            $pdf->Cell(20);
            $pdf->Cell(30, 6, $row[0], 0, 0, 'C',0);
            $pdf->Cell(40, 6, utf8_decode($row[1]), 0, 0, 'C',0);
            $pdf->Cell(30, 6, number_format($row[2],0,',','.'), 0, 0, 'C',0);
            $pdf->Cell(30, 6, utf8_decode($row[4]), 0, 0, 'C',0);
            $pdf->Cell(40, 6, utf8_decode($row[6]), 0, 0, 'C',0);
            $pdf->Ln(10);
        }
        $pdf->Output('reporte_materiaprima.pdf', 'I');
        ob_end_flush();
        
