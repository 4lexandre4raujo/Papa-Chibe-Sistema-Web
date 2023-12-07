<?php
include("conexao.php");
include("bancoProduto.php");
include("logicaAcessoUsuario.php");

$cdproduto = $_GET['cdproduto'];
disponibilizaProduto($conexao, $cdproduto);
$_SESSION["success"] = "Produto disponível com sucesso!";
header("Location: produtoIndisponivel.php");
die();

?>