<?php
include("conexao.php");
include("bancoUsuario.php");
include("logicaAcessoUsuario.php");

$funcionario = buscaFuncionario($conexao, $_POST["email"], $_POST["senha"]);
$cliente = buscaCliente($conexao, $_POST["email"], $_POST["senha"]);

if ($funcionario == null) {
	$_SESSION["danger"] = "Usuário ou senha inválido!";
	header("Location: loginFuncionarioFormulario.php");

	if ($cliente == null) {
		$_SESSION["danger"] = "Usuário ou senha inválido!";
		header("Location: loginClienteFormulario.php");
	} else {
		$_SESSION["success"] = "Usuário logado com sucesso!";
		logaCliente($cliente["email"]);
		header("Location: index.php");
	}
	die();

} else {
	$_SESSION["success"] = "Usuário logado com sucesso!";
	logaFuncionario($funcionario["email"]);
	header("Location: index.php");
}
die();



