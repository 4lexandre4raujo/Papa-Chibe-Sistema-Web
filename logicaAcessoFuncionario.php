<?php

session_start();

function funcionarioEstaLogado() {
	return isset($_SESSION["funcionario_logado"]);
}

//Verifica se o usuário está logado
function verificaFuncionario() {
	if(!funcionarioEstaLogado()) {
		$_SESSION["danger"] = "Você não possui acesso a essa funcionalidade!";
		header("Location: loginFuncionarioFormulario.php");
		die();
	}
}

function funcionarioLogado(){
	return $_SESSION["funcionario_logado"];
}

function logaFuncionario($email) {
	$_SESSION["funcionario_logado"] = $email;
}

function logoutFuncionario() {
	session_destroy();
	session_start();
}

