<?php
include("navBar.php");


if (isset($_SESSION["danger"])) { ?>
    <p class="alert-danger">
        <?= $_SESSION["danger"] ?>
    </p>
<?php } ?>

<?php
unset($_SESSION["danger"])
    ?>

<?php

if (funcionarioEstalogado()) {
    ?>

    <h1>Bem vindo</h1>
    <p class="text-success">Logado como
        <?= funcionarioLogado() ?><br><a href="logoutUsuario.php">Deslogar</a>
    </p>
<?php } else { ?>

    <div class="wrapper">
        <table>
            <tr>
                <td>
                    <img src="img/logoPapaChibe.png" width="600" height="600" alt="">
                </td>

                <td class="linha-vertical"></td>

                <td class="tableform">
                    <h1 style="color: #FFB800;">QUEM VOCÊ É?</h1>

                    
                        <table class="table" style="color: white;">
                            <tr>
                                <td colspan="1"><button class="btn btn-primary"><a
                                            href="loginClienteFormulario.php" style="color: white;">Cliente</a></button></td>
                                <td colspan="1"><button class="btn btn-primary"><a
                                            href="loginFuncionarioFormulario.php" style="color: white;">Funcionário</a></button></td>
                            </tr>
                        </table>
                    
                </td>
            </tr>
        </table>
    </div>


<?php } ?>

<?php include("rodape.php") ?>