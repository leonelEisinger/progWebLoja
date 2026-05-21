<?php

include_once("../includes/fachadaFunc.php");

$id = @$_GET["id"];

$dao = $factory->getFornecedorDao();

$usuario = new Fornecedor($id, null, null, null, null);

$dao->remove($fornecedor);

header("Location: ../fornecedores.php");

?>
