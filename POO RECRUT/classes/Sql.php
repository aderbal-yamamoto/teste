<?php 

class Sql extends PDO{

private $conn;

public function __construct(){

	$this->conn = new PDO("mysql:host=localhost; dbname=test", "root", ""); 	

}

	private function setParams($statment, $parameters = array()){

		foreach($parameters as $key=>$value) {

			$this->setParam($statment, $key, $value);

		}
	}

	private function setParam($statment, $key, $value){

		$statment->bindParam($key, $value);
	}


	public function query($rawsQuery, $params = array()){

		$stmt = $this->conn->prepare($rawsQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;
	}

	public function select($rawsQuery, $params = array()):array{

		$stmt = $this->query($rawsQuery, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}



?>