<?php

include_once('VeiculoDao.php');
include_once('dao/DAO.php');

class PostgresVeiculoDao extends DAO implements VeiculoDao {

    private $table_name = 'veiculo';
    
    public function insere($veiculo) {

        $query = "INSERT INTO " . $this->table_name . 
        " (nome, placa, cor, marca_id) VALUES" .
        " (:nome, :placa, :cor, :marca_id)";

        $stmt = $this->conn->prepare($query);

        // bind values 
        $stmt->bindParam(":nome", $veiculo->getNome());
        $stmt->bindParam(":placa", $veiculo->getPlaca());
        $stmt->bindParam(":cor", $veiculo->getCor());
        $stmt->bindParam(":marca_id", $veiculo->getMarca());

        if($stmt->execute()){
            return $this->conn->lastInsertId();;
        }else{
            return -1;
        }

    }

    public function remove($veiculo) {
        $query = "DELETE FROM " . $this->table_name . 
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(':id', $veiculo->getId());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function altera($veiculo) {

        $query = "UPDATE " . $this->table_name . 
        " SET nome = :nome, placa = :placa, cor = :cor, marca_id = :marca_id" .
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(":id", $veiculo->getid());
        $stmt->bindParam(":nome", $veiculo->getNome());
        $stmt->bindParam(":placa", $veiculo->getPlaca());
        $stmt->bindParam(":cor", $veiculo->getCor());
        $stmt->bindParam(":marca_id", $veiculo->getMarca());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function buscaPorId($id) {
        
        $veiculo = null;

        $query = "SELECT
                    id, nome, placa, cor, marca_id
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
            $veiculo = new Veiculo($row['id'], $row['nome'], $row['placa'], $row['cor'], $row['marca_id']);
        } 
     
        return $veiculo;
    }

    public function buscaPorNome($nome) {

        $veiculo = null;

        $query = "SELECT
                    id, nome, placa, cor, marca_id
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
            $veiculo = new Veiculo($row['id'], $row['nome'], $row['placa'], $row['cor'], $row['marca_id']);
        } 
     
        return $veiculo;
    }
    public function buscaPorPlaca($placa) {

        $veiculo = null;

        $query = "SELECT
                    id, nome, placa, cor, marca_id
                FROM
                    " . $this->table_name . "
                WHERE
                    placa = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $placa);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $veiculo = new Veiculo($row['id'], $row['nome'], $row['placa'], $row['cor'], $row['marca_id']);
        } 
     
        return $veiculo;
    }
    public function buscaPorCor($cor) {

        $veiculo = null;

        $query = "SELECT
                    id, nome, placa, cor, marca_id
                FROM
                    " . $this->table_name . "
                WHERE
                    cor = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $cor);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $veiculo = new Veiculo($row['id'], $row['nome'], $row['placa'], $row['cor'], $row['marca_id']);
        } 
     
        return $veiculo;
    }
    public function buscaPorMarca($marca_id) {

        $veiculo = null;

        $query = "
             
            SELECT 
                o.marca_id,
                u.nome
            FROM " . $this->table_name . " o
            INNER JOIN marca u
                ON o.marca_id = u.id
            where o.marca_id = ?
            LIMIT
                1 OFFSET 0";


    
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $marca_id);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $veiculo = new Veiculo($row['id'], $row['nome'], $row['placa'], $row['cor'], $row['marca_id']);
            } 
            
        return $row['nome'];
     
    }

    public function buscaTodos() {

        $query = "SELECT
                    id, nome, placa, cor, marca_id
                FROM
                    " . $this->table_name . 
                    " ORDER BY id ASC";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        $veiculos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);
            $veiculo = new Veiculo($id,$nome,$placa,$cor,$marca_id); 
            $veiculos[] = $veiculo;
        }
        return $veiculos;
    }
}
?>