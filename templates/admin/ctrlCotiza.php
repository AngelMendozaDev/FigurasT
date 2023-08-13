<?php
require_once "header.php";
require_once "../../models/Cotiza.php";
$model = new Cotiza();
$res = $model->getCotiza(0);

$ext = array('png', 'jpeg', 'jpg');
$flag = false;

?>

<link rel="stylesheet" href="../../resources/css/ctrlCotizacion.css">


<div class="container-fluid mt-5 mb-5">
    <div class="row">
        <center>
            <h1 class="display-6">
                Control de cotizaciones
            </h1>
            <hr width="80%">
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
                        <th>Image</th>
                        <th>Contacto</th>
                        <th>Orden</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($item = $res->fetch_assoc()) {
                        $name = $item['nombre'] . "%20" . $item['app'] . "%20" . $item['apm']; ?>
                        <tr class="text-center ">
                            <td class="h-100"><?php echo $item['fecha_pres']; ?></td>
                            <td><?php echo $item['nombre'] . " " . $item['app'] . " " . $item['apm']; ?></td>
                            <td><?php echo $item['telefono']; ?></td>
                            <td>
                                <?php
                                $nombre_fichero = '../../resources/imgs/cotiza/' . $item['folio_pres'];
                                for ($i = 0; $i < count($ext); $i++) {
                                    //$pdf->Cell(30,5, $nombre_fichero . '.' .$ext[$i], 0,1,'C');
                                    if (file_exists($nombre_fichero . '.' . $ext[$i])) {
                                        $nombre_fichero = '../../resources/imgs/cotiza/' . $item['folio_pres'] . '.' . $ext[$i];
                                        $flag = true;
                                    }
                                } ?>


                                <?php
                                if ($flag == false) {
                                    $nombre_fichero = '../../resources/imgs/cotiza/noImage.png';
                                }
                                $flag = false;

                                ?>
                                <img src="<?php echo $nombre_fichero; ?>" height="100px" width="100px" style="object-fit: cover;">
                            </td>
                            <td>
                                <a class="btn bnt-small btn-primary" href="tel:<?php echo $item['telefono']; ?>">
                                    <i class="fa fa-phone-square" aria-hidden="true"></i>
                                </a>
                                &nbsp;
                                <a class="btn bnt-small btn-success" href="https://wa.me/+52<?php echo $item['telefono'] ?>?text=Hola,<?php echo $name; ?>,%20me%20comunico%20de%20PUBLIVOLIMETRICOS%20para%20información%20sobre%20tu%20diseño." target="_blank">
                                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                </a>
                                &nbsp;
                                <a class="btn bnt-small btn-warning" href="mailto:<?php echo $item['mail']; ?>?subject=Contacto%20para%20cotización.&body=Hola,<?php echo $name; ?>,%20me%20comunico%20de%20PUBLIVOLIMETRICOS%20para%20información%20sobre%20tu%20diseño.">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </a>
                            </td>

                            <td>
                                <a class="btn btn-danger btn-small" href="cotizacion.php?user=<?php echo $item['folio_pres']; ?>" target="_blank">
                                    <i class="fas fa-file-pdf"></i>
                                    <br>
                                    Hoja de servicio
                                </a>
                            </td>

                            <td>
                                <?php if ($item['precio'] == '0.00') { ?>
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-presupuesto" onclick="presupuesto('<?php echo $item['folio_pres']; ?>')">
                                        <i class="fas fa-dollar-sign"></i>
                                        <br>
                                        Asignar Precio.
                                    </button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require_once "footer.php"; ?>