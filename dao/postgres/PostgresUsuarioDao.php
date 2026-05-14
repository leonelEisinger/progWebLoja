<?php

include_once('UsuarioDao.php');
include_once('dao/DAO.php');

class PostgresUsuarioDao extends DAO implements UsuarioDao {

    private $table_name = 'cliente';
    
    public function insere($usuario) {

        $query = "INSERT INTO " . $this->table_name . 
        " (login, senha, nome, telefone, email, cartaoCredito, tipo) VALUES" .
        " (:login, :senha, :nome, :telefone, :email, :cartaoCredito, :tipo)";

        $stmt = $this->conn->prepare($query);

        // bind values 
        $stmt->bindParam(":login", $usuario->getLogin());
        $stmt->bindParam(":senha", md5($usuario->getSenha()));
        $stmt->bindParam(":nome", $usuario->getNome());
        $stmt->bindParam(":telefone", $usuario->getTelefone());
        $stmt->bindParam(":email", $usuario->getEmail());
        $stmt->bindParam(":cartaoCredito", $usuario->getCartaoCredito());
        $stmt->bindParam(":tipo", $usuario->getTipo());

        if($stmt->execute()){
            return $this->conn->lastInsertId();;
        }else{
            return -1;
        }

    }

    public function remove($usuario) {
        $query = "DELETE FROM " . $this->table_name . 
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(':id', $usuario->getId());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function altera($usuario) {

        $query = "UPDATE " . $this->table_name . 
        " SET login = :login, senha = :senha, nome = :nome, telefone = :telefone, email = :email, cartaoCredito = :cartaoCredito, tipo = :tipo" .
        " WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        // bind parameters
        $stmt->bindParam(":login", $usuario->getLogin());
        $stmt->bindParam(":senha", $usuario->getSenha());
        $stmt->bindParam(":nome", $usuario->getNome());
        $stmt->bindParam(":telefone", $usuario->getTelefone());
        $stmt->bindParam(":email", $usuario->getEmail());
        $stmt->bindParam(":cartaoCredito", $usuario->getCartaoCredito());
        $stmt->bindParam(":tipo", $usuario->getTipo());
        $stmt->bindParam(':id', $usuario->getId());

        // execute the query
        if($stmt->execute()){
            return true;
        }    

        return false;
    }

    public function buscaPorId($id) {
        
        $usuario = null;

        $query = "SELECT
                    id, login, senha, nome, telefone, email, cartaoCredito, tipo
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
            $usuario = new Usuario($row['id'],$row['login'], $row['senha'], $row['nome'], $row['telefone'], $row['email'], $row['cartaoCredito'], $row['tipo']);
        } 
     
        return $usuario;
    }

    public function buscaPorNome($nome) {

        $usuario = null;

        $query = "SELECT
                    id, login, senha, nome, telefone, email, cartaoCredito, tipo
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
            $usuario = new Usuario($row['id'],$row['login'], $row['senha'], $row['nome'], $row['telefone'], $row['email'], $row['cartaoCredito'], $row['tipo']);
        } 
     
        return $usuario;
    }
    public function buscaPorLogin($login) {

        $usuario = null;

        $query = "SELECT
                    id, login, senha, nome, telefone, email, cartaoCredito, tipo
                FROM
                    " . $this->table_name . "
                WHERE
                    login = ?
                LIMIT
                    1 OFFSET 0";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $login);
        $stmt->execute();
     
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if($row) {
            $usuario = new Usuario($row['id'],$row['login'], $row['senha'], $row['nome'], $row['telefone'], $row['email'], $row['cartaoCredito'], $row['tipo']);
        } 
     
        return $usuario;
    }

    public function buscaTodos() {

        $query = "SELECT
                    id, login, senha, nome, telefone, email, cartaoCredito, tipo
                FROM
                    " . $this->table_name . 
                    " ORDER BY id ASC";
     
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();

        $usuarios = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            extract($row);
            $usuario = new Usuario($id,$login,$senha,$nome,$telefone,$email,$cartaoCredito,$tipo); 
            $usuarios[] = $usuario;
        }
        return $usuarios;
    }

    public function buscaPorNomeCom($palavra) {
            
        $usuarios = array();        
        
            $query = "SELECT
                        id, login, senha, nome, telefone, email, cartaoCredito, tipo
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
                $usuarios[] = new Usuario($id,$login,$senha,$nome,$telefone,$email,$cartaoCredito,$tipo);
            }
        
            return $usuarios;
        }
}
?>