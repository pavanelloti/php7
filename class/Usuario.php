<?php 

class Usuario {

	private $idusuario;
	private $deslogin;
	private $dessenha;
	private $dtcadastro;

	public function getIdusuario(){
		return $this->idusuario;
	}

	public function setIdusuario($value){
		$this->idusuario = $value;
	}

	public function getDeslogin(){
		return $this->deslogin;
	}

	public function setDeslogin($value){
		$this->deslogin = $value;
	}

	public function getDessenha(){
		return $this->dessenha;
	}

	public function setDessenha($value){
		$this->dessenha = $value;
	}

	public function getDtcadastro(){
		return $this->dtcadastro;
	}

	public function setDtcadastro($value){
		$this->dtcadastro = $value;
	}

	public function __construct($login = "", $password = ""){
			$this->setDeslogin($login);
			$this->setDessenha($password);

	}	

	public function setData($data){	
		$this->setIdusuario($data['idusuario']);
		$this->setDeslogin($data['deslogin']);
		$this->setDessenha($data['dessenha']);
		$this->setDtcadastro(new DateTime($data['dtcadastro']));

	}

	public static function getList(){
		$sql = new Sql("dbphp7","root", "");
		return $sql->select("SELECT * FROM tb_usuarios ORDER BY idusuario");
	}

	public function loadById($id){
		$sql = new Sql("dbphp7","root", "");
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id));
			if (count($results) > 0){
			$this->setData($results[0]);
			}
	}
	
	public function login($login, $password){
		$sql = new Sql("dbphp7","root", "");
		$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD ORDER BY idusuario", array(':LOGIN'=>$login, ':PASSWORD'=>$password));
				if (count($results) > 0){
				$this->setData($results[0]);
				} else{
					throw new Exception("Login ou Senha Inválidos");
				}
	}

	public static function search($login){
		$sql = new Sql("dbphp7","root", "");
		return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY idusuario", array(':SEARCH'=>"%".$login."%"));
	}

	public function insert($login, $password){
		$sql = new Sql("dbphp7","root", "");
		$sql->query("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES(:LOGIN, :PASSWORD)", array(':LOGIN'=>$login, ':PASSWORD'=>$password));	
	}

	public function insert2(){
		$sql = new Sql("dbphp7","root", "");
		$results = $sql->select("CALL sp_usuarios_insert(:LOGIN, :PASSWORD)", array(':LOGIN'=>$this->getDeslogin(), ':PASSWORD'=>$this->getDessenha()));
		if (count($results) > 0){
			$this->setData($results[0]);
		}
	}

	public function update($login = "", $password = ""){
		
		$this->setDeslogin($login);
		$this->setDessenha($password);

		$sql = new Sql("dbphp7","root", "");
		$sql->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = :ID", 
			array(':LOGIN'=>$this->getDeslogin(),
				  ':PASSWORD'=>$this->getDessenha(),
				  ':ID'=>$this->getIdusuario()
				));	
	}

	public function delete($id){
		$sql = new Sql("dbphp7","root", "");
		$sql->query("DELETE FROM tb_usuarios WHERE idusuario = :ID", array(':ID'=>$id));
	}

	public function __toString(){
		return json_encode(array(
			"idusuario"=>$this->getIdusuario(),
			"deslogin"=>$this->getDeslogin(),
			"dessenha"=>$this->getDessenha(),
			"dtcadastro"=>$this->getDtcadastro()->format( 'd/m/Y H:i:s' )
		));
	}
} 

 ?>