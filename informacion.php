<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <title>Museo Cosmopolita - Experiencias </title>

    <link rel = "stylesheet" type = "text/css" href = "css/base.css" />
    <link rel = "stylesheet" type = "text/css" href = "css/informacion.css" />
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

    <section class="cabecera-main">

        <article class="titulo">

            <h1>Información General del Museo</h1>

        </article>



        <article class="seleccionable">

            <nav>

                <ul>

                    <li><a href="#horario">Horario de Apertura y Cierre</a></li>
                    <li><a href="#calendario">Calendario</a></li>
                    <li><a href="#entradas">Entradas</a></li>

                </ul>

            </nav>

        </article>
    
    </section>

    <section class="horario">

        <h2 id="horario">Horario de Apertura y Cierre</h2>

        <article class="horario-abierto">

            <h3>ABIERTO</h3>

            <p>De lunes a sábado de 10:00 a 19:00</p>
            <p>Domingos y festivos de 10:00 a 17:00</p>

        </article>

        <article class="horario-gratuito">

            <h3>HORARIO GRATUITO</h3>

            <p>De lunes a sábado de 17:00 a 19:00</p>
            <p>Domingos y festivos de 10:00 a 17:00</p>

        </article>

    </section>

    <section class="calendario">

        <h2 id="calendario">Calendario</h2>

        <section class="tabla-calendario">

            <article class="explicacion">

                    <p1>Mes Actual - Crema</p1>
                    <p2>Domingos - Amarillo</p2>
                    <p3>Festivos - Rojo</p3>

            </article>

            <article class="tabla">

                <table border="3">
                    <thead>
                        <tr>
                            <th colspan="21">2024</th>
                        </tr>
                        <tr>
                            <th colspan="7">Marzo</th>
                            <th colspan="7" class="mes-actual">Abril</th>
                            <th colspan="7">Mayo</th>
                        </tr>
                        <tr>
                            <th>Lun</th>
                            <th>Mar</th>
                            <th>Mié</th>
                            <th>Jue</th>
                            <th>Vie</th>
                            <th>Sáb</th>
                            <th class="domingo">Dom</th>
                            <th class="mes-actual">Lun</th>
                            <th class="mes-actual">Mar</th>
                            <th class="mes-actual">Mié</th>
                            <th class="mes-actual">Jue</th>
                            <th class="mes-actual">Vie</th>
                            <th class="mes-actual">Sáb</th>
                            <th class="domingo">Dom</th>
                            <th>Lun</th>
                            <th>Mar</th>
                            <th>Mié</th>
                            <th>Jue</th>
                            <th>Vie</th>
                            <th>Sáb</th>
                            <th class="domingo">Dom</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!--Primer Semestre-->
                            <!-- Marzo -->
                            <td></td><td></td><td></td><td></td><td>1</td><td>2</td><td class="domingo">3</td>
                            <!--Abril-->
                            <td class="festivo">1</td><td  class="mes-actual">2</td><td class="mes-actual">3</td><td class="mes-actual">4</td><td class="mes-actual">5</td><td class="mes-actual">6</td><td class="domingo">7</td>
                            <!-- Mayo -->
                            <td></td><td></td><td class="festivo">1</td><td>2</td><td>3</td><td>4</td><td class="domingo">5</td>
                        </tr>
                        <tr>
                            <!--Segundo Semestre-->
                            <!-- Marzo -->
                            <td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td class="domingo">10</td>
                            <!--Abril-->
                            <td class="mes-actual">8</td><td class="mes-actual">9</td><td class="mes-actual">10</td><td class="mes-actual">11</td><td class="mes-actual">12</td><td class="mes-actual">13</td><td class="domingo">14</td>
                            <!-- Mayo -->
                            <td>6</td><td>7</td><td>8</td><td class="festivo">9</td><td>10</td><td>11</td><td class="domingo">12</td>
                        </tr>
                        <tr>
                            <!--Tercer Semestre-->
                            <!-- Marzo -->
                            <td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td class="domingo">17</td>
                            <!--Abril-->
                            <td class="mes-actual">15</td><td class="mes-actual">16</td><td class="mes-actual">17</td><td class="mes-actual">18</td><td class="mes-actual">19</td><td class="mes-actual">20</td><td class="domingo">21</td>
                            <!-- Mayo -->
                            <td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td class="domingo">19</td>
                        </tr>
                        <tr>
                            <!--Cuarto Semestre-->
                            <!-- Marzo -->
                            <td>18</td><td>19</td><td>20</td><td>21</td><td>22</td><td>23</td><td class="domingo">24</td>
                            <!--Abril-->
                            <td class="mes-actual">22</td><td class="mes-actual">23</td><td class="mes-actual">24</td><td class="mes-actual">25</td><td class="mes-actual">26</td><td class="mes-actual">27</td><td class="domingo">28</td>
                            <!-- Mayo -->
                            <td class="festivo">20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td class="domingo">26</td>
                        </tr>
                        <tr>
                            <!--Quinto Semestre-->
                            <!-- Marzo -->
                            <td>25</td><td>26</td><td>27</td><td>28</td><td class="festivo">29</td><td>30</td><td class="domingo">31</td>
                            <!--Abril-->
                            <td class="mes-actual">29</td><td class="mes-actual">30</td><td class="mes-actual"></td><td class="mes-actual"></td><td class="mes-actual"></td><td class="mes-actual"></td><td class="domingo"></td>
                            <!-- Mayo -->
                            <td>27</td><td>28</td><td>29</td><td>30</td><td></td><td></td><td class="domingo"></td>
                        </tr>
                    </tbody>

                </table>

            </article>
        </section>


    </section>

    <section class="caja-infoentradas">

        <h2 id="entradas">Entradas</h2>

        <section class="info-entradas">


            <article class="caja-entrada">

                <h3>Estudiante</h3>

                <article class="precio">

                    <span class="valor">7</span>
                    <span class="euro">€</span>
                    <span class="unidad">/ud</span>

                </article>

                <article class="caracteristicas">

                    <p>Estudiantes Universitarios o con carné ISIC</p>
                    <p>Mostrar el carné estudiante a la hora de entrar al Museo.</p>
                    <p>¡NO SE TE OLVIDE!</p> 

                </article>

                <a href="#"><button>COMPRAR</button></a>

            </article>

            

            <article class="caja-entrada">

                <h3>Estándar</h3>

                <article class="precio">

                    <span class="valor">12</span>
                    <span class="euro">€</span>
                    <span class="unidad">/ud</span>

                </article>

                <article class="caracteristicas">

                    <p>Entrada para acceso a todos las colecciones y exposiciones del Museo.</p>
                    <p>Los guías o audio-guías se pagan aparte.</p>

                </article>

                <a href="#"><button>COMPRAR</button></a>

            </article>

            <article class="caja-entrada">

                <h3>Menores</h3>

                <article class="precio">

                    <span class="valor">0</span>
                    <span class="euro">€</span>
                    <span class="unidad">/ud</span>

                </article>

                <article class="caracteristicas">

                    <p>Acceso Gratuito a menores de edad.</p>
                    <p>Para que disfruten y aprendan sobre culturas de todos los rincones del Mundo.</p>

                </article>

                <a href="#"><button>COMPRAR</button></a>

            </article>

        </section>
    
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