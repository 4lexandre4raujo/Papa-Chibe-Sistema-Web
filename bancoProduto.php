<?php

//Função para inserir produto
function insereProduto($conexao, $nome, $valor, $ingrediente, $imagem, $disponibilidade, $categoriaid)
{
	$query = "insert into tb_produto (nome, valor, ingrediente, imagem, disponibilidade, categoriaid) values ('{$nome}', {$valor}, '{$ingrediente}', '{$imagem}', {$disponibilidade}, {$categoriaid})";
	return mysqli_query($conexao, $query);
}


//Função para listar produtos
function listaProdutos($conexao)
{
	$produtos = array();
	$query = "select cdproduto, nome, valor, imagem from tb_produto;";
	$result = mysqli_query($conexao, $query);

	while ($produto = mysqli_fetch_assoc($result)) {
		array_push($produtos, $produto);
	}

	return $produtos;
}


//Função para excluir o produto
function removeProduto($conexao, $cdproduto)
{
	$query = "delete from tb_produto where cdproduto={$cdproduto}";
	return mysqli_query($conexao, $query);
}

//Função para buscar um produto
function buscaProduto($conexao, $cdproduto)
{
	$query = "select * from tb_produto where cdproduto={$cdproduto}";
	$resultado = mysqli_query($conexao, $query);
	$produto = mysqli_fetch_assoc($resultado);

	return $produto;
}

function buscaProdutoCategoria($conexao, $categoriaid)
{
	$query = "select * from tb_produto where categoriaid={$categoriaid}";
	$resultado = mysqli_query($conexao, $query);
	$produto = mysqli_fetch_assoc($resultado);

	return $produto;
}
function listaProduto($conexao)
{
    $produtos = array();
    $query = "select * from tb_produto;"; // Include "imagem" in the query
    $result = mysqli_query($conexao, $query);

    while ($produto = mysqli_fetch_assoc($result)) {
        array_push($produtos, $produto);
    }

    var_dump($produtos); // Add this line for debugging

    return $produtos;
}


//Função para alterar o produto
function alteraProduto($conexao, $cdproduto, $nome, $valor, $ingrediente, $imagem, $disponibilidade, $categoriaid)
{
	$query = "update tb_produto set nome='{$nome}', valor={$valor}, ingrediente='{$ingrediente}', imagem='{$imagem}', disponibilidade={$disponibilidade}, 
	categoriaid={$categoriaid} where cdproduto={$cdproduto}";


	return mysqli_query($conexao, $query);
}

function listaProdutosPorCategoria($conexao, $categoria_id) {
    $query = "SELECT * FROM tb_produto WHERE categoriaid = {$categoria_id}";
    $resultado = mysqli_query($conexao, $query);

    if (!$resultado) {
        die("Erro na consulta: " . mysqli_error($conexao));
    }

    $produtos = array();

    while ($produto = mysqli_fetch_assoc($resultado)) {
        $produtos[] = $produto;
    }

    return $produtos;
}
