<?php
require_once "header.php";
require_once "../../models/Cotiza.php";
$model = new Cotiza();
$res = $model->getCotizaciones($_SESSION['ID']);
?>

<style>
.v-align td {
    vertical-align: middle;
}

.img-content {
    width: 100px;
    height: 100px;
}

.img-content img {
    width: 100px;
    height: 100px;
    object-fit: cover;
}
</style>

<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-12">
            <center>
                <h1 class="display-5 fw-normal">
                    Historial de cotizaciones
                </h1>
                <hr style="background-color: #000;">
            </center>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12 table-cont">
            <table class="table table-hover table-bordered table responsive" id="tabla">
                <thead class="table-primary">
                    <tr class="text-center">
                        <th>N° Orden</th>
                        <th>Fecha Solicitud</th>
                        <th>Referencia Fotografica</th>
                        <th>Piezas</th>
                        <th>Presupuesto</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($item = $res->fetch_assoc()) { ?>
                    <tr class="text-center v-align">
                        <td><?php echo $item['folio_pres']; ?></td>
                        <td><?php echo $item['fecha_pres']; ?></td>
                        <td class="img-content">
                            <img src="../../resources/imgs/cotiza/<?php echo $item['folio_pres']; ?>.jpeg"
                                alt="Imagen de referencia no disponible">
                        </td>
                        <td><?php echo $item['piezas']; ?></td>
                        <td> $ <?php echo number_format($item['precio'], 2, '.', ','); ?></td>
                        <td>

                        <?php if($item['precio'] != '0.00'){ ?>
                            <!--d-block mb-1
d-block mb-1
d-block mb-1-->
                            <a class="btn btn-warning btn-small"
                                href="#" target="_blank">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <a class="btn btn-success btn-small"
                                href="#" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                            <a class="btn btn-outline-danger btn-small"
                                href="cotizacion.php?user=<?php echo $item['folio_pres']; ?>" target="_blank">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                            <?php } else{ ?>
                            <button class="btn btn-primary btn-small" data-bs-toggle="modal"
                                data-bs-target="#modalImage" onclick="setImage('<?php echo $item['folio_pres'] ?>')">
                                <i class="fa fa-image" aria-hidden="true"></i>
                            </button>
                            <a class="btn btn-outline-danger btn-small"
                                href="cotizacion.php?user=<?php echo $item['folio_pres']; ?>" target="_blank">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                            <?php } ?>

                            
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="modalImageLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalImageLabel">Imagen de Referencia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" width="100%" id="foto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<?php require_once "footer.php" ?>
<script src="../../resources/js/history.js"></script>