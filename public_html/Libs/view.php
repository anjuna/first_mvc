<?php

class view {

	public $title;

	public function render($name){

		require 'Views/header.php';
		require 'Views/'. $name . '.php';
		require 'Views/footer.php';

	}

}