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
		try {
				$form = new form();

				$form->post('username')->val('asci_check','','No strange characters mind..');
				$form->post('password');
				if (isset($_POST['remember'])) $form->post('remember');

				$form->submit();

				$data = $form->fetch();

				//print_r($data);die;

				$this->model->link($data);	
		}

		catch (Exception $e) {

			$_SESSION = array();
			$_SESSION['errors'] = $e->getMessage();
			header('Location: ../login');
		}
	}
}