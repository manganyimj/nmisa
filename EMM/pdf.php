<?php
    //if(!empty($_POST['submit']))
    //function printData($title,$refNo,$mssg)
    {
            $mssg=$_POST["mssg"];
            $refNo=$_POST["refNo"];
            
            $title="===============UCKNOLEGMENT MESSAGE==================";
            $ref="===============================================Ref No:'$refNo'===============================================";

            require './fpdf/fpdf.php';


            $pdf=new FPDF();

            $pdf->AddPage();
            //$pdf->Image('logo_1.png');
            $pdf->Cell(0,10,"",0,1);

            $pdf->SetFont("Arial","B",16);
            $pdf->Cell(0,10,$title,1,1);

            $pdf->SetFont("Arial","B",11);


            $pdf->Cell(0,15,$mssg,0,1);

            $pdf->SetFont("Arial","B",8);
            $pdf->Cell(0,10,$ref,1,1);


            $pdf->output();
    }


?>