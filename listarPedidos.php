<?php
include("navBar.php");
include("conexao.php");

$sql1 = "SELECT * FROM tb_pedido where status = 1 and usuario = ".clienteCd()." ORDER BY id DESC;";
$result1 = $conexao->query($sql1);
$sql2 = "SELECT * FROM tb_pedido where status = 2 and usuario = ".clienteCd()." ORDER BY id DESC;";
$result2 = $conexao->query($sql2);
$sql3 = "SELECT * FROM tb_pedido where status = 3 and usuario = ".clienteCd()." ORDER BY id DESC;";
$result3 = $conexao->query($sql3);
$sql4 = "SELECT * FROM tb_pedido where (status = 4 OR status = 0) and usuario = ".clienteCd()." ORDER BY id DESC;";
$result4 = $conexao->query($sql4);

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
<h2 style="color: white;">Lista de Pedidos</h2>
<div class="grid-container">
    <div class="tableprodPed">
        <div class="infprod">
        NA FILA
        </div>
        <table border="1" style="color: white;">
            <tr>
                <!-- <th width="50px">ID</th> -->
                <th>Data</th>
                <!-- <th>Endereço</th> -->
                <!-- <th>Telefone</th> -->
                <th>Pedido</th>
                <th>Total</th>
            </tr>
            <?php
            if ($result1->num_rows > 0) {
                while ($row = $result1->fetch_assoc()) {
                    $pedido_id = $row['id'];
                    ?>
                    <tr>
                        <!-- <td># <?php echo $pedido_id; ?></td> -->
                        <td><?php echo date('d/m/Y H:i', strtotime($row['data_pedido'])); ?></td>
                        <!-- <td><?php echo $row['endereco']; ?></td>
                        <td><?php echo $row['telefone']; ?></td> -->
                        <td>
                            <?php
                            $sql_itens = "SELECT * FROM tb_item_pedido WHERE pedido_id = $pedido_id";
                            $result_itens = $conexao->query($sql_itens);
                            
                            if ($result_itens->num_rows > 0) {
                                echo "<ul>";
                                while ($item = $result_itens->fetch_assoc()) {
                                    echo "<li>{$item['nome_produto']} - Quantidade: {$item['quantidade']} - Subtotal: R$ {$item['subtotal']}</li>";
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
                    <td colspan="6">Nada ainda</td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="tableprodPed">
    <div class="infprod">
        PREPARANDO
    </div>
    <table border="1" style="color: white;">
    <tr>
                <!-- <th width="50px">ID</th> -->
                <th>Data</th>
               <!-- <th>Endereço</th> -->
                <!-- <th>Telefone</th> -->
                <th>Pedido</th>
                <th>Total</th>
            </tr>
            <?php
            if ($result2->num_rows > 0) {
                while ($row = $result2->fetch_assoc()) {
                    $pedido_id = $row['id'];
                    ?>
                    <tr>
                        <!-- <td># <?php echo $pedido_id; ?></td> -->
                        <td><?php echo date('d/m/Y H:i', strtotime($row['data_pedido'])); ?></td>
                        <!-- <td><?php echo $row['endereco']; ?></td>
                        <td><?php echo $row['telefone']; ?></td> -->
                        <td>
                            <?php
                            $sql_itens = "SELECT * FROM tb_item_pedido WHERE pedido_id = $pedido_id";
                            $result_itens = $conexao->query($sql_itens);
                            
                            if ($result_itens->num_rows > 0) {
                                echo "<ul>";
                                while ($item = $result_itens->fetch_assoc()) {
                                    echo "<li>{$item['nome_produto']} - Quantidade: {$item['quantidade']} - Subtotal: R$ {$item['subtotal']}</li>";
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
                    <td colspan="6">Nada ainda</td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    <div class="tableprodPed">
    <div class="infprod">
        SAIU PARA ENTREGA
    </div>
    <table border="1" style="color: white;">
            <tr>
                <!-- <th width="50px">ID</th> -->
                <th>Data</th>
               <!-- <th>Endereço</th> -->
                <!-- <th>Telefone</th> -->
                <th>Pedido</th>
                <th>Entregador</th>
                <th>Total</th>
            </tr>
            <?php
            if ($result3->num_rows > 0) {
                while ($row = $result3->fetch_assoc()) {
                    $pedido_id = $row['id'];
                    ?>
                    <tr>
                        <!-- <td># <?php echo $pedido_id; ?></td> -->
                        <td><?php echo date('d/m/Y H:i', strtotime($row['data_pedido'])); ?></td>
                        <!-- <td><?php echo $row['endereco']; ?></td>
                        <td><?php echo $row['telefone']; ?></td> -->
                        <td>
                            <?php
                            $sql_itens = "SELECT * FROM tb_item_pedido WHERE pedido_id = $pedido_id";
                            $result_itens = $conexao->query($sql_itens);
                            
                            if ($result_itens->num_rows > 0) {
                                echo "<ul>";
                                while ($item = $result_itens->fetch_assoc()) {
                                    echo "<li>{$item['nome_produto']} - Quantidade: {$item['quantidade']} - Subtotal: R$ {$item['subtotal']}</li>";
                                }
                                echo "</ul>";
                            } else {
                                echo "Não há itens para este pedido";
                            }
                            ?>
                        </td>
                        <td><?php echo $row['entregador']; ?></td>
                        <td>R$<?php echo $row['total']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">Nada ainda</td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>
<br>
<br>
<div class="tableprodPedFunc">
    <div class="infprod">
        HISTÓRICO DE PEDIDOS
    </div>
<table>
<table border="1" style="color: white;">
            <tr>
                <th>Data e Hora</th>
                <th>Endereço</th>
                <th>Pedido</th>
                <th>Entregador</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
            <?php
            if ($result4->num_rows > 0) {
                while ($row = $result4->fetch_assoc()) {
                    $pedido_id = $row['id'];
                    ?>
                    <tr>
                        <td><?php echo date('d/m/Y H:i', strtotime($row['data_pedido'])); ?></td>
                        <td><?php echo $row['endereco']; ?></td>
                        <td>
                            <?php
                            $sql_itens = "SELECT * FROM tb_item_pedido WHERE pedido_id = $pedido_id";
                            $result_itens = $conexao->query($sql_itens);
                            
                            if ($result_itens->num_rows > 0) {
                                echo "<ul>";
                                while ($item = $result_itens->fetch_assoc()) {
                                    echo "<li>{$item['nome_produto']} - Quantidade: {$item['quantidade']} - Subtotal: R$ {$item['subtotal']}</li>";
                                }
                                echo "</ul>";
                            } else {
                                echo "Não há itens para este pedido";
                            }
                            ?>
                        </td>
                        <td><?php echo $row['entregador']; ?></td>
                        <td>R$<?php echo $row['total']; ?></td>
                        <td>
                        <?php
                        $status = $row['status'];
                        if ($status == 0) {
                            echo "Cancelado";
                        } elseif ($status == 1) {
                            echo "Na fila";
                        } elseif ($status == 2) {
                            echo "Preparando";
                        } elseif ($status == 3) {
                            echo "Em rota";
                        } elseif ($status == 4) {
                            echo "Entregue";
                        } else {
                            echo "Status desconhecido";
                        }
                        ?>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="6">Nada ainda</td>
                </tr>
            <?php
            }
            ?>
        </table>
</table>
</div>
<br>
    <a href="index.php">Voltar para a Loja</a>
</body>

</html>

<?php
include("rodape.php");
?>