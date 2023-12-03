<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="icon" href="img/icone.png" type="image/png">
    <title>Pizzaria PapaChibé</title>
</head>

<body>

    <?php
    include("logicaAcessoUsuario.php");
    ?>
    <!-- Barra de navegação -->
    <!-- As a link -->
    <nav class="navbar navbar-light" style="background-color: #FFB800;">
        <a class="navbar-brand" href="index.php">
            <img src="img/navBarLogo.png" width="140" height="80" class="d-inline-block align-top" alt="">
            <?php
            if (!funcionarioEstaLogado()) {
                ?>
                <a class="navbar-brand text-white btn-floating mb-0 h1" style="font-size:15px" href="index.php">FAZER PEDIDO</a>
            <?php } else { ?>
                
                <?php
            }
            ?>

            <a class="navbar-brand text-white mb-0 h1" style="font-size:15px" href="listaCategoria.php">CARDÁPIO</a>

            <?php
            if (!funcionarioEstaLogado()) {
                ?>
                <?php
                if (!clienteEstaLogado()) {
                 ?>
                    <a class="navbar-brand text-white mb-0 h1" style="font-size:15px" href="loginClienteFormulario.php">MEUS PEDIDOS</a>

                 <?php
                } else {
                    ?>
                    <a class="navbar-brand text-white mb-0 h1" style="font-size:15px" href="listarPedidos.php">MEUS PEDIDOS</a>
                <?php
                }
                ?>
            <?php } else { ?>
                <a class="navbar-brand text-white mb-0 h1" style="font-size:15px" href="listarPedidosGeral.php">ACOMPANHAR ENTREGA</a>
                <a class="navbar-brand text-white mb-0 h1" style="font-size:15px" href="produtoIndisponivel.php">PRODUTOS ARQUIVADOS</a>
                <?php
            }
            ?>

            <?php
            if (funcionarioEstaLogado()) {
                ?>
                <div class="btn btn-outline-dark btn-floating" style="background-color: black">
                    <a class="navbar-brand text-white align-center mb-0 h1" style="font-size:15px"
                        href="perfilUsuario.php">Olá, <u>
                            <?= funcionarioLogado() ?>.
                        </u></a>
                    <br>
                    <a class="navbar-brand text-white align-center mb-0 h1" style="font-size:15px">Não é
                        <?= funcionarioLogado() ?>?
                    </a>
                    <br>
                    <a class="navbar-brand text-white align-center mb-0 h1" style="font-size:15px"
                        href="logoutUsuario.php"><i><u>SAIR</u></i></a>
                </div>
            <?php
            }
            if (clienteEstaLogado()) {
                ?>
                <div class="btn btn-outline-dark btn-floating" style="background-color: black">
                    <a class="navbar-brand text-white align-center mb-0 h1" style="font-size:15px"
                        href="perfilUsuario.php">Olá, <u>
                            <?= clienteLogado() ?>.
                        </u></a>
                    <br>
                    <a class="navbar-brand text-white align-center mb-0 h1" style="font-size:15px">Não é
                        <?= clienteLogado() ?>?
                    </a>
                    <br>
                    <a class="navbar-brand text-white align-center mb-0 h1" style="font-size:15px"
                        href="logoutUsuario.php"><i><u>SAIR</u></i></a>
                </div>
                <?php

            } else if (!funcionarioEstaLogado()) {
                ?>
                <div class="btn btn-outline-dark btn-floating">
                    <img src="img/iconPerfil.png" width="30" class="d-inline-block align-center" alt="">
                    <br>
                    <a class="navbar-brand text-white align-center mb-0 h1" style="font-size:15px"
                        href="selecaoUsuario.php">FAZER LOGIN</a>
                </div>
                <?php
            }
            ?>

            <?php
            if (!funcionarioEstaLogado()) {
                ?>
                <div class="carrinho">
                    <img src="img/iconCarrinho.png" width="30" class="d-inline-block align-center" alt="">
                    <br>
                    <a class="navbar-brand text-white mb-0 h1" style="font-size:15px"
                        href="carrinhoFormulario.php">CARRINHO</a>
                </div>

            <?php } else { ?>
                <div class="carrinho">
                    <img src="img/iconAdiciona.png" width="30" class="d-inline-block align-center" alt="">
                    <br>
                    <a class="navbar-brand text-white mb-0 h1" style="font-size:15px"
                        href="produtoFormulario.php">ADICIONAR</a>
                </div>
                <?php
            }
            ?>

        </a>
    </nav>
    <!-- Fim da Barra de navegação -->


    <style type="text/css">
        .mb-4 {
            font-family: 'Lato', sans-serif;
            color: white;
            font-size: 13px;
            margin: 0px;
        }
        
        h1, h2, h3, h4, td, p, a{
            color: white;
        }
        th, tr {
            text-align: center;
        }

        body {
            background-image: url('img/background.png');
        }

        .infprod {
            background: #FFB800;
            text-align: left;
            padding-left: 10px;
            color: white;
            /* width: 268px; */
        }

        .tableprod {
            background: rgba(0, 0, 0, 0.3);
            padding: 20px;
            border: 4px solid #FFB800;
            /* width: 268px; */
        }
        .tableprodPed {
            background: rgba(0, 0, 0, 0.3);
            padding: 0px;
            border: 4px solid #FFB800;
            width: 320px;
        }

        .tableprodPedFunc {
            background: rgba(0, 0, 0, 0.3);
            padding: 0px;
            border: 4px solid #FFB800;
            width: 100%;
        }

        .tablelogin {
            display: block;
            margin: 0 auto;
            width: 70%;
        }
        
        @media only screen and (max-width: 990px) {

        	.wrapper .tablelogin {
        		width: 100%
        	}
        
        }
        
        .tableform {
            background: rgba(0, 0, 0, 0.3);
            padding: 20px;
            border-radius: 60px 60px 60px 60px;
        }

        /* .media-scroller {
            --_spacer: var(--size-3);
            display: grid;
            gap: var(--_spacer);
            grid-template-rows: repeat(4, 1fr); /* Crie 4 linhas de altura igual */
            /* max-height: 100vh; Defina a altura máxima como a altura da tela */
            /* overflow-y: auto; Adicione uma barra de rolagem vertical quando necessário */
            /* overscroll-behavior-inline: contain; */
        /* }  */

        .media-scroller {
            --_spacer: var(--size-3);
            display: grid;
            gap: var(--_spacer);
            grid-template-columns: repeat(3, 1fr);
            padding: 0 var(--_spacer) var(--_spacer);
            overflow-x: auto;
            overscroll-behavior-inline: contain;
        }


        .media-scroller--with-groups {
            grid-auto-columns: 80%;
        }

        .media-group {
            display: grid;
            gap: var(--_spacer);
            grid-auto-flow: column;
        }

        .media-element {
            display: grid;
            grid-template-rows: min-content;
            gap: var(--_spacer);
            padding: 15px;
            background: var(--surface-2);
            border-radius: var(--radius-2);
            box-shadow: var(--shadow-2);
            color:white;
        }

        .media-element>img {
            inline-size: 100%;
            height: 295px;
            object-fit: cover;
        }

        .snaps-inline {
            scroll-snap-type: inline mandatory;
            scroll-padding-inline: var(--_spacer, 1rem);
        }

        .snaps-inline>* {
            scroll-snap-align: start;
        }

        .linha-vertical {
            height: 500px;
            border-left: 4px solid;
            color: white;
            padding: 40px
        }

        .form-control {
            border-radius: 50px;
            border-color: #FFB800;
        }

        .btn-danger {
            background-color: #FFB800;
        }

        .principal {
            padding: 40px 15px;
            text-align: center;
            color: white;
        }

        table {
            text-align: left;
        }

        .flip-card {
        background-color: transparent;
        width: 100%;
        height: 300px;
        perspective: 1000px;
        }

        .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        }

        .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
        }

        .flip-card-front, .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        }

        .flip-card-front {
        background-color: #bbb;
        color: black;
        }

        .flip-card-back {
        background-color: #9C0000;
        color: white;
        transform: rotateY(180deg);
        }

        /* Designing all grid */
        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            grid-column-gap: 50px;
            grid-row-gap: 50px;
            padding: 5px;
        }
  
        /* Designing all grid-items */
        .grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid black;
            padding: 20px;
            font-size: 30px;
            text-align: center;
        }
    </style>


    <div class="container">
        <div class="principal">
            <!-- fim cabecalho.php -->