<?php


class Val {

	public function is_email($data, $arg, $message)
	{
		if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {

			return $message;
		}
	}

	public function minlength($data, $arg, $message)
	{
		if( strlen($data) < $arg){

			return $message;
		}
	}

	public function maxlength($data, $arg, $message)
	{
		if ( strlen($data) > $arg) {

			return $message;
		}
	}

	public function confirm($data, $check, $message)
	{
		if ($data != $check) {

			return $message;
		}
	}

	public function integer($data, $arg = '', $message)
	{
		if (!is_numeric($data)) {

			return $message;
		}
	}

	public function __call($name, $args)
	{
		throw new Exception( "$name does not exist inside of: ".__CLASS__ );
	}
}