<?php
include("navBar.php");
include("conexao.php");
include("bancoCategoria.php");
include("logicaAcessoFuncionario.php");

verificaFuncionario();

$nome = $_POST["nome"];

if(insereCategoria($conexao, $nome)) {
?>

	<p class="text-success">
		Categoria <?= $nome ?> adicionado com sucesso!
	</p>

<?php
} else {
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">
		Categoria <?= $nome ?> não foi adicionado! <br> <?= $msg ?>
	</p>

<?php
}

?>
<div align="center">
	<a href="produtoFormulario.php"><button class="btn btn-primary">Voltar</button></a>
</div>


<?php include("rodape.php") ?>