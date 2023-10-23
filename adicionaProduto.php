<?php
include("navBar.php");
include("conexao.php");
include("bancoProduto.php");
include("logicaAcessoFuncionario.php");

verificaFuncionario();

$nome = $_POST["nome"];
$valor = $_POST["valor"];
$ingrediente = $_POST["ingrediente"];
$categoriaid = $_POST["categoriaid"];

if(array_key_exists('disponibilidade', $_POST)) {
	$disponibilidade = "true";
} else {
	$disponibilidade = "false";
}

if(insereProduto($conexao, $nome, $valor, $ingrediente, $disponibilidade, $categoriaid)) {
?>

	<p class="text-success">
		Produto <?= $nome ?>, <?= $valor ?> reais, adicionado com sucesso!
	</p>

<?php
} else {
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">
		Produto <?= $nome ?> não foi adicionado! <br> <?= $msg ?>
	</p>

<?php
}

?>

<div align="center">
	<a href="produtoFormulario.php"><button class="btn btn-primary">Criar Novo</button></a></td>
	<a href="index.php"><button class="btn btn-primary">Ver Lista</button></a></td>
</div>



<?php include("rodape.php") ?>