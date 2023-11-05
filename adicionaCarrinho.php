<?php
session_start();
$produto_id = $_POST['cdproduto'];
$nome_produto = $_POST['nome_produto'];
$preco = $_POST['preco'];
$quantidade = 1;

echo $produto_id.'<br>';
echo $nome_produto.'<br>';
echo $preco.'<br>';
echo $quantidade.'<br>';

if (isset($_POST['add'])) {

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