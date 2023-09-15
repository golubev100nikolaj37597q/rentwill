<?php 

require($_SERVER['DOCUMENT_ROOT'].'/php/config.php');

$mysql = mysqli_connect(servername, user, password, db);
$id = $_POST['id'];
$sql = $mysql->query("SELECT `discount` FROM `flats` WHERE `id` = '$id'")->fetch_array();
echo $sql['discount'];