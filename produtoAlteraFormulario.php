<?php
include("navBar.php");
include("conexao.php");
include("bancoCategoria.php");
include("bancoProduto.php");

$categorias = listaCategorias($conexao);
$cdproduto = $_GET['cdproduto'];
$produto = buscaProduto($conexao, $cdproduto);
$disponibilidade = $produto['disponibilidade'] ? "checked='checked'" : "";

?>

<h1>Alteração de Produto</h1>
<form action="logicaAlteraProduto.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="cdproduto" value="<?= $produto['cdproduto'] ?>">
	<table class="table">
		<tr>
			<td>Nome: </td>
			<td><input class="form-control" type="text" name="nome" value="<?= $produto['nome'] ?>"></td>
		</tr>
		<tr>
			<td>Valor: </td>
			<td><input class="form-control" type="number" name="valor" step="0.01" value="<?= $produto['valor'] ?>"></td>
		</tr>
		<tr>
			<td>Ingrediente: </td>
			<td><textarea class="form-control" name="ingrediente" rows="3"
					style="resize: none;"><?= $produto['ingrediente'] ?></textarea></td>
		</tr>
		
		<tr>
            <td>Adicione imagem</td>
            <td><input type="file" name="imagem"></td>
        </tr>
        
		<tr>
			<td>Disponibilidade</td>
			<td>
				<input type="checkbox" name="disponibilidade" <?= $disponibilidade ?> value="true">
			</td>
		</tr>
		<tr>
			<td>Categoria: </td>
			<td>
				<select name="categoriaid" class="form-control">
					<?php foreach ($categorias as $categoria) {
						$ehACategoriaSelecionada = $produto['categoriaid'] == $categoria['cdcategoria'];
						$selecao = $ehACategoriaSelecionada ? "selected='selected'" : "";
						?>
						<option value="<?= $categoria['cdcategoria'] ?>" <?= $selecao ?>>
							<?= $categoria['nome'] ?>
						</option>
						<!-- <input type="radio" name="Categoria_id" value="<?= $categoria['cdcategoria'] ?>"> <?= $categoria['nome'] ?><br> -->
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