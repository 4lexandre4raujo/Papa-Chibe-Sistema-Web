<?php 
include("navBar.php");
include("conexao.php");
include("bancoFuncionario.php");
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
          <p class="title">Pizza Calabresa</p>
          <p class="title">R$ 80,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto2.png" alt="">
          <p class="title">Pizza Portuguesa</p>
          <p class="title">R$ 55,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto1.png" alt="">
          <p class="title">Pizza Calabresa</p>
          <p class="title">R$ 80,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto2.png" alt="">
          <p class="title">Pizza Portuguesa</p>
          <p class="title">R$ 55,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto1.png" alt="">
          <p class="title">Pizza Calabresa</p>
          <p class="title">R$ 80,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto2.png" alt="">
          <p class="title">Pizza Portuguesa</p>
          <p class="title">R$ 55,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto1.png" alt="">
          <p class="title">Pizza Calabresa</p>
          <p class="title">R$ 80,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto2.png" alt="">
          <p class="title">Pizza Portuguesa</p>
          <p class="title">R$ 55,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto1.png" alt="">
          <p class="title">Pizza Calabresa</p>
          <p class="title">R$ 80,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto2.png" alt="">
          <p class="title">Pizza Portuguesa</p>
          <p class="title">R$ 55,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto1.png" alt="">
          <p class="title">Pizza Calabresa</p>
          <p class="title">R$ 80,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto2.png" alt="">
          <p class="title">Pizza Portuguesa</p>
          <p class="title">R$ 55,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
      </div>
    </div>
    <br>
    <br>
    <div class="infprod">
      SABORES DISPONÍVEIS
    </div>
    <div class="tableprod">
      <div class="media-scroller snaps-inline">
        <div class="media-element">
          <img src="img/produto1.png" alt="">
          <p class="title">Pizza Calabresa</p>
          <p class="title">R$ 80,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto2.png" alt="">
          <p class="title">Pizza Portuguesa</p>
          <p class="title">R$ 55,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto1.png" alt="">
          <p class="title">Pizza Calabresa</p>
          <p class="title">R$ 80,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto2.png" alt="">
          <p class="title">Pizza Portuguesa</p>
          <p class="title">R$ 55,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto1.png" alt="">
          <p class="title">Pizza Calabresa</p>
          <p class="title">R$ 80,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto2.png" alt="">
          <p class="title">Pizza Portuguesa</p>
          <p class="title">R$ 55,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto1.png" alt="">
          <p class="title">Pizza Calabresa</p>
          <p class="title">R$ 80,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto2.png" alt="">
          <p class="title">Pizza Portuguesa</p>
          <p class="title">R$ 55,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto1.png" alt="">
          <p class="title">Pizza Calabresa</p>
          <p class="title">R$ 80,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto2.png" alt="">
          <p class="title">Pizza Portuguesa</p>
          <p class="title">R$ 55,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto1.png" alt="">
          <p class="title">Pizza Calabresa</p>
          <p class="title">R$ 80,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
        <div class="media-element">
          <img src="img/produto2.png" alt="">
          <p class="title">Pizza Portuguesa</p>
          <p class="title">R$ 55,00</p>
          <a colspan="1"><button class="btn btn-danger">Editar Produto</button></a>
        </div>
      </div>
    </div>
</table>
<?php include("rodape.php") ?> 