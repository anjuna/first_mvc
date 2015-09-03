<?php

class Dashboard_Model extends Model {

	public function __construct()
	{

		parent::__construct();
	}

	public function xhrInsert()
	{

		$text =  my_sanitize($_POST['my_text']);
		
		$this->db->insert('ajaxdata', array('yourtext' => $text));

		$nice = array('text'=>$text,'id'=>$this->db->lastInsertId());

		echo json_encode($nice);
	}


	public function GetListing()
	{
		
		$data = $this->db->select('SELECT * FROM ajaxdata');

		echo json_encode($data);


	}

	public function Delete()
	{

	 	$id = $_POST['id'];

	 	$this->db->delete('ajaxdata', "id = $id");

	}


}