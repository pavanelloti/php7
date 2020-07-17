<?php 

require_once("confg.php");

/* ##Carrega um usuário
$chamausuario = new Usuario();
$chamausuario->loadById(9);
echo $chamausuario;

/*Carrega uma lista de usuários
$lista = Usuario::getList();
echo json_encode($lista);

/*Carrega uma lista de usuário buscando pelo login
$lista =Usuario::search("pa");
echo json_encode($lista);

/*Carrega dados do usuário usando login e senha */
$credencial = new Usuario();
$credencial->login("Pavanello","123456");
echo $credencial;
?>