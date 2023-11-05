<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Pizzaria</title>
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
                <a class="navbar-brand text-white btn-floating mb-0 h1" style="font-size:15px" href="#">FAZER PEDIDO</a>
            <?php } else { ?>
                <a class="navbar-brand text-white btn-floating mb-0 h1" style="font-size:15px" href="listaProduto.php">LISTA
                    PRODUTOS</a>
                <?php
            }
            ?>

            <a class="navbar-brand text-white mb-0 h1" style="font-size:15px" href="listaCategoria.php">CARDÁPIO</a>

            <?php
            if (!funcionarioEstaLogado()) {
                ?>
                <a class="navbar-brand text-white mb-0 h1" style="font-size:15px" href="listarPedidos.php">ACOMPANHAR PEDIDO</a>
            <?php } else { ?>
                <a class="navbar-brand text-white mb-0 h1" style="font-size:15px" href="#">ACOMPANHAR ENTREGA</a>
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

            } else {
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

        .tableform {
            background: rgba(0, 0, 0, 0.3);
            padding: 20px;
            border-radius: 60px 60px 60px 60px;
        }

        .media-scroller {
            --_spacer: var(--size-3);
            display: grid;
            gap: var(--_spacer);
            grid-auto-flow: column;
            grid-auto-columns: 21%;

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
            color: white;
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
        }

        table {
            text-align: left;
        }
    </style>


    <div class="container">
        <div class="principal">
            <!-- fim cabecalho.php -->