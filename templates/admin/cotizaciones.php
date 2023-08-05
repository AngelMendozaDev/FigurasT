<?php
require_once "header.php";
require_once "../../models/Cotiza.php";
$model = new Cotiza();
$res = $model->getCotiza(0);
?>

<link rel="stylesheet" href="../../resources/css/ctrlCotizacion.css">


<div class="container mt-5 mb-5">
    <div class="row">
        <center>
            <h1 class="display-6">
                Control de Presupuestos
            </h1>
            <hr style="width: 80%; background-color: black;">
        </center>
    </div>
    <div class="row mt-3">
        <div class="col-12 mx-auto cont-table">
            <table class="table table-bordered table-hover" id="tabla">
                <thead class="table-info">
                    <tr class="text-center">
                        <th>Fecha de solicitud</th>
                        <th>Solicitante</th>
                        <th>Telefono</th>
                        <th>Correo electronico</th>
                        <th>Controles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($item = $res->fetch_assoc()) {
                        $name = $item['nombre'] . "%20" . $item['app'] . "%20" . $item['apm'];?>
                        <tr class="text-center">
                            <td><?php echo $item['fecha_pres']; ?></td>
                            <td><?php echo $item['nombre'] . " " . $item['app'] . " " . $item['apm']; ?></td>
                            <td><?php echo $item['telefono']; ?></td>
                            <td><?php echo $item['mail']; ?></td>
                            <td>
                                <a class="btn bnt-small btn-primary" href="tel:<?php echo $item['telefono']; ?>">
                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                </a>
                                &nbsp;
                                <a class="btn bnt-small btn-success" href="https://wa.me/+52<?php echo $item['telefono'] ?>?text=Hola,<?php echo $name; ?>,%20me%20comunico%20de%20PUBLIVOLIMETRICOS%20para%20información%20sobre%20tu%20diseño." target="_blank">
                                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                </a>
                                &nbsp;
                                <a class="btn bnt-small btn-warning" href="mailto:<?php echo $item['mail']; ?>" >
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once "footer.php"; ?>
<script>
    $(function() {
        console.log("perro");
        $('#tabla').DataTable();

    });
</script>