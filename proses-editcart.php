<?php
session_start();

$id = $_POST["id_barang"];
$jml = $_POST["jml_barang"];

$_SESSION["cart"][$id] = $jml;

header('Location: cart.php');

?>