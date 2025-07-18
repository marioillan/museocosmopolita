<?php
$host = 'localhost';
$dbname = 'museoDB';
$user = 'postgres';
$password = 'Mario321';

$conn = new mysqli($host, $user, $password, $dbname);
$conn->set_charset("utf8");

try {
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión correcta a PostgreSQL.";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>