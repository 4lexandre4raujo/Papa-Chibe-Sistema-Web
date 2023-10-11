<?php include("navBar.php");
include("conexao.php");
include("bancoCategoria.php");
include("logicaAcessoFuncionario.php");

verificaFuncionario();

?>
			<h1>Cadastrar Nova Categoria</h1>
			<form action="adicionaCategoria.php" method="post">
				<table class="table">
					<tr>
						<td>Nome: </td>
						<td><input required class="form-control" type="text" name="nome"></td>
					</tr>
					<tr>
						<td colspan="2"><button class="btn btn-primary" type="submit">Cadastrar</button></td>
					</tr>

				</table>
			</form>

<?php include("rodape.php") ?>
		