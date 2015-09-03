<?php

class login extends controller {

	public function __construct()
	{

		parent::__construct();
	
	}

	public function index()
	{
		$this->view->title = 'Login';
		$this->view->render('Login/index');
	}

	public function run()
	{
		$this->model->link();	
	}
}