<?php 

class register extends controller {

	private $error_message;

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->view->title = 'Register';
		$this->view->render('register/index');
	}

	public function run()
	{		
		try { 	

				$form = new Form();

				$form->post('new_email')->val('is_email','','Please enter a valid email address');
				$form->post('new_user')->val('minlength',5,'Username is too short')->val('maxlength',15,'now it\'s too long!');
				$form->post('new_pass')->val('minlength',7,'password is too short');

				$to_check = $form->fetch('new_pass');
				$form->post('new_pass_check')->val('confirm',$to_check,'passwords do not match bruvnaar');

				$form->submit();

				$data = $form->fetch();

				$this->model->createUser($data);
		}

		catch (Exception $e) { 

			Session::set('error_message',$e->getMessage());

			header('Location: ../Register');
		}
	}
}