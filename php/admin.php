<?php
require('config.php');
function get_settings(){
    $connection = mysqli_connect(servername, user, password, db);
    return $connection->query("SELECT * FROM settings WHERE id = 1")->fetch_array();
}
