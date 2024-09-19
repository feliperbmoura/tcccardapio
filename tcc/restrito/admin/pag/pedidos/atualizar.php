<?php

require_once('../../../../conexao.php');

$id = $_POST['codigo'];
$status = $_POST['status'];

if($status == 1){
    $query = $pdo->prepare("UPDATE pedidos SET status=2 WHERE id_pedidos = $id");

    $query->execute();
}else{
    $query = $pdo->prepare("UPDATE pedidos SET status=0 WHERE id_pedidos = $id");

    $query->execute();
}

echo "salvo com sucesso";