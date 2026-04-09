<?php

error_reporting(E_ERROR | E_PARSE);

//Model
include_once('model/Usuario.php');
include_once('model/Veiculo.php');
include_once('model/Marca.php');
//DAO
include_once('dao/UsuarioDao.php');
include_once('dao/VeiculoDao.php');
include_once('dao/MarcaDao.php');
//Factory
include_once('dao/DaoFactory.php');
include_once('dao/postgres/PostgresDaoFactory.php');

$factory = new PostgresDaofactory();


?>
