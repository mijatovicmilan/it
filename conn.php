<?php

$server = 'localhost';
$user = 'root';
$pass = 'root';
$db = 'magacin';


$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}