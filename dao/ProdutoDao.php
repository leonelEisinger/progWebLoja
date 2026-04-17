<?php
interface ProdutoDao {

    public function insere($veiculo);
    public function remove($veiculo);
    public function altera($veiculo);
    public function buscaPorId($id);
    public function buscaPorNome($nome);
    public function buscaPorDescricao($descricao);
    public function buscaTodos();

    public function buscaPorNomeCom($palavra);
}
?>