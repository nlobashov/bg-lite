<?php
if (file_exists('install.php'))
{
    require_once 'install.php';
    die();
}

require_once 'lib/autoload.php';
require_once 'lib/dev.php';

$router = new core\Router();
$router->start();
