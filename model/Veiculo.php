<?php
class Veiculo {
    

    private $id;
    private $nome;
    private $placa;
    private $cor;
    private $id_marca;

    // $marca; <- marca vem da dao marca

    

    public function __construct($id, $nome, $placa, $cor, $id_marca )
    {
        $this->id=$id;
        $this->nome=$nome;
        $this->placa=$placa;
        $this->cor=$cor;
        $this->id_marca = $id_marca;
    }

    public function getId() { return $this->id; }
    public function setId($id) {$this->id = $id;}

    public function getPlaca() { return $this->placa; }
    public function setPlaca($placa) {$this->placa = $placa;}

    public function getNome() { return $this->nome; }
    public function setNome($nome) {$this->nome = $nome;}

    public function getCor() { return $this->cor; }
    public function setCor($cor) {$this->cor = $cor;}

    public function getMarca() { return $this->id_marca; }
    public function setMarca($id_marca) {$this->id_marca = $id_marca;}
}
?>