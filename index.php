<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <title>Museo Cosmopolita - Inicio </title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <link rel="stylesheet" type="text/css" href="css/base.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <script src="js/validar_login.js"></script>

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

    <div class="inicio">
        <div class="video-contenedor">
            <video autoplay loop muted>
                <source src="imagenes/video/7986423-hd_1920_1080_25fps.mp4" type="video/mp4">
            </video>
        </div>
    </div>

    <div class="bienvenida">
        <section class="video-logo">
            <video autoplay loop>
                <source src="imagenes/video/video-museo-cosmopolita.mp4" type="video/mp4">
            </video>
        </section>

        <section class="texto-bienvenida">
            <h1>Bienvenido al Museo Cosmopolita</h1>
            <p>Un universo de arte, historia y cultura en un solo lugar:</p>
            <p>¡explora y descubre tu conexión con el mundo!</p>
            <a href="visita.php">Planea tu visita</a>
        </section>
    </div>

    <div class="inicio-informacion">
        <section class="informacion-museo">
            <h1>Información del Museo</h1>
            <p>Sumérgete en el Museo Cosmopolita, un tesoro cultural que te transporta a través de las maravillas del mundo. Explora la interconexión de las diferentes culturas de todo el mundo.</p>
            <p><i class='bx bx-receipt'></i> Precios de las entradas - <a href="informacion.php">Pinche Aquí</a></p>
        </section>

        <section id="info" class="horario">
            <h1>Horario</h1>
            <p><i class='bx bx-time-five'></i> Abierto hoy: 10:00-19:00</p>
            <p><i class='bx bx-time-five'></i> Última entrada: 18:45</p>
            <p><i class='bx bx-calendar'></i> Para consultar el calendario - <a href="informacion.php">Pinche Aquí</a></p>
        </section>
    </div>

    <div class="exposiciones-recientes">
        <a href="exposiciones.php">
            <h1>Exposiciones</h1>
        </a>
        <p>Sumérgete en la magia efímera de nuestras exposiciones temporales, donde cada obra cuenta una historia única, transformando nuestro museo en un escenario vibrante de creatividad y descubrimiento.</p>
        <div class="imagenes-colecciones">
            <ul>
                <section class="coleccion1">
                    <h2 class="texto-azul">Esculturas de</h2>
                    <h2>Cristo</h2>
                    <li><img src="imagenes/obras/exposiciones/1937.827 - Triptych with Scenes from the Life of Christ.jpg" alt="Imagen Colección 1"></li>
                </section>
                <section class="coleccion2">
                    <h2>Ínscripciones </h2>
                    <h2 class="texto-amarillo">Incas</h2>
                    <li><img src="imagenes/obras/exposiciones/1990.21 - Coronation Stone of Motecuhzoma II (Stone of the.jpg" alt="Imagen Colección 2"></li>
                </section>
            </ul>
        </div>
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
