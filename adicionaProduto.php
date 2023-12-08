<?php
include("navBar.php");
include("conexao.php");
include("bancoProduto.php");

verificaFuncionario();

$nome = $_POST["nome"];
$valor = $_POST["valor"];
$ingrediente = $_POST["ingrediente"];
$categoriaid = $_POST["categoriaid"];

// arquivo upado
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["imagem"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// checar se o arquivo é uma imagem
$check = getimagesize($_FILES["imagem"]["tmp_name"]);
if ($check === false) {
    echo "File is not an image.";
    $uploadOk = 0;
}

// checar tamanho do arquivo
if ($_FILES["imagem"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// permitir apenas alguns formatos de arquivo
$allowedExtensions = ["jpg", "jpeg", "png", "gif", "jfif"];
if (!in_array($imageFileType, $allowedExtensions)) {
    echo "Desculpe, only JPG, JPEG, PNG, e GIF arquivos são permitidos.";
    $uploadOk = 0;
}

// verifica se o $upload ta definido com 0 por um erro
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    // Tente fazer o upload do arquivo
    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $targetFile)) {
        // Arquivo carregado com sucesso, salve o caminho da imagem no banco de dados
        $imagemPath = $targetFile;
        
        // Checar disponibilidade
        if (array_key_exists('disponibilidade', $_POST)) {
            $disponibilidade = "true";
        } else {
            $disponibilidade = "false";
        }

        // Insira o produto no banco de dados
        if (insereProduto($conexao, $nome, $valor, $ingrediente, $imagemPath, $disponibilidade, $categoriaid)) {
            ?>
            <p class="text-success">
                Produto <?= $nome ?>, <?= $valor ?> reais, adicionado com sucesso!
            </p>
            <?php
        } else {
            $msg = mysqli_error($conexao);
            ?>
            <p class="text-danger">
                Produto <?= $nome ?> não foi adicionado! <br>
                <?= $msg ?>
            </p>
            <?php
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Exibir links para criar um novo produto ou visualizar a lista de produtos
?>
<div align="center">
    <a href="produtoFormulario.php"><button class="btn btn-primary">Criar Novo</button></a>
    <a href="index.php"><button class="btn btn-primary">Ver Lista</button></a>
</div>

<?php include("rodape.php") ?>
