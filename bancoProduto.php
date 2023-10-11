<?php

//Função para inserir produto
function insereProduto($conexao, $nome, $ingrediente, $valor, $categoriaid, $disponibilidade) {
	$query = "insert into tb_produto (nome, ingrediente, valor, categoriaid, disponibilidade) values ('{$nome}', '{$ingrediente}', {$valor}, {$categoriaid}, {$disponibilidade})";
	
	return mysqli_query($conexao, $query);
}


//Função para listar produtos
function listaProdutos($conexao) {
	$produtos = array();
	$query = "select p.*, c.nome as nome_categoria from tb_produto as p join tb_categoria as c on c.cdcategoria = p.cdproduto order by c.nome;";
	$result = mysqli_query($conexao, $query);

	while($produto = mysqli_fetch_assoc($result)) {
		array_push($produtos, $produto);
	}

	return $produtos;
}


//Função para excluir o produto
function removeProduto($conexao, $id) {
	$query = "delete from tb_produto where id={$id}";
	return mysqli_query($conexao, $query);
}

//Função para buscar um produto
function buscaProduto($conexao, $id) {
	$query = "select * from tb_produto where id={$id}";
	$resultado = mysqli_query($conexao, $query);
	$produto = mysqli_fetch_assoc($resultado);

	return $produto;
}

//Função para alterar o produto
function alteraProduto($conexao, $id, $nome, $ingrediente, $valor, $categoriaid, $disponibilidade) {
	$query = "update tb_produto set nome='{$nome}', valor={$valor}, ingrediente='{$ingrediente}', 
	categoriaid={$categoriaid}, disponibilidade={$disponibilidade} where id={$id}";


	return mysqli_query($conexao, $query);
}
