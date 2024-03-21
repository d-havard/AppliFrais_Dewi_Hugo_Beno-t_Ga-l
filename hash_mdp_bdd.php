<?php 
$config = include('./config.php');
include("./www/include/class.pdogsb.inc.php");



$pdo = new PdoGsb(
    $config["host"],
    $config["database"],
    $config["user"],
    $config["password"]
);

echo ($pdo -> hashAllPassword());