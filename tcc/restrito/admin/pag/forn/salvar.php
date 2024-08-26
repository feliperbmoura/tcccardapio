<?php

require_once('../../../../conexao.php');

$forn=$_POST['txtForn'];
$cnpj=$_POST['txtCNPJ'];
$endereco=$_POST['txtEnd'];
$nro=$_POST['txtNro'];
$cidade=$_POST['txtCidade'];
$uf=$_POST['txtUF'];
$cep=$_POST['txtCEP'];
$fone=$_POST['txtFone'];
$id = $_POST['txtCod'];


if($id == ''){
    $query = $pdo->prepare("INSERT INTO fornecedor(fornecedor, cnpj, endereco, nro, cidade, uf, cep, telefone) VALUES (:fornecedor,:cnpj,:endereco,:nro,:cidade,:uf,:cep,:telefone)");
 }else{
    $query = $pdo->prepare("UPDATE fornecedor SET fornecedor=:fornecedor,cnpj=:cnpj,endereco=:endereco,nro=:nro,cidade=:cidade,uf=:cidade,cep=:cep,telefone=:telefone WHERE id_fornecedor = $id");
}


$query->bindValue(":fornecedor","$forn");
$query->bindValue(":cnpj","$cnpj");
$query->bindValue(":endereco","$endereco");
$query->bindValue(":nro","$nro");
$query->bindValue(":cidade","$cidade");
$query->bindValue(":uf","$uf");
$query->bindValue(":cep","$cep");
$query->bindValue(":telefone","$fone");
$query->execute();

echo "salvo com sucesso";