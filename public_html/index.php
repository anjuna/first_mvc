<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

define('ROOT_D',dirname(__FILE__).'/');

require 'config.php';
require ROOT_D.'Functions/general.php';
require ROOT_D.'Utils/Auth.php';
//require '../vendor/autoload.php';

spl_autoload_register( function($class){

		require ROOT_D.'Libs/'.$class.'.php';
});


$app = new Bootstrap();

$app->init();