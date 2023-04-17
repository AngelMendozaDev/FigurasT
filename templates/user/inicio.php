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
    <link rel="icon" href="../../resources/imgs/logo/logo.png">
    <link rel="stylesheet" href="../../resources/libs/bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../resources/libs/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../resources/css/menus.css">
    <link rel="stylesheet" href="../../resources/css/inicio.css">
    <link rel="stylesheet" href="../../resources/css/general.css">
    <link rel="stylesheet" href="../../resources/css/style.css">
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
                <a href="#"><span class="fa fa-home mr-3"></span> Home</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-download mr-3 notif"><small class="d-flex align-items-center justify-content-center">5</small></span> Download</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-gift mr-3"></span> Gift Code</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-trophy mr-3"></span> Top Review</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-cog mr-3"></span> Settings</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-support mr-3"></span> Support</a>
            </li>
            <li>
                <a href="#"><span class="fa fa-sign-out mr-3"></span> Sign Out</a>
            </li>
        </ul>
    </nav>

    <script src="../../resources/libs/jquery.js"></script>
    <script src="../../resources/libs/bootstrap_5/js/bootstrap.min.js"></script>
    <script src="../../resources/libs/fontawesome/js/all.min.js"></script>
    <script src="../../resources/libs/sweetalert.js"></script>
    <script src="../../resources/js/main.js"></script>
</body>

</html>