<?php
    session_start();

    unset( $_SESSION['carrinho'] ); 

    echo 'salvo com sucesso';
?>