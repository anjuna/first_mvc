<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
header('X-XSS-Protection: 1; mode=block');

define('ROOT_D',dirname(__FILE__).'/');

require 'config.php';
require ROOT_D.'Functions/general.php';
require ROOT_D.'Utils/auth.php';
//require '../vendor/autoload.php';

spl_autoload_register( function($class){

		require ROOT_D.'Libs/'.$class.'.php';
});


$app = new bootstrap();

$app->init();