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
          <a colspan="1"><button class="btn btn-danger"><a href="produtoAlteraFormulario.php?id=<?=$produto['id']?>"></a>Editar Produto</button></a>
        </div>
      </div>
    </div>

    <table>
    <br>
    <br>
    <div class="infprod">
      SABORES DISPONÍVEIS
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
          <p class="title"><?=$produto["valor"]?></p>
          <a colspan="1"><button class="btn btn-danger"><a href="produtoAlteraFormulario.php?id=<?=$produto['id']?>"></a>Editar Produto</button></a>
        </div>
      </div>
    </div>
</table>    
<?php
}
?>
</table>
<?php include("rodape.php") ?> 