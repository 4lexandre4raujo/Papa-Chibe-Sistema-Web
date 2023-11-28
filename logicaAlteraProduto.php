<?php
include("navBar.php");
include("conexao.php");
include("bancoProduto.php");

$cdproduto = $_POST["cdproduto"];
$nome = $_POST["nome"];
$valor = $_POST["valor"];
$ingrediente = $_POST["ingrediente"];
$categoriaid = $_POST["categoriaid"];

// Check disponibilidade
if (array_key_exists('disponibilidade', $_POST)) {
    $disponibilidade = "true";
} else {
    $disponibilidade = "false";
}

// File Upload
$targetDir = "uploads/";
$targetFile = $targetDir . basename($_FILES["imagem"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if the file is an image
$check = getimagesize($_FILES["imagem"]["tmp_name"]);
if ($check === false) {
    echo "File is not an image.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["imagem"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow only certain file formats
$allowedExtensions = ["jpg", "jpeg", "png", "gif", "jfif"];
if (!in_array($imageFileType, $allowedExtensions)) {
    echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    // Try to upload the file
    if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $targetFile)) {
        // File uploaded successfully, save the image path in the database
        $imagemPath = $targetFile;

        // Update the product in the database with the new image path
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
        echo "Sorry, there was an error uploading your file.";
    }
}

// Display links to go back to the product list
?>
<div align="center">
    <a href="index.php"><button class="btn btn-primary">Ver Lista</button></a>
</div>

<?php include("rodape.php") ?>
