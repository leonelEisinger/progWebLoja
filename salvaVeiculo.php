<?php

include_once "fachada.php";

$id = @$_POST["id"];
$nome = @$_POST["nome"];
$placa = @$_POST["placa"];
$cor = @$_POST["cor"];
$marca = @$_POST["marca"];

$dao = $factory->getVeiculoDao();
$veiculo = $dao->buscaPorId($id);
if($veiculo===null) {
    $veiculo = new Veiculo($id, $nome, $placa, $cor, $marca);
    $idInserido = $dao->insere($veiculo);
    // se precisar o id novo...
} else {
    $veiculo->setNome($nome);
    $veiculo->setplaca($placa);
    $veiculo->setCor($cor);
    $veiculo->setMarca($marca);
    $dao->altera($veiculo);
}


header("Location: veiculos.php");

?>
