<?php

include_once("comum.php");


if ( is_session_started() === FALSE ) {
			session_start();
		}	

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/layout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Vizualizador</title>
</head>
<body>
    <header>
    <nav id="main-banner" class="py-3 shadow-sm">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="fw-bold fs-4">
                <a href="index.php" class="link-light link-underline link-underline-opacity-0">WebLoja</a>
            </div>


            <div class="d-flex align-items-center">

                <?php
                    if(isset($_SESSION["nome_usuario"])) {
                        echo "<a class='btn btn-outline-dark mx-1' id='btn-produto' href='index.php'><strong>Produtos</strong></a>";
                        echo "<a class='btn btn-outline-dark mx-1' id='btn-usuario' href='usuarios.php'><strong>Usuários</strong></a>";
                        echo "<a class='btn btn-outline-dark mx-1' id='btn-fornecedor' href='fornecedores.php' style='background-color: #FF7F11;'><strong>Fornecedores</strong></a>";
                        echo "<a class='btn btn-outline-dark mx-1' id='btn-estoque' href='estoque.php' style='background-color: #FF7F11;'><strong>Estoque</strong></a>";
                        }
                ?>

                <div class="ms-3">
                    <?php
                        if(isset($_SESSION["nome_usuario"])) {
                            echo "<span class='me-2'>Olá, <strong>" . $_SESSION["nome_usuario"] . "</strong></span>";
                            echo "<a class='btn btn-danger btn-sm' href='func/executa_logout.php'>Sair</a>";
                        } else {
                            echo "<a class='btn btn-dark' href='login.php'>Entrar</a>";
                        }
                    ?>
                </div>

            </div>

        </div>
    </nav>
</header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>