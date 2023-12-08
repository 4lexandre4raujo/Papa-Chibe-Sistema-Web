<?php
include("navBar.php");
include("conexao.php");

$sql = "SELECT tb_pedido.*, tb_cliente.nome 
AS nome_cliente, tb_cliente.sobrenome AS sobrenome_cliente
FROM tb_pedido
JOIN tb_cliente ON tb_pedido.usuario = tb_cliente.cdcliente where status = 1 or status = 2 or status = 3 ORDER BY id DESC;";
$result = $conexao->query($sql);

$sql2 = "SELECT tb_pedido.*, tb_cliente.nome 
AS nome_cliente, tb_cliente.sobrenome AS sobrenome_cliente
FROM tb_pedido
JOIN tb_cliente ON tb_pedido.usuario = tb_cliente.cdcliente where status = 0 or status = 4 ORDER BY id DESC;";
$result2 = $conexao->query($sql2);

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

    <h2 style="color: white;">ACOMPANHAMENTO DE PEDIDOS</h2>
<br>
<div class="tableprodPedFunc">
    <div class="infprod">
        PEDIDOS ATUAIS
    </div>
<table>
    <table border="1" style="color: white;">
        <tr>
            <th>Data do Pedido</th>
            <!-- <th width="50px">ID</th> -->
            <th>Endereço</th>
            <th>Cliente</th>
            <th>Telefone</th>
            <th>Tipo Pagamento</th>
            <th width="120px">Status</th>
            <th>Itens do Pedido</th>
            <th>Entregador</th>
            <th>Total</th>
            <th>Troco</th>
            <th width="120px">Ação</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pedido_id = $row['id'];
                ?>
                <tr>
                    <td><?php echo date('d/m/Y H:i', strtotime($row['data_pedido'])); ?></td>
                    <td><?php echo $row['endereco']; ?></td>
                    <td><?php echo $row['nome_cliente']; ?> <?php echo $row['sobrenome_cliente']; ?></td>
                    <td><?php echo $row['telefone']; ?></td>
                    <!-- <td># <?php echo $pedido_id; ?></td> -->
                    <td><?php echo $row['metodo_pagamento']; ?></td>
                    <td><?php
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
                    <td>R$<?php echo $row['troco']; ?></td>
                    <?php if ($row['status']==1): ?>
                    <td> Preparar pedido? <br>
                            <!-- Botão Confirmar com ícone de visto -->
                            <button onclick="confirmarAcao(<?=$pedido_id?>)" style="background-color: #FFB800;">
                                <i class="fas fa-check"></i> 
                            </button>

                        <!-- Botão Cancelar com ícone de x -->
                        <button onclick="cancelarAcao(<?=$pedido_id?>)" style="background-color: #9C0000;">
                            <i class="fas fa-times"></i> 
                        </button>
                    <?php endif; ?>

                    <?php if ($row['status']==2): ?>
                    <td> Saiu para entrega? <br>
                            <!-- Botão Confirmar com ícone de visto -->
                            <button onclick="confirmarAcao(<?=$pedido_id?>)" style="background-color: #FFB800;">
                                <i class="fas fa-check"></i> 
                            </button>
                            <label >Digite o nome do entregador:</label>

                            <input type="text" required name="entregador" id="entregador">
                            
                            </input>
                    <?php endif; ?>

                    <?php if ($row['status']==3): ?>
                    <td> Finalizou pedido? <br>
                            <!-- Botão Confirmar com ícone de visto -->
                            <button onclick="confirmarAcao(<?=$pedido_id?>)" style="background-color: #FFB800;">
                                <i class="fas fa-check"></i> 
                            </button>

                    <?php endif; ?>

                    <?php if ($row['status']==4): ?>
                    <td> Finalizado
                    <?php endif; ?>

                    <?php if ($row['status']==0): ?>
                    <td> Cancelado
                    <?php endif; ?>
                    
                        <script>
                            function confirmarAcao(pedido_id) {
                                var xhttp = new XMLHttpRequest();
                                var entregadorInput=document.querySelector("button + label + #entregador");
                                var entregador=null;
                                if(entregadorInput!==null){
                                    entregador=entregadorInput.value;
                                }
                                xhttp.onreadystatechange = function () {
                                    if (this.readyState == 4 && this.status == 200) {
                                        alert(this.responseText);
                                        // Recarregar a página após a confirmação (opcional)
                                        location.reload();
                                    }
                                };
                                xhttp.open("POST", "confirmarAcao.php", true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                if(entregador!==null){
                                    xhttp.send("pedido_id=" + pedido_id + "&entregador=" + entregador);
                                    console.log(entregador);
                                } else {
                                    xhttp.send("pedido_id=" + pedido_id);
                                }
                            }

                            function cancelarAcao(pedido_id) {
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function () {
                                    if (this.readyState == 4 && this.status == 200) {
                                        alert(this.responseText);
                                        // Recarregar a página após a confirmação (opcional)
                                        location.reload();
                                    }
                                };
                                xhttp.open("POST", "cancelarAcao.php", true);
                                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                xhttp.send("pedido_id=" + pedido_id);
                            }
                        </script>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="11">Não há pedidos</td>
            </tr>
            <?php
        }
        ?>
    </table>
</table>
</div>
<br>
<div class="tableprodPedFunc">
    <div class="infprod">
        HISTÓRICO DE PEDIDOS
    </div>
<table>
    <table border="1" style="color: white;">
        <tr>
            <th>Data</th>
            <!-- <th width="50px">ID</th> -->
            <th>Endereço</th>
            <th>Cliente</th>
            <th>Telefone</th>
            <th>Tipo Pagamento</th>
            <th width="120px">Status</th>
            <th>Itens</th>
            <th>Entregador</th>
            <th>Total</th>
        </tr>
        <?php
        if ($result2->num_rows > 0) {
            while ($row = $result2->fetch_assoc()) {
                $pedido_id = $row['id'];
                ?>
                <tr>
                    <td><?php echo date('d/m/Y H:i', strtotime($row['data_pedido'])); ?></td>
                    <td><?php echo $row['endereco']; ?></td>
                    <td><?php echo $row['nome_cliente']; ?> <?php echo $row['sobrenome_cliente']; ?></td>
                    <td><?php echo $row['telefone']; ?></td>
                    <!-- <td># <?php echo $pedido_id; ?></td> -->
                    <td><?php echo $row['metodo_pagamento']; ?></td>
                    <td><?php
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
    <a href="index.php">Voltar para a Loja</a>
</body>

</html>

<?php
include("rodape.php");
?>