<?php 

class Estoque {
    private $id;
    private $produtoid;
    private $qtd;
    private $preco;
    private $produtoNome;



public function __construct($id, $produtoid, $qtd, $preco)
{
    $this->id=$id;
    $this->produtoid=$produtoid;
    $this->qtd=$qtd;
    $this->preco=$preco;
}

    public function getId() { return $this->id; }
    public function setId($id) {$this->id = $id;}
    public function getProdutoid() { return $this->produtoid; }
    public function setProdutoid($produtoid) {$this->produtoid = $produtoid;}
    public function getQtd() { return $this->qtd; }
    public function setQtd($qtd) {$this->qtd = $qtd;}
    public function getPreco() { return $this->preco; }
    public function setPreco($preco) {$this->preco = $preco;}
    public function getProdutoNome() { return $this->produtoNome; }
    public function setProdutoNome($produtoNome) {$this->produtoNome = $produtoNome;}
}


?>