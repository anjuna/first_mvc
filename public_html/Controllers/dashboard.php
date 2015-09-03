<?php

class dashboard extends controller {

	public function __construct()
	{

		parent::__construct();
		Auth::handleLogin();


		$this->view->js = array('dashboard/js/default.js');

	}


	public function index()
	{
		$this->view->title = 'Dashboard';
		$this->view->render('dashboard/index');
	}


	public function logout()
	{
		Session::destroy();
		header('Location: ../Index');
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