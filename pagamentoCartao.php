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
?>

</div>
<?php include("rodape.php") ?>