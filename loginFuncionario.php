<?php
include("conexao.php");
include("bancoUsuario.php");
include("logicaAcessoUsuario.php");

$funcionario = buscaFuncionario($conexao, $_POST["email"], $_POST["senha"]);

if ($funcionario != null) {
    $_SESSION["success"] = "Funcionário logado com sucesso!";
    logaFuncionario($funcionario["email"]);
    header("Location: index.php");
    die();
} else {
    $_SESSION["danger"] = "Usuário ou senha de funcionário inválido!";
    header("Location: loginFuncionarioFormulario.php");
    die();
}
?>
