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
    <img src="img/produto1.png" alt="">
    <input type="hidden" name="cdproduto" value="<?= $produto['cdproduto'] ?>">
    <input readonly class="title" name="nome_produto" value="<?= $produto["nome"] ?>" />
    <input readonly class="title" name="preco" value="<?= $produto["valor"] ?>" />
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
          Remover Produto
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