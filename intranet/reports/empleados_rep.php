<?php
require('fpdf/fpdf.php');	
require_once("../capadatos/clases/MySql.php");
class PDF extends FPDF
{
	function ImprovedTable($header, $data)	
	{
		// Anchuras de las columnas
		$w = array(10, 75, 60, 25);		
		// Colores, ancho de l�nea y fuente en negrita
		$this->SetFillColor(79,129,189);
		$this->SetTextColor(255);
		$this->SetDrawColor(79,129,189);
		$this->SetLineWidth(0.3);			
		// Cabeceras
		for($i=0; $i<count($header); $i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
		$this->Ln();
		// Restauraci�n de colores y fuentes
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
		// L�nea de cierre
		$this->Cell(array_sum($w),0,'','T');
	}
}

$mysql = new MySql();
$rs = $mysql->ejecutar("SELECT * FROM Empleado ORDER BY Nombres");
$header = array('N�', 'Empleado', 'Email', 'Telefono');
$i = 0;
while($row = mysqli_fetch_array($rs)){
	$data[$i] = array(($i + 1),
				utf8_decode($row['Nombres'].' '.$row['Apellidos']),
				utf8_decode($row['Email']),
				utf8_decode( $row['Telefono']));
	$i++;
}
$pdf = new PDF();
$pdf->SetFont('Arial','',9);
$pdf->AddPage();
$pdf->ImprovedTable($header,$data);
$pdf->Output();
?>