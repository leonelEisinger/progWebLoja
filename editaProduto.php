<?php
include_once "fachada.php";

$id = @$_GET["id"];

$dao = $factory->getProdutoDao();
$produto = $dao->buscaPorId($id);
$foto = @$_POST["foto"];

$produtos = $dao->buscaTodos();
if($produto==null) {
    $produto = new Produto(null, null, null, null);
    }
    ?>

<html>
    
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
		<title>Cadastro de produtos</title>
	</head>
	<body>


        
        <a class="btn btn-outline-danger m-2" href="produtos.php">Voltar</a>
		<h1 class="mx-auto w-25 text-align-center">Cadastro de produtos</h1>

        <form class="mx-auto w-25 text-align-center border px-2" enctype="multipart/form-data" action="salvaproduto.php" method=post>
            <div class="mb-3">
                <label class="form-label" for="id">Id:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$produto->getId()?>" name="id"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$produto->getNome()?>" name="nome"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="descricao">Descricao:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$produto->getDescricao()?>" name="descricao"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="foto">Foto:</label>
                
                <input class="form-control border border-dark" type="file" name="foto" value="<?=$produto->getFoto()?>"/>
                <br>
            </div>
            <div class="mb-3 w-25 mx-auto">
                <input class="btn border border-dark" type= "submit" value="Salvar"/>
            </div>
        </form>
        <br>
		  
    </body>
</html>