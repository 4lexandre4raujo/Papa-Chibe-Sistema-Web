<?php
include("conexao.php");
include("bancoUsuario.php");

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha = $_POST["senha"];

if (cadastraCliente($conexao, $nome, $sobrenome, $telefone, $email, $senha)) {
	header("Location: loginClienteFormulario.php");
	die();
	?>

	<p class="text-success">
		Clientes
		<?= $nome ?>
		<?= $sobrenome ?>, cadastrado com sucesso!
	</p>

	<?php
} else {
	$msg = mysqli_error($conexao);
	?>
	<p class="text-danger">
		Cliente
		<?= $nome ?>
		<?= $sobrenome ?> não foi adicionado! <br>
		<?= $msg ?>
	</p>

	<?php
}


?>
<div align="center">
	<a href="loginClienteFormulario.php"><button class="btn btn-primary">Fazer Login</button></a>
</div>


<?php include("rodape.php") ?>