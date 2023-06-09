<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diseños diferenciales MX</title>
    <link rel="icon" href="resources/imgs/logo/logo.png">
    <link rel="stylesheet" href="resources/libs/bootstrap_5/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/libs/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="resources/css/menus.css">
    <link rel="stylesheet" href="resources/css/general.css">
    <link rel="stylesheet" href="resources/css/login.css">
</head>

<body>

    <div class="contenedor">
        <form class="login" method="post" onsubmit="return setLogin()" id="form-log">
            <input type="text" name="action" value="L" hidden>
            <header>
                <div class="rounded-circle">
                    <img src="resources/imgs/logo/logo.png" width="100%" alt="Logo DideñosDiferenciales">
                </div>
            </header>
            <div class="block-separador">
                <div class="cont">
                    <div class="line-s"></div>
                </div>
            </div>
            <h4 class="subtitle-text text-center mt-3">
                Diseños diferenciales MX
            </h4>

            <div class="input-group mt-3">
                <span class="input-group-text">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                </span>
                <input type="text" placeholder="Correo / Numero Telefonico" class="form-control" id="user" name="user" maxlength="60" required>
            </div>
            <div class="input-group mt-3">
                <span class="input-group-text">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
                <input type="password" placeholder="contraseña" class="form-control" id="pass" name="pass">
            </div>
            <br>
            <center>
                <button class="btn btn-primary btn-block">
                    Ingresar
                </button>
            </center>
            <br>
            <center>
                <p>¿Aún no tienes una cuenta? <span id="regis" style="color: cyan; cursor:pointer;">REGISTRATE</span></p>
            </center>
        </form>

        <form class="register" method="post" onsubmit="return setInfo()" id="form-reg">
            <input type="text" name="action" value="R" hidden>
            <header>
                <div class="rounded-circle">
                    <img src="resources/imgs/logo/logo.png" width="100%" alt="Logo DideñosDiferenciales">
                </div>
            </header>
            <h4 class="subtitle-text">
                Registro de usuarios
            </h4>
            <div class="input-group mb-3">
                <span class="input-group-text">Nombre(s):</span>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Apellidos:</span>
                <input type="text" name="app" placeholder="Paterno" class="form-control" required>
                <input type="text" name="apm" placeholder="Materno" class="form-control" required>
            </div>
            <div class="input-group mb-3">
                <label for="" class="input-group-text">
                    Teléfono:
                </label>
                <input type="numero" class="form-control" maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="phone" required>
            </div>
            <div class="input-group mb-3">
                <input type="email" id="mail" placeholder="Correo" class="form-control" required>
                <input type="email" id="mail2" placeholder="Confirmación" name="mail" class="form-control" required>
            </div>
            <div class="input-group mb-3">
                <input type="password" placeholder="Contaseña" id="pass1" class="form-control" required>
                <input type="password" placeholder="Confirmación" id="pass2" name="pass" class="form-control" required>
            </div>

            <center>
                <button class="btn btn-primary btn-block">
                    Registrarme
                </button>
            </center>
            <br>
            <center>
                <p>¿Ya tienes una cuenta? <span id="logi" style="color: cyan; cursor:pointer;">INICIA SESIÓN</span></p>
            </center>
        </form>
    </div>
    <script src="resources/libs/jquery.js"></script>
    <script src="resources/libs/bootstrap_5/js/bootstrap.min.js"></script>
    <script src="resources/libs/fontawesome/js/all.min.js"></script>
    <script src="resources/libs/sweetalert.js"></script>
    <script src="resources/js/login.js"></script>
</body>

</html>