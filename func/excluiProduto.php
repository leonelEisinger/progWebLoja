<?php

include_once("../includes/fachadaFunc.php");

$id = @$_GET["id"];

$daoP = $factory->getProdutoDao();
$daoE = $factory->getEstoqueDao();

$produto = new Produto($id, null, null, null, null);
$estoque = new Estoque(null, $id, null, null);

$daoE->removePorProdutoId($estoque);
$daoP->remove($produto);

header("Location: ../index.php");

?>
