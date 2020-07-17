<?php 

class Usuario extends Sql{

	private $conn;
	private $dbname;
	private $login;
	private $pass;

	public function __construct($dbname, $login, $pass){
		$this->dbname = $dbname;
		$this->login = $login;
		$this->pass = $pass;
		$this->conn = new PDO("mysql:host=localhost;dbname=".$this->dbname."","".$this->login."","".$this->pass);
	}

	private function setParams($statment, $parameters = array()){
		foreach ($parameters as $key => $value){
			$this->setParam($key, $value);
		}
	}

	private function setParam($statment, $key, $value){
		$statment->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array()){
		$stmt = $this->conn->prepare($rawQuery);
		$this->setParams($stmt, $params);
		$stmt->execute();
		return $stmt;
	}

	public function select($rawQuery, $params = array()):array{
		$stmt = $this->query($rawQuery, $params);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
} 

 ?>