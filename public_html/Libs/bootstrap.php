<?php

class bootstrap {

	private $my_url = null;

	private $contoller = null;

	private $controllerPath = 'Controllers/';
	private $modelPath      = 'Models/';


	public function init() {

			$this->getMyUrl();
			
			if (empty($this->my_url[0])) {

				$this->loadDefaultController();
				return false;
			}

			if ($this->loadExistingController()) {

				$this->callToMethod();
			}	
	}
		
	private function getMyUrl()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$this->my_url = explode('/', $url);

	}

	private function loadDefaultController()
	{
		require ROOT_D.$this->controllerPath.'index.php';
		$this->controller = new index();
		$this->controller->index();
	}

	private function loadExistingController()
	{

		$file = ROOT_D.$this->controllerPath . $this->my_url[0] . '.php';

		if (file_exists($file)) {

			require $file;
			$this->controller = new $this->my_url[0];
			$this->controller->loadModel($this->my_url[0],$this->modelPath);	
			return true;			
		} else {
				
			$this->error();
			return false;
		}
	}

	private function callToMethod()
	{
		
		$length = count($this->my_url);

		if ($length > 1){
			if (!method_exists($this->controller, $this->my_url[1])) {
				$this->error();
				return false;
			}
		}

		switch ($length) {

			case 4:
				$this->controller->{$this->my_url[1]}($this->my_url[2],$this->my_url[3]);
			break;
			case 3:
				$this->controller->{$this->my_url[1]}($this->my_url[2]);
			break;
			case 2:
				$this->controller->{$this->my_url[1]}();
			break;
			default:
				$this->controller->index();
			break;

		}		
	}


	/**
	*
	*(Optional) Set a custom path for the Controllers
	*@param string $path 
	*/
	public function setControllerPath($path)
	{
		$this->controllerPath = trim($path,'/').'/';
	}

	public function setModelPath($path)
	{
		$this->modelPath = trim($path).'/';
	}

	private function error()
	{
			require ROOT_D.$this->controllerPath . 'error.php';
			$this->controller = new error();
			$this->controller->index();
			return false;
	}
}