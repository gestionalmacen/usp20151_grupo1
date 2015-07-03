<?php
require('fpdf/fpdf.php');	
require_once("../conexion/MySql.php");
class PDF extends FPDF
{
	function ImprovedTable($header, $data)	
	{
		// Anchuras de las columnas
		$w = array(10, 32, 30, 63,12,12,10,17);		
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
			$this->Cell($w[0],7,$row[0],'LR');
			$this->Cell($w[1],7,$row[1],'LR');
			$this->Cell($w[2],7,$row[2],'LR');
			$this->Cell($w[3],7,$row[3],'LR');
			$this->Cell($w[4],7,$row[4],'LR');
			$this->Cell($w[5],7,$row[5],'LR');
			$this->Cell($w[6],7,$row[6],'LR');
			$this->Cell($w[7],7,$row[7],'LR',0,'R');
			$this->Ln();
		}
		// Línea de cierre
		$this->Cell(array_sum($w),0,'','T');
	}
}

$mysql = new MySql();
$rs = $mysql->ejecutar("SELECT
s.fecha as 'FechaSolicitud',
a.nombre as 'area',
p.nombre as 'producto',
ds.cantidad_solicitada,
ds.cantidad_entregada,
ds.saldo as 'saldo',
case s.estado 
	when 'E' then 'Entregado' 
    when 'P' then 'Pendiente' 
    end as estado
FROM area a
INNER JOIN solicitud s
ON a.idarea = s.idarea
INNER JOIN detalle_solicitud ds
ON s.idsolicitud = ds.idsolicitud
INNER JOIN producto p
ON ds.idproducto = p.idproducto
ORDER BY a.nombre ASC");
$header = array('Nº', 'Fecha Solicitud', 'Area', 'Producto','Solicita', 'Entrega','Saldo','Estado');
$i = 0;
while($row = mysqli_fetch_array($rs)){
	$data[$i] = array(($i + 1),
				utf8_decode($row['FechaSolicitud']),
				utf8_decode($row['area']),
				utf8_decode($row['producto']),
				utf8_decode($row['cantidad_solicitada']),
				utf8_decode($row['cantidad_entregada']),
				utf8_decode($row['saldo']),
				utf8_decode($row['estado']));
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