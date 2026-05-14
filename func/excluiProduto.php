<?php

include_once("../fachadaFunc.php");

$id = @$_GET["id"];

$dao = $factory->getProdutoDao();

$produto = new Produto($id, null, null, null, null);

$dao->remove($produto);

header("Location: index.php");

?>
