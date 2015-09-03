<?php

class note_model extends model {
	

	public function __construct(){

			parent::__construct();
	}

	public function noteList(){

			return $this->db->select('SELECT * FROM note WHERE user_id = :user_id',
										array('user_id'=>$_SESSION['userid']));

	}

	public function noteSingleList($id){

			return $this->db->select('SELECT * FROM note WHERE note_id = :note_id ', array('note_id' => $id));

	}


	public function create($data){

			$this->db->insert('note',
							   array('title'=>$data['titlE'],
							   		 'user_id'=>$_SESSION['userid'],
									 'content'=>$data['contenT'])
							);

		}


	public function delete($id){

			$this->db->delete('note', "note_id = $id");


	}

	public function editSave($data){

			$this->db->update('note',
								 array('title'    =>$data['titlE'],
									   'content'  =>$data['contenT'],
									   'note_id'  =>$data['iD']),

							  'note_id'
							);

	}

}