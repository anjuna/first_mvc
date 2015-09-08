<?php


class login_Model extends model{

	public function __construct(){

		parent::__construct();

	}

	public function link($data){

			$query = $this->db->prepare("SELECT * FROM logins Where usern = :login");

			$u = $data['username'];
			$query->bindParam(':login',$u);
			$query->execute();

			$results = $query->fetch(PDO::FETCH_ASSOC);

			try {

				if (!$results) throw new Exception('No username found m8');

				$p = hash::create('md5', $data['password'], HASH_KEY);

				if (!($results['passw'] === $p)) throw new Exception('wrong password dumbass');

				if ($results['Active'] == 0) throw new Exception('Please activate your account');

					session::set('loggedIn',true);
					session::set('role', $results['role']);
					session::set('userid', $results['u_id']);
					session::set('username', $results['usern']);

					if (isset($data['remember'])) {

						setcookie("user", $u, time()+7200,"/");
					}	

					session_regenerate_id();

					header('Location: ../dashboard/index');
					exit();
			}

			catch (Exception $e) { 

				$_SESSION = array();
				$_SESSION['errors'] = $e->getMessage();
				header('Location: ../login');
			}
	}

}