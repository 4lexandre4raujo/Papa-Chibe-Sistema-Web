<?php
include("navBar.php");
include("conexao.php");

$sql = "SELECT * FROM tb_pedido where usuario = ".clienteCd();;
$result = $conexao->query($sql);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Listar Pedidos</title>
</head>

<body>
<div class="grid-container">
    <div class="tableprodPed">
        <div class="infprod">
        NA FILA
        </div>
        <table border="1" style="color: white;">
            <tr>
                <th width="50px">ID</th>
                <!-- <th>Endereço</th>
                <th>Telefone</th>
                <th>Total</th>
                <th>Data do Pedido</th> -->
                <th>Itens do Pedido</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $pedido_id = $row['id'];
                    ?>
                    <tr>
                        <td><?php echo $pedido_id; ?></td>
                        <!-- <td><?php echo $row['endereco']; ?></td>
                        <td><?php echo $row['telefone']; ?></td>
                        <td><?php echo $row['total']; ?></td>
                        <td><?php echo $row['data_pedido']; ?></td> -->
                        <td>
                            <?php
                            $sql_itens = "SELECT * FROM tb_item_pedido WHERE pedido_id = $pedido_id";
                            $result_itens = $conexao->query($sql_itens);

                            if ($result_itens->num_rows > 0) {
                                echo "<ul>";
                                while ($item = $result_itens->fetch_assoc()) {
                                    echo "<li>{$item['nome_produto']} - Quantidade: {$item['quantidade']} - Subtotal: {$item['subtotal']}</li>";
                                }
                                echo "</ul>";
                            } else {
                                echo "Não há itens para este pedido";
                            }
                            ?>
                        </td>
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
    </div>
    <div class="tableprodPed">
    <div class="infprod">
        PREPARANDO
        </div>
        <P>Nada ainda</P>
    </div>
    <div class="tableprodPed">
    <div class="infprod">
        SAIU PARA ENTREGA
        </div>
    <P>Nada ainda</P>
    </div>
</div>
<br>
<br>
<table>
  <div class="infprod">
    ENTREGUES
  </div>
  <div class="tableprod">
    <div class="media-scroller snaps-inline">
      <div class="media-element">

      </div>
    </div>
  </div>
</table>
<table>

    <h2 style="color: white;">Lista de Pedidos</h2>
    <table border="1" style="color: white;">
        <tr>
            <th>ID do Pedido</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Total</th>
            <th>Data do Pedido</th>
            <th>Itens do Pedido</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pedido_id = $row['id'];
                ?>
                <tr>
                    <td><?php echo $pedido_id; ?></td>
                    <td><?php echo $row['endereco']; ?></td>
                    <td><?php echo $row['telefone']; ?></td>
                    <td><?php echo $row['total']; ?></td>
                    <td><?php echo $row['data_pedido']; ?></td>
                    <td>
                        <?php
                        $sql_itens = "SELECT * FROM tb_item_pedido WHERE pedido_id = $pedido_id";
                        $result_itens = $conexao->query($sql_itens);

                        if ($result_itens->num_rows > 0) {
                            echo "<ul>";
                            while ($item = $result_itens->fetch_assoc()) {
                                echo "<li>{$item['nome_produto']} - Quantidade: {$item['quantidade']} - Subtotal: {$item['subtotal']}</li>";
                            }
                            echo "</ul>";
                        } else {
                            echo "Não há itens para este pedido";
                        }
                        ?>
                    </td>
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
    <br>
    <a href="index.php">Voltar para a Loja</a>
</body>

</html>

<?php
include("rodape.php");
?>