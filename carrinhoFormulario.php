<?php
include("navBar.php");

?>

<!DOCTYPE html>
<html>

<head>
    <title>Carrinho de Compras</title>
</head>

<body>
    <h2>Produtos no Carrinho</h2>
    <table border="1">
        <tr>
            <th>Nome do Produto</th>
            <th>Preço</th>
            <th>Quantidade</th>
            <th>Subtotal</th>
        </tr>
        <?php
        if (!empty($_SESSION['carrinho'])) {
            $total = 0;
            foreach ($_SESSION['carrinho'] as $id => $detalhes) {
                $subtotal = $detalhes['preco'] * $detalhes['quantidade'];
                $total += $subtotal;
                ?>
                <tr>
                    <td>
                        <?php echo $detalhes['nome_produto']; ?>
                    </td>
                    <td>
                        <?php echo $detalhes['preco']; ?>
                    </td>
                    <td>
                        <?php echo $detalhes['quantidade']; ?>
                    </td>
                    <td>
                        <?php echo $subtotal; ?>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td>
                    <?php echo $total; ?>
                </td>
            </tr>
        <?php
        } else {
            ?>
            <tr>
                <td colspan="4">Não há produtos no carrinho</td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br>
    <a href="index.php">Voltar para a Loja</a>
</body>

</html>
<?php
include("rodape.php"); ?>