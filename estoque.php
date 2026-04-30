<?php
include_once("fachada.php");
include_once("layout_header_clean.php");

if ( is_session_started() === FALSE ) {
			session_start();
		}

?>


<!DOCTYPE HTML>

<html lang=pt-br>

<head>
	<meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

	<title>Estoque</title>
</head>

<body>

<?php 

	if($_SESSION["tipo"] !=2){
		echo "<div class='position-absolute start-50 top-50 translate-middle text-center'>";
		echo "<h1>Forbbiden Access! contact you system administrator</h1>";
		echo "<h3>Acceso prohibido! Ponte en contacto con el administrador del sistema.</h3>";
		echo "<h3>Acesso restrito! contate o administrador do seu sistema</h3>";
		echo "</div>";
		return false;
	}
?>


	<div class="container">
		<div class="input-group w-50">
			<input type="text" class="form-control" id="palavraEst" placeholder="Buscar...">
			<button class="btn" id="buscarU" style="background-color: #FF7F11;"><strong>Buscar</strong></button>
		</div>
        <h2>Estoque:</h2>
        <div id="dadosEst" class="row mt-4"></div>
    </div>

	

<script>
       
        function buscarU(palavraEst)
        {
            var dados = document.getElementById('dadosEst');

            const parametros = {
                "palavraEst": palavraEst,
            }

            const config = {
                    method: "POST",
                    headers: {"Content-type": "application/json; charset=UTF-8"},
                    body: JSON.stringify(parametros)
            }
            
            const retorno = fetch('busca_ajaxE.php', config)
                .then(resposta => resposta.text())
                .then(tabela => {dados.innerHTML = tabela;});    
            
        }
        
        const botaoBuscar = document.getElementById('buscarU');
        
        botaoBuscar.addEventListener("click", function(event) { 
            var palavraEst =  document.getElementById('palavraEst');
            buscarU(palavraEst.value);
        });

        const inputPalavra = document.getElementById('palavraEst');
        
        inputPalavra.addEventListener("input", function(event) { 
            buscarU(event.target.value);
        });
            
        buscarU(palavraEst.value);

    </script>


<?php
	echo "<section>";
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>