<?php
include("navBar.php");
include("conexao.php");
include("bancoCategoria.php");

?>

<h2 style="color: white">CATEGORIA</h2>
<br>
<?php


$categorias = listaCategorias($conexao);


foreach ($categorias as $categoria) {
    ?>

    <table>
        <div class="tableprod" height="30">
            <!-- <form action="listaProdutoCategoria.php" method="post">
                <input class="title" style="font-size: 30px; color: white;" type="submit" value="<?= $categoria["nome"] ?>" name="add">
                    
            </form> -->
            <form action="listaProdutoCategoria.php" method="post">
                <input type="hidden" name="categoriaid" value="<?= $categoria["cdcategoria"] ?>">
                <p class="title" style="font-size: 30px; color: white;">
                    <button type="submit"><?= $categoria["nome"] ?></button>
                </p>
            </form>

        </div>
    </table>

    <br>

    <?php
}
?>


<?php include("rodape.php") ?>