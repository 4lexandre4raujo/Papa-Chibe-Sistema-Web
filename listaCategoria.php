<?php 
include("navBar.php");
include("conexao.php");
include("bancoCategoria.php"); 

?>

<h2 style="color: white">CATEGORIA</h2>
<br>
<?php


$categorias = listaCategorias($conexao);


foreach($categorias as $categoria) {
?>
<table>
    <div class="tableprod" height="30">
        <p class="title" style="font-size: 30px; color: white;"><?=$categoria["nome"]?></p>
    </div>
</table>
<br>

<?php
}
?>


<?php include("rodape.php") ?> 