<?php
include_once "fachada.php";

$id = @$_GET["id"];

$dao = $factory->getUsuarioDao();
$usuario = $dao->buscaPorId($id);
if($usuario==null) {
    $usuario = new Usuario(null,null,null,null,null,null,null);
}
?>

<html>

	<head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
		<title>Cadastro de usuário</title>
	</head>
	<body>
	
        <a class="btn btn-outline-danger m-2 " href="usuarios.php">Voltar</a>
		<h1 class="mx-auto w-25 text-align-center">Cadastro de usuários</h1>

        <form class="mx-auto text-align-center px-2" action="salvaUsuario.php" method=post>
            <div class="d-flex flex-row mb-3">
                <div class="mb-3 mx-auto">
                    <label class="form-label" for="id">Id:</label>
                    <input class="form-control border border-dark" type="number" placeholder="99" value="<?=$usuario->getId()?>" name="id"/>
                    <br>
                </div>
                <div class="mb-3 w-50 mx-auto">
                    <label class="form-label" for="login">Login:</label>
                    <input class="form-control border border-dark" type="text" placeholder="teste" value="<?=$usuario->getLogin()?>" name="login"/>
                    <br>
                </div>
                <div class="mb-3 w-25 mx-auto">
                    <label class="form-label" for="senha">Senha:</label>
                    <input class="form-control border border-dark" type="password" placeholder="123" value="<?=$usuario->getSenha()?>" name="senha"/>
                    <br>
                </div>
            </div>

            <div class="d-flex flex-row mb-3 mx-auto text-align-center">
                <div class="mb-3 w-50 mx-2">
                    <label class="form-label" for="nome">Nome:</label>
                    <input class="form-control border border-dark" type="text" placeholder="Teste da Silva" value="<?=$usuario->getNome()?>" name="nome"/>
                    <br>
                </div>
                <div class="mb-3 w-50 mx-2">
                    <label class="form-label" for="email">Email:</label>
                    <input class="form-control border border-dark" type="email" placeholder="teste@email.com.br" value="<?=$usuario->getEmail()?>" name="email"/>
                    <br>
                </div>
            </div>

            <div class="d-flex flex-row mb-3">
                <div class="mb-3 w-25 mx-auto">
                    <label class="form-label" for="Telefone">Telefone:</label>
                    <input class="form-control border border-dark" type="tel" placeholder="5554999552222" value="<?=$usuario->getTelefone()?>" name="telefone"/>
                    <br>
                </div>
                <!--<div class="mb-3 w-25 mx-auto">
                    <label class="form-label" for="cartaoCredito">Numero do cartão de credito:</label>
                    <input class="form-control border border-dark" type="text" placeholder="1234567890654321" value="<?=$usuario->getCartaoCredito()?>" name="cartaoCredito"/>
                    <br>
                </div>-->
            </div>

            <div class="mb-3 mx-auto">
                <input class="btn border border-dark w-100" type="submit" value="Salvar"/>
            </div>
        </form>
        <br>
		  
    </body>
</html>