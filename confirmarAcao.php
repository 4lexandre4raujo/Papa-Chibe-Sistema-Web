<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pedido_id"]) && isset($_POST["entregador"])) {
    $pedido_id = $_POST["pedido_id"];
    $entregador = strval($_POST["entregador"]);
    $sql = "UPDATE tb_pedido SET status = GREATEST(1, status + 1), entregador = '".$entregador."' WHERE id = $pedido_id";

    if ($conexao->query($sql) === TRUE) {
        echo "Status do pedido atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o status do pedido: " . $conexao->error;
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["pedido_id"]) && !isset($_POST["entregador"])) {
    $pedido_id = $_POST["pedido_id"];
    $sql2 = "UPDATE tb_pedido SET status = GREATEST(1, status + 1) WHERE id = $pedido_id";

    if ($conexao->query($sql2) === TRUE) {
        echo "Status do pedido atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o status do pedido: " . $conexao->error;
    }
}
?>