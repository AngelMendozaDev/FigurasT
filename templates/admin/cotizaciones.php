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
                Cotizacion por atender
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


<!-- Modal Presupuesto -->
<div class="modal fade" id="modal-presupuesto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-presupuestoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal-presupuestoLabel">Asignacion de presupuesto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <hr>
                <form method="post" onsubmit="return setPrice()" id="form-price">
                    <div class="input-group w-50 mb-3">
                        <span class="input-group-text">
                            Folio: #
                        </span>
                        <input type="number" class="form-control" name="folio" id="folio" readonly required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            Presupuesto:
                        </span>
                        <input type="text" class="form-control" placeholder="$000,000,000.00" name="precio" id="precio" required>
                        <input type="text" name="price" id="price" readonly hidden required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            Tiempo de elaboración:
                        </span>
                        <input class="form-control" type="text" placeholder="Formato de dias NATURALES" id="dias" required>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            Fecha Entrega:
                        </span>
                        <input class="form-control" type="date" name="fecha" id="F_Entrega" readonly required>
                    </div>

                    <hr>
                    <center>
                        <button type="submit" class="btn btn-success">
                            Guardar
                            <i class="fa fa-save" aria-hidden="true"></i>
                        </button>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<?php require_once "footer.php"; ?>
<script>
    function presupuesto(number) {
        let aux = ('0000' + number).slice(-5);
        $('#folio').val(aux);
    }

    function setDateDelivery(days) {

        days = parseInt(days);

        let meses = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
        let dia = 0,
            mes = 0,
            ano = 0,
            diasMes = 0;

        var now = new Date();

        dia = (now.getDate() + days);
        mes = now.getMonth();
        ano = now.getFullYear();

        while (dia > diasMes) {
            diasMes = meses[mes];
            if (dia > diasMes) {
                mes += 1;
                dia = dia - diasMes;
                if (mes > 11) {
                    mes = 0;
                    ano += 1;
                }
            }
        }

        mes++;

        mes = mes < 10 ? "0" + mes : mes;
        dia = dia < 10 ? "0" + dia : dia;

        fechaI = ano + "-" + mes + "-" + dia;

        $('#F_Entrega').val(fechaI);
    }

    function setPrice() {
        let moneda = $('#price').val();
        swal({
                title: "Esta seguro de la cantidad ingresada?",
                text: "[  " + moneda + ".00 MNX.  ]",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '../../controllers/ctrlCotiza.php',
                        type: 'POST',
                        data: $('#form-price').serialize(),
                        success: function(response) {
                            console.log(response);
                            if (response == 1) {
                                swal({
                                    title: "Precio establecido!",
                                    text: "Publivolumetricos",
                                    icon: "success"
                                }).then((value) => {
                                    location.reload();
                                })
                            }
                        }
                    });
                } else {
                    $('#precio').focus();
                }
            });
        return false;
    }

    
    function formatearNumero(numero) {
        numero = parseFloat(numero);
        return numero.toLocaleString(undefined, {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        });
    }

    $(function() {
        $('#tabla').DataTable();

        $('#dias').focus(function() {
            if ($('#price').val() != "")
                $('#precio').val("$" + formatearNumero($('#price').val()));
        });

        $('#dias').keyup(function() {
            var d = $('#dias').val().replace(/[+\-*/.]/g, "");

            if (d == "") {
                $('#F_Entrega').val("");
            } else {
                setDateDelivery(d);
            }

        });

        $('#precio').keyup(function(event) {
            var valor = event.target.value;
            var numeros = valor.replace(/[^0-9.]/g, '');
            event.target.value = numeros;
            $('#price').val(numeros);
        });


    });
</script>