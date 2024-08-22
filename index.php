<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

header('Access-Control-Allow-Origin: *');
header('Cache-Control: public, max-age=3600');
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 3600) . ' GMT');

define('CONFIG', true);

require 'vendor/autoload.php';
require_once("src/config/constants.php");
require 'src/utils/routes.php';
