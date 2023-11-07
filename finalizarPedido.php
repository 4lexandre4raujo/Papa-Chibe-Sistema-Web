<?php
session_start();
include("conexao.php"); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    $total = 0;
    foreach ($_SESSION['carrinho'] as $id => $detalhes) {
        $subtotal = floatval($detalhes['preco']) * intval($detalhes['quantidade']);
        $total += $subtotal;
    }

    $insertPedido = $conexao->prepare("INSERT INTO tb_pedido (endereco, telefone, total) VALUES (?, ?, ?)");
    $insertPedido->bind_param("ssd", $endereco, $telefone, $total);
    $insertPedido->execute();
    $pedido_id = $conexao->insert_id;

    foreach ($_SESSION['carrinho'] as $id => $detalhes) {
        $produto_id = $id;
        $nome_produto = $detalhes['nome_produto'];
        $preco = $detalhes['preco'];
        $quantidade = $detalhes['quantidade'];
        $subtotal = $preco * $quantidade;

        $insertItemPedido = $conexao->prepare("INSERT INTO tb_item_pedido (pedido_id, produto_id, nome_produto, preco, quantidade, subtotal) VALUES (?, ?, ?, ?, ?, ?)");
        $insertItemPedido->bind_param("iisddd", $pedido_id, $produto_id, $nome_produto, $preco, $quantidade, $subtotal);
        $insertItemPedido->execute();
    }

    $_SESSION['carrinho'] = array();
    header('Location: confirmacaoPedido.php');
} else {
    header('Location: carrinhoFormulario.php');
}
?>