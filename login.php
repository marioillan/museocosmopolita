<?php
    session_start();
    include 'config.php';

    if (isset($_POST['boton_login'])) {
        
        $usuario = $_POST['usuario'];
        $contrasenia = $_POST['contrasenia'];

        if ($usuario === 'admin') {

            $sql = "SELECT * FROM admin WHERE usuario = 'admin'";
            $admins = $conn->query($sql);

            if ($admins->num_rows == 1) {
                $row = $admins->fetch_assoc();
                if ($contrasenia === 'admin') { 
                    $_SESSION['admin'] = $usuario;
                    unset($_SESSION['usuario']); 
                    header("Location: index.php");
                    exit();
                }else{

                    $error="Ha introducido mal la contraseña. Intentelo de nuevo.";

                }
            }

        } else {

            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $usuarios = $conn->query($sql);

            if ($usuarios->num_rows == 1) {
                $row = $usuarios->fetch_assoc();
                if (password_verify($contrasenia, $row['contrasenia'])) {
                    $_SESSION['usuario'] = $usuario;
                    unset($_SESSION['admin']); 
                    header("Location: index.php");
                    exit();
                }else{

                    $error="Ha introducido mal la contraseña. Intentelo de nuevo.";

                }
            } else {
                $error = "Este usuario no se encuentra en el sistema.";
            }
        }

        if (isset($error)) {
            $_SESSION['error_login'] = $error;
            header("Location: index.php");
            exit();
        }
    }
?>
