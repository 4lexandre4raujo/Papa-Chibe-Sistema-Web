<?php 
include("navBar.php");
include("conexao.php");
include("bancoProduto.php"); 
include("logicaAcessoFuncionario.php");

verificaFuncionario();

if(isset($_SESSION["success"])) { ?>
	<p class="alert-success"> <?=$_SESSION["success"]?></p>
<?php }

unset($_SESSION["success"]);
?>

<h1>Listagem de produtos</h1>

<br>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th scope="col">Nome</th>
			<th scope="col">Preço</th>
			<th scope="col">Descrição</th>
			<th scope="col">Categoria</th>
			<th scope="col">Território</th>
			<th scope="col" colspan="2">Ação</th>
		</tr>
	</thead>
<?php


$produtos = listaProdutos($conexao);


foreach($produtos as $produto) {
?>
	<tr>
		<td><?=$produto["nome"]?></td>
		<td><?=$produto["preco"]?></td>
		<td><?=substr($produto['descricao'],0,20) . '...'?></td>
		<td><?=$produto['nome_categoria']?></td>
		<td><?=$produto["territorio"]?></td>
		<td><a href="produtoAlteraFormulario.php?id=<?=$produto['id']?>" class="btn btn-primary">Alterar</a></td>
		<td>
			<form action="removeProduto.php" method="post">
				<input type="hidden" name="id" value="<?=$produto['id']?>">
				<button class="btn btn-danger">Remover</button>
			</form>
		</td>
	</tr>
<?php
}
?>

</table>

<?php include("rodape.php") ?>