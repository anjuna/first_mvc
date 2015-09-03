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
		header('Location: ../Index');
		exit;
	}

	public function xhrStuff()
	{
		echo 1;
	$this->model->xhrInsert();

	}

	public function xhrGetListing()
	{
		echo 2;
		$this->model->GetListing();

	}

	public function xhrDelete()
	{

		$this->model->Delete();
	}

}