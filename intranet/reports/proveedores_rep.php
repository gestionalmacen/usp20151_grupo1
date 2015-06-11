<?php
require('fpdf/fpdf.php');	
require_once("../capadatos/clases/MySql.php");
class PDF extends FPDF
{
	function ImprovedTable($header, $data)	
	{
		// Anchuras de las columnas
		$w = array(10, 75, 60, 43);		
		// Colores, ancho de línea y fuente en negrita
		$this->SetFillColor(79,129,189);
		$this->SetTextColor(255);
		$this->SetDrawColor(79,129,189);
		$this->SetLineWidth(0.3);			
		// Cabeceras
		for($i=0; $i<count($header); $i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		// Restauración de colores y fuentes
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('');
		// Datos
		foreach($data as $row)
		{
			$this->Cell($w[0],6,$row[0],'LR');
			$this->Cell($w[1],6,$row[1],'LR');
			$this->Cell($w[2],6,$row[2],'LR');
			$this->Cell($w[3],6,$row[3],'LR',0,'R');
			$this->Ln();
		}
		// Línea de cierre
		$this->Cell(array_sum($w),0,'','T');
	}
}

$mysql = new MySql();
$rs = $mysql->ejecutar("SELECT * FROM proveedor ORDER BY nombre");
$header = array('Nº', 'proveedor', 'ruc', 'Telefono');
$i = 0;
while($row = mysqli_fetch_array($rs)){
	$data[$i] = array(($i + 1),
				utf8_decode($row['nombre']),
				utf8_decode($row['ruc']),
				utf8_decode( $row['telefono']));
	$i++;
}
//Hora Peruana
date_default_timezone_set('America/Lima');
$pdf = new PDF();
$pdf->SetFont('Arial','',9);
$pdf->AddPage();
//agregar imagen
$pdf->Image('logo.png' , 145 ,5, 50 , 20,'png');
//
$pdf->Text(10, 12,"Sistema Gestion de Almacen");
$pdf->Text(10, 18,"USP");
$pdf->Text(10, 24,"Fecha: ".date("d/m/Y - h:i a"));
$pdf->Ln(18);
//
$pdf->ImprovedTable($header,$data);
$pdf->Output();
?>