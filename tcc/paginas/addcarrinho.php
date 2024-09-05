<?php
    session_start();
    $id = $_GET['id'];
    $nome = $_GET['produto'];
    $preco = $_GET['preco'];

    if(isset($_SESSION['carrinho'])){
        $dados = [
            'id' =>  $id,
            'nome' => $nome,
            'preco' => $preco 
        ];

        $_SESSION['carrinho'][] = $dados;
    }else{
        $dados = [
            'id' =>  $id,
            'nome' => $nome,
            'preco' => $preco 
        ];

        $_SESSION['carrinho'][] =  $dados;    
    }



    header('Location: index.php?pag=carrinho');

?>