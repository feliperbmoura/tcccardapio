<?php

require_once('../../../../conexao.php');

$produto=$_POST['txtCategoria'];
$id = $_POST['txtCod'];

if($id == ''){
    $query = $pdo->prepare("INSERT INTO categoria(categoria) VALUE(:nome)");
 }else{
    $query = $pdo->prepare("UPDATE categoria SET categoria=:nome WHERE id_categoria = $id");
}


$query->bindValue(":nome","$produto");
$query->execute();

echo "salvo com sucesso";