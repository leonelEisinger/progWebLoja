<?php

include_once("../fachadaFunc.php");

$id = @$_POST["id"];
$nome = @$_POST["nome"];
$descricao = @$_POST["descricao"];
$fornecedorId = @$_POST["fornecedorId"];
$qtd = $_POST["qtd"] = 0;
$preco = $_POST["preco"] = 0;

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

$produtoDao = $factory->getProdutoDao();
$estoqueDao = $factory->getEstoqueDao();

if (!empty($id)) {
    $produto = $produtoDao->buscaPorId($id);
    $estoque = $estoqueDao->buscaPorId($id);

    if ($produto != null) {
        $produto->setNome($nome);
        $produto->setDescricao($descricao);
        $produto->setFornecedorId($fornecedorId);

        if ($foto != null) {
            $produto->setFoto($foto);
        }

        if($estoque != null){
            $estoque->setProdutoid($id);
            $estoque->setQtd($qtd);
            $estoque->setPreco($preco);
        }

        $produtoDao->altera($produto);
        $estoqueDao->altera($estoque);

    }

} else {
    $produto = new Produto(null, $nome, $descricao, $foto, $fornecedorId);

    $produtoId = $produtoDao->insere($produto);

    $estoqueDao = $factory->getEstoqueDao();

    $estoque = new Estoque(null, $produtoId, $qtd, $preco);

    $estoqueDao->insere($estoque);
}

header("Location: index.php");
?>