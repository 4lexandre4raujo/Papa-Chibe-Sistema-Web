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
          <p class="title" name="nome_produto" value="<?= $produto["nome"] ?>">
              <?= $produto["nome"] ?>
            </p>
            <p class="title" name="preco" value="<?= $produto["valor"] ?>">R$
              <?= $produto["valor"] ?>
            </p>
            <?php
            if (funcionarioEstaLogado()) {
              ?>

              <button class="btn btn-danger">
                <a href="produtoAlteraFormulario.php?cdproduto=<?= $produto['cdproduto'] ?>" style="color: white">
                  Editar Produto
                </a>
              </button>

              <br>
              <form action="logicaRemoveProduto.php" method="post">
                <input type="hidden" name="cdproduto" value="<?= $produto['cdproduto'] ?>">
                <button class="btn btn-danger">Remover</button>
              </form>
            </div>
            <?php } else { ?>
            <form method="post" action="adicionaCarrinho.php">
              <button class="btn btn-danger" type="submit" name="add">Adicionar ao Carrinho</button>
            </form>
        </div>
        <?php
            }
      } ?>
  </div>
</table>

</table>
<?php include("rodape.php") ?>