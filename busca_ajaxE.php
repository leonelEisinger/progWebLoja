<?php

include_once("fachada.php");
include_once("comum.php");


if ( is_session_started() === FALSE ) {
			session_start();
		}	


$palavraEst = @$_POST['palavraEst'];

if($palavraEst == null) {
    $conteudo = file_get_contents('php://input');
    $valores = json_decode($conteudo, true);
    $palavraEst = $valores['palavraEst'];

    
}
        
        
$dao = $factory->getEstoqueDao();



if($palavraEst) {
    $estproduto = $dao->buscaPorNomeCom($palavraEst);
} else{
    $estproduto = $dao->buscaTodos();
}


foreach($estproduto as $ep) {
?>
    <div class="col-md-3">
        <div class="card estoque-card mb-4">


            <div class="card-body">

                <h6 class="card-title fw-bold"><?=$ep->getProdutoNome()?></h6>

                <p><?= $ep->getQtd()?></p>

                <p><?= $ep->getPreco()?></p>


                <!-- BOTÃO -->
                <nav class="mx-auto my-auto text-center">
                    
                    <?php
                        if(isset($_SESSION["nome_usuario"])) {
                            echo "<a href='editaEstoque.php?id=" . $ep->getId() . "'class='btn btn-warning mx-1'>Editar</a>";
                        } else {
                            echo "<button class='btn btn-primary w-100'> Adicionar ao carrinho </button>";
                        }
                    ?>
                
                    
                    
                </nav>

            </div>
        </div>
    </div>
<?php
}
?>