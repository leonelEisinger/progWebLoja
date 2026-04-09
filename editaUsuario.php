<?php
include_once "fachada.php";

$id = @$_GET["id"];

$dao = $factory->getUsuarioDao();
$usuario = $dao->buscaPorId($id);
if($usuario==null) {
    $usuario = new Usuario(null,null, null, null);
}
?>

<html>

	<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
		<title>Cadastro de usuário</title>
	</head>
	<body>
	
        <a class="btn btn-outline-danger m-2" href="usuarios.php">Voltar</a>
		<h1 class="mx-auto w-25 text-align-center">Cadastro de usuários</h1>

        <form class="mx-auto w-25 text-align-center border px-2" action="salvaUsuario.php" method=post>
            <div class="mb-3">
                <label class="form-label" for="id">Id:</label>
                <input class="form-control border border-dark" type="text" value="<?=$usuario->getId()?>" name="id"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="login">Login:</label>
                <input class="form-control border border-dark" type="text" value="<?=$usuario->getLogin()?>" name="login"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="senha">Senha:</label>
                <input class="form-control border border-dark" type="password" value="<?=$usuario->getSenha()?>" name="senha"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input class="form-control border border-dark" type="text" value="<?=$usuario->getNome()?>" name="nome"/>
                <br>
            </div>
            <div class="mb-3 w-25 mx-auto">
                <input class="btn border border-dark" type="submit" value="Salvar"/>
            </div>
        </form>
        <br>
		  
    </body>
</html>