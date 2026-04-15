<?php

include_once "fachada.php";

$id = @$_POST["id"];
$nome = @$_POST["nome"];
$senha = @$_POST["senha"];
$login = @$_POST["login"];
$telefone = @$_POST["telefone"];
$email = @$_POST["email"];
$cartaoCredito = @$_POST["cartaoCredito"];

$dao = $factory->getUsuarioDao();
$usuario = $dao->buscaPorId($id);
if($usuario===null) {
    $usuario = new Usuario($id, $login, $senha, $nome, $telefone, $email, $cartaoCredito);
    $idInserido = $dao->insere($usuario);
    // se precisar o id novo...
} else {
    $usuario->setNome($nome);
    $usuario->setSenha($senha);
    $usuario->setLogin($login);
    $usuario->setTelefone($telefone);
    $usuario->setEmail($email);
    $usuario->setCartaoCredito($email);
    $dao->altera($usuario);
}


header("Location: usuarios.php");

?>
