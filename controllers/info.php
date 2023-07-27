<?php
require_once "../models/User.php";
$model = new User();

echo json_encode($model->getCP($_POST['cp']));

?>