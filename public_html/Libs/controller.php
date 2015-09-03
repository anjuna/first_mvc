<?php


class controller {

	public function __construct()
	{		
		$this->view = new View();
		Session::ennit();
	}

	public function loadModel($name, $my_path)
	{
		$path = ROOT_D.$my_path . $name . '_model.php';

		if (file_exists($path)) {
		
			require $my_path . $name . '_model.php' ;

			$modelName = $name.'_model';

			$this->model = new $modelName;
		}
	}

}