<?php


class index extends controller {
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->title = 'Hooome!';
		$this->view->render('Index/index');
	}


	public function test()
	{
		echo 'hey';
	}

	public function activate()
	{
		echo 'yea blad';
	}



}