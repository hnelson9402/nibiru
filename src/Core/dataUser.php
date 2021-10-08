<?php

use Config\ErrorLog;
use Core\Session;

require_once dirname(__DIR__) . '/Config/autoload.php';

Session::sessionStart('HNPT');
ErrorLog::activateErrorLog();

if ($_SESSION['IPaddress'] != $_SERVER['REMOTE_ADDR'] || $_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT']) {        
    Session::closeSession();
    exit;
}

if (empty($_POST['name']) || empty($_POST['rol']) ) {
    echo json_encode('vacio');
} else {
    $_SESSION['name']   = $_POST['name'];
    $_SESSION['rol']    = $_POST['rol'];
    $_SESSION['status'] = true;
    echo json_encode('listo');
}