<?php

class auth {

	public static function handleLogin(){

		@session_start();
		$logged =  $_SESSION['loggedIn'];
		
		if ($logged == true || isset($_COOKIE['user'])) {

			return true;			
		} else {

			session_destroy();
			header('Location: '.URL.'index');
			exit;
		}
	}
}