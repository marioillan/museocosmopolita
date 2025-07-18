<?php
session_start();
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_SESSION['usuario']) && isset($_POST['valoracion']) && isset($_POST['comentario'])) {
        $usuario = $_SESSION['usuario'];
        $valoracion = $_POST['valoracion'];
        $comentario = $_POST['comentario'];

        $sql = "INSERT INTO experiencias (usuario, valoracion, comentario) VALUES ('$usuario', '$valoracion', '$comentario')";
        if ($conn->query($sql) === TRUE) {
            header("Location: experiencias.php");
            exit();
        } else {
            $error .= "Error al registrar la experiencia: " . $conn->error . "<br>";
        }
    }

}
?>
