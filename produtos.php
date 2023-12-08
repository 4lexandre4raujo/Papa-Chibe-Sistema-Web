<?php
include("navBar.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Produtos</title>
</head>

<body>
    <h2>Produtos</h2>
    <form method="post" action="adicionaCarrinho.php">
        <table border="1">
            <tr>
                <th>Nome do Produto</th>
                <th>Preço</th>
                <th>Adicionar ao Carrinho</th>
            </tr>
            <tr>
                <td>Produto 1</td>
                <td>$10</td>
                <td>
                    <input type="hidden" name="produto_id" value="1">
                    <input type="hidden" name="nome_produto" value="Produto 1">
                    <input type="hidden" name="preco" value="10">
                    <input type="number" name="quantidade" value="1" min="1">
                    <button type="submit" name="add">Adicionar</button>
                </td>
            </tr>

            
        </table>
    </form>
</body>

</html>
<?php
include("rodape.php");
?>