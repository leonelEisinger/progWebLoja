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

<?php

echo "<section>";

// procura veiculos

$dao = $factory->getVeiculoDao();
$veiculos = $dao->buscaTodos();


// mostra os usuários, se tiver
if($veiculos) {
 
	echo "<table class='table table-hover table-borderless align-middle'>";
	echo "<thead'>";
	echo "<tr>";
		echo "<th>Id</th>";
		echo "<th>Nome</th>";
		echo "<th>Placa</th>";
		echo "<th>Cor</th>";
		echo "<th>Marca</th>";
	echo "</tr>";
	echo "</thead'>";

	foreach ($veiculos as $umVeiculos) {
	
		echo "<tr>";
			echo "<td>";
			// link para editar um usuário
	   		echo "<a class='btn btn-success' href='editaVeiculo.php?id={$umVeiculos->getId()}'>{$umVeiculos->getId()}</a>";
	   		echo "</td>";
			   echo "<td>{$umVeiculos->getNome()}</td>";
			echo "<td>{$umVeiculos->getPlaca()}</td>";
			echo "<td>{$umVeiculos->getCor()}</td>";
			echo "<td>{$dao->buscaPorMarca($umVeiculos->getMarca())}</td>";
			echo "<td>";
 			// link para excluir um usuário
			echo "<a class='btn btn-danger' href='excluiVeiculo.php?id={$umVeiculos->getId()}' onclick=\"return confirm('Quer mesmo excluir?');\">X</a>";
			echo "</td>";
 
		echo "</tr>";
		
	}
	echo "</table>";
} else {
	echo "<p>Não foram encontrados registros";
}
 
echo "</section>";


?>
<a class="btn btn-warning" href="editaVeiculo.php">Novo</a>
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