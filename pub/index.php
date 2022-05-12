<?php
session_start();
define('ROOT', dirname(dirname(__FILE__)));
$prototype = "http" . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "s" : "") . "://";
$server = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
define('BASE_URL', $prototype . $server);
require_once ROOT . '/app/startup.php';
$route = new Route();
