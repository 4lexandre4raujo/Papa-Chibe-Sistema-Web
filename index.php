<?php
include("navBar.php");
include("conexao.php");
include("bancoUsuario.php");
include("bancoProduto.php");

if (isset($_SESSION["success"])) { ?>
  <p class="alert-success">
    <?= $_SESSION["success"] ?>
  </p>
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

foreach ($produtos as $produto) {
?>
  <div class="media-element">
    <div class="flip-card">
      <div class="flip-card-inner">
        <div class="flip-card-front">
          <img src="./<?= $produto['imagem'] ?? 'img/produto1.png' ?>" height="100%" width="100%">
        </div>
        <div class="flip-card-back"> 
          <h1> <?= $produto["nome"] ?> </h1>
          <p> <?= $produto["ingrediente"] ?> </p>
        </div>
      </div>
    </div>
    <input type="hidden" name="cdproduto" value="<?= $produto['cdproduto'] ?>">
    <label> <?= $produto["nome"] ?></label>
    <label> <?= $produto["valor"] ?></label>
   <?php
    if (funcionarioEstaLogado()) {
    ?>
      <button class="btn btn-danger">
        <a href="produtoAlteraFormulario.php?cdproduto=<?= $produto['cdproduto'] ?>" style="color: white">
          Editar Produto
        </a>
      </button>
      <button class="btn btn-danger">
        <a href="logicaRemoveProduto.php?cdproduto=<?= $produto['cdproduto'] ?>" style="color: white">
          Tornar Indisponível
        </a>
      </button>
      <br>
    <?php
    } else {
    ?>
      <form method="post" action="adicionaCarrinho.php">
        <input type="hidden" name="cdproduto" value="<?= $produto['cdproduto'] ?>">
        <input type="hidden" name="nome_produto" value="<?= $produto["nome"] ?>">
        <input type="hidden" name="preco" value="<?= $produto["valor"] ?>">
        <button class="btn btn-danger" type="submit" name="add">Adicionar ao Carrinho</button>
      </form>
    <?php
    }
    ?>
  </div>
<?php
}
?>
  </div>
</table>

</table>
<?php include("rodape.php") ?>