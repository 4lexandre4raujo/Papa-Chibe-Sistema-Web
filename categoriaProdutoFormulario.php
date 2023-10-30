<?php
include("navBar.php");
include("conexao.php");
include("bancoProduto.php");
$categoriaid = 1;
$produtos = buscarProdutosPorCategoria($conexao, $categoriaid);

foreach ($produtos as $produto) {
    echo "Nome: " . $produto["nome"] . ", valor: " . $produto["valor"] . "<br>";
}

$conexao->close();

?>
<?php
include("rodape.php");