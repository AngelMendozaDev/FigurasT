<?php require_once "header.php"; ?>
<link rel="stylesheet" href="../../resources/css/cotizacion.css">

<div class="container mt-3 mb-3">
    <div class="row">
        <center>
            <h1 class="display-5 fw-normal">
                Generar Cotización
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
    <form class="row mt-3 mb-3" action="../../controllers/cotizacion.php" enctype="multipart/form-data" method="post" id="zone-cot">
        <div class="cont">
            <button type="button" class="btn btn-outline-danger d-flex" id="btn-closeC">
                <i class="fa fa-times" aria-hidden="true"></i>
            </button>
        </div>
        <input type="text" name="sol" value="<?php echo $_SESSION['ID']; ?>" hidden>
        <div class="col-sm-12 col-md-5 mx-auto">
            <div class="lienzo">
                <div class="drag-area button" id="drag-area">
                    <div class="cont-drag w-75 text-center">
                        <div class="icon">
                            <i class="fa fa-image" aria-hidden="true"></i>
                        </div>

                        <span class="header">
                            Agreaga tu imagen de referencia
                            <span class="button" style="font-weight: 700; cursor:pointer; color: #3498DB;">Busca en tu explorador</span>
                        </span>
                        <br>
                        <input type="file" id="inp" name="img" hidden>
                        <span class="support">Extenciones permitidas: JPG, JPEG, PNG</span>
                    </div>
                    <img class="imgs">
                </div>

                <h6 class="display-6 text-center">Paleta de colores</h6>
                <div class="color-lienzo-p row">
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-7 mx-auto">
            <div class="input-group">
                <span class="input-group-text mb-3">
                    Medidas
                    &nbsp;
                    <i class="fa fa-info-circle" style="color: #3498DB; cursor: pointer;" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#modalMedidas"></i>
                </span>
                <input type="number" placeholder="Alto" min="1" max="90" step="0.1" name="alto" class="form-control campo" required>
                <input type="number" placeholder="Ancho" min="1" max="90" step="0.1" name="ancho" class="form-control campo" required>
                <input type="number" placeholder="Largo" min="1" max="90" step="0.1" name="largo" class="form-control campo" required>
            </div>

            <center>
                <h5>
                    Posicion de tu figura
                </h5>
            </center>
            <div class="input-group mb-3">
                <div class="group">
                    <label for="vertical" style="cursor: pointer;">
                        <i class="fas fa-ruler-vertical icon"></i>
                    </label>
                    <br>
                    <input type="radio" class="campo" name="posicion" value="V" id="vertical" required> Vertical
                </div>
                <div class="group">
                    <label for="horizontal" style="cursor: pointer;">
                        <i class="fas fa-ruler-horizontal icon"></i>
                    </label>
                    <br>
                    <input type="radio" class="campo" name="posicion" value="H" id="horizontal" required> Horizontal
                </div>
            </div>

            <div class="input-group mb-3">
                    <label class="input-group-text">
                        Cantidad de Piezas:
                    </label>
                    <input type="number" class="form-control campo" min="1" max="99" style="border: solid 1px rgba(0,0,0,0.3);" name="pz" required>
                </div>

            <div class="input-group mb-3">
                <label class="input-group-text">
                    Tiempo de uso:
                </label>
                <select name="uso" id="uso" class="form-select campo">
                    <option value="" selected disabled>Selecciona el uso que le daras a tú pieza</option>
                    <option value="Ex.H">Exposición por horas</option>
                    <option value="Ex.D">Exposición por dias</option>
                    <option value="Ex.P">Exposición permanente</option>
                    <option value="Montable">Montable</option>
                    <option value="Decoracion">Decoración</option>
                    <option value="otro">Otro...</option>
                </select>
            </div>

            <div id="lienzo">
                
            </div>

            <hr style="color: #000; background-color: #000;">

            <center>
                <h5>
                    Acabado que deseas
                </h5>
            </center>
            <div class="cont-horizontal">
                <div class="group">
                    <label for="realista" class="box-img" style="cursor: pointer;">
                        <img src="../../resources/imgs/genaral/reslist.jpg" alt="">
                    </label>
                    <br>
                    <input type="radio" class="campo" name="acabado" value="REALISTA" id="realista" required> REALISTA
                </div>

                <div class="group">
                    <label for="Textura" class="box-img" style="cursor: pointer;">
                        <img src="../../resources/imgs/genaral/textura.jpg" alt="">
                    </label>
                    <br>
                    <input type="radio" class="campo" name="acabado" value="TEXTURA" id="Textura" required> TEXTURA
                </div>


                <div class="group">
                    <label for="Minimalista" class="box-img" style="cursor: pointer;">
                        <img src="../../resources/imgs/genaral/mini.jpg" alt="">
                    </label>
                    <br>
                    <input type="radio" class="campo" name="acabado" value="MINIMALISTA" id="Minimalista" required> MINIMALISTA
                </div>

                <div class="group">
                    <label for="Liso" class="box-img" style="cursor: pointer;">
                        <img src="../../resources/imgs/genaral/lis.jpg" alt="">
                    </label>
                    <br>
                    <input type="radio" class="campo" name="acabado" value="LISO" id="Liso" required> LISO
                </div>

            </div>

            <hr style="color: #000; background-color: #000;">

            <center>
                <h5>
                    Tipo de Pintura
                </h5>
            </center>

            <div class="cont-horizontal">
                <div class="group">
                    <label for="detalle" class="box-img" style="cursor: pointer;">
                        <img src="../../resources/imgs/genaral/detalle.jpg" alt="">
                    </label>
                    <br>
                    <input type="radio" class="campo" name="pintura" value="DETALLADO" id="detalle" required> DETALLADO
                </div>

                <div class="group">
                    <label for="Color" class="box-img" style="cursor: pointer;">
                        <img src="../../resources/imgs/genaral/color.jpg" alt="">
                    </label>
                    <br>
                    <input type="radio" class="campo" name="pintura" value="SOLO COLOR" id="Color" required> SOLO COLOR
                </div>
            </div>

            <center>
                <h5>
                    Detalles extra
                </h5>
            </center>
            <textarea class="comment campo" name="comentario" cols="30" rows="5" placeholder="Comentarios:"> </textarea>


        </div>

        <hr>

        <center>
            <button type="submit" class="btn btn-success campo">
                <i class="fa fa-save" aria-hidden="true"></i>
                Generar presupuesto
            </button>
        </center>

    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="modalMedidas" tabindex="-1" aria-labelledby="modalMedidasLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalMedidasLabel">¿Como mido mi figura?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <video src="../../resources/imgs/genaral/MEDIDAS.mp4" preload autoplay muted loop width="100%"></video>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<?php require_once "footer.php"; ?>
<script src="../../resources/libs/color-thief/dist/color-thief.min.js"></script>
<script src="../../resources/js/cotizacion.js"></script>
<script>
    response = "<?php if(isset($_GET['res'])){ echo $_GET['res']; } ?>"
    console.log(response);
    if(response == 1){
        swal("Cotización enviada exitosamente","PubliVolumetricos","success").then(evt => {
            location.href = "cotizaciones.php";
        })
    }
    else if(response == 2){
        swal("Oops Ocurrio un error, intenalo de nuevo","PubliVolumetricos","error").then(evt => {
            location.href = "cotizaciones.php";
        })
    }
</script>