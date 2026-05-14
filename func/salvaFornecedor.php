<?php

include_once("../fachadaFunc.php");

$id = @$_POST["id"];
$nome = @$_POST["nome"];
$descricao = @$_POST["descricao"];
$telefone = @$_POST["telefone"];
$email = @$_POST["email"];

$dao = $factory->getfornecedorDao();
if (!empty($id)) {
    $fornecedor = $dao->buscaPorId($id);
}
if($fornecedor===null) {
    $fornecedor = new Fornecedor($id, $nome, $descricao, $telefone, $email);
    $idInserido = $dao->insere($fornecedor);
    // se precisar o id novo...
} else {
    $fornecedor->setNome($nome);
    $fornecedor->setDescricao($descricao);
    $fornecedor->setTelefone($telefone);
    $fornecedor->setEmail($email);
    $dao->altera($fornecedor);
}


header("Location: ../fornecedores.php");

?>
