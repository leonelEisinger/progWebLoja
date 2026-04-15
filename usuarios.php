<?php
include_once "fachada.php";
include_once("layout_header.php");


?>

<!DOCTYPE HTML>

<html lang=pt-br>

<head>
	<meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

	<title>Lista de usuários</title>
</head>

<body>

<h1>Lista de usuários</h1>

<?php

echo "<section>";

// procura usuários

$dao = $factory->getUsuarioDao();
$usuarios = $dao->buscaTodos();


// mostra os usuários, se tiver
if($usuarios) {
	echo "<table class='table table-hover table-borderless align-middle'>";
	echo "<thead>";
	echo "<tr>";
		echo "<th>Id</th>";
		echo "<th>Login</th>";
		echo "<th>Nome</th>";
		echo "<th>Excluir</th>";
	echo "</tr>";
	echo "</thead>";

	//while ($row = $usuarios->fetch(PDO::FETCH_ASSOC)){
	//	extract($row);

	foreach ($usuarios as $umUsuario) {
		echo "<tr>";
			echo "<td>";
			// link para editar um usuário
	   		echo "<a class='btn btn-success' href='editaUsuario.php?id={$umUsuario->getId()}'>{$umUsuario->getId()}</a>";
	   		echo "</td>";
			echo "<td>{$umUsuario->getLogin()}</td>";
			echo "<td>{$umUsuario->getNome()}</td>";
			echo "<td>{$umUsuario->getTelefone()}</td>";
			echo "<td>{$umUsuario->getEmail()}</td>";
			echo "<td>{$umUsuario->getCartaoCredito()}</td>";
			echo "<td>";
 			// link para excluir um usuário
			echo "<a class='btn btn-danger' href='excluiUsuario.php?id={$umUsuario->getId()}' onclick=\"return confirm('Quer mesmo excluir?');\">X</a>";
			echo "</td>";
 
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "<p>Não foram encontrados registros";
}
 
echo "</section>";


?>
<a class="btn btn-warning" href="editaUsuario.php">Novo</a>
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