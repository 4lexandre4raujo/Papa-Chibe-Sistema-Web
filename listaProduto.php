<?php
include("navBar.php");
include("conexao.php");
include("bancoProduto.php");


verificaFuncionario();
?>

<h2 style="color: white">TODOS OS PRODUTOS</h2>
<br>
<?php


$produtos = listaProduto($conexao);


foreach($produtos as $produto) {
?>
<table>
    <div class="tableprod">
        <p class="title" style="font-size: 30px; color: white;"><?=$produto["nome"]?></p>
        <p class="title" style="font-size: 20px; color: white;"><?=$produto["ingrediente"]?></p>
        <p class="title" style="font-size: 20px; color: white;"><?=$produto["valor"]?></p>
    </div>
    <a href="produtoAlteraFormulario.php?cdproduto=<?=$produto['cdproduto']?>">
            <button class="btn btn-danger">Editar Produto</button>
          </a>
          
        <form action="logicaRemoveProduto.php" method="post">
            <input type="hidden" name="cdproduto" value="<?=$produto['cdproduto']?>">
            <button class="btn btn-danger">Remover</button>
		</form>
</table>
<br>

<?php
}
?>

<?php
include("rodape.php");