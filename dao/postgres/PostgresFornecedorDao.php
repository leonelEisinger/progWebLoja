<?php

include_once('FornecedorDao.php');
include_once('dao/DAO.php');

class PostgresFornecedorDao extends DAO implements FornecedorDao {

    private $table_name = 'fornecedor';
    
    public function insere($fornecedor) {

        $query = "INSERT INTO " . $this->table_name . 
        " (nome, descricao, telefone, email) VALUES" .
        " (:nome, :descricao, :telefone, :email)";

        $stmt = $this->conn->prepare($query);

        // bind values 
        $stmt->bindParam(":nome", $fornecedor->getNome());
        $stmt->bindParam(":descricao", $fornecedor->getDescricao());
        $stmt->bindParam(":telefone", $fornecedor->getTelefone());
        $stmt->bindParam(":email", $fornecedor->getEmail());

        if($stmt->execute()){
            return $this->conn->lastInsertId();;
        }else{
            return -1;
        }

    }

    public function remove($fornecedor) {
        $query = "DELETE FROM " . $this->table_name . 
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(':id', $fornecedor->getId());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function altera($fornecedor) {

        $query = "UPDATE " . $this->table_name . 
        " SET nome = :nome, descricao = :descricao, telefone = :telefone, email = :email" .
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(":nome", $fornecedor->getNome());
        $stmt->bindParam(":descricao", $fornecedor->getDescricao());
        $stmt->bindParam(":telefone", $fornecedor->getTelefone());
        $stmt->bindParam(":email", $fornecedor->getEmail());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function buscaPorId($id) {
        
        $fornecedor = null;

        $query = "SELECT
                    id, nome, descricao, telefone, email
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
            $fornecedor = new Fornecedor($row['id'], $row['nome'], $row['descricao'], $row['telefone'], $row['email']);
        } 
     
        return $fornecedor;
    }

    public function buscaPorNome($nome) {

        $fornecedor = null;

        $query = "SELECT
                    id, nome, descricao, telefone, email
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
            $fornecedor = new Fornecedor($row['id'], $row['nome'], $row['descricao'], $row['telefone'], $row['email']);
        } 
     
        return $fornecedor;
    }

        public function buscaPorDescricao($descricao) {

        $fornecedor = null;

        $query = "SELECT
                    id, nome, descricao, telefone, email
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
            $fornecedor = new Fornecedor($row['id'], $row['nome'], $row['descricao'], $row['telefone'], $row['email']);
        } 
     
        return $fornecedor;
    }

    public function buscaTodos() {

        $query = "SELECT
                    id, nome, descricao, telefone, email
                FROM
                    " . $this->table_name . 
                    " ORDER BY id ASC";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        $fornecedores = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);
            $fornecedor = new Fornecedor($id,$nome,$descricao,$telefone,$email); 
            $fornecedores[] = $fornecedor;
        }
        return $fornecedores;
    }

    public function buscaPorNomeCom($palavra) {
            
        $fornecedores = array();        
        
            $query = "SELECT
                        id, nome, descricao, telefone, email
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
                $fornecedores[] = new Fornecedor($id,$nome,$descricao,$telefone,$email);
            }
        
            return $fornecedores;
        }
}
?>