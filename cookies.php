<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <title>Museo Cosmopolita - Política de Cookies </title>
    <link rel = "stylesheet" type = "text/css" href = "css/terminos.css" />
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

    <section class="caja-texto">

        <h1>Política de cookies y almacenamiento local</h1>		
        
        <p>Este sitio web utiliza cookies y tecnologías similares para proporcionar el servicio, así como permitirnos mejorarlo, a través de la obtención de estadísticas sobre su uso, y otras finalidades.</p>
        <p>Navegar por esta web implica necesariamente la utilización de cookies y tecnologías similares siempre y cuando sea necesario para su funcionamiento. Asimismo, para ciertas finalidades, las cookies y el almacenamiento local estarán sujetas a su previo consentimiento. Puede aceptar o rechazar las cookies mediante el sistema de configuración establecido y también es posible configurar el navegador para impedir su uso.</p>
        <p>Esta política forma parte de nuestra política de privacidad e incluye lo siguiente:
        <ul>
            <li><a href="#que">¿Qué son las cookies?</a></li>
            <li><a href="#para">¿Para qué se usan las cookies?</a></li>
            <li><a href="#queentendemos">¿Qué entendemos por tecnologías similares a las cookies?</a></li>
            <li><a href="#queson">¿Qué son las cookies de terceros? ¿Quiénes son los destinatarios de la información?</a></li>
            <li><a href="#tiempo">¿Durante cuánto tiempo se mantienen activas las cookies o tecnologías similares?</a></li>
            <li><a href="#impedir">¿Cómo impedir el uso de cookies y cómo borrarlas?</a></li>
        </ul>
        
        <h2 id="que">¿Qué son las cookies?</h2>
        <p>Las “cookies” son pequeños ficheros temporales que se crean en el dispositivo del usuario (ordenador, teléfono, tableta, etc.) cuando visita una web, y que permiten a la misma almacenar o recuperar información cuando navega, por ejemplo, para guardar sus preferencias de uso o para reconocerlo en posteriores visitas, así como obtener información sobre sus hábitos de navegación.</p>
        <p>Cuando una web crea una cookie en el dispositivo del usuario, se almacena la dirección/dominio de la web que ha creado la cookie, la duración de la cookie que puede ir de escasos minutos a varios años, así como el contenido de la cookie. El usuario puede deshabilitar las cookies en todo momento mediante el sistema de configuración de este sitio web, así como configurar su programa de navegación para impedir (bloquear) el uso de cookies por parte de determinadas webs, así como borrar las cookies almacenadas previamente.</p>
    
        <h2 id="para">¿Para qué se usan las cookies?</h2>
        <p>Los usos o finalidades más habituales son:</p>
        <ul>
            <li>Cookies técnicas esenciales. Se utilizan para gestionar el flujo de navegación dentro de la web o para mantener al usuario conectado a la misma. Al deshabilitarlas, es posible que algún apartado de la web no funcione correctamente.</li>
            <li>Cookies de personalización. Necesarias para recordar determinadas preferencias del usuario.</li>
            <li>Cookies analíticas. Nos ayudan a nosotros y a terceros a recopilar información de la procedencia de los usuarios y su navegación dentro de la web, a efectos de realizar un análisis estadístico para poder mejorar la estructura y los contenidos.</li>
            <li>Cookies publicitarias. Utilizadas para gestionar los anuncios que aparecen en la web, decidir el contenido o la frecuencia de los anuncios.</li>
            <li>Cookies publicitarias comportamentales. Ayudan a recopilar los hábitos de navegación del usuario para crear un perfil de sus intereses y para mostrarle anuncios adaptados a los mismos.</li>
            <li>Cookies para compartición social. Son necesarias para identificar al usuario en sus redes sociales y así permitirle compartir contenidos.</li>
        </ul>
    
        <h2 id="queentendemos">¿Qué entendemos por tecnologías similares a las cookies?</h2>
        <p>Se entiende por tecnologías similares cualquier tipo de mecanismo de almacenamiento y recuperación de datos que se utilice en el dispositivo del usuario para obtener información. Las más habituales incluyen:</p>
        <ul>
            <li>El almacenamiento local del navegador. Algunas webs utilizan almacenamientos locales llamados “sessionStorage” y “localStorage”, así como la base de datos indexada del navegador, para guardar información.</li>
            <li>El almacenamiento local de los complementos del navegador, como por ejemplo el almacenamiento local de Flash (“Flash Local Shared Objects”) o el almacenamiento local de Silverlight (“Isolated Objects”).</li>
            <li>El “web beacon” es una técnica de rastreo que consiste en insertar en una página web (o en un correo electrónico) una imagen alojada en un servidor de Internet de forma que, cuando el navegador o programa de correo se conecta a dicho servidor para descargar y visualizar la imagen, la conexión queda registrada. Ello permite conocer que el usuario ha visualizado la página web o el correo. A veces esta imagen es muy pequeña o transparente de forma que el usuario no se percata de su existencia.</li>
            <li>Las técnicas de “fingerprinting” que combinan información obtenida del navegador o del equipo de navegación para distinguir a un usuario en sus sucesivas visitas distintos sitios web.</li>
        </ul>
    
        <h2 id="queson">¿Qué son las cookies de terceros? ¿Quiénes son los destinatarios de la información?</h2>
        <p>Las cookies de esta web se pueden clasificar, en función de quién las crea, en dos categorías:</p>
        <ul>
            <li>Cookies propias: se crean y manejan desde nuestros sitios y dominios web, siendo la información obtenida gestionada directa o indirectamente por nosotros para nuestras propias finalidades.</li>
            <li>Cookies de terceros: son las cookies que se crean y se manejan desde otros sitios web que, aunque no están completamente bajo nuestro control, proporcionan funciones y características que hemos decidir incluir en nuestra web, como, por ejemplo: mapas interactivos, vídeos y elementos multimedia, botones para compartir en redes sociales, anuncios, etc. Estas cookies están bajo el control del tercero que proporciona la función correspondiente.</li>
        </ul>
        <p>La gran mayoría de las funciones de terceros implican el acceso o recopilación de información (y el uso de cookies) por parte del tercero que proporciona la función, en base a sus propios criterios y finalidades, incluyendo la recopilación sobre los hábitos de navegación para mostrarle publicidad personalizada. En el siguiente apartado se indican las funciones y características de terceros utilizadas en esta página web.</p>
    
        <h2 id="tiempo">¿Durante cuánto tiempo se mantienen activas las cookies o tecnologías similares?</h2>
        <p>En función de su permanencia o tiempo de actividad, podemos diferenciar entre:</p>
        <ul>
            <li>Cookies temporales de sesión; permanecen almacenadas en el equipo de navegación hasta que el usuario abandona la página web; el navegador las borra al terminar la sesión de navegación.</li>
            <li>Cookies persistentes; permanecen en el equipo de navegación y la web las lee cada vez que el usuario realiza una nueva visita. Estas cookies se borran automáticamente pasado cierto plazo de tiempo, que puede ser corto o muy largo.</li>
        </ul>
        <p>En esta política se incluye información sobre la duración de las cookies; para más información, consulte nuestra política de privacidad, así como la información proporcionada en las políticas de privacidad de los terceros proveedores de funciones web.</p>
    
        <h2 id="impedir">¿Cómo impedir el uso de cookies y cómo borrarlas?</h2>
        <p>Puede configurar sus preferencias en cualquier momento mediante el sistema de configuración de cookies integrado en este sitio web, podrá activar / desactivar el uso de cookies según sus finalidades.</p>
        <p>La mayoría de navegadores permiten desactivar globalmente las cookies. Muchos navegadores también permiten borrar las cookies asociadas a webs/dominios concretos. Para ello el usuario debe consultar la ayuda de su navegador. A continuación, se incluyen enlaces a las páginas de ayuda de los navegadores más habituales para conocer la configuración de cookies en cada uno:</p>
        
        <ul>
            <li>Chrome: <a href="https://support.google.com/chrome/answer/95647?hl=es">https://support.google.com/chrome/answer/95647?hl=es</a></li>
            <li>Explorer: <a href="https://support.microsoft.com/es-es/help/17442/windows-internet-explorer-delete-manage-cookies">https://support.microsoft.com/es-es/help/17442/windows-internet-explorer-delete-manage-cookies</a></li>
            <li>Microsoft Edge: <a href="https://privacy.microsoft.com/es-ES/windows-10-microsoft-edge-and-privacy">https://privacy.microsoft.com/es-ES/windows-10-microsoft-edge-and-privacy</a></li>
            <li>Firefox: <a href="https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias">https://support.mozilla.org/es/kb/habilitar-y-deshabilitar-cookies-sitios-web-rastrear-preferencias</a></li>
            <li>Safari: <a href="https://support.apple.com/kb/PH17191?viewlocale=es_ES&locale=es_ES">https://support.apple.com/kb/PH17191?viewlocale=es_ES&locale=es_ES</a></li>
            <li>Safari para IOS: <a href="https://support.apple.com/es-es/HT201265">https://support.apple.com/es-es/HT201265</a></li>
            <li>Opera: <a href="http://www.opera.com/es/help">http://www.opera.com/es/help</a></li>
        </ul>

        <p>Para borrar los datos guardados en el almacenamiento local del navegador, el usuario puede borrar el historial de navegación.</p>
        <p>Para conocer cómo borrar el almacenamiento local de Flash o para limitar la cantidad de espacio permitido, consultar las páginas de Ayuda de Adobe: <a href="http://www.macromedia.com/support/documentation/en/flashplayer/help/settings_manager07.html">http://www.macromedia.com/support/documentation/en/flashplayer/help/settings_manager07.html</a></p>
        <p>Para otros navegadores, así como para cualquier aclaración o pregunta sobre las cookies de esta web, puede contactarnos a través de los datos de contacto de la web.</p>
        <p>Aviso importante: en caso de bloquear las cookies es posible que determinados servicios o funcionalidades de la web no funcionen correctamente.</p>

    </section>


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