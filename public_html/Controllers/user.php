<?php

class user extends controller {
	
	function __construct(){

		parent::__construct();
		auth::handleLogin();
		
		$type = session::get('role');

		if( $type != 'owner' ){

			session::destroy();
			header('Location: '.URL.'index');
		}

	}

	public function index(){

		$this->view->userList = $this->model->userList();
		$this->view->title = 'User';
		$this->view->render('User/index');
	}


	public function create(){

		$data = array();

		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){

			$data['useR']  =  my_sanitize($_POST['username']);
			$data['passW'] =  my_sanitize($_POST['password']);
			$data['rolE']  =  my_sanitize($_POST['role']);

		}

		$this->model->create($data);

		header('location: '. URL . 'user');

	}



	public function delete($id){

		$this->model->delete($id);
		header('location: '. URL . 'user');

	}

	public function edit($id){

		$this->view->user = $this->model->singleUser($id);

		$this->view->render('User/edit');


	}

	public function editSave($id){

		$data = array();

		if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['role'])){

			$data['useR'] = $_POST['username'];
			$data['pasS'] = $_POST['password'];
			$data['rolE'] = $_POST['role'];

			$data['iD']   = $id;

		}



		$this->model->editSave($data);

		header('location: '. URL . 'user');
	}


}