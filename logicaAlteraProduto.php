<?php
include("navBar.php");
include("conexao.php");
include("bancoProduto.php");

$cdproduto = $_POST["cdproduto"];
$nome = $_POST["nome"];
$valor = $_POST["valor"];
$ingrediente = $_POST["ingrediente"];
$categoriaid = $_POST["categoriaid"];

// checar a disponibilidade
if (array_key_exists('disponibilidade', $_POST)) {
    $disponibilidade = "true";
} else {
    $disponibilidade = "false";
}

// upload de arquivo
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["imagem"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// verifica se o arquivo é de imagem
$check = getimagesize($_FILES["imagem"]["tmp_name"]);
if ($check === false) {
    echo "Este arquivo não é uma imagem.";
    $uploadOk = 0;
}

// checando o tamanho do arquivo
if ($_FILES["imagem"]["size"] > 5000000) {
    echo "Desculpe, seu arquivo é muito grande.";
    $uploadOk = 0;
}

// pemitir apenas os formatos jpg, jpeg, png e gifs
$allowedExtensions = ["jpg", "jpeg", "png", "gif", "jfif"];
if (!in_array($imageFileType, $allowedExtensions)) {
    echo "Desculpe, apenas JPG, JPEG, PNG, e arquivos GIF são permitidos.";
    $uploadOk = 0;
}

// verifica se o $upload ta definido com 0 por um erro
if ($uploadOk == 0) {
    echo "Desculpe, seu arquivo não foi enviado.";
} else {
    // Tente fazer o upload do arquivo
    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $targetFile)) {
        // Arquivo carregado com sucesso, salve o caminho da imagem no banco de dados
        $imagemPath = $targetFile;

        // Atualize o produto no banco de dados com o novo caminho da imagem
        if (alteraProduto($conexao, $cdproduto, $nome, $valor, $ingrediente, $imagemPath, $disponibilidade, $categoriaid)) {
            ?>
            <p class="text-success">
                Produto <?= $nome ?>, <?= $valor ?> reais, alterado com sucesso!
            </p>
            <?php
        } else {
            $msg = mysqli_error($conexao);
            ?>
            <p class="text-danger">
                Produto <?= $nome ?> não foi alterado! <br>
                <?= $msg ?>
            </p>
            <?php
        }
    } else {
        echo "Desculpe, ocorreu um erro ao enviar seu arquivo.";
    }
}

// Exibir links para voltar à lista de produtos
?>
<div align="center">
    <a href="index.php"><button class="btn btn-primary">Ver Lista</button></a>
</div>

<?php include("rodape.php") ?>
