<?php


class User_Model extends Model{
	
	public function __construct(){

		parent::__construct();
	}

	public function userList(){

			return $this->db->select('SELECT u_id, usern, role FROM logins');

	}

	public function singleUser($id){

			return $this->db->select('SELECT u_id, usern, role FROM logins WHERE u_id = :u_id', array('u_id' => $id));

	}


	public function create($data){

			$this->db->insert('logins',
							   array('usern'=>$data['useR'],
									 'passw'=>Hash::create('md5',$data['pasS'],HASH_KEY),
									 'role'=>$data['rolE'])
							);

		}


	public function delete($id){

			$res  = $this->db->select('SELECT role FROM logins WHERE u_id = :u_id', array('u_id' => $id));

			if($res->role == 'owner'){

				return false;
			}

			$stmt = $this->db->delete('logins', "u_id = $id");


	}

	public function editSave($data){

			$this->db->update('logins',
								 array('usern'=>$data['useR'],
								 	   'passw'=>hash::create('md5',$data['pasS'],HASH_KEY),
								 	   'role' =>$data['rolE'],
								 	   'u_id' =>$data['iD']),
								 'u_id'
							);

		}

}
