<?php

include_once('ProdutoDao.php');
include_once('dao/DAO.php');

class PostgresProdutoDao extends DAO implements ProdutoDao {

    private $table_name = 'produto';
    
    public function insere($produto) {

        $query = "INSERT INTO " . $this->table_name . 
        " ( nome, descricao, foto, fornecedorId) VALUES" .
        " ( :nome, :descricao, :foto, :fornecedorId)";

        $stmt = $this->conn->prepare($query);

        // bind values 
        $stmt->bindParam(":nome", $produto->getNome());
        $stmt->bindParam(":descricao", $produto->getDescricao());
        $stmt->bindParam(":foto", $produto->getFoto());
        $stmt->bindParam(":fornecedorId", $produto->getFornecedorId ());

        if($stmt->execute()){
            return $this->conn->lastInsertId();
        }else{
            return -1;
        }

    }

        public function buscaPorNomeCom($palavra) {
            
        $usuarios = array();        
        
            $query = "SELECT
                        id, nome, descricao, foto, fornecedorId
                    FROM
                        " . $this->table_name . "
                    WHERE
                        nome like ? ORDER BY id ASC";
        
            $stmt = $this->conn->prepare($query);
            $parametro = "%" . $palavra . "%";
            $stmt->bindValue(1, $parametro);
            $stmt->execute();
        
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $usuarios[] = new Produto($id,$nome,$descricao,$foto,$fornecedorId,$qtd,$preco);
            }
        
            return $usuarios;
        }

    public function remove($produto) {
        $query = "DELETE FROM " . $this->table_name . 
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(':id', $produto->getId());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function altera($produto) {

        $query = "UPDATE " . $this->table_name . 
        " SET nome = :nome, descricao = :descricao, foto = :foto, fornecedorId = :fornecedorId" .
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(":id", $produto->getId());
        $stmt->bindParam(":nome", $produto->getNome());
        $stmt->bindParam(":descricao", $produto->getDescricao());
        $stmt->bindParam(":foto", $produto->getFoto());
        $stmt->bindParam(":fornecedorId", $produto->getFornecedorId());


        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function buscaPorId($id) {
        
        $produto = null;

        $query = "SELECT
                    id, nome, descricao, foto, fornecedorId
                FROM
                    " . $this->table_name . "
                WHERE
                    id = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $produto = new Produto($row['id'], $row['nome'], $row['descricao'], $row['foto'], $row['fornecedorId'], $row['qtd'], $row['preco']);
        } 
     
        return $produto;
    }

    public function buscaPorNome($nome) {

        $produto = null;

        $query = "SELECT
                     id, nome, descricao, foto, fornecedorId
                FROM
                    " . $this->table_name . "
                WHERE
                    nome = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $nome);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $produto = new Produto($row['id'], $row['nome'], $row['descricao'], $row['foto'], $row['fornecedorId'], $row['qtd'], $row['preco']);
        } 
     
        return $produto;
    }
    public function buscaPorDescricao($descricao) {

        $produto = null;

        $query = "SELECT
                    id, nome, descricao, foto, fornecedorId
                FROM
                    " . $this->table_name . "
                WHERE
                    descricao = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $descricao);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $produto = new Produto($row['id'], $row['nome'], $row['descricao'], $row['foto'], $row['fornecedorId'], $row['qtd'], $row['preco']);
        } 
     
        return $produto;
    }

    public function buscaTodos() {

        $query = "SELECT
            p.id,
            p.nome,
            p.descricao,
            p.foto,
            p.fornecedorId,
            f.nome AS fornecedor_nome,
            e.qtd,
            e.preco
          FROM produto p
          LEFT JOIN fornecedor f ON p.fornecedorId = f.id
          LEFT JOIN estoque e ON e.produtoid = p.id
          ORDER BY p.id ASC";
 
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $produtos = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $produto = new Produto(
                $row["id"],
                $row["nome"],
                $row["descricao"],
                $row["foto"],
                $row["fornecedorId"],
                $row["qtd"],
                $row["preco"]
            );

            $produto->setFornecedorNome($row["fornecedor_nome"] ?? null);

            $produto->setQtd($row["qtd"] ?? 0);
            $produto->setPreco($row["preco"] ?? 0);

            $produtos[] = $produto;
        }

        return $produtos;
    }
}
?>