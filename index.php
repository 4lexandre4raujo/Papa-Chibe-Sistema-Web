<?php 
include("navBar.php");
include("conexao.php");
include("bancoFuncionario.php");
include("bancoProduto.php"); 

if (isset($_SESSION["success"])) { ?>
	<p class="alert-success"><?=$_SESSION["success"]?></p>
<?php }

unset($_SESSION["success"]);

?>


<table>
    <div class="infprod">
      EM DESTAQUE
    </div>
    <div class="tableprod">
      <div class="media-scroller snaps-inline">
        <div class="media-element">
          
        </div>
      </div>
    </div>
</table>
    <table>
    <br>
    <br>
    <div class="infprod">
      PRODUTOS DISPONÍVEIS
    </div>
    <div class="tableprod">
      <div class="media-scroller snaps-inline">

<?php


$produtos = listaProdutos($conexao);


foreach($produtos as $produto) {
?>
        <div class="media-element">
          <img src="img/produto1.png" alt="">
          <p class="title"><?=$produto["nome"]?></p>
          <p class="title">R$ <?=$produto["valor"]?></p>
<?php
if(funcionarioEstaLogado()) {
?>
          <a href="produtoAlteraFormulario.php?cdproduto=<?=$produto['cdproduto']?>">
            <button class="btn btn-danger">Editar Produto</button>
          </a>
          <br>
          <form action="logicaRemoveProduto.php" method="post">
            <input type="hidden" name="cdproduto" value="<?=$produto['cdproduto']?>">
            <button class="btn btn-danger">Remover</button>
			    </form>
        </div>
<?php }
else { ?>
          <a href="">
            <button class="btn btn-danger">Adicionar ao Carrinho</button>
          </a>  
      </div>
<?php
}
}?>
    </div>
</table>    

</table>
<?php include("rodape.php") ?> 