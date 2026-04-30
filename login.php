<?php
$page_title = "Autenticação Obrigatória";

// layout do cabeçalho
include_once "layout_header.php";
?>
<section>
<form action="executa_login.php" method="POST" role="form">
    <div class="form-group w-25 mx-auto">
        <legend class="text-align-center">Digite seu login e senha para entrar</legend>
        <label for="login">Nome de usuário</label>
        <input type="text" class="form-control" id="login" name="login" placeholder="Informe o Login">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" name="senha" placeholder="Informe a senha">
        <button type="submit" class="btn btn-primary my-2">OK</button>
        <a type="submit" href="index.php" class="btn btn-outline-primary">Voltar</a>
        <p>Não possui cadastro? <a href="editaUsuario.php">cadastre-se aqui</a></p>
    </div>
</form>
</section>
