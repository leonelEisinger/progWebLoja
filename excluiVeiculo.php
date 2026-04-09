<?php

include_once "fachada.php";

$id = @$_GET["id"];

$dao = $factory->getVeiculoDao();

$veiculo = new Veiculo($id, null, null, null, null);

$dao->remove($veiculo);

header("Location: veiculos.php");

?>
