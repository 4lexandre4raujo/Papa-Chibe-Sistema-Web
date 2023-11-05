<?php
include("conexao.php");
include("bancoProduto.php");
include("logicaAcessoUsuario.php");

$cdproduto = $_GET['cdproduto'];
removeProduto($conexao, $cdproduto);
$_SESSION["success"] = "Produto removido com sucesso!";
header("Location: index.php");
die();

?>