<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:Publivolumetricos:.</title>
    <link rel="icon" href="resources/imgs/logo/logo.png">
    <link rel="stylesheet" href="resources/libs/bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/libs/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="resources/css/menus.css">
    <link rel="stylesheet" href="resources/css/inicio.css">
    <link rel="stylesheet" href="resources/css/general.css">
</head>

<body>
    <header class="menu-bar">
        <a href="index.php" class="section-left" style="text-decoration: none; color: #fff;">
            <img src="resources/imgs/logo/logo.png" height="70px" alt="logo-m&m">
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
                    <a href="https://wa.me/+525562548492?text=Hola,%20requiero%20información" target="_blank">
                        <i class="fab fa-whatsapp" aria-hidden="true"></i>
                        55 6254 8492
                    </a>
                </li>
                <li class="option">
                    <a href="mailto:contacto@publivolumetricos.com">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <span>contacto@publivolumetricos.com</span>
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

    <div class="sidebar">
        <div class="cont-btn">
            <input type="checkbox" id="status-menu" hidden>
            <label for="status-menu" class="btn btn-small btn-info">
                <i class="fas fa-bars"></i>
            </label>
        </div>
        <div class="head-side">
            <br>
            <center>
                <h1 class="frase">
                    Publivolumetricos
                </h1>
            </center>
            <br>
        </div>
        <hr>
        <div class="side-body">
            <ul class="nav-menu">
                <li class="option-menu">
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        &nbsp;
                        Inicio
                    </a>
                </li>
                <li class="option-menu">
                    <a href="galery.php">
                        Galeria
                    </a>
                </li>

                <li class="option-menu">
                    <a href="https://wa.me/+525562548492?text=Hola,%20requiero%20información" target="_blank">
                        <i class="fab fa-whatsapp" aria-hidden="true"></i>
                        55 6254 8492
                    </a>
                </li>
                <li class="option-menu">
                    <a href="mailto:contacto@publivolumetricos.com" style="font-size: 18px;">
                        <i class="fas fa-envelope" aria-hidden="true"></i>
                        <span>contacto@publivolumetricos.com</span>
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
        <hr>
        <div class="foot-side">
            <p class="texto my-auto">
                Power By 
                <a href="https://lumega-mx.com" target="_blank ">
                    LUMEGA-MX
                </a>
            </p>
        </div>
    </div>


    <main>

        <div class="container-fluid py-4">
            <div class="p-3 mb-4 bg-light rounded-3 cont-principal">
                <div class="py-1 text1">
                    <h1 class="display-5 title-text">¿Quienes Somos?</h1>
                    <p class="col-md-12 fs-4 body-text">
                        Somos una empresa dedicada a la fabricación de productos, personajes temáticos,
                        figuras publicitarias y artículos de fibra de vidrio comprometida a cumplir y cubrir
                        las necesidades de nuestros clientes proporcionales productos de alta calidad y
                        durabilidad.
                    </p>
                    <a class="btn btn-dark btn-lg btn-galery1" type="button" href="galery.php">
                        Algunos diseños
                        &nbsp;
                        <i class="fas fa-arrow-circle-right" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="container-img">
                    <img src="resources/imgs/Fig/15.jpg" alt="">
                </div>
            </div>

            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <div class="h-100 p-4 text-white bg-dark rounded-3">
                        <h2 class="title-text">¿Que es la fibra de vidrio?</h2>
                        <p class=" body-text">
                            La fibra de vidrio es el material compuesto de filamentos de vidrio que puede adoptar diversos formatos textiles
                            como tubos mallas y tejidos. Este material es caracterizado por ser un material muy ligero resistente, estable y
                            es ser un buen aislante térmico, es utilizado en muchas aplicaciones que involucran la construcción la impermeabilización,
                            la creación de esculturas o la fabricación de tablas de surf, palos de hockey, figuras a escala etc.
                        </p>
                        <div class="container-img" style="width: 10rem; height: 10rem;">
                            <img src="resources/imgs/Fig/13.JPG" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-4 bg-light border rounded-3">
                        <h2 class="title-text">Usos de la fibra de vidrio:</h2>
                        <p class=" body-text">
                            Los materiales con aislamiento a alta temperatura proporcionan una barrea térmica efectiva para las industrias, eso debido a
                            que la fibra de vidrio es duradera, segura y ofrece alto aislamiento térmico.
                            <br>
                            La fibra de vidrio cumple un rol de suma importancia dentro de la industria tales como:
                        </p>
                        <ul>
                            <li>Lavado de automóviles</li>
                            <li>Industria química.</li>
                            <li>Refrigeración.</li>
                            <li>Procesamiento de alimentos.</li>
                            <li>Fuentes y acuarios.</li>
                            <li>Generación de energía.</li>
                            <li>Industria Automotriz.</li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="block-separador">
                <div class="cont">
                    <div class="line-s"></div>
                    <h1 class="title-sep">...</h1>
                </div>
            </div>

            <div class="conatiner-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="img-box">
                            <img src="resources/imgs/Fig/work.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 my-auto">
                        <h1 class="title-text">Cotización personalizada</h1>
                        <p class="body-text">
                            Realiza tú presupuesto personalizado, en unos simples pasos,
                            ingresa una imagen de referencia, contesta un par de preguntas,
                            ingresa las medidas deseadas y listo, en un par de horas podrás
                            tener tu cotización personalizada, podrás tratar directo con el
                            fabricante y pactar la fecha de entrega y envió, no te quedes
                            fuera, pide tu cotización ya mismo.
                        </p>
                        <center>
                            <a href="login.php" class="btn btn-dark">
                                Quiero una cotización
                                &nbsp;
                                <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                            </a>
                        </center>
                    </div>
                </div>
            </div>

            <div class="block-separador">
                <div class="cont">
                    <div class="line-s"></div>
                </div>
            </div>

            <div class="container-fluid mt-3 mb-3 marketing">
                <!-- Three columns of text below the carousel -->
                <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                        <div class="rounded-circle">
                            <i class="fas fa-star"></i>
                        </div>

                        <h3 class="title-text">Diseños exclusivos</h3>
                        <p class="body-text-c">
                            Una imagen habla mas que mil palabras, y una decoración corporativa por igual, diseños únicos para lideres únicos.
                        </p>

                    </div><!-- /.col-lg-4 -->
                    <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                        <div class="rounded-circle">
                            <i class="fas fa-user-cog"></i>
                        </div>

                        <h3 class="title-text">Manofactura Inmediata</h3>
                        <p class="body-text-c">
                            Nuestras manos se ponen a trabajar de inmediato, apenas realizas tu pedido comenzamos a plasmar tus ideas.
                        </p>
                    </div><!-- /.col-lg-4 -->

                    <div class="col-sm-12 col-md-4 col-lg-4 text-center">
                        <div class="rounded-circle">
                            <i class="fas fa-check-double"></i>
                        </div>

                        <h3 class="title-text">La mejor calidad</h3>
                        <p class="body-text-c">
                            Utilizamos la mejor materia prima, para un proyecto duradero y de calidad, respaldada por manos mexicanas.
                        </p>
                    </div><!-- /.col-lg-4 -->
                </div><!-- /.row -->
            </div><!-- /.container -->

            <div class="block-separador">
                <div class="cont">
                    <div class="line-s"></div>
                    <h1 class="title-sep">¿Necesitas ayuda?</h1>
                </div>
            </div>

            <div class="template-contact mb-0">
                <div class="form-box">
                    <form action="controllers/contact.php" method="post">
                        <label class="mt-3 form-label" for="">Nombre:</label>
                        <input type="text" name="name" class="form-control" placeholder="Ej. Angel Mendoza" required>

                        <label class="mt-3 form-label" for="">Correo electrónico:</label>
                        <input type="email" name="email" class="form-control" placeholder="Ej. myMail@m&mu.com" required>

                        <label class="mt-3 form-label" for="">Número telefonico:</label>
                        <input type="text" name="phone" class="form-control" placeholder="Numero a 10 digitos" required>

                        <label class="mt-3 form-label" for="">Cuéntanos que ocurre:</label>
                        <textarea name="message" class="form-control" cols="30" rows="5" placeholder="Cuentanos que es lo que necesitas, nos comunicaremos tan pronto como podamos." required></textarea>

                        <br>

                        <center>
                            <button class="btn btn-my-form">
                                Enviar
                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            </button>
                        </center>

                    </form>
                </div>
            </div>


            <div class="block-separador">
                <div class="cont">
                    <div class="line-s"></div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="card-galery">
                            <img src="resources/imgs/Fig/8.JPG" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card-galery">
                            <img src="resources/imgs/Fig/6.JPG" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card-galery">
                            <img src="resources/imgs/Fig/2.JPG" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="container-fluid pt-2 text-center border-top">
            <div class="row text-center">
                <div class="col-12 col-md-3 my-auto">
                    <img src="resources/imgs/logo/LogoTxt.png" alt="" width="100%">
                </div>
                <a href="https://goo.gl/maps/p7MJd9DrCETjpGCt6" target="_blank" class="col-12 col-md-3 my-auto" style="color: #fff; text-decoration: none;">
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    &nbsp;
                    1ra Priv. San Antonio 90, San Antonio, Iztapalapa, 09900 Ciudad de México, CDMX
                </a>
                <div class="col-12 col-md-3 my-auto">
                    <ul class="ops-foot my-auto mt-2 mb-2">
                        <li class="rs-card" id="facebook">
                            <a href="">
                                <i class="fab fa-facebook-square" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="rs-card" id="insta">
                            <a href="https://www.instagram.com/publivolumetricos/" target="_blank">
                                <i class="fab fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <a href="https://wa.me/+525562548492?text=Hola,%20requiero%20información" target="_blank" class="col-12 col-md-3 my-auto phone-text" style="font-size: 30px; color: #fff; text-decoration: none;">
                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                    55 6254 8492
                </a>
            </div>
        </footer>
    </main>


    <script src="resources/libs/jquery.js"></script>
    <script src="resources/libs/bootstrap_5/js/bootstrap.min.js"></script>
    <script src="resources/js/general.js"></script>

</body>

</html>