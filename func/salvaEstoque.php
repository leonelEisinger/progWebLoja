<?php

include_once("../includes/fachadaFunc.php");

$id = @$_POST["id"];
$produtoid = @$_POST["produtoid"];
$qtd = @$_POST["qtd"];
$preco = @$_POST["preco"];

$dao = $factory->getEstoqueDao();
if (!empty($id)) {
    $estoque = $dao->buscaPorId($id);
}
if($estoque===null) {
    $estoque = new Estoque($id, $produtoid, $qtd, $preco);
    $idInserido = $dao->insere($estoque);
    // se precisar o id novo...
} else {
    $estoque->setQtd($qtd);
    $estoque->setPreco($preco);
    $dao->altera($estoque);
}


header("Location: ../estoque.php");

?>
