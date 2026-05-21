<?php
function renderEstoque($ep) {
    ?>
    <div class="col-md-3">
        <div class="card estoque-card mb-4">


            <div class="card-body">

                <h6 class="card-title">Nome do produto: <span class="fw-bold"><?=$ep->getProdutoNome()?></span></h6>

                <p>Qtd: <?= $ep->getQtd()?></p>

                <p>R$ <?= $ep->getPreco()?></p>


                <!-- BOTÃO -->
                <nav class="mx-auto my-auto text-center">
                    
                    <?php
                        if(isset($_SESSION["nome_usuario"])) {
                            echo "<a href='func/editaEstoque.php?id=" . $ep->getId() . "'class='btn btn-warning mx-1'>Editar</a>";
                        }
                    ?>
                
                </nav>

            </div>
        </div>
    </div>
    <?php
}

?>