<?php

class register_model extends model {

	public function __construct()
	{
		parent::__construct();
	}

	public function createUser($data)
	{
		$query = $this->db->prepare("INSERT INTO logins (usern,passw,Active,role,Email) VALUES (:username, :password, 0, 'default', :email)");

		$pass = hash::create('md5', $data['new_pass'], HASH_KEY);

		$query->bindParam(':username', $data['new_user']);
		$query->bindParam(':password', $pass);
		$query->bindParam(':email', $data['new_email']);

		if ($query->execute())  {

			session::set('activate','<br /> You have successfully created an account! Please check your email, and follow the activation instructions from there');

			my_activation_mail();
			header('Location: ../index');
		} else {

			print_r($this->db->errorInfo());
			//header('Location: ../error');
		}
	}
}
