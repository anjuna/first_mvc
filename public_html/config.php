<?php  

if ($_SERVER['SERVER_ADDR'] == '178.62.67.190') {

	define('HASH_KEY', 'wanker');

	define('URL','http://178.62.67.190/tryagain/nipple/public_html/');

	define('DB_TYPE','mysql');
	define('DB_HOST','localhost');
	define('DB_NAME','proj1');
	define('DB_USER','root');
	define('DB_PASS','test');

} elseif ($_SERVER['SERVER_ADDR'] == '127.0.0.1'){

	define('HASH_KEY', 'wanker');

	define('URL','http://fatman/MyMVC/public_html/');

	define('DB_TYPE','mysql');
	define('DB_HOST','localhost');
	define('DB_NAME','proj1');
	define('DB_USER','root');
	define('DB_PASS','');
} else {

	die('Seems to be a problem...');
}
/** encrypted password for 'test' is: 009fe36c4b136263b5c64f46c13a16d4 */