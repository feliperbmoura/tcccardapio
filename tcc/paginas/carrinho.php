<?php
session_start();
if (isset($_SESSION['usuario'])) {
    if (isset($_SESSION['carrinho'])) {
       foreach($_SESSION['carrinho'] as $c){
        ?>
        <div class="row">
            <div class="col-8">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?=$c['nome']?></h5>
                        <p class="card-text"><?=$c['preco']?></p>
                        <a href="#" class="btn btn-primary" onclick="personalizar()">Personalizar</a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
       }
    } else {
        echo 'Ahhh! Seu carrinho está vazio, que tal fazer uma compra :)';
    }
} else {
    echo 'Mandar para login';
}
?>

