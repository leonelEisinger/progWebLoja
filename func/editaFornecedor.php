<?php
include_once("../fachadaFunc.php");

$id = @$_GET["id"];

$dao = $factory->getFornecedorDao();
$fornecedor = $dao->buscaPorId($id);
if($fornecedor==null) {
    $fornecedor = new Fornecedor(null, null, null, null, null);
}
?>

<html>

	<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
		<title>Cadastro de fornecedores</title>
	</head>
	<body>
	
        <a class="btn btn-outline-danger m-2" href="../fornecedores.php">Voltar</a>
		<h1 class="mx-auto w-25 text-align-center">Cadastro de fornecedores</h1>

        <form class="mx-auto w-25 text-align-center border px-2" action="salvaFornecedor.php" method=post>
            <div class="mb-3">
                <input class="form-control border border-dark" type= "hidden" value="<?=$fornecedor->getId()?>" name="id"/>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$fornecedor->getNome()?>" name="nome"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="descricao">Descrição:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$fornecedor->getDescricao()?>" name="descricao"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="telefone">Telefone:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$fornecedor->getTelefone()?>" name="telefone"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Email:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$fornecedor->getEmail()?>" name="email"/>
                <br>
            </div>
            
            <div class="mb-3 w-25 mx-auto">
                <input class="btn border border-dark" type="submit" value="Salvar"/>
            </div>
        </form>
        <br>
		  
    </body>
</html>