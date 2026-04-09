<?php
interface VeiculoDao {

    public function insere($veiculo);
    public function remove($veiculo);
    public function altera($veiculo);
    public function buscaPorId($id);
    public function buscaPorNome($nome);
    public function buscaPorPlaca($placa);
    public function buscaPorCor($cor);
    public function buscaPorMarca($marca_id);
    public function buscaTodos();
}
?>