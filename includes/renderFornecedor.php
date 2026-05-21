<?php

function renderFornecedor($f) {
    ?>
    <div class="col-md-3">
        <div class="card produto-card mb-4">

            <div class="card-body">

                <h6 class="fw-bold"><?= $f->getNome() ?></h6>
                <p><?= $f->getDescricao() ?></p>
                <p><?= $f->getEmail() ?></p>
                <p><?= $f->getTelefone() ?></p>

                <nav class="text-center">

                <?php if (isset($_SESSION["nome_usuario"])) { ?>

                    <a href="func/editaFornecedor.php?id=<?= $f->getId() ?>"
                       class="btn btn-warning mx-1">
                       Editar
                    </a>

                    <a href="func/excluiFornecedor.php?id=<?= $f->getId() ?>"
                       class="btn btn-danger"
                       onclick="return confirm('Tem certeza?')">
                       Remover
                    </a>

                <?php } ?>

                </nav>

            </div>
        </div>
    </div>
    <?php
}

?>