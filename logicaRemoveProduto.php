<?php
include("conexao.php");
include("bancoProduto.php");
include("logicaAcessoUsuario.php");

$cdproduto = $_GET['cdproduto'];
arquivaProduto($conexao, $cdproduto);
$_SESSION["success"] = "Produto arquivado com sucesso!";
header("Location: index.php");
die();

?>