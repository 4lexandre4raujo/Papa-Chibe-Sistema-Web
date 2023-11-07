<?php
include("conexao.php");
include("bancoUsuario.php");
include("logicaAcessoUsuario.php");

$cliente = buscaCliente($conexao, $_POST["email"], $_POST["senha"]);

if ($cliente != null) {
    $_SESSION["success"] = "Cliente logado com sucesso!";
    logaCliente($cliente["email"]);
    header("Location: index.php");
    die();
} else {
    $_SESSION["danger"] = "Usuário ou senha de cliente inválido!";
    header("Location: loginClienteFormulario.php");
    die();
}
?>
