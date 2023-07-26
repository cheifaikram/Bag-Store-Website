<?php

$conn = mysqli_connect('localhost:3306','root','','shopping_db') or die('connection failed');
if (mysqli_connect_error()) {
    die('Database connection error: ' . mysqli_connect_error());
}
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>