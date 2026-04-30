<?php
interface UsuarioDao {

    public function insere($usuario);
    public function remove($usuario);
    public function altera($usuario);
    public function buscaPorId($id);
    public function buscaPorNome($nome);
    public function buscaPorLogin($login);
    public function buscaTodos();
}
?>