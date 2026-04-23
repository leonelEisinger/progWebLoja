<?php

include_once "fachada.php";

$id = @$_POST["id"];
$nome = @$_POST["nome"];
$descricao = @$_POST["descricao"];
$foto = @$_POST["foto"];

$dao = $factory->getProdutoDao();
$produto = $dao->buscaPorId($id);
if($produto===null) {
    $produto = new Produto($id, $nome, $descricao, $foto);
    $idInserido = $dao->insere($produto);
    // se precisar o id novo...
} else {
    $produto->setNome($nome);
    $produto->setDescricao($descricao);
    $produto->setFoto($foto);
    $dao->altera($produto);
}


header("Location: produtos.php");

?>
