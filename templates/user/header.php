<?php
session_start();
if (!isset($_SESSION['ID']))
    header("location:../../controllers/close.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['name']; ?></title>
    <link rel="icon" href="../../resources/imgs/logo/Logo.png">
    <link rel="stylesheet" href="../../resources/libs/bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resources/libs/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../resources/css/menus.css">
    <link rel="stylesheet" href="../../resources/css/inicio.css">
    <link rel="stylesheet" href="../../resources/css/general.css">
    <link rel="stylesheet" href="../../resources/css/style.css">
    <link rel="stylesheet" href="../../resources/libs/datatable/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../../resources/libs/datatable/css/buttons.dataTables.min.css">
</head>

<body>
    <nav id="sidebar" class="active">
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
            </button>
        </div>
        <div class="img bg-wrap text-center py-4" style="background-image: url(../../resources/imgs/bg_1.jpg);">
            <div class="user-logo">
                <div class="img" style="background-image: url(../../resources/imgs/logo.jpg);"></div>
                <h3><?php echo $_SESSION['name']; ?></h3>
            </div>
        </div>
        <ul class="list-unstyled components mb-5">
            <li class="active">
                <a href="inicio.php"><span class="fa fa-home mr-3"></span> Inicio</a>
            </li>
            <li>
                <a href="cotizaciones.php"><i class="fas fa-file-signature mr-3"></i> Generar Cotización</a>
            </li>
            <li>
                <a href="history.php"><span class="fa fa-list mr-3"></span> Mis Cotizaciones</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-trophy mr-3"></span> Mis Pedidos</a>
            </li>
            <!--li>
                <a href="#"><span class="fa fa-cog mr-3"></span> Settings</a>
            <li-->
            <li>
                <a href="#"><span class="fas fa-headset mr-3"></span> Soporte Técnico</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-sign-out mr-3"></span> Cerrar Sesión</a>
            </li>
        </ul>
    </nav>