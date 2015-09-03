<?php

require 'Form/val.php';

class form {

	/** @var array The immediately posted item */
	private $_currentItem = null;


	/** @var array Stores the posted data */
	private $_postData = array();

	/** @var obj Stores the posted data */
	private $_val = array();

	/** @var array Stores the error messages*/
	private $_error;

	public function __construct()
	{
		$this->_val = new Val();
	}

	public function post($field)
	{
		$this->_postData[$field] = $_POST[$field];

		$this->_currentItem = $field;

		return $this;

	}
	
	public function fetch($fieldName = false)
	{
		if ($fieldName) {
			
			return $this->_postData[$fieldName];
		} else {

			return $this->_postData;
		}
	}

	public function val($typeOfValidator,$arg = null, $message = 'Error')
	{
		$to_post = $this->_postData[$this->_currentItem];

		$error = $this->_val->{$typeOfValidator}($to_post, $arg, $message);

		if($error){

			$this->_error[$this->_currentItem] = $error;
		}

		return $this;
	}

	public function submit()
	{
		if(empty($this->_error)){

			return true;
		} else {

			$mess = implode(', ', $this->_error);

			throw new Exception($mess);
		}
	}
}
