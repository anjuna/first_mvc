<?php


class login_Model extends model{

	public function __construct(){

		parent::__construct();

	}

	public function link(){

		$query = $this->db->prepare("SELECT u_id, role, usern FROM logins Where usern = :login AND passw = :pass");

		$u = trim($_POST['username']);
		$p = trim(hash::create('md5', $_POST['password'], HASH_KEY));

		$query->bindParam(':login',$u);
		$query->bindParam(':pass', $p);

		$query->execute();

		$results =  $query->fetch(PDO::FETCH_OBJ);

		if($results){

			
			session::set('loggedIn',true);
			session::set('role', $results->role);
			session::set('userid', $results->u_id);
			session::set('username', $results->usern);

			header('Location: ../dashboard/index');

		} else{ 

			header('Location: ../Login');
		}
	}

}