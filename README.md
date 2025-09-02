🏛️ Museo Cosmopolita

Aplicación web desarrollada como proyecto de prácticas para la asignatura de Programación Web - Universidad de Granada

📋 Descripción

Museo Cosmopolita es una aplicación web completa desarrollada en dos fases que simula la gestión de un museo con exhibiciones, obras de arte y gestión de usuarios. El proyecto permite tanto a visitantes como administradores interactuar con el contenido del museo de manera intuitiva y moderna.

🎯 Objetivo del Proyecto

El desarrollo de esta aplicación tiene como finalidad poner en práctica los conocimientos adquiridos sobre:

HTML5 y CSS3 para estructura y diseño
PHP para lógica del servidor y gestión de datos
MySQL para persistencia de datos
JavaScript (implementado con PHP) para interactividad
Diseño responsive para múltiples dispositivos

✨ Características Principales

🎨 Fase I - Desarrollo Estático

Sistema de navegación intuitivo con múltiples secciones
Gestión de exhibiciones con información detallada
Sistema de noticias con navegación entre artículos
Formularios HTML5 con validación nativa
Cumplimiento de estándares W3C

🚀 Fase II - Funcionalidad Dinámica

Sistema de autenticación con sesiones PHP
Gestión de usuarios (registro, modificación de datos)
Panel de administración para gestión de contenido
Sistema de comentarios y valoraciones
Validación completa de formularios
Gestión de base de datos MySQL


🏗️ Base de Datos

usuarios: Gestión de cuentas y perfiles
exhibiciones: Información de obras y exposiciones
comentarios: Sistema de feedback de usuarios
categorias: Clasificación de contenido
valoraciones: Sistema de puntuación

📱 Páginas y Funcionalidades

- Páginas Principales

index.php: Página principal con exhibiciones destacadas
estrenos.php: Nuevas exhibiciones de la semana
cartelera.php: Todas las exhibiciones actuales
horarios.php: Programación de visitas y eventos
tarifas.php: Información de precios y entradas
informacion.php: Datos generales del museo

- Funcionalidades de Usuario

Registro y autenticación de usuarios
Gestión de perfil personal
Comentarios y valoraciones en exhibiciones
Visualización detallada de obras y exposiciones
Sistema de noticias del museo

- Panel de Administración

Gestión de exhibiciones (crear, modificar, eliminar)

🎨 Características de Diseño

- Experiencia de Usuario

Interfaz limpia y moderna
Navegación coherente en todas las páginas
Feedback visual para todas las acciones
Accesibilidad según estándares web

🔒 Seguridad Implementada

Validación de formularios en cliente y servidor
Sanitización de datos para prevenir inyección SQL
Gestión segura de sesiones
Validación de tipos de archivo para imágenes
Protección contra XSS en comentarios

🚀 Instalación y Configuración

- Requisitos Previos

Servidor web con PHP 7.4+
MySQL 5.7+
Navegador web moderno

- Clonar el repositorio
  
bashgit clone [URL_DEL_REPOSITORIO]
cd museo-cosmopolita

- Configurar base de datos
  
bashmysql -u root -p < database/museo_cosmopolita.sql

- Configurar conexión
  
php// config/database.php
$host = 'localhost';
$dbname = 'museo_cosmopolita';
$username = 'tu_usuario';
$password = 'tu_contraseña';

- Acceder a la aplicación
  
Desarrollo: http://localhost/museo-cosmopolita/pe2/
Producción: Configurar según servidor

👥 Usuarios del Sistema

- Administrador Predeterminado
- 
Usuario: admin
Contraseña: [definida en instalación]
Permisos: Gestión completa del sistema

- Usuarios Públicos
  
Registro libre desde la web
Permisos: Comentar y valorar
Perfil: Modificable por el usuario
