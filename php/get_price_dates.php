<?php
require ("config.php");
$mysql = mysqli_connect(servername, user, password, db);
$id_flat = $_POST['id_flat'];
$find = $mysql->query("SELECT price_dates FROM flats WHERE id = $id_flat")->fetch_array();

echo $find['price_dates'];