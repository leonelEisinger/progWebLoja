<?php

include_once('MarcaDao.php');
include_once('dao/DAO.php');

class PostgresMarcaDao extends DAO implements MarcaDao {

    private $table_name = 'marca';
    
    public function insere($marca) {

        $query = "INSERT INTO " . $this->table_name . 
        " (nome, descricao) VALUES" .
        " (:nome, :descricao)";

        $stmt = $this->conn->prepare($query);

        // bind values 
        $stmt->bindParam(":descricao", $marca->getNome());
        $stmt->bindParam(":nome", $marca->getDescricao());

        if($stmt->execute()){
            return $this->conn->lastInsertId();;
        }else{
            return -1;
        }

    }

    public function remove($marca) {
        $query = "DELETE FROM " . $this->table_name . 
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(':id', $marca->getId());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function altera($marca) {

        $query = "UPDATE " . $this->table_name . 
        " SET nome = :nome, descricao = :descricao" .
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(':id', $marca->getId());
        $stmt->bindParam(":nome", $marca->getNome());
        $stmt->bindParam(":descricao", $marca->getDescricao());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function buscaPorId($id) {
        
        $marca = null;

        $query = "SELECT
                    id, nome, descricao
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
            $marca = new Marca($row['id'], $row['nome'], $row['descricao']);
        } 
     
        return $marca;
    }

    public function buscaPorNome($nome) {

        $marca = null;

        $query = "SELECT
                    id, nome, descricao
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
            $marca = new Marca($row['id'], $row['nome'], $row['descricao']);
        } 
     
        return $marca;
    }

        public function buscaPorDescricao($descricao) {

        $marca = null;

        $query = "SELECT
                    id, nome, descricao
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
            $marca = new Marca($row['id'], $row['nome'], $row['descricao']);
        } 
     
        return $marca;
    }

    public function buscaTodos() {

        $query = "SELECT
                    id, nome, descricao
                FROM
                    " . $this->table_name . 
                    " ORDER BY id ASC";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        $marcas = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);
            $marca = new Marca($id,$nome,$descricao); 
            $marcas[] = $marca;
        }
        return $marcas;
    }
}
?>