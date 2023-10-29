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
    <div class="tableprod" height="30">
        <p class="title" style="font-size: 30px; color: white;"><?=$produto["nome"]?></p>
    </div>
</table>
<br>

<?php
}
?>

<?php
include("rodape.php");