<?php

include_once "fachada.php";

$id = @$_POST["id"];
$nome = @$_POST["nome"];
$descricao = @$_POST["descricao"];
$fornecedorId = @$_POST["fornecedorId"];
$produtoId = $dao->insere($produto);

$estoqueDao = $factory->getEstoqueDao();

$qtd = $_POST["qtd"];
$preco = $_POST["preco"];

$estoqueDao->insere($produtoId, $qtd, $preco);

$foto = null;

// upload da imagem
if (isset($_FILES["foto"]) && $_FILES["foto"]["name"] != "") {

    $pasta = "uploads/";

    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    $nomeArquivo = uniqid() . "_" . $_FILES["foto"]["name"];

    move_uploaded_file(
        $_FILES["foto"]["tmp_name"],
        $pasta . $nomeArquivo
    );

    $foto = $nomeArquivo;
}

$dao = $factory->getProdutoDao();
if (!empty($id)) {
    $produto = $dao->buscaPorId($id);
}
if($produto===null) {
    $produto = new Produto($id, $nome, $descricao, $foto, $fornecedorId, $qtd, $preco);
    $dao->insere($produto);
} else {
    $produto->setNome($nome);
    $produto->setDescricao($descricao);
    $produto->setFornecedorId($fornecedorId);

    if ($foto != null) {
        $produto->setFoto($foto);
    }

    $dao->altera($produto);
}

header("Location: index.php");

?>
