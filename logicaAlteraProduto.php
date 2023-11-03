<?php
include("navBar.php");
include("conexao.php");
include("bancoProduto.php");

$cdproduto = $_POST["cdproduto"];
$nome = $_POST["nome"];
$valor = $_POST["valor"];
$ingrediente = $_POST["ingrediente"];
$categoriaid = $_POST["categoriaid"];

if (array_key_exists('disponibilidade', $_POST)) {
	$disponibilidade = "true";
} else {
	$disponibilidade = "false";
}

if (alteraProduto($conexao, $cdproduto, $nome, $valor, $ingrediente, $disponibilidade, $categoriaid)) {
	?>

	<p class="text-success">
		Produto
		<?= $nome ?>,
		<?= $valor ?> reais, alterado com sucesso!
	</p>

	<?php
} else {
	$msg = mysqli_error($conexao);
	?>
	<p class="text-danger">
		Produto
		<?= $nome ?> não foi alterado! <br>
		<?= $msg ?>
	</p>

	<?php
}

//mysqli_close($conexao);

?>
<div align="center">
	<a href="index.php"><button class="btn btn-primary">Ver Lista</button></a></ </div>


	<?php include("rodape.php") ?>