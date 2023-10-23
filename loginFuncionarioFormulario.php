<?php
include("navBar.php");


if(isset($_SESSION["danger"])) { ?>
	<p class="alert-danger"><?=$_SESSION["danger"]?></p>
<?php } ?>

<?php
unset($_SESSION["danger"])
?>

<?php

if(funcionarioEstalogado()) {
?>

	<h1>Bem vindo</h1>
	<p class="text-success">Logado como <?=funcionarioLogado()?><br><a href="logoutFuncionario.php">Deslogar</a> </p>
<?php }
else { ?>

<div class="wrapper">
    <table>
        <tr>
            <td>
                <img src="img/logoPapaChibe.png" width="600" height="600" alt="">
            </td>

            <td class="linha-vertical"></td>

            <td class="tableform">
                <h1 style="color: #FFB800;">Login</h1>

                <form action="loginFuncionario.php" method="post">
                    <table class="table" style="color: white;">
                        <tr>
                            <td>E-mail</td>
                            <td><input class="form-control" type="email" name="email" placeholder="Digite seu email"></td>
                        </tr>
                        <tr>
                            <td>Senha</td>
                            <td><input class="form-control" type="password" name="senha" placeholder="Digite sua senha"></td>
                        </tr>
                        <tr>
                            <td colspan="1"><button class="btn btn-primary">Login</button></td>
                        </tr>
                        <td colspan="2">Ainda não possui conta?<a href="cadastraFuncionarioFormulario.php" style="color: #FFB800;"> Cadastre-se</a></td>
                    </table>
                </form>
            </td>
        </tr>
    </table>
</div>


<?php } ?>

<?php include("rodape.php") ?>