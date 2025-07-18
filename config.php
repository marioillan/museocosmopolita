<?php
$servername = "localhost";
$username = "pwmarioillan"; 
$password = "23marioillan24";
$dbname = "dbmarioillan_pw2324";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
