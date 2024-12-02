<?php

session_start();

require_once("../../conexao.php");

    $query = $pdo->query("SELECT id_pedidos FROM pedidos ORDER BY id_pedidos DESC");

    $res = $query->fetchAll(PDO::FETCH_ASSOC);

    if(empty($res)){
        $pedido = 1;
    }else{
        $pedido = $res['0']['id_pedidos']+1;
    }

    $forma= $_GET['metodo'];


    $data = date('Y-m-d');
    $hora = date('H:i:s');
    
    $sub = 0;

    foreach($_SESSION['carrinho'] as $c){
        $query = $pdo->prepare("INSERT INTO itens(id_pedido, id_produto, valor_unitario, qtd, subtotal) VALUES (:id_pedido,:id_produto,:valor_unitario,1,:subtotal)");
        $query->bindValue(":id_pedido","$pedido");
        $query->bindValue(":id_produto",$c['id']);
        $query->bindValue(":valor_unitario",$c['preco']);
        $query->bindValue(":subtotal",$c['preco']);

        $sub = $sub+$c['preco'];
        $query->execute();
    }

    $query = $pdo->prepare("INSERT INTO pedidos(id_pedidos,id_cliente, data, hora, forma, valor, status) VALUES (:pedido,:id_cliente,:data,:hora,:forma,:valor,:status)");
    $query->bindValue(":pedido",$pedido);
    $query->bindValue(":id_cliente",$_SESSION['usuario']['cod']);
    $query->bindValue(":data",$data);
    $query->bindValue(":hora",$hora);
    $query->bindValue(":forma",$forma);
    $query->bindValue(":valor",$sub);
    $query->bindValue(":status",'1');
    $query->execute();

    echo "salvo com sucesso";

    unset( $_SESSION['carrinho'] ); 