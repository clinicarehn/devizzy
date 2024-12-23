<?php
// Redirigir a HTTPS si no está en HTTPS
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
    $redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('Location: ' . $redirectURL);
    exit;
}

// Obtener el protocolo (http o https)
$protocol = 'https://';  // Forzar siempre HTTPS

// Obtener el nombre del servidor
$serverName = $_SERVER['SERVER_NAME'];

// Obtener el puerto si no es el puerto estándar
$port = ($_SERVER['SERVER_PORT'] != '80' && $_SERVER['SERVER_PORT'] != '443') ? ':' . $_SERVER['SERVER_PORT'] : '';

// Obtener la ruta base
$basePath = $serverName == 'localhost' ? '/devizzy/' : '/';

// Construir la URL base
$baseURL = $protocol . $serverName . $port . $basePath;

// Definir la constante SERVERURL
define('SERVERURL', $baseURL);

// Otras constantes
define('PRODUCT_PATH', '/vistas/plantilla/img/products/');
define('COMPANY', 'IZZY :: CLINICARE');

// Configurar la zona horaria
date_default_timezone_set('America/Tegucigalpa');
