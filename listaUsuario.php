<?php
include("navBar.php");
include("conexao.php");

$sql = "SELECT tb_pedido.*, tb_cliente.nome 
AS nome_cliente, tb_cliente.sobrenome AS sobrenome_cliente
FROM tb_pedido
JOIN tb_cliente ON tb_pedido.usuario = tb_cliente.cdcliente;";
$result = $conexao->query($sql);

?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        button {
            font-size: 16px;
            padding: 10px;
            margin: 5px;
            cursor: pointer;
        }
    </style>
<body>
    <h2 style="color: white;">FUNCIONÁRIOS CADASTRADOS</h2>
<br>
<div class="tableprodPedFunc">
    <div class="infprod">
        FUNCIONARIOS
    </div>
<table>
    <table border="1" style="color: white;">
        <tr>
            <th width="50px">ID</th>
            <th>Cliente</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Tipo Pagamento</th>
            <th width="120px">Status</th>
            <th>Data do Pedido</th>
            <th>Itens do Pedido</th>
            <th>Total</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pedido_id = $row['id'];
                ?>
                <tr>
                    <td># <?php echo $pedido_id; ?></td>
                    <td><?php echo $row['nome_cliente']; ?> <?php echo $row['sobrenome_cliente']; ?></td>
                    <td><?php echo $row['endereco']; ?></td>
                    <td><?php echo $row['telefone']; ?></td>
                    <td><?php echo $row['metodo_pagamento']; ?></td>
                    <td> Receber pedido? <br>
                            <!-- Botão Confirmar com ícone de visto -->
                        <button onclick="confirmarAcao()" style="background-color: #FFB800;">
                            <i class="fas fa-check"></i> 
                        </button>

                        <!-- Botão Cancelar com ícone de x -->
                        <button onclick="cancelarAcao()" style="background-color: #9C0000;">
                            <i class="fas fa-times"></i> 
                        </button>

                        <!-- Adicione scripts de ação se necessário -->
                        <script>
                            function confirmarAcao() {
                                alert("Ação confirmada!");
                                // Adicione mais lógica aqui, se necessário
                            }

                            function cancelarAcao() {
                                alert("Ação cancelada!");
                                // Adicione mais lógica aqui, se necessário
                            }
                        </script>
                    </td>
                    <td><?php echo $row['data_pedido']; ?></td>
                    <td>
                        <?php
                        $sql_itens = "SELECT * FROM tb_item_pedido WHERE pedido_id = $pedido_id";
                        $result_itens = $conexao->query($sql_itens);

                        if ($result_itens->num_rows > 0) {
                            echo "<ul>";
                            while ($item = $result_itens->fetch_assoc()) {
                                echo "<li>{$item['nome_produto']} - Quantidade: {$item['quantidade']} - Subtotal R: {$item['subtotal']}</li>";
                            }
                            echo "</ul>";
                        } else {
                            echo "Não há itens para este pedido";
                        }
                        ?>
                    </td>
                    <td>R$<?php echo $row['total']; ?></td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="6">Não há pedidos</td>
            </tr>
            <?php
        }
        ?>
    </table>
</table>
</div>
<br>
<br>

    
    <br>
    <a href="index.php">Voltar para a Loja</a>
</body>

</html>

<?php
include("rodape.php");
?>