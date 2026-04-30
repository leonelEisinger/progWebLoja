<?php

include_once("fachada.php");
include_once("comum.php");


if ( is_session_started() === FALSE ) {
			session_start();
		}	


$palavraFor = @$_POST['palavraFor'];

if($palavraFor == null) {
    $conteudo = file_get_contents('php://input');
    $valores = json_decode($conteudo, true);
    $palavraFor = $valores['palavraFor'];

    
}
        
        
$dao = $factory->getFornecedorDao();



if($palavraFor) {
    $fornecedor = $dao->buscaPorNomeCom($palavraFor);
} else{
    $fornecedor = $dao->buscaTodos();
}


foreach($fornecedor as $f) {
?>
    <div class="col-md-3">
        <div class="card produto-card mb-4">


            <div class="card-body">

                <h6 class="card-title fw-bold"><?=$f->getNome()?></h6>

                <p><?= $f->getDescricao()?></p>

                <p><?= $f->getEmail()?></p>

                <p><?= $f->getTelefone()?></p>


                <!-- BOTÃO -->
                <nav class="mx-auto my-auto text-center">
                    
                    <?php
                        if(isset($_SESSION["nome_usuario"])) {
                            //echo "<button class='btn btn-primary w-100 my-2'> Adicionar ao carrinho </button>";
                            echo "<a href='editaFornecedor.php?id=" . $f->getId() . "'class='btn btn-warning mx-1'>Editar</a>";
                            echo "<a href='excluiFornecedor.php?id=" . $f->getId() . "'class='btn btn-danger'" . "onclick='return confirm(\"Tem certeza que deseja excluir?\")'" . ">Remover</a>";
                        }
                    ?>
                
                    
                    
                </nav>

            </div>
        </div>
    </div>
<?php
}
?>