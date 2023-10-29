<?php
include("logicaAcessoUsuario.php");

logoutFuncionario();
$_SESSION["success"] = "Deslogado com sucesso!";
header("Location: index.php");
die();

logoutCliente();
$_SESSION["success"] = "Deslogado com sucesso!";
header("Location: index.php");
die();