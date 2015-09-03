<?php



class database extends PDO {

	public function __construct(){

		try {
			parent::__construct(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER ,DB_PASS);

		}

		catch ( PDOException $e ) {
			echo $e->getMessage();
		}




	}



	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_OBJ ){

		$stmt = $this->prepare($sql);

		foreach( $array as $key => $val ){

			$stmt->bindValue(":$key", $val);
		}

		$stmt->execute();

		$res = $stmt->fetchAll($fetchMode);

		return $res;
		

	}


	/**
	* insert
	* @param string $table name of table inserting into
	* @param array  $data associative array of data to be inserted
	* @return null
	*
	**/

	public function insert($table,$data){

		ksort($data);

		$fieldNames  =      implode('`, `', array_keys($data));
		$fieldValues = ':'. implode(', :' , array_keys($data));

		$stmt = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

		foreach( $data as $key => $val ){

			$stmt->bindValue(":$key", $val );
		}

		$stmt->execute();
		
	}

	/**
	* update
	* @param string $table name of table to be updated
	* @param array  $data associative array of data to be inserted to new update
	* @return null
	*
	*
	**/

	public function update($table, $data, $where){

		ksort($data);

		$to_set = array();

		foreach($data as $key => $val){

			$to_set[] = "`$key` = :$key";
		}

		$to_set = implode(", ", $to_set);

		$_where = "$where = :$where";

		$stmt = $this->prepare("UPDATE $table SET $to_set WHERE $_where");

		foreach($data as $key => $val){

			$stmt->bindValue(":$key",$val);
		}

		$stmt->execute();
	}

	public function delete($table, $where, $limit = 1){

		return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");


	}
}