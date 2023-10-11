<?php

//Insere categorias
function insereCategoria($conexao, $nome){
	$query = "insert into tb_categoria (nome) values ('{$nome}')";

	return mysqli_query($conexao, $query);
}

//Lista categorias
function listaCategorias($conexao){
	$categorias = array();
	$query = "select * from tb_categoria;";
	$resultado = mysqli_query($conexao, $query);

	while($categoria = mysqli_fetch_assoc($resultado)) {
		array_push($categorias, $categoria);
	}

	return $categorias;
}
