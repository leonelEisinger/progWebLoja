<?php

include_once("../includes/fachadaFunc.php");
include_once("../includes/comum.php");
include_once("../includes/renderProduto.php");
include_once("../includes/renderFornecedor.php");
include_once("../includes/renderEstoque.php");
include_once("../includes/renderUsuario.php");

if (!isset($_SESSION)) session_start();

$conteudo = file_get_contents('php://input');
$json = json_decode($conteudo, true);

$tipo = $json['tipo'] ?? '';
$palavra = mb_strtolower(trim($json['palavra'] ?? ''), 'UTF-8');

if (!isset($factory)) {
    die("Factory não inicializada");
}
switch ($tipo) {

    case 'produto':

        $dao = $factory->getProdutoDao();

        $lista = $palavra
            ? $dao->buscaPorNomeCom($palavra)
            : $dao->buscaTodos();

        foreach ($lista as $p) {
            renderProduto($p);
        }

        break;

    case 'fornecedor':

        $dao = $factory->getFornecedorDao();

        $lista = $palavra
            ? $dao->buscaPorNomeCom($palavra)
            : $dao->buscaTodos();

        foreach ($lista as $f) {
            renderFornecedor($f);
        }

        break;
    
    case 'estoque':

        $dao = $factory->getEstoqueDao();

        $lista = $palavra
            ? $dao->buscaPorNomeCom($palavra)
            : $dao->buscaTodos();

        foreach ($lista as $e) {
            renderEstoque($e);
        }

        break;
    
    case 'usuario':

        $dao = $factory->getUsuarioDao();

        $lista = $palavra
            ? $dao->buscaPorNomeCom($palavra)
            : $dao->buscaTodos();

        foreach ($lista as $u) {
            renderUsuario($u);
        }

        break;

    default:
        echo "<p>Tipo inválido</p>";
        break;
}

?>