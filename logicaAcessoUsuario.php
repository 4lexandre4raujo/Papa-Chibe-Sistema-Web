<?php

session_start();

//funções funcionario
function funcionarioEstaLogado()
{
	return isset($_SESSION["funcionario_logado"]);
}

function verificaFuncionario()
{
	if (!funcionarioEstaLogado()) {
		$_SESSION["danger"] = "Você não possui acesso a essa funcionalidade!";
		header("Location: selecaoUsuario.php");
		die();
	}
}

function funcionarioLogado()
{
	return $_SESSION["funcionario_logado"];
}

function logaFuncionario($email)
{
	$_SESSION["funcionario_logado"] = $email;
}

function logoutFuncionario()
{
	session_destroy();
	session_start();
}

//Funções cliente
function clienteEstaLogado()
{
	return isset($_SESSION["cliente_logado"]);
}

function verificaCliente()
{
	if (!clienteEstaLogado()) {
		$_SESSION["danger"] = "Você não possui acesso a essa funcionalidade!";
		header("Location: selecaoUsuario.php");
		die();
	}
}

function clienteLogado()
{
	return $_SESSION["cliente_logado"];
}

function clienteCd () {
    return $_SESSION["cdcliente"];
}

function logaCliente($email, $cdcliente)
{
	$_SESSION["cliente_logado"] = $email;
	$_SESSION["cdcliente"] = $cdcliente;
}

function logoutCliente()
{
	session_destroy();
	session_start();
}

