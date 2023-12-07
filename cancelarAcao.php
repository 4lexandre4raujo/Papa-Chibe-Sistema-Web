<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pedido_id"])) {
    $pedido_id = $_POST["pedido_id"];

    $sql = "UPDATE tb_pedido SET status = 0 WHERE id = $pedido_id";
    if ($conexao->query($sql) === TRUE) {
        echo "Status do pedido atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o status do pedido: " . $conexao->error;
    }
} else {
    echo "Ação inválida.";
}
?>