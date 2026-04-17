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

<div class="input-group">
	<input type="text" class="form-control" id="palavra" name="palavra" placeholder="Buscar por...">
	<span class="input-group-btn">
		<button class="btn btn-default" id="buscar" type="button">Buscar</button>
	</span>
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

echo "<section>";

// procura veiculos

$dao = $factory->getProdutoDao();
$produtos = $dao->buscaTodos();


// mostra os usuários, se tiver
if($produtos) {
 
	echo "<table class='table table-hover table-borderless align-middle'>";
	echo "<thead'>";
	echo "<tr>";
		echo "<th>Id</th>";
		echo "<th>Nome</th>";
		echo "<th>Descrição</th>";
		echo "<th>Foto</th>";
	echo "</tr>";
	echo "</thead'>";

	foreach ($produtos as $umProdutos) {
	
		echo "<tr>";
			echo "<td>";
			// link para editar um usuário
	   		echo "<a class='btn btn-success' href='editaProduto.php?id={$umProdutos->getId()}'>{$umProdutos->getId()}</a>";
	   		echo "</td>";
			echo "<td>{$umProdutos->getNome()}</td>";
			echo "<td>{$umProdutos->getDescricao()}</td>";
			echo "<td>{$umProdutos->getFoto()}</td>";
			echo "<td>";
 			// link para excluir um usuário
			echo "<a class='btn btn-danger' href='excluiProduto.php?id={$umProdutos->getId()}' onclick=\"return confirm('Quer mesmo excluir?');\">X</a>";
			echo "</td>";
 
		echo "</tr>";
		
	}
	echo "</table>";
} else {
	echo "<p>Não foram encontrados registros";
}
 
echo "</section>";


?>
<a class="btn btn-warning" href="editaProduto.php">Novo</a>
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