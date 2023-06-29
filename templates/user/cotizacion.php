<?php
require("../../resources/libs/fpdf/fpdf.php");
require_once('../../models/Cotiza.php');
$model = new Cotiza();

$res = $model->getCotizacin($_GET['user'])->fetch_assoc();

class PDF extends FPDF
{
    private $folio = 0;
    public function setFolio($aux)
    {
        $this->folio = $aux;
    }
    
    // Page header
    function Header()
    {
        // Logo
        $this->Image('../../resources/imgs/logo/LogoTxt.png', 25, 20, 25);
        $this->SetFillColor(172,209,234);
        // Arial bold 15
        $this->SetFont('Arial', '', 10);
        // Move to the right
        $this->Cell(70);
        // Title
        $this->Cell(60, 5, "CDMX, " . date('j') . " de " . date('M') . " del " . date('Y'), 0, 0, 'C');
        // Line break
        $this->Ln(22);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(140);
        $this->Cell(20,5, "Folio:",1,0,'C',1);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(20,5, $this->folio ,1,0,'C');
        $this->Ln(15);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(60,5, "Publivolumetricos",0,0,'C');
        $this->Ln(10);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->setFolio($res['folio_pres']);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetFillColor(172,209,234);
$pdf->Image('../../resources/imgs/cotiza/'.$res['folio_pres'].'.jpeg', 111, 70,90);
$pdf->Cell(23,8, 'Solicito:', 1,0, 'L', 1);
$pdf->Cell(168,8, $res['nombre']." ".$res['app']. " ". $res['apm'], 1,0,'C');
$pdf->Ln(15);
$pdf->Cell(23,5, '', 0,0, 'L');
$pdf->Cell(5,5, '', 0,0,'C');
$pdf->Cell(20,5, 'Alto', 1,0,'C');
$pdf->Cell(5,5, '', 0,0,'C');
$pdf->Cell(20,5, 'Ancho', 1,0,'C');
$pdf->Cell(5,5, '', 0,0,'C');
$pdf->Cell(20,5, 'Largo', 1,1,'C');

$med = explode('-',$res['medidas']);

$pdf->Cell(23,8, 'Medidas:', 1,0, 'L',1);
$pdf->Cell(5,8, '', 0,0,'C');
$pdf->Cell(20,8, $med[0], 1,0,'C');
$pdf->Cell(5,8, '', 0,0,'C');
$pdf->Cell(20,8, $med[1], 1,0,'C');
$pdf->Cell(5,8, '', 0,0,'C');
$pdf->Cell(20,8, $med[2], 1,1,'C');

$pdf->Ln(10);

$pdf->Cell(24,8, 'Posicion:', 1,0,'L',1);
$pdf->Cell(30,8, $res['posicion'] == 'V' ? 'Vertical' : 'Horizontal', 1,0,'C');
$pdf->Cell(5);
$pdf->Cell(23,8, 'Piezas:', 1,0,'L',1);
$pdf->Cell(16,8, $res['piezas'], 1,1,'C');

$pdf->Ln(10);
$pdf->Cell(24,8, 'Acabado:', 1,0,'L',1);
$pdf->Cell(75,8, $res['tipo_uso'], 1,1,'C');

$pdf->Ln(10);
$pdf->Cell(40, 8, 'Tipo de Pintura:',1,0,'L',1);
$pdf->Cell(59, 8, $res['pintura'],1,0,'C');
$pdf->Cell(5);
$pdf->Cell(84,8, '[Imagen de Referencia]',0,1,'C',1);


$pdf->Output();
