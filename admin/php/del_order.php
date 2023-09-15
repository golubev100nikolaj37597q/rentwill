<?php
require($_SERVER['DOCUMENT_ROOT'].'/php/config.php');

$id = $_POST['id'];

$mysql = mysqli_connect(servername,user,password,db);
$sql = $mysql->query("DELETE FROM `orders` WHERE `id` = '$id'");

