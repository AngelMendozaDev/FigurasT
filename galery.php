<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publivolumetricos</title>
    <link rel="icon" href="resources/imgs/logo/Logo.png">
    <link rel="stylesheet" href="resources/libs/bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/libs/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="resources/css/menus.css">
    <link rel="stylesheet" href="resources/css/inicio.css">
    <link rel="stylesheet" href="resources/css/general.css">
</head>

<body>
    <header class="menu-bar">
        <a href="index.php" class="section-left" style="text-decoration: none; color: #fff;">
            <img src="resources/imgs/logo/Logo.png" height="70px" alt="logo-m&m">
            &nbsp;
            <span class="title-bar">Publivolumetricos</span>
        </a>
        <div class="section-rigth">
            <ul class="options">
                <li class="option">
                    <a href="galery.php">
                        GALERIA
                    </a>
                </li>
                <li class="option">
                    <a href="https://wa.me/+525564477055?text=perro" target="_blank">
                        <i class="fab fa-whatsapp" aria-hidden="true"></i>
                        <span> 55 6447 7055</span>
                    </a>
                </li>
                <li class="option">
                    <a href="mailto:ing.Angel_mendoza@outlook.com">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <span>contacto@diseñosdifmx.com</span>
                    </a>
                </li>
                <?php
                if (!isset($_SESSION['ID'])) {
                ?>
                    <li class="option">
                        <a href="login.php">
                            INICIA SESION
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="option" id="btn-down">

                        NAME USER
                        <i class="fa fa-caret-down" aria-hidden="true"></i>

                        <ul class="sub-menu" id="sub-menu">
                            <li><a class="dropdown-item" href="#">PERFIL</a></li>
                            <li><a class="dropdown-item" href="#">CONFIGURACIÓN</a></li>
                            <hr>
                            <li><a class="dropdown-item" href="#">CERRAR SESIÓN</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </header>
    <main>
        <footer class="container-fluid pt-2 text-center border-top">
            <div class="row text-center">
                <div class="col-12 col-md-3 my-auto">
                    <img src="resources/imgs/logo/LogoTxt.png" alt="" width="100%">
                </div>
                <a href="https://goo.gl/maps/YBi143Dkhzczmei86" target="_blank" class="col-12 col-md-3 my-auto" style="color: #fff; text-decoration: none;">
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    &nbsp;
                    San Miguel Zapotitla, 13310, Tlahuac, CDMX.
                </a>
                <div class="col-12 col-md-3 my-auto">
                    <ul class="ops-foot my-auto mt-2 mb-2">
                        <li class="rs-card" id="facebook">
                            <a href="">
                                <i class="fab fa-facebook-square" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="rs-card" id="insta">
                            <a href="">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="https://wa.me/+525564477055?text=I'm%20inquiring%20about%20the%20apartment%20listing" target="_blank" class="col-12 col-md-3 my-auto phone-text" style="font-size: 30px; color: #fff; text-decoration: none;">
                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                    55 3551 2583
                </a>
            </div>
        </footer>
    </main>
</body>

</html>