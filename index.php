<?php 

require_once("confg.php");

// ##Carrega um usuário
//$chamausuario = new Usuario();
//$chamausuario->loadById(9);
//echo $chamausuario;

//Carrega uma lista de usuários
//$lista = Usuario::getList();
//echo json_encode($lista);

//Carrega uma lista de usuário buscando pelo login
//$lista =Usuario::search("je");
//echo json_encode($lista);

//Carrega dados do usuário usando login e senha 
//$credencial = new Usuario();
//$credencial->login("Pavanello","123456");
//echo $credencial;

//Inserindo novo usuário banco
//$inserindo = new Usuario();
//$inserindo->insert("Jessica","696969");

//Deletendo dados da Tabela
//$delete = new Usuario();
//$delete->delete("23");

//Criando novo usuário forma diferente
//$aluno = new Usuario("Aluno9","@lun03");
//$aluno->insert2();
//echo $aluno;

$aluno = new Usuario();
$aluno->loadById(24);
$aluno->update("Onula","654321");

echo $aluno;

?>