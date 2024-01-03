
<?php
include("navBar.php");
?>
    <h2 style="color: white;">Produtos no Carrinho</h2>
<div>
<div class="tableprodPed" style="width: 100%;">
        <div class="infprod">
            CARRINHO
        </div>
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
                        R$<?php echo $detalhes['preco']; ?>
                    </td>
                    <td>
                        <?php echo $detalhes['quantidade']; ?>
                    </td>

                    <td>
                        R$<?php echo $subtotal; ?>
                    </td>
                </tr>
            <?php
            }
            ?>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td>
                    R$<?php echo $total; ?>
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
    </div>
</div><br>

<script>
    function changeTroco() {
  var metodopagamento = document.getElementById('metodo_pagamento');
  var troco = document.getElementById('troco');
  var labeltroco = document.getElementById('labeltroco');
  var labelpix = document.getElementById('labelpix');
  if (metodopagamento.value == 'Dinheiro') {
    troco.style.display = 'inline-block';
    labeltroco.style.display = 'inline-block';
    labelpix.style.display = 'none';
  } else if (metodopagamento.value == 'Pix') {
    troco.style.display = 'none';
    labeltroco.style.display = 'none';
    labelpix.style.display = 'inline-block';
  }

  else {
    troco.style.display = 'none';
    labeltroco.style.display = 'none';
    labelpix.style.display = 'none';
  }
}
</script>

    <form action="finalizarPedido.php" method="post">
        <h2 style="color: white;">Informações de Entrega</h2>
        <label for="endereco" style="color: white;">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required><br><br>

        <label for="telefone" style="color: white;">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>
        <?php if(clienteEstaLogado()): ?>
            <form action="processarPagamento.php" method="post">
    <input type="hidden" name="pedido_id" value="<?php echo $pedido_id; ?>">
    <h2 style="color: white;" >Finalizar Pedido</h2>
    <label for="metodo_pagamento" style="color: white;">Escolha o método de pagamento:</label>
    <select id="metodo_pagamento" onchange="changeTroco()" name="metodo_pagamento" required>
        <option value="Cartão de Crédito">Cartão de Crédito</option>
        <option value="Pix">PIX</option>
        <option value="Dinheiro">Dinheiro</option>
    </select>
    <br><br>
    <!-- <label id="labelpix" style="color: white;display: none;">Chave PIX: 91982428090</label> -->
    <label id="labeltroco" for="troco" style="color: white;display: none;">Troco:</label>
        <input type="number" step="0.01" id="troco" style="display: none" name="troco" unrequired><br><br>
    <input type="submit" value="Finalizar Pedido">
</form>
        <?php endif; ?>
        <?php if(!clienteEstaLogado()): ?>
        <button><a href="loginClienteFormulario.php">Logar para efetuar pedido</a></button>
        <?php endif; ?>
    </form>

    <br>
    <a href="index.php">Voltar para a Loja</a>

<?php
include("rodape.php"); ?>
