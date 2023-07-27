<?php
require_once "header.php";
require_once "../../models/User.php";
$model = new User();

$data = $model->getInfo($_SESSION['ID'])->fetch_assoc();
$res = $model->getDomicilio($_SESSION['ID']);

?>

<div class="container">
    <div class="row mt-3">
        <center>
            <h1>
                Mi información
            </h1>
            <hr style="width: 80%">
        </center>
    </div>
    <div class="row">
        <div class="col-12 mx-auto">

            <div class="input-group w-50 mb-3">
                <span class="input-group-text">
                    N° de cliente:
                </span>
                <input type="text" class="form-control" name="folio" value="<?php echo $data['ID_user']; ?>" required readonly>
                <span class="input-group-text ml-2">
                    Se unio:
                </span>
                <input type="text" class="form-control" name="fecha" value="<?php echo $data['fecha']; ?>" required readonly>
            </div>

            <div class="input-group w-75 mb-3">
                <span class="input-group-text">
                    <i class="fas fa-user"></i>
                </span>

                <input type="text" class="form-control campo" name="name" value="<?php echo $data['nombre']; ?>" placeholder="Nombre(s)" readonly required>
                <input type="text" class="form-control campo" name="app" value="<?php echo $data['app']; ?>" placeholder="Apellido Paterno" readonly required>
                <input type="text" class="form-control campo" name="apm" value="<?php echo $data['apm']; ?>" placeholder="Apellido Materno" readonly required>
            </div>

            <div class="flex-group d-flex">
                <div class="input-group w-50 mb-3">
                    <span class="input-group-text">
                        <i class="far fa-envelope"></i>
                        &nbsp;
                        Mail:
                    </span>
                    <input type="text" class="form-control campo" name="mail" value="<?php echo $data['mail']; ?>" required readonly>
                </div>
                <div class="input-group w-50 mb-3">
                    <span class="input-group-text">
                        <i class="fab fa-whatsapp"></i>
                        &nbsp;
                        Telefono:
                    </span>
                    <input type="text" class="form-control campo" name="phone" value="<?php echo $data['telefono']; ?>" required readonly>
                    <button class="btn btn-primary btn-small" id="btn-ref">
                        <i class="fa fa-refresh" aria-hidden="true"></i>
                    </button>
                </div>
            </div>



        </div>
    </div>

    <div class="row mt-2">
        <div class="col-12 col-md-4">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDomicilio">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                &nbsp;
                Agregar Domicilio
            </button>
        </div>
    </div>

        <div class="row mb-5">
            <div class="col-12 mx-auto">
                <?php while($dom = $res->fetch_assoc()){ ?>
                <div class="input-group mt-3">
                    <textarea class="form-control h-100 " cols="30" rows="3"><?php echo $dom['calle'] . ", " . $dom['colonia'] . ", " . $dom['cp'] . ", " . $dom['estado'] . ", " . $dom['municipio'] . ".\n" . $dom['referencia'] ?>
                    </textarea>
                    <button class="btn btn-small btn-danger">
                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                    </button>
                </div>
                <?php } ?>
            </div>
        </div>


</div>


<!-- Modal -->
<div class="modal fade" id="modalDomicilio" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalDomicilioLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalDomicilioLabel">Nuevo Domicilio</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form onsubmit="return sendDom()" id="form-dom">
                    <input type="text" value="<?php echo $_SESSION['ID']; ?>" name="user" required hidden>
                    <div class="input-group">
                        <span class="input-group-text">
                            Calle y numero:
                        </span>
                        <input type="text" class="form-control" name="calle" placeholder="Calle" required>
                        <input type="text" class="form-control" name="number" placeholder="Numero - S/N" required>
                    </div>

                    <div class="input-group w-50 mt-3">
                        <span class="input-group-text">
                            Código Postal:
                        </span>
                        <input type="number" class="form-control" id="cp-input" name="clave-cp" placeholder="Codigo postal" maxlength="6" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                    </div>

                    <div class="flex-group mt-3 d-flex">
                        <div class="input-group w-50 mb-3">
                            <span class="input-group-text">
                                &nbsp;
                                Colonia:
                            </span>
                            <select class="form-select dom-camp" name="colonia" id="colonia" required>
                                <option value="">Selecciona una colonia</option>
                            </select>
                        </div>
                        <div class="input-group w-50 mb-3">
                            <span class="input-group-text">
                                &nbsp;
                                Municipio:
                            </span>
                            <input type="text" class="form-control dom-camp" id="municipio" required readonly>
                        </div>
                    </div>

                    <div class="input-group">
                        <span class="input-group-text">
                            Estado:
                        </span>
                        <input type="text" id="estado" class="form-control dom-camp" readonly required>
                    </div>

                    <textarea name="referencia" id="referencia" cols="30" rows="3" placeholder="Indicanos algunas referencias" maxlength="160" class="form-control h-100 mt-3" required></textarea>

                    <br>
                    <hr>
                    <center>
                        <button type="submit" class="btn btn-success">
                            Agregar Domicilio
                        </button>
                    </center>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php require_once "footer.php"; ?>
<script src="../../resources/js/info.js"></script>