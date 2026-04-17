<?php

include_once "fachada.php";

$id = @$_GET["id"];

$dao = $factory->getVeiculoDao();

$veiculo = new Produto($id, null, null, null, null);

$dao->remove($veiculo);

header("Location: produtos.php");

?>
