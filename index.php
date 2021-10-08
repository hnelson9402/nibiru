<?php

use Config\ErrorLog;
use Core\Session;

require __DIR__ . '/src/Config/autoload.php';

ErrorLog::activateErrorLog();

ini_set('session.use_only_cookies', 1); //El módulo sólo usará cookies para almacenar el id de sesión en la parte del cliente
ini_set('session.use_cookies', 1); // Especifica si el módulo usará cookies para almacenar el id de sesión en la parte del cliente

/*Marca la cookie como accesible sólo a través del protocolo HTTP. Esto siginifica que la cookie no será accesible por 
lenguajes de script, tales como JavaScript*/
ini_set('session.cookie_httponly', 1);

/* Si está habilitado sid transparente - La administración de sesiones basadas en URL tiene riesgos de seguridad adicionales comparada
con la administración de sesiones basdas en cookies. */
ini_set('session.use_trans_sid', 0);

/* Permite especificar el número de bits en caracteres de ID de sesión codificados. Los valores posibles son '4' (0-9, a-f), '5' (0-9, a-v), y
'6' (0-9, a-z, A-Z, "-", ","). Cuantos más bits, más fuerte es el ID de sesión. Se recomienda 5 para la mayoría de entornos*/
ini_set('session.sid_bits_per_character', 5);

// Especifica si las cookies deberían enviarse sólo sobre conexiones seguras - en localhost no funciona si no tienes SSL
//ini_set('session.cookie_secure', 1);

// ENCABEZADOS SIN FORMATO HTTP //

/*Los navegadores que soportan esta cabecera (IE y Chrome), no cargan las hojas de estilos,
  ni los scripts (Javascript), cuyo Myme-type no sea el adecuado*/
header('X-Content-Type-Options: nosniff');

/*La cabecera X-Frame-Options sirve para prevenir que la página pueda ser abierta en un frame,
  o iframe. De esta forma se pueden prevenir ataques de clickjacking sobre tu web*/
header('X-Frame-Options: SAMEORIGIN');

// La cabecera X-XSS-Protection Se trata de una capa de seguridad adicional que bloquea ataques XSS
header('X-XSS-Protection: 1;mode=block');

Session::sessionStart('HNPT'); 

// Validar si HTTPS esta habilitado
$https = !isset($_SERVER['HTTPS']) ? null : isset($_SERVER['HTTPS']);

// Validar Seguridad - IP y Agente de Usuario
if (isset($_SESSION['IPaddress']) && isset($_SESSION['userAgent'])) {
    if ($_SESSION['IPaddress'] != $_SERVER['REMOTE_ADDR'] || $_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT']) {        
        Session::closeSession();
    }
} else {
    $_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
    $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
}

// Generamos los token secretos
$rand = strtotime('now');
$token = hash_hmac('sha512', session_id() . $rand, session_id());
$token_b64 = base64_encode(hash_hmac('ripemd256', session_id() . $rand, session_id() . $token, true));
$credenciales = hash_hmac('whirlpool', $_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . $token, $token_b64);

//Seguridad Hijacking
if (isset($_SESSION['start_token'])) {
    // Recuperamos los token del lado del servidor y del cliente para validarlos
    $tokenInit = (!empty($_COOKIE['tokenInit'])) ? htmlspecialchars($_COOKIE['tokenInit']) : null;
    $token_server = (!empty($_SESSION['tokenInit'])) ? htmlspecialchars($_SESSION['tokenInit']) : null;

    // Validamos si tanto el token del cliente como el del servidor siguen siendo iguales
    if ($tokenInit !== $token_server) {        
        Session::closeSession();
    }
} else {
    //Borramos todas las cookies
    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach ($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time() - 1000);
            setcookie($name, '', time() - 1000, '/');
        }
    }
    $_SESSION['start_token'] = $credenciales . $token_b64;
    $_SESSION['tokenInit'] = rawurlencode($token_b64);
    setcookie("PHPSESSID", session_create_id(bin2hex(random_bytes(12))), null, '/', null, $https, true);
    setcookie("fechaU", $rand, null, '/', null, $https, true);
    setcookie('tokenInit', rawurlencode($token_b64), ['path' => '/', 'httponly' => true, 'secure' => $https, 'samesite' => 'Lax']);
    header('Location: ./');
    exit;
}

require __DIR__ . '/public/app.php';