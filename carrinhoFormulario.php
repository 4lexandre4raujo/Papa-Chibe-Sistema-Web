<?php
include("navBar.php");
include("conexao.php");
include("bancoProduto.php");

verificaFuncionario();

if (!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0) {
    echo "Carrinho vazio";
    exit;
}

echo "<table>";
echo "<tr><th>Nome</th><th>Valor</th><th>Quantidade</th></tr>";

$total = 0;

foreach ($_SESSION['carrinho'] as $cdproduto => $quantidade) {
    $query = "SELECT * FROM tb_produto WHERE cdproduto = {$cdproduto}";
    $resultado = mysqli_query($conexao, $query);
    $produto = mysqli_fetch_assoc($resultado);

    echo "<tr>";
    echo "<td>{$produto['nome']}</td>";
    echo "<td>{$produto['valor']}</td>";
    echo "<td><input type='number' value='{$quantidade}' min='1'></td>";
    echo "</tr>";

    $total += $produto['valor'] * $quantidade;
}

echo "<tr><td colspan='2'>Total</td><td>{$total}</td></tr>";
echo "</table>";