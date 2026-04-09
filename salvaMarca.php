<?php

include_once "fachada.php";

$id = @$_POST["id"];
$nome = @$_POST["nome"];
$descricao = @$_POST["descricao"];

$dao = $factory->getMarcaDao();
$marca = $dao->buscaPorId($id);
if($marca===null) {
    $marca = new Marca($id, $nome, $descricao);
    $idInserido = $dao->insere($marca);
    // se precisar o id novo...
} else {
    $marca->setNome($nome);
    $marca->setDescricao($descricao);
    $dao->altera($marca);
}


header("Location: marcas.php");

?>
