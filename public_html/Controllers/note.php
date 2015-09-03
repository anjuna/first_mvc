<?php


class note extends controller {
	
	public function __construct(){

		parent::__construct();
		Auth::handleLogin();

		$this->view->js = array('note/js/default.js');
	}

	public function index(){

		$this->view->noteList = $this->model->noteList();
		$this->view->title = 'Notes';
		$this->view->render('note/index');

	}

	public function create(){

		$data = array(
			'titlE'   => my_sanitize($_POST['title']),
			'contenT' => my_sanitize($_POST['content']));

		$this->model->create($data);

		header('Location: '.URL.'note');

	}

	public function edit($id){

		$this->view->note = $this->model->noteSingleList($id);

		$this->view->render('note/edit');
	}

	public function editSave($nid){

		$data = array(
					'titlE'   => my_sanitize($_POST['title']),
					'contenT' => my_sanitize($_POST['content']),
					'iD'      => $nid);

		$this->model->editSave($data);

		header('Location: '.URL.'note');

	}

	public function delete($id){

		$this->model->delete($id);

		header('Location: '.URL.'note');

	}

}