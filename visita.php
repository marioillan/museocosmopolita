<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <title>Museo Cosmopolita - Visita </title>
    <link rel = "stylesheet" type = "text/css" href = "css/informacion.css" />
    <link rel = "stylesheet" type = "text/css" href = "css/base.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
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

    <h1>Visita</h1>

    <div class="salas-museo">

        <h2>Salas</h2>

        <p>El museo cuenta con un total de 8 salas</p>

        <ul>

            <li>
                <h3>Sala 1 - <a href="coleccion.php">Colección Grecia Antigua</a></h3>
                <p>Sumérgete en la fascinante civilización griega con una colección que abarca desde esculturas y cerámicas hasta artefactos cotidianos, explorando la grandeza y la influencia de la cultura helénica.</p>

            </li>

            <li>
                <h3>Sala 2 - <a href="coleccion.php">Colección Katsukawa</a></h3>
                <p>Descubre la belleza y el dinamismo del ukiyo-e japonés con una colección de grabados del período Edo, destacando la maestría artística y las representaciones de la vida cotidiana y el teatro kabuki.</p>

            </li>

            <li>
                <h3>Sala 3 - <a href="coleccion.php">Colección Corrientes Africanas</a></h3>
                <p>Explora la diversidad y la profundidad de las tradiciones artísticas africanas con una colección que abarca desde esculturas tribales hasta textiles y máscaras, celebrando la rica herencia cultural del continente.</p>

            </li>

            <li>
                <h3>Sala 4 - <a href="coleccion.php?field=tematica&value=India">Colección índia</a></h3>
                <p>Sumérgete en la espiritualidad y la belleza del arte indio, explorando la rica tradición artística y la diversidad cultural de la India.</p>

            </li>

            <li>
                <h3>Sala 5 - <a href="coleccion.php">Colección Europa Moderna</a></h3>
                <p> Viaja a través de las corrientes artísticas en Europa con las obras del artista francés Georges Seurat. </p>

            </li>

            <li>
                <h3>Sala 6 - <a href="exposiciones.php">Exposiciones Temporales</a></h3>
                <p>Disfruta de una rotación constante de exposiciones dinámicas y variadas, que presentan obras contemporáneas, colaboraciones interculturales y temas sociales relevantes, ofreciendo siempre nuevas experiencias y perspectivas.</p>

            </li>

            <li>
                <h3>Sala 7 - <a href="coleccion.php">Colección Americas</a></h3>
                <p>Explora la diversidad cultural de América, desde arte precolombino hasta expresiones contemporáneas, con una colección que destaca la riqueza de las tradiciones indígenas.</p>

            </li>

            <li>
                <h3>Sala 8 - <a href="exposiciones.php">Exposiciones Temporales</a></h3>
                <p>Disfruta de una rotación constante de exposiciones dinámicas y variadas, que presentan obras contemporáneas, colaboraciones interculturales y temas sociales relevantes, ofreciendo siempre nuevas experiencias y perspectivas.</p>

            </li>


        </ul>



    </div>

    <div class="plano-museo">

        <img src="imagenes/plano_museo.jpg" alt="Plano Museo">

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