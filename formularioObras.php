<?php
session_start();
include 'config.php'; 

$mensaje = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $accion = $_POST['accion'];
    
    $conn = new mysqli("localhost", "root", "", "museoDB");
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener datos
    $id = $_POST['id'] ?? null;
    $titulo = $_POST['titulo'] ?? "";
    $autor = $_POST['autor'] ?? "";
    $epoca = $_POST['epoca'] ?? "";
    $tematica = $_POST['tematica'] ?? "";
    $imagen = $_POST['imagen'] ?? "";

    if ($accion == 'aniadir') {
        if (empty($titulo)) $error .= "El campo título es obligatorio.<br>";
        if (empty($autor)) $error .= "El campo autor es obligatorio.<br>";
        if (empty($epoca)) $error .= "El campo época es obligatorio.<br>";
        if (empty($tematica)) $error .= "El campo temática es obligatorio.<br>";
        if (empty($imagen)) $error .= "El campo imagen es obligatorio.<br>";

        if (empty($error)) {
            $stmt = $conn->prepare("INSERT INTO obras (titulo, autor, epoca, tematica, imagen) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $titulo, $autor, $epoca, $tematica, $imagen);
            if ($stmt->execute()) {
                $mensaje = "Obra añadida correctamente.";
            } else {
                $error = "Error al añadir obra: " . $stmt->error;
            }
            $stmt->close();
        }

    } elseif ($accion == 'editar') {
        if (empty($id)) $error .= "El campo ID es obligatorio.<br>";
        if (empty($titulo)) $error .= "El campo título es obligatorio.<br>";
        if (empty($autor)) $error .= "El campo autor es obligatorio.<br>";
        if (empty($epoca)) $error .= "El campo época es obligatorio.<br>";
        if (empty($tematica)) $error .= "El campo temática es obligatorio.<br>";
        if (empty($imagen)) $error .= "El campo imagen es obligatorio.<br>";

        if (empty($error)) {
            $stmt = $conn->prepare("UPDATE obras SET titulo=?, autor=?, epoca=?, tematica=?, imagen=? WHERE id=?");
            $stmt->bind_param("sssssi", $titulo, $autor, $epoca, $tematica, $imagen, $id);
            if ($stmt->execute()) {
                $mensaje = "Obra actualizada correctamente.";
            } else {
                $error = "Error al actualizar obra: " . $stmt->error;
            }
            $stmt->close();
        }

    } elseif ($accion == 'eliminar') {
        if (empty($id)) {
            $error = "El campo ID es obligatorio para eliminar.";
        } else {
            $stmt = $conn->prepare("DELETE FROM obras WHERE id=?");
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $mensaje = "Obra eliminada correctamente.";
            } else {
                $error = "Error al eliminar obra: " . $stmt->error;
            }
            $stmt->close();
        }
    }

    $conn->close();
}
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
    <script src="js/validarObras.js"></script>
    <script src="js/obrasCRUD.js"></script>

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

    <h1>Gestión de Obras</h1>
    <?php if (!empty($error)): ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if (!empty($mensaje)): ?>
        <div style="color: green;"><?php echo $mensaje; ?></div>
    <?php endif; ?>

    <section class="listado" style="flex: 1;">
        <h2>Listado de Obras</h2>
        <table border="1" cellpadding="6" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Época</th>
                    <th>Temática</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'config.php';
                $resultado = $conn->query("SELECT * FROM obras ORDER BY id ASC");

                if ($resultado && $resultado->num_rows > 0) {
                    while ($obra = $resultado->fetch_assoc()) {
                        echo "<tr>
                            <td>{$obra['id']}</td>
                            <td>{$obra['titulo']}</td>
                            <td>{$obra['autor']}</td>
                            <td>{$obra['epoca']}</td>
                            <td>{$obra['tematica']}</td>
                            <td><img src='{$obra['imagen']}' width='60'></td>
                            <td>
                                <!-- Botón Editar -->
                                <form method='post' action='formularioObras.php' style='display:inline-block;'>
                                    <input type='hidden' name='accion' value='editar'>
                                    <input type='hidden' name='id' value='{$obra['id']}'>
                                    <input type='hidden' name='titulo' value='{$obra['titulo']}'>
                                    <input type='hidden' name='autor' value='{$obra['autor']}'>
                                    <input type='hidden' name='epoca' value='{$obra['epoca']}'>
                                    <input type='hidden' name='tematica' value='{$obra['tematica']}'>
                                    <input type='hidden' name='imagen' value='{$obra['imagen']}'>
                                    <button type='submit'>Editar</button>
                                </form>

                                <!-- Botón Eliminar -->
                                <form method='post' action='formularioObras.php' style='display:inline-block;' onsubmit='return confirm(\"¿Seguro que quieres eliminar esta obra?\")'>
                                    <input type='hidden' name='accion' value='eliminar'>
                                    <input type='hidden' name='id' value='{$obra['id']}'>
                                    <button type='submit'>Eliminar</button>
                                </form>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No hay obras registradas.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </section>

    <!-- Añadir Obra -->
    <section class="formulario">
        <h2>Añadir Obra</h2>
        <p>Introduzca los datos de la nueva obra:</p>
        <form method="post" action="formularioObras.php">
            <input type="hidden" name="accion" value="aniadir">
            <label>Título: <input type="text" name="titulo" required></label><br>
            <label>Autor: <input type="text" name="autor" required></label><br>
            <label>Época: <input type="text" name="epoca" required></label><br>
            <label>Temática: <input type="text" name="tematica" required></label><br>
            <label>Imagen (ruta): <input type="text" name="imagen" required></label><br>
            <input class="boton" type="submit" value="Guardar">
        </form>
    </section>

</main>


<footer>

    <h3>Esta página solo tiene que ser visible por el Administrador de la Web.</h3>

</footer>

</body>
</html>
