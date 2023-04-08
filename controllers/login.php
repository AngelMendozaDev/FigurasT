<?php
session_start();
require_once "../models/control.php";
$model = new Control();
//print_r($_POST);

if ($_POST['action'] == 'R')
    echo $model->newUser($_POST);
else
    echo $model->login($_POST['user'],$_POST['pass']);
