<?php

require_once('conexao.php');
?>
        <h1 id="titulo">Seus pedidos</h1>
        <?php
        
$id = $_SESSION['usuario']['cod'];

$query = $pdo->prepare("SELECT * FROM pedidos WHERE id_cliente = $id");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = @count($res);

if($total > 0){
    for($i=0;$i<$total;$i++){

        

    ?>
   
    
   <div class="card" id="card-produto">
  <div class="card-body">
    <h5 class="card-title">Pedido nº <?=$res[$i]['id_pedidos']?></h5>
    <p class="card-text">Data: <?=date("d/m/Y", strtotime($res[0]['data']))?></p>
    <p class="card-text">Hora: <?=date("H:i", strtotime($res[0]['hora']))?></p>
    <p class="card-text">Forma de Pagamento: <?=$res[$i]['forma']?></p>
    <?php 
        $valor =$res[$i]['valor'];
        $status = $res[$i]['status'];
        $id_pedido = $res[$i]['id_pedidos'];

        if($status == 0){
            $status = 'Pedido Finalizado';
        }else{
            if($status == 1){
                $status = 'Em Preparação';
            }else{
                $status = 'Aguardando Cliente';
            }
        }
    ?>
    <p class="card-text">Status do Pedido: <?=$status?></p>
    <p class="card-text"><hr></p>
    <?php
        $q = $pdo->prepare("SELECT I.*, P.nome FROM itens I INNER JOIN produtos P On I.id_produto = P.id_produto WHERE I.id_pedido = $id_pedido");
        $q->execute();
        $resItens = $q->fetchAll(PDO::FETCH_ASSOC);
        $totalItens = @count($resItens);
        for($j=0;$j<$totalItens;$j++){
            ?>
            <p class="card-text"><?=$resItens[$j]['nome']?> | R$ <?=$resItens[$j]['valor_unitario']?> | <?=$resItens[$j]['qtd']?> | R$ <?=$resItens[$j]['subtotal']?></p>
            <?php
        }
    ?>
    <p class="card-text">Total: R$ <?=$valor?></p>
  </div>
</div>

    <?php
     }
}
?>


