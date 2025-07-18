<?php
    session_start();
    include 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $accion = $_POST['accion'];
        $error = "";

        if ($accion == 'aniadir') {
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $epoca = $_POST['epoca'];
            $tematica = $_POST['tematica'];
            $imagen = $_POST['imagen'];

            if (empty($titulo)) $error .= "El campo titulo es obligatorio.<br>";
            if (empty($autor)) $error .= "El campo autor es obligatorio.<br>";
            if (empty($epoca)) $error .= "El campo época es obligatorio.<br>";
            if (empty($tematica)) $error .= "El campo temática es obligatorio.<br>";
            if (empty($imagen)) $error .= "El campo imagen es obligatorio.<br>";

            if (empty($error)) {

                $sql = "INSERT INTO obras (titulo, autor, epoca, tematica, imagen) VALUES ('$titulo', '$autor', '$epoca', '$tematica', '$imagen')";

            }

        } elseif ($accion == 'editar') {
                $id = $_POST['id'];
                $titulo = $_POST['titulo'];
                $autor = $_POST['autor'];
                $epoca = $_POST['epoca'];
                $tematica = $_POST['tematica'];
                $imagen = $_POST['imagen'];

                if (empty($id)) $error .= "El campo ID es obligatorio.<br>";
                if (empty($titulo)) $error .= "El campo titulo es obligatorio.<br>";
                if (empty($autor)) $error .= "El campo autor es obligatorio.<br>";
                if (empty($epoca)) $error .= "El campo época es obligatorio.<br>";
                if (empty($tematica)) $error .= "El campo temática es obligatorio.<br>";
                if (empty($imagen)) $error .= "El campo imagen es obligatorio.<br>";

            if (empty($error)) {

                $sql = "UPDATE obras SET titulo='$titulo', autor='$autor', epoca='$epoca', tematica='$tematica', imagen='$imagen' WHERE id=$id";

            }

        } elseif ($accion == 'eliminar') {
            $id = $_POST['id'];
            $sql = "DELETE FROM obras WHERE id=$id";
        }


}

    $conn->close();

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>Museo Cosmopolita - Gestión Obras </title>
    <link rel = "stylesheet" type = "text/css" href = "css/formulariosObras.css" />
    <link rel = "stylesheet" type = "text/css" href = "css/base.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <script src="js/validar_login.js"></script>
    <script src="js/validacion_formularioObras.js"></script>

</head>
<body>

<header>

        <nav>

            <a href="index.php">
                <img src="imagenes/logos/Logo_cosmopolita.png" width="350s" alt="Logo Museo Cosmopolita"> <!--INTRODUCIR LOGOTIPO DEL MUSEO-->
            </a>

            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="coleccion.php">Colección</a></li>
                <li><a href="visita.php">Visita</a></li>
                <li><a href="exposiciones.php">Exposiciones</a></li>
                <li><a href="informacion.php">Información</a></li>
                <li><a href="experiencias.php">Experiencias</a></li>
            </ul>
                
            <?php if (isset($_SESSION['usuario'])): ?>

                <div class="sesion_iniciada">

                    <i class='bx bxs-user-circle'></i>
                    <p><?php echo ($_SESSION['usuario']); ?></p>
                    <a href="logout.php">Cerrar sesión</a>

                </div>

            <?php elseif (isset($_SESSION['admin'])): ?>

                <div class="sesion_iniciada">

                    <i class='bx bxs-user-circle'></i>
                    <p>Administración</p>
                    <a href="logout.php">Cerrar sesión</a>

                </div>

            <?php else: ?>
                <form method="post" name="formularioLogin" action="login.php">
                    <label for="usuario">Usuario</label>
                    <br>
                    <input type="text" id="usuario" name="usuario"/>
                    <br/>
                    <label for="contrasenia">Contraseña</label>
                    <br>
                    <input type="password" id="contrasenia" name="contrasenia"/>
                    <br>
                    <input type="submit" class="boton-login" name="boton_login" value="Iniciar Sesión"/>
                    <div class="mensaje_error" id="mensaje_error">
                       
                        <?php

                            if (isset($_SESSION['error_login'])) {
                                echo $_SESSION['error_login'];
                                unset($_SESSION['error_login']);
                            }

                        ?>
                    </div>
                </form>

            <?php endif; ?>

            <a href="altausuarios.php">
                <button>Registrarse</button>
            </a>
        
        </nav>
    
</header>

<main> 

    <h1>Gestión Obras</h1>
    <?php if (isset($mensaje)): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>

        <h2>Añadir Obra</h2>
        <p>Introduzca los datos de la obra que quiera añadir.</p>
        <form method="post">
            <input type="hidden" name="accion" value="aniadir">
            <label>Título: <input type="text" name="titulo"></label><br>
            <label>Autor: <input type="text" name="autor"></label><br>
            <label>Época: <input type="text" name="epoca"></label><br>
            <label>Tematica: <input type="text" name="tematica"></label><br>
            <label>Imagen: <input type="text" name="imagen"></label><br>
            <button type="submit">Añadir</button>
        </form>


        <h2>Editar Obra</h2>
        <p>Introduzca los datos de la obra que quiera editar.</p>
        <form method="post">
            <input type="hidden" name="accion" value="editar">
            <label>Identificador de la obra: <input type="text" name="id"></label><br>
            <label>Título: <input type="text" name="titulo"></label><br>
            <label>Autor: <input type="text" name="autor"></label><br>
            <label>Época: <input type="text" name="epoca"></label><br>
            <label>Tema: <input type="text" name="tematica"></label><br>
            <label>Imagen: <input type="text" name="imagen"></label><br>
            <button type="submit">Editar</button>
        </form>


        <h2>Eliminar Obra</h2>
        <p>Introduzca el ID de la obra que quiera borrar.</p>
        <form method="post">
            <input type="hidden" name="accion" value="eliminar">
            <label>Identificador de la obra: <input type="text" name="id"></label><br>
            <button type="submit">Eliminar</button>
        </form>


</main> 

<footer>

    <h3>Esta página solo tiene que ser visible por el Administrador de la Web.</h3>

</footer>

</body>
</html>
