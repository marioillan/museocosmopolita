<?php
    session_start();
    include 'config.php';

    $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';

    switch ($filtro) {
        case 'mejor_valoracion':
            $sql = "SELECT * FROM experiencias ORDER BY valoracion DESC, fecha DESC";
            break;
        case 'mas_critica':
            $sql = "SELECT * FROM experiencias ORDER BY valoracion ASC, fecha DESC";
            break;
        case 'mas_antigua':
            $sql = "SELECT * FROM experiencias ORDER BY fecha ASC";
            break;
        case 'mas_reciente':
            $sql = "SELECT * FROM experiencias ORDER BY fecha DESC";
            break;
        default:
            $sql = "SELECT * FROM experiencias ORDER BY fecha DESC";
            break;
    }


    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $experiencias = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $experiencias = [];
    }

    $conn->close();

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <title>Museo Cosmopolita - Experiencias </title>
    <link rel = "stylesheet" type = "text/css" href = "css/experiencias.css" />
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
    <script src="js/validar_experiencias.js"></script>

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

    <h1>Experiencias de Usuarios</h1>

    <h2>Filtrar Experiencias</h2>                        
                        
    <div class="filtros">

        <a href="experiencias.php?filtro=mejor_valoracion">Más Estrellas</a> |
        <a href="experiencias.php?filtro=mas_critica">Menos Estrellas</a> |
        <a href="experiencias.php?filtro=mas_reciente">Más Recientes</a> |
        <a href="experiencias.php?filtro=mas_antigua">Más Antiguas</a>

    </div>

    <div class="experiencias">

        <div class="caja-experiencia">

        <?php
            if (count($experiencias) > 0) {
                foreach ($experiencias as $row) {
                    echo "<p>Usuario: " . $row['usuario'] . "</p>";
                    echo "<p>Valoración: " . str_repeat('⭐', $row['valoracion']) . "</p>";
                    echo "<p>Comentario: " . $row['comentario'] . "</p>";
                    echo "<p>Fecha: " . $row['fecha'] . "</p>";
                }
            } else {
                echo "No se ha registrado ninguna experiencia aún.";
            }
            ?> 
        
        </div>

    </div>
    
    <div class="formulario-experiencia">

        <?php if (isset($_SESSION['usuario'])): ?>

            <h3>¿Quieres poner una valoración y aportar al Museo?</h3>

            <form method="post" name="formularioExperiencias" action="procesar_experiencia.php">
                <label for="valoracion">Valoración:</label>
                <select id="valoracion" name="valoracion">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>
                <label for="comentario">Comentario:</label>
                <textarea id="comentario" name="comentario"></textarea>
                <br>
                <input type="submit" value="Enviar">
                <div class="mensaje_error" id="mensaje_error_experiencias"></div>

            </form>

            <?php else: ?>
                
                <div class="mensaje-experiencias-iniciarsesion">
                    <p>Por favor, inicia sesión para enviar tu experiencia.</p>
                    <p>Si no esta registrado, <a href="altausuarios.php">Pinche Aquí</a></p>
                </div>

        <?php endif; ?>    
    
    </div>


</main>


<footer>

    <div class="direccion" id="map">
        <script>
            var map = L.map('map').setView([37.1789, -3.5998], 17);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 20,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            var marker = L.marker([37.1789, -3.5998]).addTo(map);
            marker.bindPopup("C. Gran Vía de Colón, 45, Centro, 18001 Granada").openPopup();
        </script>
    </div>

	<div class="footer-items">
        <section class="logos">
            <article class="logo-museo">
                <a href="index.php" class="logo-museo-inicio">
                    <img src="imagenes/logos/Logo_cosmopolita.png" width="250" alt="Logo Museo Cosmopolita">
                </a>
            </article>
            <article class="logo-gob">
                <a href="https://www.culturaydeporte.gob.es/">
                    <img src="imagenes/logos/2560px-Logotipo_del_Ministerio_de_Cultura_y_Deporte.svg.png" width="250" alt="Gobierno de España - Ministerio de Cultura y Deporte">
                </a>
            </article>
            <article class="logo-ayuntamiento">
                <a href="https://www.granada.org/">
                    <img src="imagenes/logos/watermark@2x-q5c65mwv9kj30q33ape1qh7xzglyn2auj2z3pzkiw0.png" width="250" alt="Ayuntamiento de Granada">
                </a>
            </article>
        </section>

        <section class="contacto">
            <a href="contacto.php">
                <h1>Contacto</h1>
            </a>
            <p>Si tiene alguna consulta no dude en contactarnos</p>
            <div class="contacto-items">
                <div class="contacto-telefono">
                    <a href="tel:639468882">
                        <img src="imagenes/llamada2.png" alt="Teléfono de Contacto">
                    </a>
                    <p>639468882</p>
                </div>
                <div class="contacto-correo">
                    <a href="mailto:museocosmopolita@gmail.com">
                        <img src="imagenes/correo.png" alt="Correo Electrónico">
                    </a>
                    <p>museocosmopolita@gmail.com</p>
                </div>
            </div>
        </section>
    </div>
    
    <div class="politicas">
        <nav>
            <a href="privacidad.php">Política Privacidad</a>
            <a href="aviso_legal.php">Aviso Legal</a>
            <a href="cookies.php">Política de Cookies</a>
            <a href="sobre_nosotros.php">Cómo se hizo</a>
        </nav>
    </div>

    <div class="pie_footer">
        <p>Copyright &#xA9; 2024. Museo Cosmopolita. Gran Vía de Colón número 45 Granada. 18001. Todos los derechos reservados</p>
    </div>

</footer>

</body>

</html>