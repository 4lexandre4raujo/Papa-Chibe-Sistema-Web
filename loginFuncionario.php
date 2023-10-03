<?php
include("conexao.php");
include("bancoFuncionario.php");
include("logicaAcessofuncionario.php");

$funcionario = buscaFuncionario($conexao, $_POST["email"], $_POST["senha"]);

if($funcionario == null) {
	$_SESSION["danger"] = "Usuário ou senha inválido!";
	header("Location: index.php");
} else {
	$_SESSION["success"] = "Usuário logado com sucesso!";
	logaFuncionario($funcionario["email"]);
	header("Location: index.php");
}
die();

//var_dump($funcionario);