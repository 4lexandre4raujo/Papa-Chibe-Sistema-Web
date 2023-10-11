<?php
include("navBar.php");
include("conexao.php");
include("bancoProduto.php");

$id = $_POST["id"];
$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST["categoria_id"];

if(array_key_exists('usado', $_POST)) {
	$usado = "true";
} else {
	$usado = "false";
}

if(array_key_exists('nacional', $_POST)) {
	$territorio = "Nacional";
}
elseif (array_key_exists('importado', $_POST)) {
	$territorio = "Importado";
} else {
	$territorio = "Não Selecionado";
}

if(alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado, $territorio)) {
?>

	<p class="text-success">
		Produto <?= $nome ?>, <?= $preco ?> reais, alterado com sucesso!
	</p>

<?php
} else {
	$msg = mysqli_error($conexao);
?>
	<p class="text-danger">
		Produto <?= $nome ?> não foi alterado! <br> <?= $msg ?>
	</p>

<?php
}

//mysqli_close($conexao);

?>
<div align="center">
	<a href="produtoLista.php"><button class="btn btn-primary">Ver Lista</button></a></
</div>


<?php include("rodape.php") ?>
