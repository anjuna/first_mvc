<?php 

class help extends controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->title = 'Help';
		$this->view->render('Help/index');
	}

}