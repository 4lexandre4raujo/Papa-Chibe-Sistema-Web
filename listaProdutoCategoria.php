<?php
include("navBar.php");
include("conexao.php");
include("bancoProduto.php");

verificaFuncionario();
?>

<h2 style="color: white">PRODUTOS</h2>
<br>
<?php

if(isset($_POST['categoria_id'])) {
    $categoria_id = $_POST['categoria_id'];

    // Recupere os produtos da categoria selecionada
    $produtos = listaProdutosPorCategoria($conexao, $categoria_id);

    if ($produtos) {
        foreach ($produtos as $produto) {
            echo "<p>{$produto['nome']}</p>";
            echo "<p>{$produto['ingrediente']}</p>";
            echo "<p>{$produto['valor']}</p>";
            // Adicione mais informações conforme necessário
            echo "<br>";
        }
    } else {
        echo "Nenhum produto encontrado para esta categoria.";
    }
} else {
    echo "Categoria não especificada.";
}

include("rodape.php");
?>
