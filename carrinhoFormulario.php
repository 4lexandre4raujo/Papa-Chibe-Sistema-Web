<?php
include("navBar.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Carrinho de Compras</title>
</head>

<body>
    <h2 style="color: white;">Produtos no Carrinho</h2>
    <table border="1" style="color: white;">
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
                $subtotal = floatval($detalhes['preco']) * intval($detalhes['quantidade']);
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

    <form action="finalizarPedido.php" method="post">
        <h2 style="color: white;">Informações de Entrega</h2>
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>
        <?php if(clienteEstaLogado()): ?>
        <input type="submit" value="Finalizar Pedido">
        <?php endif; ?>
        <?php if(!clienteEstaLogado()): ?>
        <button><a href="loginClienteFormulario.php">Logar para efetuar pedido</a></button>
        <?php endif; ?>
    </form>

    <br>
    <a href="index.php">Voltar para a Loja</a>
</body>

</html>
<?php
include("rodape.php"); ?>
