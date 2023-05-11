<?php require_once "header.php"; ?>
<link rel="stylesheet" href="../../resources/css/cotizacion.css">

<div class="container mt-3 mb-3">
    <div class="row">
        <center>
            <h1 class="display-5 fw-normal">
                Historial de cotizaciones
            </h1>
            <hr style="background-color: #000;">
        </center>
    </div>
    <div class="row mt-2 mt-3">
        <div class="col-sm-12 col-md-3">
            <button class="btn btn-primary" id="btn-newC">
                <i class="fa fa-plus" aria-hidden="true"></i>
                &nbsp;
                Nueva cotización.
            </button>
        </div>
    </div>
    <div class="row mt-3 mb-3" id="zone-cot">
        <div class="col-12">
            <div class="mb-2" style="text-align: right;">
                <button class="btn btn-outline-danger" id="btn-closeC">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <form class="form-cotizacion" id="form-cotizacion">
                <div class="row">
                    <div class="col-sm-12 col-md-7 mx-auto">
                        <div class="input-group">
                            <span class="input-group-text">Medidas</span>
                            <input type="number" placeholder="Alto" name="" class="form-control campo">
                            <input type="number" placeholder="Ancho" name="" class="form-control campo">
                            <input type="number" placeholder="Largo" name="" class="form-control campo">
                        </div>
                        <div class="input-group mt-3 mb-3">
                            <label class="input-group-text" for="uso-pza">Options</label>
                            <select class="form-select campo" id="uso-pza">
                                <option value="" disabled selected>Selecciona el uso que le dara!</option>
                                <option value="Ex-H">Exhibición por horas</option>
                                <option value="Ex-D">Exhibición por dias</option>
                                <option value="Ex-P">Exhibición permanente</option>
                                <option value="Montable">Pieza montable</option>
                                <option value="Decorativa">Pieza decorativa</option>
                                <option value="Otro">Otro...</option>
                            </select>
                        </div>
                        <input type="text" placeholder="¿Que uso le dara?" id="otro" class="form-control campo">
                        <div class="acabado row mt-3">
                            <?php for ($i = 0; $i < 4; $i++) { ?>
                                <div class="groupT">
                                    <div class="img-box">
                                        <img src="../../resources/imgs/genaral/realista.avif" alt="">
                                    </div>
                                    <label>Realista</label>
                                    <input type="radio" name="acabado" value="1">
                                </div>
                            <?php } ?>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">
                                Piezas que desea:
                            </span>
                            <input type="number" class="form-control campo" name="" placeholder="5pz" max="100" min="1" required>
                        </div>

                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                            <label for="floatingTextarea">Comentarios Adicionales</label>
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-5 mx-auto">
                        <div class="lienzo">
                            <div class="drag-area" id="drag-area">
                                <div class="cont-drag w-75 text-center">
                                    <div class="icon">
                                        <i class="fa fa-image" aria-hidden="true"></i>
                                    </div>

                                    <span class="header">
                                        Arrastra tu imagen de referencia
                                    </span>
                                    <br>
                                    <span class="support">Extenciones permitidas: JPG, JPEG, PNG</span>
                                </div>
                                <img class="imgs">
                            </div>

                            <h6 class="display-6 text-center">Paleta de colores</h6>
                            <div class="color-lienzo-p row">
                            </div>
                        </div>
                    </div>
                </div>
                <center>
                    <button class="btn btn-outline-primary mt-5 mb-3">
                        Solicitar cotizacion
                    </button>
                </center>
            </form>
        </div>
    </div>
</div>

<?php require_once "footer.php"; ?>
<script src="../../resources/libs/color-thief/dist/color-thief.min.js"></script>
<script src="../../resources/js/cotizacion.js"></script>