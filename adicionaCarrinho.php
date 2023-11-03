<?php
session_start();
if (isset($_POST['add'])) {
    $produto_id = $_POST['produto_id'];
    $nome_produto = $_POST['nome_produto'];
    $preco = $_POST['preco'];
    $quantidade = $_POST['quantidade'];

    if (isset($_SESSION['carrinho'][$produto_id])) {
        $_SESSION['carrinho'][$produto_id]['quantidade'] += $quantidade;
    } else {
        $_SESSION['carrinho'][$produto_id] = array(
            'nome_produto' => $nome_produto,
            'preco' => $preco,
            'quantidade' => $quantidade
        );
    }
}

header('location: carrinhoFormulario.php');
?>