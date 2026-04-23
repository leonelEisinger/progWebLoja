<?php
include_once "fachada.php";
include_once("layout_header.php");

?>

<!DOCTYPE HTML>

<html lang=pt-br>

<head>
	<meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">


	<title>Lista de veiculos</title>
</head>

<body>

	<h1>Lista de veiculos</h1>

	<div class="container">
            <h1>AJAX COM PHP sem JQuery</h1>
            <div class="row">
                <div class="col-lg-4">
                    <div class="input-group">
                            <input type="text" class="form-control mx-2" id="palavra" name="palavra" placeholder="Buscar por...">
                            <span class="input-group-btn">
                                <button class="btn btn-info" id="buscar" type="button">Buscar</button>
								<a class="btn btn-warning" href="editaProduto.php">Novo</a>
                            </span>
                    </div>
                </div>
            </div>
            <div id="dados">Aqui será inserindo o resultado da consulta...</div>
        </div>
        
        <script>
            function buscar(palavra)
            {
                var dados = document.getElementById('dados');

                const parametros = {
                    "palavra": palavra,
                }

                const config = {
                     method: "POST",
                     headers: {"Content-type": "application/json; charset=UTF-8"},
                     body: JSON.stringify(parametros)
                }
                
                const retorno = fetch('busca_ajax.php', config)
                    .then(resposta => resposta.text())
                    .then(tabela => {dados.innerHTML = tabela;});    
                
            }
            
            const botaoBuscar = document.getElementById('buscar');
            
            botaoBuscar.addEventListener("click", function(event) { 
                var palavra =  document.getElementById('palavra');
                buscar(palavra.value);
            });

            const inputPalavra = document.getElementById('palavra');
            
            inputPalavra.addEventListener("input", function(event) { 
                buscar(event.target.value);
            });

        </script>

<?php

$dao = $factory->getProdutoDao();
$produtos = $dao->buscaTodos();

?>
<section>
<h1>Informações do banco de dados:</h1>
Driver : <?=$dao->getDriver()?><br>
Versão do servidor  : <?=$dao->getServerVersion()?><br>
Versão da lib  : <?=$dao->getClientVersion()?><br>
</section>

<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>