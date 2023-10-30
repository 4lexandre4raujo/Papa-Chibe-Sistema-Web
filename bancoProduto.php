<?php

//Função para inserir produto
function insereProduto($conexao, $nome, $valor, $ingrediente, $disponibilidade, $categoriaid) {
	$query = "insert into tb_produto (nome, valor, ingrediente, disponibilidade, categoriaid) values ('{$nome}', {$valor}, '{$ingrediente}', {$disponibilidade}, {$categoriaid})";
	
	return mysqli_query($conexao, $query);
}


//Função para listar produtos
function listaProdutos($conexao) {
	$produtos = array();
	$query = "select cdproduto, nome, valor from tb_produto;";
	$result = mysqli_query($conexao, $query);

	while($produto = mysqli_fetch_assoc($result)) {
		array_push($produtos, $produto);
	}

	return $produtos;
}


//Função para excluir o produto
function removeProduto($conexao, $cdproduto) {
	$query = "delete from tb_produto where cdproduto={$cdproduto}";
	return mysqli_query($conexao, $query);
}

//Função para buscar um produto
function buscaProduto($conexao, $cdproduto) {
	$query = "select * from tb_produto where cdproduto={$cdproduto}";
	$resultado = mysqli_query($conexao, $query);
	$produto = mysqli_fetch_assoc($resultado);

	return $produto;
}

function buscarProdutosPorCategoria($conexao, $categoriaid) {
    $produtos = array();

    $query = "select * from tb_produtos where categoriaid = {$categoriaid}";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $categoriaid);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($produto = $result->fetch_assoc()) {
        array_push($produtos, $produto);
    }

    $stmt->close();
    return $produtos;
}
//Função Lista produto
function listaProduto($conexao){
	$produtos = array();
	$query = "select * from tb_produto;";
	$resultado = mysqli_query($conexao, $query);

	while($produto = mysqli_fetch_assoc($resultado)) {
		array_push($produtos, $produto);
	}

	return $produtos;
}

//Função para alterar o produto
function alteraProduto($conexao, $cdproduto, $nome, $valor, $ingrediente, $disponibilidade, $categoriaid) {
	$query = "update tb_produto set nome='{$nome}', valor={$valor}, ingrediente='{$ingrediente}',  disponibilidade={$disponibilidade}, 
	categoriaid={$categoriaid} where cdproduto={$cdproduto}";


	return mysqli_query($conexao, $query);
}
