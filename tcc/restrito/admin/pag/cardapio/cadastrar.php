<?php

require_once('../../../../conexao.php');

$produto=$_POST['txtProduto'];
$preco=$_POST['txtPreco'];
$cat=$_POST['txtCat'];
$fornecedor=$_POST['txtForn'];
$qtd=$_POST['txtQtd'];
$qtdM=$_POST['txtQtdM'];
$validade=$_POST['txtValidade'];
$descricao=$_POST['txtdesc'];
$foto='sem-foto.jpg';


$query = $pdo->prepare("INSERT INTO produtos(nome,preco,categoria,data_validade,quantidade,quantidade_min,descricao,fornecedor,foto) VALUE(:nome,:preco,:categoria,:data_validade,:quantidade,:quantidade_min,:descricao,:fornecedor,:foto)");
$query->bindValue(":nome","$produto");
$query->bindValue(":preco","$preco");
$query->bindValue(":categoria","$cat");
$query->bindValue(":data_validade","$validade");
$query->bindValue(":quantidade","$qtd");
$query->bindValue(":quantidade_min","$qtdM");
$query->bindValue(":descricao","$descricao");
$query->bindValue(":fornecedor","$fornecedor");
$query->bindValue(":foto","$foto");
$query->execute();

echo "salvo com sucesso";