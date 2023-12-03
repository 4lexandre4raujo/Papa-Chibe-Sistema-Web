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
<h2 style="color: white;">PRODUTOS ARQUIVADOS</h2>
<table>
  <div class="infprod">
    Produtos Indisponíveis
  </div>
  <div class="tableprod">
    <div class="media-scroller snaps-inline">
      <div class="media-element">
      <?php
$produtos = arquivadoProduto($conexao);

foreach ($produtos as $produto) {
?>
  
    <?php
    if (funcionarioEstaLogado()) {
    ?>
          <div class="media-element">
          <img src="./<?= $produto['imagem'] ?? 'img/produto1.png' ?>">
          <input type="hidden" name="cdproduto" value="<?= $produto['cdproduto'] ?>">
          <input readonly class="title" name="nome_produto" value="<?= $produto["nome"] ?>" />
          <input readonly class="title" name="preco" value="<?= $produto["valor"] ?>" />
          <button class="btn btn-danger">
          <a href="produtoAlteraFormulario.php?cdproduto=<?= $produto['cdproduto'] ?>" style="color: white">
            Editar Produto
          </a>
          </button>
          <button class="btn btn-danger">
            <a href="logicaDisponibilizaProduto.php?cdproduto=<?= $produto['cdproduto'] ?>" style="color: white">
              Tornar Disponível
            </a>
          </button>
        <?php
    } else {
    ?>
      <p> Nenhum produto arquivado </p>
    <?php
    }
    ?>
  </div>
<?php
}
?>
      </div>
    </div>
  </div>
</table>
<table>
  <br>
  <br>

<?php include("rodape.php") ?>