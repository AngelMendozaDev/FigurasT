<?php
require_once "../models/Cotiza.php";
$model = new Cotiza();
print_r($_POST);
$ID = $model->cotizacion($_POST);

if ($ID != 'ERR') {
    $path = "../resources/imgs/cotiza/" . $ID . ".jpeg";

    if (move_uploaded_file($_FILES['img']['tmp_name'], $path)) {
        header('location:../templates/user/cotizaciones.php?res=1');
    } else {
        header('location:../templates/user/cotizaciones.php?res=2');
    }
}
