<?php
function renderProduto($p) {
    ?>
    <div class="col-md-3">
        <div class="card produto-card mb-4">

            <!-- IMAGEM -->
            <img src="uploads/<?=$p->getFoto()?>"
                 class="card-img-top">

            <div class="card-body">

                <!-- NOME -->
                <h6 class="text-dark fw-bold card-title fs-5"><?=$p->getNome()?></h6>

                <!-- PREÇO -->
                <p class="text-dark-subtle card-subtitle"><?=$p->getDescricao()?></p>

                <?php
                   
                    echo "<div class='text-center'>";
                        echo "<span class='badge bg-dark mb-2 m-1'>". $p->getFornecedorNome() ."</span>";
                        echo "<span class='badge bg-success mb-2'> Qtd: ". $p->getQtd() ."</span>";
                        echo "<span class='badge bg-info mb-2 m-1'> R$ ". $p->getPreco() ."</span>";
                    echo "</div>";
                    
                    echo "<nav class='mx-auto my-auto text-center'>";
                    
                    
                        if($_SESSION["tipo"] == 1 || $_SESSION["tipo"] == 2) {
                            //echo "<button class='btn btn-primary w-100 my-2'> Adicionar ao carrinho </button>";
                            echo "<a href='func/editaProduto.php?id=" . $p->getId() . "'class='btn btn-warning mx-1'>Editar</a>";
                            echo "<a href='func/excluiProduto.php?id=" . $p->getId() . "'class='btn btn-danger'" . "onclick='return confirm(\"Tem certeza que deseja excluir?\")'" . ">Remover</a>";
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