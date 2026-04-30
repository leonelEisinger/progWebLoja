<?php

include_once('EstoqueDao.php');
include_once('dao/DAO.php');

class PostgresEstoqueDao extends DAO implements EstoqueDao {

    private $table_name = 'estoque';
    
    public function insere($estoque) {

        $query = "INSERT INTO " . $this->table_name . 
        " (produtoid, qtd, preco) VALUES" .
        " (:produtoid, :qtd, :preco)";

        $stmt = $this->conn->prepare($query);

        // bind values 
        $stmt->bindParam(":produtoid", $estoque->getProdutoid());
        $stmt->bindParam(":qtd", $estoque->getQtd());
        $stmt->bindParam(":preco", $estoque->getPreco());

        if($stmt->execute()){
            return $this->conn->lastInsertId();;
        }else{
            return -1;
        }

    }

    public function remove($estoque) {
        $query = "DELETE FROM " . $this->table_name . 
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(':id', $estoque->getId());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function altera($estoque) {

        $query = "UPDATE " . $this->table_name . 
        " SET produtoid = :produtoid, qtd = :qtd, preco = :preco" .
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(":id", $estoque->getId());
        $stmt->bindParam(":produtoid", $estoque->getProdutoid());
        $stmt->bindParam(":qtd", $estoque->getQtd());
        $stmt->bindParam(":preco", $estoque->getPreco());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function buscaPorId($id) {
        
        $estoque = null;

        $query = "SELECT
                    id, produtoid, qtd, preco
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
            $estoque = new Estoque($row['id'], $row['produtoid'], $row['qtd'], $row['preco']);
        } 
     
        return $estoque;
    }

    public function buscaPorQtd($qtd) {

        $estoque = null;

        $query = "SELECT
                    id, produtoid, qtd, preco
                FROM
                    " . $this->table_name . "
                WHERE
                    qtd = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $qtd);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $estoque = new Estoque($row['id'], $row['produtoid'], $row['qtd'], $row['preco']);
        } 
     
        return $estoque;
    }

        public function buscaPorPreco($preco) {

        $estoque = null;

        $query = "SELECT
                    id, produtoid, qtd, preco
                FROM
                    " . $this->table_name . "
                WHERE
                    preco = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $preco);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $estoque = new Estoque($row['id'], $row['produtoid'], $row['qtd'], $row['preco']);
        } 
     
        return $estoque;
    }

    public function buscaTodos() {

        $query = "SELECT
            e.id,
            e.produtoid,
            e.qtd,
            e.preco,
            p.nome AS produto_nome
          FROM estoque e
          JOIN produto p ON p.id = e.produtoid
          ORDER BY e.id ASC";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        $estoques = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $estoque = new Estoque(
                $row["id"],
                $row["produtoid"],
                $row["qtd"],
                $row["preco"]
            );

            $estoque->setProdutoNome($row["produto_nome"]); // 🔥 THIS LINE

            $estoques[] = $estoque;
        }

        
        return $estoques;
    }

    public function buscaPorProduto($produtoId) {
    $sql = "SELECT * FROM estoque WHERE produtoid=?";

    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$produtoId]);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    public function buscaPorNomeCom($palavra) {
        
    $lista = array();        
    
        $query = "SELECT
            e.id,
            e.produtoid,
            e.qtd,
            e.preco,
            p.nome AS produto_nome
          FROM estoque e
          JOIN produto p ON p.id = e.produtoid
          WHERE p.nome LIKE ?
          ORDER BY e.id ASC";
    
        $stmt = $this->conn->prepare($query);
        $parametro = "%" . $palavra . "%";
        $stmt->bindValue(1, $parametro);
        $stmt->execute();
    
            $lista = [];

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                $estoque = new Estoque(
                    $row["id"],
                    $row["produtoid"],
                    $row["qtd"],
                    $row["preco"]
                );

                $estoque->setProdutoNome($row["produto_nome"]);

                $lista[] = $estoque;
            }

    
        return $lista;
    }



}
?>