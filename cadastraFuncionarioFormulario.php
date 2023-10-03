<?php 
include("navBar.php");
include("conexao.php");
include("bancoFuncionario.php");

?>

<table>
    <tr>
        <td>
            <img src="img/logoPapaChibe.png" width="600" height="600" alt="">
        </td>

		<td class="linha-vertical" width="40"></td>

        <td class="tableform">
        <h2 style="color: #FFB800;">Cadastro de Funcionário</h2>
			<form action="adicionaFuncionario.php" method="post">
				<table class="table" style="color: white;">
					<tr>
						<td>Nome: </td>
						<td><input class="form-control" type="text" name="nome" placeholder="Digite o seu nome"></td>
					
					<tr>
                        <td>Sobrenome: </td>
						<td><input class="form-control" type="text" name="sobrenome"placeholder="Digite o seu Sobrenome"></td>
					</tr>
					<tr>
                        <td>Telefone: </td>
						<td><input class="form-control" type="text" name="telefone" placeholder="(00) 00000-0000"></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><input class="form-control" type="text" name="email" placeholder="nome@email.com"></td>
					</tr>
					<tr>
						<td>senha: </td>
						<td><input class="form-control" type="password" name="senha"></td>
					</tr>

					<tr>
						<td colspan="1"><button class="btn btn-primary" type="submit">Cadastrar</button></td>
					</tr>
					<td colspan="2"><p class="link">Já possui conta?<a href="index.php" style="color: #FFB800;"> Fazer Login.</a></p></td>

				</table>

	
			</form>
    </tr>
</table>

			

<?php include("rodape.php") ?>