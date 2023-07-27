<?php require_once "header.php"; ?>
<div class=" overflow-hidden p-3 p-md-5 text-center" style="height: 100vh; background-color: #CCD1D1;">
    <div class="col-md-6 p-lg-6 mx-auto my-auto" style="position: absolute; top:50%; left:50%; transform: translate(-50%,-50%);">
        <h1 class="display-5 fw-normal">Bienvenido(a)</h1>
        <h1 class="display-6 fw-normal"><?php  echo $_SESSION['name']; ?></h1>
        <p class="lead fw-normal"></p>
        <a class="btn btn-outline-info" href="history.php">Mis cotizaciones.</a>
    </div>
</div>

<?php require_once "footer.php"; ?>