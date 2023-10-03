<?php

//Função para adicionar um usuario
function cadastraFuncionario($conexao, $nome, $sobrenome, $telefone, $email, $senha) {
	$senhaMd5 = md5($senha);
	$query = "insert into tb_funcionario (nome, sobrenome, telefone, email, senha) values ('{$nome}', '{$sobrenome}', '{$telefone}', '{$email}', '{$senhaMd5}')";
	
	return mysqli_query($conexao, $query);
}

//Função para buscar um usuario
function buscaFuncionario($conexao, $email, $senha) {
	$senhaMd5 = md5($senha);
	$query = "select * from tb_funcionario where email='{$email}' and senha='{$senhaMd5}'";
	$resultado = mysqli_query($conexao, $query);
	$funcionario = mysqli_fetch_assoc($resultado);

	return $funcionario;
}