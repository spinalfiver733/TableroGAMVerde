<?php
require('fpdf.php');
$folio = $_GET['id'];

class PDF extends FPDF
{
// Cabecera de página
function Header()
{


}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Evidencia') .' '.$_GET['id'],0,0,'C');
}
}

require_once "../../config/Conexion.php";

            $sql_fetch_todos = "select * from registros_material_c where id=".$_GET['id'];
            $query = mysqli_query($conexion, $sql_fetch_todos);

            
             if($row=mysqli_fetch_array($query)){

$pdf= new PDF ('L','mm');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTitle('EVIDENCIA/4T/2024'.$row['id']);


    $imagen='../fotos/'.$row['foto'];
    
    setlocale(LC_ALL,"es_ES");
    $pdf->SetXY(10 , 10); 
    
    $pdf->SetFont('Arial','B',30);
    $pdf->Cell(0, 0,iconv('utf-8', 'ISO-8859-1','Ciudad de México'));
    
    $pdf->SetFont('Arial','B',15);
    $pdf->Ln(5);
	//$pdf->Cell(10,10.5,iconv('utf-8', 'ISO-8859-1',"DIRECCIÓN: ".$row['tipo']),0,1,'L',0);
    
    $pdf->MultiCell(0,5,iconv('utf-8', 'ISO-8859-1',"DIRECCIÓN: ".$row['tipo'])); 
	
    $pdf->Ln(0);
	$pdf->Cell(10,10.5,iconv('utf-8', 'ISO-8859-1',"GEOLOCALIZACIÓN: ".$row['lat'].','.$row['lon']),0,1,'L',0);
	
    $pdf->Image('../fotos/'.$row['foto'] , 30 ,40, 230 , 140,'JPG');
     //$pdf->Cell( 30, 15, $pdf->Image($imagen,$pdf->GetX()+5, $pdf->GetY()+3, 20), 1, 0, 'C', false);


	
    $pdf->Ln(160);
	

} 


	$pdf->Output();
?>