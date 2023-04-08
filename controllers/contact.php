<?php
    print_r($_POST);

    $para      = 'nobody@example.com';
    $titulo    = $_POST['name']. " Solicita ayuda!";

    $message = "Nombre: ". $_POST['name']. " \n".
    "Correo: ". $_POST['email']."\n".
    "Telefono: ". $_POST['phone']. "\n".
    "Mensaje: ". $_POST['message'];

    $cabeceras = 'From: fig@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    //mail($para, $titulo, $mensaje, $cabeceras);

    print_r($message."---". $cabeceras);
?>
<script>
    alert("Listo se envio...")
</script>

<?php
header("location:../index.php");
?>