<?php
include_once "fachada.php";

$id = @$_GET["id"];

$dao = $factory->getVeiculoDao();
$veiculo = $dao->buscaPorId($id);

$veiculos = $dao->buscaTodos();
if($veiculo==null) {
    $veiculo = new Veiculo(null, null, null, null, null);
    }
    ?>

<html>
    
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
		<title>Cadastro de veiculos</title>
	</head>
	<body>
        
        <a class="btn btn-outline-danger m-2" href="veiculos.php">Voltar</a>
		<h1 class="mx-auto w-25 text-align-center">Cadastro de veiculos</h1>

        <form class="mx-auto w-25 text-align-center border px-2" action="salvaVeiculo.php" method=post>
            <div class="mb-3">
                <label class="form-label" for="id">Id:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$veiculo->getId()?>" name="id"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nome">Nome:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$veiculo->getNome()?>" name="nome"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="placa">Placa:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$veiculo->getPlaca()?>" name="placa"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="cor">Cor:</label>
                <input class="form-control border border-dark" type= "text" value="<?=$veiculo->getCor()?>" name="cor"/>
                <br>
            </div>
            <div class="mb-3">
                <label class="form-label" for="marca">Marca:</label>
                <select class="form-select border border-dark" name="marca" id="marca">
                    
                    <?php 
                        if ($veiculos);
                        foreach ($veiculos as $umVeiculos){
                            echo "<option value=\"{$umVeiculos->getMarca()}\">{$dao->buscaPorMarca($umVeiculos->getMarca())}</option>";
                        }
                    ?>
                    
                </select>
                <br>
            </div>
            <div class="mb-3 w-25 mx-auto">
                <input class="btn border border-dark" type= "submit" value="Salvar"/>
            </div>
        </form>
        <br>
		  
    </body>
</html>