<?php

include_once "fachada.php";

$id = @$_GET["id"];

$dao = $factory->getProdutoDao();

$veiculo = new Produto($id, null, null, null,);

$dao->remove($veiculo);

header("Location: produtos.php");

?>
