


<?php
include("navBar.php");
include("conexao.php");
include("bancoProduto.php");
include("logicaVerificaCarrinho.php");


// Verificar se a sessão do carrinho já existe, se não, criá-la
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Verificar se o formulário foi enviado (adicionar pizza ao carrinho)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pizza_id"])) {
    // Adicionar a pizza ao carrinho
    $cdproduto = $_POST["cdproduto"];
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];

    $item = [
        'id' => $pizza_id,
        'name' => $pizza_name,
        'preco' => $pizza_preco,
        'quantity' => 1
    ];

    // Verificar se a pizza já está no carrinho
    $index = array_search($pizza_id, array_column($_SESSION['cart'], 'id'));

    if ($index !== false) {
        // Se a pizza já estiver no carrinho, aumentar a quantidade
        $_SESSION['cart'][$index]['quantity']++;
    } else {
        // Se a pizza não estiver no carrinho, adicioná-la
        $_SESSION['cart'][] = $item;
    }
}

// Função para calcular o total do carrinho
function calcularTotalCarrinho($cart) {
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['preco'] * $item['quantity'];
    }
    return $total;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
</head>
<body>

    <h2>Carrinho de Compras</h2>

    <!-- Exibir itens no carrinho -->
    <?php if (!empty($_SESSION['cart'])): ?>
        <ul>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <li><?php echo $item['name']; ?> - R$<?php echo $item['preco']; ?> (<?php echo $item['quantity']; ?>)</li>
            <?php endforeach; ?>
        </ul>

        <p>Total: R$<?php echo calcularTotalCarrinho($_SESSION['cart']); ?></p>

        <a href="checkout.php">Finalizar Pedido</a>
    <?php else: ?>
        <p>O carrinho está vazio.</p>
    <?php endif; ?>

    <h2>Menu de Pizzas</h2>

    <!-- Exibir menu de pizzas (substitua isso com seus dados reais do banco de dados) -->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="pizza_id" value="1">
        <input type="hidden" name="pizza_name" value="Pizza Margherita">
        <input type="hidden" name="pizza_preco" value="20">
        <button type="submit">Adicionar Pizza Margherita ao Carrinho</button>
    </form>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="pizza_id" value="2">
        <input type="hidden" name="pizza_name" value="Pizza Pepperoni">
        <input type="hidden" name="pizza_preco" value="22">
        <button type="submit">Adicionar Pizza Pepperoni ao Carrinho</button>
    </form>

    <!-- Adicione mais pizzas conforme necessário -->

</body>
</html>
