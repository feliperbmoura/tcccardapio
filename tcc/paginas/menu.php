<link rel="stylesheet" href="src/styles/menu.css">


<div id="dishes">
<?php

require_once('conexao.php');

$query = $pdo->prepare("SELECT * FROM produtos ORDER BY nome ASC");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = @count($res);

if($total >0){
    for($i=0;$i<$total;$i++){
        $foto = $res[$i]['foto'];
        $nome = $res[$i]['nome'];
        $des = $res[$i]['descricao'];
        $preco = $res[$i]['preco']
    ?>

    <div class="dish">
        <div class="dish-heart">
            <i class="fa-solid fa-heart"></i>
        </div>

        <img src="imagens/Design_sem_nome__19_-removebg-preview.png" class="dish-image" alt="" style="height: 250px;">

        <h3 class="dish-title">
            <?=$nome?>
        </h3>

        <span class="dish-description">
            <?=$des?>
        </span>

        <div class="dish-rate">
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <i class="fa-solid fa-star"></i>
            <span>(500+)</span>
        </div>

        <div class="dish-price">
            <h4>R$<?=$preco?></h4>
            <button class="btn-default">
                <i class="fa-solid fa-basket-shopping"></i>
            </button>
        </div>
    </div>

    <?php
    }
}
?>

</div>