<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'config.php';
    session_start();

    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $usuario = $_POST["usuario"];
    $correo = $_POST["correo"];
    $contrasenia = password_hash($_POST["contrasenia"], PASSWORD_BCRYPT);
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $telefono = $_POST["telefono"];

    $error = "";

    if (empty($nombre)) $error .= "El campo nombre es obligatorio.<br>";
    if (empty($apellidos)) $error .= "El campo apellidos es obligatorio.<br>";
    if (empty($usuario)) $error .= "El campo usuario es obligatorio.<br>";
    if (empty($correo)) $error .= "El campo correo es obligatorio.<br>";
    if (empty($contrasenia)) $error .= "El campo contraseña es obligatorio.<br>";
    if (empty($fecha_nacimiento)){ $error .= "El campo fecha de nacimiento es obligatorio.<br>";}else {
        $fecha_nacimiento_date = strtotime($fecha_nacimiento);
        $fecha_actual = strtotime(date('Y-m-d'));
        if ($fecha_nacimiento_date > $fecha_actual || date('Y', $fecha_nacimiento_date) < 1900) {
            $error .= "La fecha de nacimiento no es válida.<br>";
        }
    }

    if (empty($telefono)) $error .= "El campo teléfono es obligatorio.<br>";


    if (empty($error)) {
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' OR correo = '$correo' OR telefono = '$telefono'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            if ($row['usuario'] === $usuario) $error .= "El nombre de usuario ya está registrado.<br>";
            if ($row['correo'] === $correo) $error .= "El correo ya está registrado.<br>";
            if ($row['telefono'] === $telefono) $error .= "El teléfono ya está registrado.<br>";
            }
        }

    }


    if (empty($error)) {
        $sql = "INSERT INTO usuarios (nombre, apellidos, usuario, correo, contrasenia, fecha_nacimiento, telefono) 
                VALUES ('$nombre', '$apellidos', '$usuario', '$correo', '$contrasenia', '$fecha_nacimiento', '$telefono')";

        if ($conn->query($sql) === TRUE) {
            header("Location: validacion_registro.php");
            exit();
        } else {
            $error .= "Error al registrar el usuario: " . $conn->error . "<br>";
        }
    }

    if (!empty($error)) {
        $_SESSION['error_registro'] = $error;
        $_SESSION['post_data'] = $_POST; // Guardar los datos del formulario
        header("Location: altausuarios.php");
        exit();
    }

    $conn->close();
}
?>
