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

    <div class="caja-texto">

        <h1>Aviso Legal</h1>

        <p>Museo Cosmopolita (el Museo o el MC) ofrece www.museocosmopolita.es y sus subdominios (sitios web) en consecución de sus Objetivos y Fines explicitados en el Artículo 3 de la Ley 46/2003, de 25 de noviembre, reguladora del Museo Cosmopolita.</p>
        <p>Al acceder a este sitio web y sus subdominios los usuarios aceptan estar sujetos al presente Aviso Legal, que el Museo puede revisar en cualquier momento, y cuya finalidad es establecer y regular las normas de uso del Sitio web y sus subdominios.</p>
        <p>Para acceder nuestros servicios, declara que es mayor de edad y que tiene capacidad legal de obrar de acuerdo a su ley nacional. </p>

        <h2>1. Información Legal sobre la titularidad de la web</h2>

        <p>En cumplimiento de la Ley 34/2002, de 11 de julio, de Servicios de la Sociedad de la Información y del Comercio Electrónico, te informamos de que lo siguiente:</p>
        
        <ul>
            <li>Titular del presente Sitio: Museo Cosmoplita</li>
            <li>Domicilio en Calle Gran Vía de Colón 45, 18001</li>
            <li>CIF: Z2345674G</li>
            <li>Número de inscripción en el Registro de museos y colecciones de la Comunidad de Granada</li>
        </ul>

        <p>Si deseas plantearnos una duda, poner una reclamación, o comunicarte con nosotros por cualquier otro motivo, puedes ponerte en contacto con el Museo mediante correo postal en la dirección arriba indicada, por correo electrónico enviando un e-mail a <a href="mailto:museocosmopolita@gmail.com">museocosmopolita@gmail.com</a>, o por teléfono llamando a <a href="tel:639468882">+34 63946882</a>.</p>

        <h2>2. Propiedad Intelectual e industrial</h2>
        <h3>Copyright</h3>
        <p>Todos los contenidos del portal, textos, gráficos, imágenes, videos, su diseño y los derechos de propiedad intelectual que pudieran corresponder a dichos contenidos, así como todas las marcas, nombres comerciales o cualquier otro signo distintivo son propiedad del Museo Cosmopolita o de sus legítimos propietarios, quedando reservados todos los derechos sobre los mismos.</p>

        <h3>Marcas</h3>
        <p>Todas las marcas y logotipos incluidas en el website relativos al Museo, (MUSEO COSMOPOLITA), son marcas registradas propiedad de Museo Cosmopolita. Existen otras marcas en el portal. Ningún contenido del portal puede considerarse licenciado o con uso autorizado sin el consentimiento previo expreso por escrito del Museo o de cualquier otra parte cuya marca esté visible en la web.</p>
        <p>Se prohíbe cualquier acto de reproducción total o parcial de los contenidos, en cualquier forma o medio (mecánico, electrónico, reprográfico o de cualquier otro tipo), así como cualquier acto de difusión, comunicación pública o distribución, sin la previa autorización por escrito del MC o de sus legítimos propietarios.</p>
        <p>Según lo dispuesto en los artículos 8 y 32.1, párrafo segundo, de la Ley de Propiedad Intelectual, quedan expresamente prohibidas la reproducción, la distribución y la comunicación pública, incluida su modalidad de puesta a disposición, de la totalidad o parte de los contenidos de este portal web con fines comerciales, en cualquier soporte y por cualquier medio técnico, sin autorización expresa del Museo Cosmopolita.</p>

        <h3>Uso autorizado</h3>
        <p>Los contenidos del portal están disponibles para uso no comercial, educativo y personal limitado. Los usuarios pueden descargar estos archivos para su propio uso, sujeto a las condiciones o restricciones adicionales que puedan ser aplicables al archivo o a su aplicación individual. Los usuarios deben, sin embargo, citar el autor y la fuente de los materiales como lo harían material de cualquier obra impresa, y las citas deben incluir la URL www.museocosmopolita.es. Al descargar, imprimir o utilizar los materiales, si se accede directamente desde la web o a través de otros sitios o mecanismos, los usuarios entienden que van a limitar el uso de este tipo de archivos a un uso no-comercial, no violando los derechos de propiedad del Museo o de cualquier otra parte. Los usuarios no pueden eliminar los derechos de autor, marca registrada, u otros avisos de propiedad, incluyendo, avisos de información de limitación, créditos y derechos de autor que han sido ubicados cerca del contenido por el Museo.</p>
        <p>Descargar, imprimir, copiar, distribuir o utilizar materiales con fines comerciales, incluida la publicación comercial o ganancia personal, está expresamente prohibido.</p>

        <h3>Imágenes</h3>
        <p>Todas las imágenes incluidas en esta web son propiedad del Museo Cosmopolita, el cual, define dos tipos de uso para las mismas:</p>
        
        <ul>
            <li>Uso autorizado: uso privado, estudio o docencia.</li>
            <li>Uso editorial, publicación académica, editorial comercial, comercial, etc. a través del <a href="mailto:museocosmopolita@gmail.com">Banco de imágenes del Museo Cosmopolita</a>.</li>
        </ul>

        <h2>3. Acceso a los contenidos y responsabilidad</h2>
        <p>El acceso al portal de contenidos del Museo Nacional del Prado y el uso que pueda hacerse de la información que contiene son de la exclusiva responsabilidad del usuario. El MC no se responsabiliza de ninguna consecuencia, daño o perjuicio que pudieran derivarse del uso de este sitio web o de sus contenidos, incluidos datos informáticos y la introducción de virus, con excepción de todas aquellas actuaciones que resulten de la aplicación de las disposiciones legales a las que deba someterse el estricto ejercicio de sus competencias.</p>
        <p>El Museo Nacional Cosmopolita no puede garantizar que no exista ningún error puntual en los contenidos de sus páginas. En caso de existir alguno, el MC emprender las acciones precisas para evitar errores y repararlos o actualizarlos en el menor tiempo posible.</p>
        <p>La información que se difunde por este medio se hace únicamente a título informativo, reservándose el Museo Cosmopolita el derecho de eliminar o suspender su difusión, de manera total o parcial, y de modificar la estructura y contenido del portal sin aviso previo, pudiendo incluso limitar o no permitir el acceso a dicha información. El objetivo es mantener la calidad y actualización de esta información y evitar y minimizar posibles errores causados por fallos técnicos. No obstante, el MC no garantiza que este servicio no pueda ser interrumpido o afectado por esos fallos.</p>

        <h2>4. Uso del portal</h2>
        <p>La responsabilidad del uso del portal recae en el usuario. Si fuera necesario realizar algún tipo de registro para acceder a determinados contenidos del portal, el usuario será responsable de aportar información y datos lícitos y veraces. En este proceso, al usuario se le proporciona una contraseña de la que tendrá que hacer un uso diligente y confidencial.</p>
        <p>El usuario se compromete a hacer un uso adecuado de los contenidos y servicios conforme a lo expresado a continuación, no empleándolos para: incurrir en actividades ilícitas, ilegales o contrarias a la buena fe y al orden público; difundir contenidos o propaganda de carácter racista, xenófobo, pornográfico-ilegal, de apología del terrorismo o atentatorio contra los derechos humanos; provocar daños en los sistemas físicos y lógicos del Museo Íbero, de sus proveedores o de terceras personas; introducir o difundir en la red virus informáticos o cualesquiera otros sistemas físicos o lógicos que sean susceptibles de provocar los daños anteriormente mencionados; y/o intentar acceder y, en su caso, utilizar las cuentas de correo electrónico de otros usuarios y modificar o manipular sus mensajes.</p>
        <p>El Museo Cosmopolita se reserva el derecho de retirar todos aquellos comentarios y aportaciones que vulneren el respeto a la dignidad de la persona, que sean discriminatorios, xenófobos, racistas, pornográficos, que atenten contra la juventud o la infancia, el orden o la seguridad pública o que, a su juicio, no resultaran adecuados para su publicación.</p>
        <p>En cualquier caso, el MC no será responsable de las opiniones vertidas por los usuarios a través de los foros u otras herramientas de participación que pudieran desarrollarse.</p>
        <p>El Usuario responderá de los todos los daños y perjuicios de toda naturaleza el MC o cualquier tercero pueda sufrir como consecuencia del incumplimiento de cualesquiera de las obligaciones a las que queda sometido por virtud de este Aviso Legal o de la ley en relación con el acceso y/o utilización de la página.</p>

        <h2>5. Enlaces</h2>
        <p>Las conexiones y enlaces a sitios o páginas Web de terceros se han establecido únicamente como una utilidad para el Usuario. El MC no es, en ningún caso, responsable de las mismas o de su contenido.</p>
        <p>El MC no asume ninguna responsabilidad derivada de la existencia de enlaces entre los contenidos de este sitio y contenidos situados fuera del mismo o de cualquier otra mención de contenidos externos a este sitio. Tales enlaces o menciones tienen una finalidad exclusivamente informativa y, en ningún caso, implican el apoyo, aprobación, comercialización o relación alguna entre el MI y las personas o entidades autoras y/o gestoras de tales contenidos o titulares de los sitios donde se encuentren.</p>

        <h2>6. Uso de cookies</h2>
        <p>Con el objeto de prestar un mejor servicio el MI podría llegar a almacenar en su dispositivo pequeños ficheros de información denominados cookies, los cuales pueden ser utilizados para el correcto funcionamiento de algunos de los servicios que se ofrecen, así como para realizar estadísticas de uso, diagnosticar problemas en la web, y para la administración de algunos de los servicios ofrecidos, de acuerdo con lo establecido en nuestra <a href="cookies.php">Política de cookies</a>.</p>

        <h2>7. Protección de Datos de Carácter Personal</h2>
        <p>Toda la política de tratamiento de datos personales la encontrarás en la <a href="privacidad.php">Política de Privacidad</a>, que forma parte integrante del presente Aviso Legal.</p>

        <h2>8. Legislación</h2>
        <p>El presente Aviso Legal y sus términos y condiciones se regirán e interpretarán de acuerdo con la Legislación Española. El usuario acepta que los Tribunales competentes por defecto para conocer de cualquier acción judicial derivada de o relacionada con las presentes condiciones, o con su uso de este Sitio o la navegación realizada por el mismo, sean los Tribunales Españoles.</p>
        <p>Si alguna cláusula o apartado del presente texto, que no sea de naturaleza esencial para la existencia del mismo, es declarada nula o inaplicable, la validez de las restantes cláusulas no se verá afectada.</p>
        
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