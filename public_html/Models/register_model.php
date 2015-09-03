<?php

class register_model extends model {

	public function __construct()
	{
		parent::__construct();
	}

	public function createUser($data)
	{
		$query = $this->db->prepare("INSERT INTO logins VALUES (:username, :password, 0, 'default', :email)");

		$query->bindParam(':username', $data['new_user']);
		$query->bindParam(':password', hash::create('md5', $data['new_pass'], HASH_KEY));
		$query->bindParam(':email', $data['new_email']);

		$query->execute();

		session::set('activate','You have successfully created an account! Please check your email, and follow the activation instructions from there');

		header('Location: ../Index');
	}
}
