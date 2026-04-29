<?php
include_once("fachada.php");
include_once("layout_header.php");

?>

<!DOCTYPE HTML>

<html lang=pt-br>

<head>
	<meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">


	<title>WebLoja Produtos</title>
</head>

<body>
    
    <div class="container">
        <a class='btn mx-1 my-2 btn-lg' id='btn-novoProduto' href='editaProduto.php'><strong>Adicionar produto</strong></a>
        <h2>Meus produtos:</h2>
        <div id="dados" class="row mt-4"></div>
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
            
        buscar(palavra.value);

    </script>

<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>