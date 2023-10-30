<?php

// Verifique se o produto já está no carrinho
if(isset($_SESSION['carrinho'][$_POST['cdproduto']])) {
    // Se o produto já estiver no carrinho, apenas atualize a quantidade
    $_SESSION['carrinho'][$_POST['cdproduto']]['quantidade'] += $_POST['quantidade'];
} else {
    // Se o produto não estiver no carrinho, adicione-o
    $_SESSION['carrinho'][$_POST['cdproduto']] = array(
        "nome" => $_POST['nome'],
        "valor" => $_POST['valor'],
        "quantidade" => $_POST['quantidade']
    );
}
?>
