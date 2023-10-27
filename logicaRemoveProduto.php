<?php
include("navbar.php");
include("conexao.php");
include("bancoProduto.php");

$cdproduto = $_POST['cdproduto'];
removeProduto($conexao, $cdproduto);
$_SESSION["success"] = "Produto removido com sucesso!";
header("Location: index.php");
die();

?>
