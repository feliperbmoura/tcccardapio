<?php

require_once("../../conexao.php");

$nome=$_POST['txtNome'];
$email=$_POST['txtEmail'];
$senha=$_POST['txtSenha'];
$Csenha=$_POST['txtCsenha'];

if($senha != $Csenha){
    echo 'Senhas não estão iguais';
    exit;
}

$query = $pdo->prepare("INSERT INTO cliente(nome,email,senha,status) VALUE(:nome,:email,:senha,1)");
$query->bindValue(":nome","$nome");
$query->bindValue(":email","$email");
$query->bindValue(":senha","$senha");
$query->execute();

echo "salvo com sucesso";