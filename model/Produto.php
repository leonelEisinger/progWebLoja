<?php
class Produto {
    

    private $id;
    private $nome;
    private $descricao;
    private $foto;
    private $fornecedorId;
    private $fornecedorNome;
    private $qtd;
    private $preco;



    public function __construct($id, $nome, $descricao, $foto, $fornecedorId, $qtd = 0, $preco = 0)
    {
        $this->id=$id;
        $this->nome=$nome;
        $this->descricao=$descricao;
        $this->foto=$foto;
        $this->fornecedorId=$fornecedorId;
        $this->qtd=$qtd;
        $this->preco=$preco;
    }

    public function getId() { return $this->id; }
    public function setId($id) {$this->id = $id;}
    public function getNome() { return $this->nome; }
    public function setNome($nome) {$this->nome = $nome;}
    public function getDescricao() { return $this->descricao; }
    public function setDescricao($descricao) {$this->descricao = $descricao;}
    public function getFoto() { return $this->foto; }
    public function setFoto($foto) {$this->foto = $foto;}
    public function getFornecedorId() { return $this->fornecedorId; }
    public function setFornecedorId($fornecedorId) {$this->fornecedorId = $fornecedorId;}
    public function getQtd() {return $this->qtd;}
    public function setQtd($qtd) {$this->qtd = $qtd;}
    public function getFornecedorNome() {return $this->fornecedorNome;}
    public function setFornecedorNome($nome) {$this->fornecedorNome = $nome;}
    public function getPreco() {return $this->preco;}
    public function setPreco($preco) {$this->preco = $preco;}
}
?>