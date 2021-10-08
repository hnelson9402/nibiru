<?php

use Core\Session;

require_once dirname(__DIR__)."/Config/autoload.php";

Session::sessionStart('HNPT');
Session::closeSession();