<?php
include("navBar.php");
include("conexao.php");
include("bancoProduto.php");

?>

<h2 style="color: white">PRODUTOS</h2>
<br>
<?php

if(isset($_POST['categoriaid'])) {
    $categoria_id = $_POST['categoriaid'];

    // Recupere os produtos da categoria selecionada
    $produtos = listaProdutosPorCategoria($conexao, $categoria_id);

    if ($produtos) {
        foreach ($produtos as $produto) {
            ?>
            
            <div class="tableprod">
            <form method="post" action="adicionaCarrinho.php">
                <p class="title" style="font-size: 30px; color: white;">
                    <?= $produto["nome"] ?>
                </p>
                <p class="title" style="font-size: 20px; color: white;">
                    <?= $produto["ingrediente"] ?>
                </p>
                <p class="title" style="font-size: 20px; color: white;">
                    <?= $produto["valor"] ?>
                </p>
            <?php
            if(!funcionarioEstaLogado()){
            ?> 
            </div>
                <button class="btn btn-danger" type="submit" name="add">Adicionar ao Carrinho</button>
            </form>
            
            <br>
            <?php
           } else {
            ?>
            <button class="btn btn-danger">
                <a href="produtoAlteraFormulario.php?cdproduto=<?= $produto['cdproduto'] ?>" style="color: white">
                Editar Produto
                </a>
            </button>
            <button class="btn btn-danger">
                <a href="logicaRemoveProduto.php?cdproduto=<?= $produto['cdproduto'] ?>" style="color: white">
                Remover Produto
                </a>
            </button>
            <?php
           }
        }
    } else {
        echo "Nenhum produto encontrado para esta categoria.";
    }
} else {
    echo "Categoria não especificada.";
}

include("rodape.php");
?>
