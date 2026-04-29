<?php

include_once "fachada.php";
include_once("comum.php");


if ( is_session_started() === FALSE ) {
			session_start();
		}	


$palavra = @$_POST['palavra'];

if($palavra == null) {
    $conteudo = file_get_contents('php://input');
    $valores = json_decode($conteudo, true);
    $palavra = $valores['palavra'];

    
}
        
        
$dao = $factory->getProdutoDao();



if($palavra) {
    $produtos = $dao->buscaPorNomeCom($palavra);
} else{
    $produtos = $dao->buscaTodos();
}


foreach($produtos as $p) {
?>
    <div class="col-md-3">
        <div class="card produto-card mb-4">

            <!-- IMAGEM -->
            <img src="uploads/<?=$p->getFoto()?>"
                 class="card-img-top">

            <div class="card-body">

                <!-- NOME -->
                <h6 class="card-title"><?=$p->getNome()?></h6>

                <!-- PREÇO -->
                <p class="text-success fw-bold fs-5">
                    R$ 23
                </p>

                <!-- EXTRA -->
                <span class="badge bg-success mb-2">Frete grátis</span>

                <!-- BOTÃO -->
                <nav class="mx-auto my-auto text-center">
                    
                    <?php
                        if(isset($_SESSION["nome_usuario"])) {
                            //echo "<button class='btn btn-primary w-100 my-2'> Adicionar ao carrinho </button>";
                            echo "<a href='editaProduto.php?id=" . $p->getId() . "'class='btn btn-warning mx-1'>Editar</a>";
                            echo "<a href='excluiProduto.php?id=" . $p->getId() . "'class='btn btn-danger'" . "onclick='return confirm(\"Tem certeza que deseja excluir?\")'" . ">Remover</a>";
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