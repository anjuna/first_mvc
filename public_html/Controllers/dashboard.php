<?php

class dashboard extends controller {

	public function __construct()
	{

		parent::__construct();
		auth::handleLogin();

		$this->view->js = array('Dashboard/js/default.js');

	}


	public function index()
	{
		$this->view->title = 'Dashboard';
		$this->view->render('Dashboard/index');
	}


	public function logout()
	{
		session::destroy();
		
		if (isset($_COOKIE['user'])) {
			 setcookie('user',"", 1,"/");
		}

		header('Location: ../index');
		exit;
	}

	public function xhrStuff()
	{
	$this->model->xhrInsert();
	}

	public function xhrGetListing()
	{
		$this->model->GetListing();
	}

	public function xhrDelete()
	{

		$this->model->Delete();
	}

}