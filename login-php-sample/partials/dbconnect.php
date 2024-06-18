<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "users_php_sample";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
    die("Error" . mysqli_connect_errno());
}
