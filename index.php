<?php 

require_once("confg.php");

$sql = new Sql("dbphp7","root", "");

$results = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($results);

?>