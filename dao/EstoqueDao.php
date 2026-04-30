<?php
interface EstoqueDao {

    public function insere($estoque);
    public function remove($estoque);
    public function altera($estoque);
    public function buscaPorId($id);
    public function buscaPorQtd($qtd);
    public function buscaPorPreco($preco);
    public function buscaPorProduto($produtoId);
    public function buscaPorNomeCom($palavra);
}
?>