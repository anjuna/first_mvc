<?php


class error extends controller {

	function __construct(){

		parent::__construct();		


	}

	public function index(){
		$this->view->title = 'Error';
		$this->view->render('Error/index');
	}

	public function message($str)
	{
		echo $str;
	}
}