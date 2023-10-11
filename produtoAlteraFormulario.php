<?php include("navBar.php");
include("conexao.php");
include("bancoCategoria.php");
include("bancoProduto.php");

$categorias = listaCategorias($conexao);
$id = $_GET['id'];
$produto = buscaProduto($conexao, $id);
//Short if (Operador ternário)
$usado = $produto['usado'] ? "checked='checked'" : "";
$territorio = $produto['territorio'] ? "checked='checked'" : "";

?>

			<h1>Alteração de Produto</h1>
			<form action="alteraProduto.php" method="post">
				<input type="hidden" name="id" value="<?=$produto['id']?>">
				<table class="table">
					<tr>
						<td>Nome: </td>
						<td><input class="form-control" type="text" name="nome" value="<?=$produto['nome']?>"></td>
					</tr>
					<tr>
						<td>Preço: </td>
						<td><input class="form-control" type="number" name="preco" step="0.01" value="<?=$produto['preco']?>"></td>
					</tr>
					<tr>
						<td>Descrição: </td>
						<td><textarea class="form-control" name="descricao" rows="3" style="resize: none;" ><?=$produto['descricao']?></textarea></td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="checkbox" name="usado" <?=$usado?> value="true"> Usado
						</td>
					</tr>
					<tr>
						<td>Território:</td>
						<td colspan="2">
							<input type="checkbox" name="nacional" <?=$territorio?>> Nacional
							<br>
							<input type="checkbox" name="importado" <?=$territorio?>> Importado
						</td>
					</tr>
					<tr>
						<td>Categoria: </td>
						<td>
							<select name="categoria_id" class="form-control">
								<?php foreach ($categorias as $categoria) {
									$ehACategoriaSelecionada = $produto['categoria_id'] == $categoria['id'];
									$selecao = $ehACategoriaSelecionada ? "selected='selected'" : "";
								?>
									<option value="<?=$categoria['id']?>"<?=$selecao?>><?=$categoria['nome']?></option>
									<!-- <input type="radio" name="Categoria_id" value="<?=$categoria['id']?>"> <?=$categoria['nome']?><br> -->
								<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td colspan="2"><button class="btn btn-primary" type="submit">Alterar</button></td>
					</tr>

				</table>

	
			</form>

<?php include("rodape.php") ?>
		