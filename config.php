<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'card_data';
$db_port = '3307';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>