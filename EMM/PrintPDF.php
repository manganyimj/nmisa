<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrintPDF
 *
 * @author nmabasa
 */

require('fpdf/fpdf.php');
 
class PrintPDF  extends FPDF
{
    var $name;
    var $lastname;
    var $email;
    
    function Header()
	{
		global $title;
		// Arial bold 15
		$this->SetFont('Arial','B',15);
		$this->Image('logo.png',10,6,30);
									// Calculate width of title and position
		$w = $this->GetStringWidth($title)+6;
		$this->SetX(210/2);
		// Colors of frame, background and text
		$this->SetDrawColor(0,80,180);
		$this->SetFillColor(230,230,0);
		$this->SetTextColor(220,50,50);
		// Thickness of frame (1 mm)
		$this->SetLineWidth(1);
		// Title
		$this->Cell(30,10,'Bus Ticket',10,1,'C',true);
		$this->Ln(10);
		$this->Cell(100,10,'Name      : ' .$this->name,1,1,'C',true);
		$this->Cell(100,10,'Lastname      : ' .$this->lastname,1,1,'C',true);
		$this->Cell(100,10,'Email Address : ' .$this->email,1,3,'C',true);
									
		//$this->Cell(30,10,'Bus Tickets',10,1,'C',true);
		// Line break
		$this->Ln(10);
	}
    
    function Footer()
    {
		// Position at 1.5 cm from bottom
		$this->SetY(-15);
									
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Page number
		$this->Image('logo.png',10,100,50);							
		$this->Image('logo.png',50,100,50);
		$this->Image('logo.png',100,100,50);
		$this->Image('logo.png',150,100,50);							
		$this->Ln(10);							
		$this->Image('logo.png',10,150,50);							
		$this->Image('logo.png',50,150,50);							
		$this->Image('logo.png',100,150,50);							
		$this->Image('logo.png',150,150,50);							
		$this->Ln(10);						
		$this->Image('logo.png',10,200,50);						
		$this->Image('logo.png',50,200,50);							
		$this->Image('logo.png',100,200,50);							
		$this->Image('logo.png',150,200,50);						
		$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');							
									
									
									
}
    function FancyTable($header, $data)
	{
		// Colors, line width and bold font
		$this->SetFillColor(255,0,0);
		$this->SetTextColor(255);
		$this->SetDrawColor(128,0,0);
		$this->SetLineWidth(.3);
		$this->SetFont('Arial','B');
		// Header
		$w = array(40, 35, 40, 45,50);
									
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
			$this->Ln();
		// Color and font restoration
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Data
		$fill = false;
									
		for($i=0;$i<count($data);$i++)
		{
			$this->Cell($w[$i],7,$data[$i],$i,0,'C',true);
		}
									
	}

    function getName() {
        return $this->name;
    }

    function getLastname() {
        return $this->lastname;
    }

    function getEmail() {
        return $this->email;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    function setEmail($email) {
        $this->email = $email;
    }
    
    function printData() 
    {
        $pdf = new PrintPDF();
        // Column headings
        $pdf->setName('name');
        $pdf->setLastname('lastname');
        $pdf->setEmail('email');

        $header = array('Company', 'Bus Number', 'Departure', 'Destination', 'Date');
        // Data loading

        $data =array('company','bus','departure','destination','date');
        $pdf->SetFont('Arial','',14);
        $pdf->AddPage();

        $pdf->FancyTable($header,$data);

        //$pdf->Output();

    }
    
 
}



