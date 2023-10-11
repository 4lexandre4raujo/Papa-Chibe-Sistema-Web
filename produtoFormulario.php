<?php include("navBar.php");
include("conexao.php");
include("bancoCategoria.php");
include("logicaAcessoFuncionario.php");

verificaFuncionario();

$categorias = listaCategorias($conexao);

?>

<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #FFB800;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
			<h1>Formulário de Produto</h1>
			<form action="adicionaProduto.php" method="post">
				<table class="table">
					<tr>
						<td>Nome: </td>
						<td colspan="2"><input class="form-control" type="text" name="nome"></td>
					</tr>
					<tr>
						<td>Valor: </td>
						<td colspan="2"><input class="form-control" type="number" name="valor" step="0.01"></td>
					</tr>
					<tr>
						<td>ingrediente: </td>
						<td colspan="2"><textarea class="form-control" name="ingrediente" rows="3" style="resize: none;"></textarea></td>
					</tr>

					<tr>
						<td></td>
						<td colspan="2">
							<input type="checkbox" name="disponibilidade" value="true"> Disponibilidade
						</td>
					</tr>
					<!-- <tr>
						<td>Disponibilidade</td>
						<td colspan="2">
						<label class="switch">
							<input type="checkbox" name="disponibilidade" value="true">
							<span class="slider round"></span>
						</label>
							
						</td>
					</tr> -->
					
					<tr>
						<td>Categoria: </td>
						<td>
							<select name="categoriaid" class="form-control">
								<?php foreach ($categorias as $categoria) {
								?>
									<option value="<?=$categoria['categoriaid']?>"><?=$categoria['nome']?></option>
									<!-- <input type="radio" name="Categoria_id" value="<?=$categoria['id']?>"> <?=$categoria['nome']?><br> -->
								<?php
								}
								?>
							</select>
							<td><a href="categoriaProduto.php">Nova Categoria</a></td>
						</td>
					</tr>
					<tr>
						<td colspan="3"><button class="btn btn-primary" type="submit">Cadastrar</button></td>
					</tr>

				</table>

	
			</form>

<?php include("rodape.php") ?>
		
		