<?php
require_once "../models/User.php";
$model = new User();
echo $model->newDomicilio($_POST);
?>