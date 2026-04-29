<?php

include_once("fachada.php");
include_once("comum.php");


if ( is_session_started() === FALSE ) {
			session_start();
		}	


$palavraUser = @$_POST['palavraUser'];

if($palavraUser == null) {
    $conteudo = file_get_contents('php://input');
    $valores = json_decode($conteudo, true);
    $palavraUser = $valores['palavraUser'];

    
}
        
        
$dao = $factory->getUsuarioDao();



if($palavraUser) {
    $usuarios = $dao->buscaPorNomeCom($palavraUser);
} else{
    $usuarios = $dao->buscaTodos();
}


foreach($usuarios as $u) {
?>
    <div class="col-md-3">
        <div class="card produto-card mb-4">


            <div class="card-body">

                <h6 class="card-title fw-bold"><?=$u->getNome()?></h6>

                <p><?= $u->getEmail()?></p>

                <p><?= $u->getTelefone()?></p>


                <!-- BOTÃO -->
                <nav class="mx-auto my-auto text-center">
                    
                    <?php
                        if(isset($_SESSION["nome_usuario"])) {
                            //echo "<button class='btn btn-primary w-100 my-2'> Adicionar ao carrinho </button>";
                            echo "<a href='editaUsuario.php?id=" . $u->getId() . "'class='btn btn-warning mx-1'>Editar</a>";
                            echo "<a href='excluiUsuario.php?id=" . $u->getId() . "'class='btn btn-danger'" . "onclick='return confirm(\"Tem certeza que deseja excluir?\")'" . ">Remover</a>";
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