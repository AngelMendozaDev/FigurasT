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
        <div class="login">
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
                <input type="email" placeholder="user@email.com" class="form-control" id="pass" name="user" maxlength="60" required>
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
        </div>
        <div class="register">
            <div class="input-group mb-3">
                <span class="input-group-text">Nombre(s):</span>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Apellidos:</span>
                <input type="text" name="app" placeholder="Paterno" class="form-control">
                <input type="text" name="apm" placeholder="Materno" class="form-control">
            </div>
            <div class="input-group mb-3">
                <input type="email" id="mail" placeholder="Correo" class="form-control">
                <input type="email" id="mail2" placeholder="Confirmación" name="mail" class="form-control">
            </div>
            <div class="input-group mb-3">
                <input type="password" placeholder="Contaseña" id="pass" class="form-control">
                <input type="password" placeholder="Confirmación" id="pass2" name="pass" class="form-control">
            </div>

            <center>
                <button class="btn btn-primary btn-block">
                    Registrarme
                </button>
            </center>
        </div>
    </div>

</body>

</html>