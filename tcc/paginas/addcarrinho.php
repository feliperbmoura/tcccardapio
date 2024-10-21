<?php
    session_start();
    $id = $_GET['id'];
    $nome = $_GET['produto'];
    $preco = $_GET['preco'];
    $foto = $_GET['imagem'];

    if(isset($_SESSION['carrinho'])){
        $dados = [
            'id' =>  $id,
            'nome' => $nome,
            'preco' => $preco,
            'foto' => $foto
        ];

        $_SESSION['carrinho'][] = $dados;
    }else{
        $dados = [
            'id' =>  $id,
            'nome' => $nome,
            'preco' => $preco,
            'foto' => $foto
        ];

        $_SESSION['carrinho'][] =  $dados;    
    }



    header('Location: index.php?pag=carrinho');

?>