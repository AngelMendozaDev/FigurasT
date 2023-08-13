<?php
require_once "../models/Cotiza.php";
$model = new Cotiza();

$folio = ltrim($_POST['folio'], '0');

//print_r($_POST);
echo $model->setPrice($_POST['price'], $folio, $_POST['fecha']);

?>