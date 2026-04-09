<?php
abstract class DaoFactory {

    protected abstract function getConnection();

    public abstract function getUsuarioDao();

    public abstract function getVeiculoDao();

    public abstract function getMarcaDao();
}
?>