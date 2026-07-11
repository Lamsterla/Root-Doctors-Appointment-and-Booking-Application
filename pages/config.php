<?php
$host = "localhost";
$user = "appuser";
$pass = "app12345";
$db   = "my";

$conn = mysqli_connect($host, $user, $pass, $db);

if(!$conn){
    die("Database connection failed: " . mysqli_connect_error());
}
?>
