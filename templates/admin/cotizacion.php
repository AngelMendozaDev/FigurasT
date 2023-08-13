<?php
require("../../resources/libs/fpdf/fpdf.php");
require_once('../../models/Cotiza.php');
$model = new Cotiza();

$res = $model->getCotizacin($_GET['user'])->fetch_assoc();
$ext = array('png', 'jpeg', 'jpg');
$flag = false;

class PDF extends FPDF
{
    private $folio = 0;
    private $fecha = "";
    public function setFolio($aux, $date)
    {
        $this->folio = $aux;
        $this->fecha = $date;
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
        //$this->Cell(60, 5, "CDMX, " . $this->fecha, 0, 0, 'C');
        // Line break
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(120);
        $this->Cell(20,5, "N. Pres:",1,0,'C',1);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(40,5, $this->folio ,1,1,'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(120);
        $this->Cell(20,5, "Emision:",1,0,'C',1);
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(40,5, $this->fecha ,1,1,'C');
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
        $this->Cell(0, 3, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 1, 'C');
        $this->Cell(0, 5, 'El presupuesto sera valido 15 dias despues de su emiion.', 0, 0, 'C');
    }
}

// Instanciation of inherited class
$pdf = new PDF("p", 'mm', 'Letter');
$pdf->setFolio($res['folio_pres'], $res['fecha_pres']);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial', '', 10);
$pdf->MultiCell(100, 5, " PubliVolumetricos S.A de C.V. \n San Miguel Zapotitla, 13310, Tlahuac, CDMX. \n Tel: 55 6254 8492 \n Mail: contacto@publivolumetricos.com", 0, 'L');

$pdf->SetFont('Arial', 'B', 14);
$pdf->SetFillColor(172,209,234);

$nombre_fichero = '../../resources/imgs/cotiza/' . $res['folio_pres'];
$leyenda = '[Imagen de Referencia]';

for($i = 0; $i < count($ext); $i++){
    //$pdf->Cell(30,5, $nombre_fichero . '.' .$ext[$i], 0,1,'C');
    if (file_exists($nombre_fichero . '.' .$ext[$i])) {
        $nombre_fichero = '../../resources/imgs/cotiza/' . $res['folio_pres']. '.' . $ext[$i];
        $flag = true;
    }    
}

if($flag == false){
    $nombre_fichero = '../../resources/imgs/cotiza/noImage.png';
    $leyenda = '[Imagen de referencia no disponible]';
}



$pdf->Image($nombre_fichero, 111, 95, 90, 78);
$pdf->Ln(10);
$pdf->Cell(23,8, 'Solicito:', 1,0, 'L', 1);
$pdf->Cell(168,8, $res['nombre']." ".$res['app']. " ". $res['apm'], 1,0,'C');
$pdf->Ln(20);
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
$pdf->Cell(20,8, $med[0]." mts", 1,0,'C');
$pdf->Cell(5,8, '', 0,0,'C');
$pdf->Cell(20,8, $med[1]." mts", 1,0,'C');
$pdf->Cell(5,8, '', 0,0,'C');
$pdf->Cell(20,8, $med[2]." mts", 1,1,'C');

$pdf->Ln(15);

$pdf->Cell(24,8, 'Posicion:', 1,0,'L',1);
$pdf->Cell(30,8, $res['posicion'] == 'V' ? 'Vertical' : 'Horizontal', 1,0,'C');
$pdf->Cell(5);
$pdf->Cell(23,8, 'Piezas:', 1,0,'L',1);
$pdf->Cell(16,8, $res['piezas'], 1,1,'C');

$pdf->Ln(15);
$pdf->Cell(24,8, 'Acabado:', 1,0,'L',1);
$pdf->Cell(75,8, $res['acabado'], 1,1,'C');
$pdf->Ln(10);
$pdf->Cell(104);
$pdf->Cell(88,8, $leyenda,0,1,'C',1);
$pdf->Ln(2);
$pdf->Cell(23, 8, 'Pintura:',1,0,'L',1);
$pdf->Cell(76, 8, $res['pintura'],1,0,'C');

$pdf->Cell(5);
$pdf->Cell(23,8, 'Funcion:', 1,0,'L',1);
$pdf->Cell(65,8, $res['tipo_uso'], 1,1,'C');

$pdf->Ln(5);
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(192, 5, "Comentarios: \n" . $res['comentarios'] . "\n ", 1, 'L');

// $aux ="";
// for($i = 0; $i<19; $i++){
//     $aux .= "#ABSD".$i.", ";
// }

// $pdf->Ln(5);
// $pdf->SetFont('Arial', '', 12);
// $pdf->MultiCell(192, 5, "Colores: \n" . $aux, 1, 'L');

// $pdf->Ln(8);
// $pdf->Cell(97);
// $pdf->Cell(30,8, 'Precio Unitario:',1,0,'C',1);
// $pdf->Cell(65,8, "$ " . $res['precio'],1,1,'C',0);

// $pdf->Ln(2);
// $pdf->Cell(97);
// $pdf->Cell(30,8, 'Precio Final:',1,0,'C',1);
// $pdf->SetFont('Arial', 'B', 16);
// $pdf->Cell(65,8, "$ " . $res['piezas'] * $res['precio'],1,1,'C',0);

$pdf->Output();

//$pdf->Output('D', 'Cotizacion_'.$res['nombre']."_".$res['app'].".pdf");
