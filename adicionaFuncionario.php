<?php

include("conexao.php");
include("bancoUsuario.php");

$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha = $_POST["senha"];

if (cadastraFuncionario($conexao, $nome, $sobrenome, $telefone, $email, $senha)) {
	header("Location: loginFuncionarioFormulario.php");
	die();
	?>

	<p class="text-success">
		Funcionario
		<?= $nome ?>
		<?= $sobrenome ?>, cadastrado com sucesso!
	</p>

	<?php
} else {
	$msg = mysqli_error($conexao);
	?>
	<p class="text-danger">
		Funcionario
		<?= $nome ?>
		<?= $sobrenome ?> não foi adicionado! <br>
		<?= $msg ?>
	</p>

	<?php
}


?>
<div align="center">
	<a href="loginFuncionarioFormulario.php"><button class="btn btn-primary">Fazer Login</button></a>
</div>


<?php include("rodape.php") ?>