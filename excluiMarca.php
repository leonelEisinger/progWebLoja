<?php

include_once "fachada.php";

$id = @$_GET["id"];

$dao = $factory->getMarcaDao();

$marca = new Marca($id, null, null);

$dao->remove($marca);

header("Location: marcas.php");

?>
