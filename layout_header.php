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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Vizualizador</title>
</head>
<body>

    <header>
        <nav class="bg-dark position-relative py-4">
            <?php
                if(isset($_SESSION["nome_usuario"])) {
                    // Menu de navegação : só mostra se logado
                    echo "<a class=\"btn btn-primary mx-1\" href=\"usuarios.php\">Usuarios</a>";
                    echo "<a class=\"btn btn-primary mx-1\" href=\"veiculos.php\">Veiculos</a>";
                    echo "<a class=\"btn btn-primary mx-1\" href=\"marcas.php\">Marcas</a>";
                }
            ?>
			<div class="position-absolute top-0 end-0" id="login_info">
                <?php	
                include_once("comum.php");
                
                if ( is_session_started() === FALSE ) {
                    session_start();
                }	
                
                if(isset($_SESSION["nome_usuario"])) {
                    // Informações de login
                    echo "<span class='w-100 text-white'>Você está logado como <strong class='text-info'>" . $_SESSION["nome_usuario"];		
                    echo "</strong><a class='btn btn-danger my-4 mx-2' href='executa_logout.php'> Logout </a></span>";
                } else {
                    echo "<span><a class='btn btn-primary m-1' href='login.php'> Efetuar Login </a></span>";
                }
		        ?>	
            </div>
        </nav>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>