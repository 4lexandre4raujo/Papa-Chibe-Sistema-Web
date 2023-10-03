<?php
include("logicaAcessoFuncionario.php");
logoutFuncionario();
$_SESSION["success"] = "Deslogado com sucesso!";
header("Location: index.php");
die();