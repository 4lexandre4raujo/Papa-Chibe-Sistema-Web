<?php 
include("navBar.php");
include("conexao.php");
include("bancoFuncionario.php");
include("bancoProduto.php"); 
include("logicaAcessoFuncionario.php");

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
          <img src="img/produto1.png" alt="">
          <p class="title">pizza calabresa</p>
          <p class="title">80,00</p>
          <button class="btn btn-danger"><a href="produtoAlteraFormulario.php?id=<?=$produto['id']?>"></a>Editar Produto</button>
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
          <button class="btn btn-danger"><a href="produtoAlteraFormulario.php?cdproduto=<?=$produto['cdproduto']?>"></a>Editar Produto</button>
          <br>
          <form action="logicaRemoveProduto.php" method="post">
            <input type="hidden" name="cdproduto" value="<?=$produto['cdproduto']?>">
            <button class="btn btn-danger">Remover</button>
			    </form>
        </div>
        <?php
}
?>
      </div>
    </div>
</table>    

</table>
<?php include("rodape.php") ?> 