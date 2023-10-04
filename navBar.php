<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- <link rel="stylesheet" type="text/css" href="css/loja.css"> -->
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

	<title>Pizzaria</title>
</head>
<body>

		<!-- Barra de navegação -->
		<!-- As a link -->
<nav class="navbar navbar-light" style="background-color: #FFB800;">
<a class="navbar-brand" href="index.php">
    <img src="img/navBarLogo.png" width="160" class="d-inline-block align-top" alt="">
    <a class="navbar-brand text-white btn-floating mb-0 h1" href="#">FAZER PEDIDO</a>
    <a class="navbar-brand text-white mb-0 h1" href="#">CARDÁPIO</a>
    <a class="navbar-brand text-white mb-0 h1" href="#">ACOMPANHAR PEDIDO</a>
    <a class="navbar-brand text-white mb-0 h1" href="#">MEU PERFIL</a>
    <div class="btn btn-outline-dark btn-floating m-1">
        <img src="img/iconPerfil.png" width="40" class="d-inline-block align-center" alt="">
        <br>
        <a class="navbar-brand text-white align-center mb-0 h1" href="loginFuncionarioFormulario.php">FAZER LOGIN</a>
    </div>
    <div class="carrinho">
        <img src="img/iconCarrinho.png" width="40" class="d-inline-block align-center" alt="">
        <br>
        <a class="navbar-brand text-white mb-0 h1" href="#">CARRINHO</a>
    </div>
</a>
</nav>
	<!-- Fim da Barra de navegação -->


	<style type="text/css">
        .mb-4{
        font-family: 'Lato', sans-serif;
        color:white;
        font-size: 13px;
        margin: 0px;
        }
        
        body{
            background-image: url('img/background.png');
        }

        .infprod{
            background: #FFB800;
            text-align: left;
            padding-left: 10px;
            color: white;
        }

        .tableprod{
            background: rgba(0, 0, 0, 0.3);
            padding: 20px;
            border: 4px solid #FFB800;
        }

        .tableform{
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

        .media-element > img {
        inline-size: 100%;
        height: 295px;
        object-fit: cover;
        }

        .snaps-inline {
        scroll-snap-type: inline mandatory;
        scroll-padding-inline: var(--_spacer, 1rem);
        }

        .snaps-inline > * {
        scroll-snap-align: start;
        }
        .linha-vertical{
            height: 500px;
            border-left: 4px solid;
            color: white;
            padding: 40px
        }

        .form-control{
            border-radius: 50px;
            border-color: #FFB800;
        }

        .btn-danger{
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