<?php
error_reporting(E_ALL);
require_once "../models/Cotiza.php";
$model = new Cotiza();
print_r($_POST);
$ID = $model->cotizacion($_POST);

$nAncho = 400;
$nAlto = 400;

if ($_FILES['img']['error'] == UPLOAD_ERR_OK) {
    $origin = $_FILES['img']['tmp_name'];
    echo $origin;
    $myOrigin =  imagecreatefromjpeg($origin);

    $xOrigin = imagesx($myOrigin);
    $yOrigin = imagesy($myOrigin);

    if ($xOrigin >= $yOrigin) {
        $nAncho = $nAncho;
        $nAlto = ($nAncho * $yOrigin) / $xOrigin;
    } else {
        $nAlto = $nAlto;
        $nAncho = ($xOrigin / $yOrigin) * $nAlto;
    }

    $tmp = imagecreatetruecolor($nAncho, $nAlto);

    imagecopyresized($tmp, $myOrigin, 0, 0, 0, 0, $nAncho, $nAlto, $xOrigin, $yOrigin);
    if ($ID != 'ERR') {
        $path = "../resources/imgs/cotiza/" . $ID . '.jpg';
        $res = imagejpeg($tmp, $path, 100);

        if ($res === true) {
            header('location:../templates/user/cotizaciones.php?res=1');
        } else {
            header('location:../templates/user/cotizaciones.php?res=2');
        }
    }
}

