<?php
interface MarcaDao {

    public function insere($marca);
    public function remove($marca);
    public function altera($marca);
    public function buscaPorId($id);
    public function buscaPorNome($nome);
    public function buscaPorDescricao($descricao);
}
?>