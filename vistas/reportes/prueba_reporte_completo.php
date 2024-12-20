


<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{

   $this->Image('fondo_reporte.png', 0, 0, 210, 220); 
   
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Evidencia') .$this->PageNo().'/{nb}',0,0,'C');
}
}

require_once "../../config/Conexion.php";
$consulta = "SELECT * FROM registros_material where servicio = 'sheimbaun'";
$resultado = mysqli_query($conexion, $consulta);

$pdf= new PDF ('L','mm');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',30);

while ($row=$resultado->fetch_assoc()) {
    
    $imagen='../fotos/'.$row['foto'];
        
    $pdf->Ln(24);
	$pdf->Cell(10,10.5,iconv('utf-8', 'ISO-8859-1',"             ".$row['tipo']),0,1,'L',0);
    $pdf->Ln(5);
	$pdf->Cell(10,7,iconv('utf-8', 'ISO-8859-1',"                    ".$row['lat']),0,1,'L',0);
    $pdf->Ln(5);
    //$pdf->Image('../fotos/'.$row['foto'] , 30 ,70, 230 , 100,'JPG');
     $pdf->Cell( 30, 15, $pdf->Image($imagen,$pdf->GetX()+5, $pdf->GetY()+3, 20), 1, 0, 'C', false);


	
    $pdf->Ln(160);
	

} 


	$pdf->Output();
?>