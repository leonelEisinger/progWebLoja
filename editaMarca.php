<?php
include_once "fachada.php";

$id = @$_GET["id"];

$dao = $factory->getMarcaDao();
$marca = $dao->buscaPorId($id);
if($marca==null) {
    $marca = new Marca(null, null, null);
}
?>

<html>

	<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
		<title>Cadastro de marcas</title>
	</head>
	<body>
	
        <a class="btn btn-outline-danger m-2" href="Marcas.php">Voltar</a>
		<h1 class="mx-auto w-25 text-align-center">Cadastro de marcas</h1>

        <form class="mx-auto w-25 text-align-center border px-2" action="salvaMarca.php" method=post>
            <div class="mb-3">
                <label class="form-label" for="id">Id:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$marca->getId()?>" name="id"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$marca->getNome()?>" name="nome"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="descricao">Descrição:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$marca->getDescricao()?>" name="descricao"/>
                <br>
            </div>
            
            <div class="mb-3 w-25 mx-auto">
                <input class="btn border border-dark" type="submit" value="Salvar"/>
            </div>
        </form>
        <br>
		  
    </body>
</html>