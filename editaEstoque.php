<?php
include_once "fachada.php";

$id = @$_GET["id"];

$dao = $factory->getEstoqueDao();
$estoque = $dao->buscaPorId($id);
if($estoque==null) {
    $estoque = new Estoque(null,null,null,null);
}
?>

<html>

	<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
		<title>Cadastro de usuário</title>
	</head>

    <body>
        <a class="btn btn-outline-danger m-2" href="estoque.php">Voltar</a>
		<h1 class="mx-auto w-25 text-align-center">Controle do produto: <span class="text-success"><?=$estoque->getProdutoNome()?></span></h1>

        <form class="mx-auto w-25 text-align-center border px-2" action="salvaEstoque.php" method=post>
            <div class="mb-3">
                <input type="hidden" value="<?=$estoque->getId()?>" name="id"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="qtd">Qtd comprada:</label>
                <input required class="form-control border border-dark" type= "text" value="<?=$estoque->getQtd()?>" name="qtd"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="preco">Preco por unidade:</label>
                <input required class="form-control border border-dark" type= "text" value="<?=$estoque->getPreco()?>" name="preco"/>
                <br>
            </div>
            <div class="mb-3 w-25 mx-auto">
                <input class="btn border border-dark" type= "submit" value="Salvar"/>
            </div>
        </form>
        <br>	  
    </body>
</html>