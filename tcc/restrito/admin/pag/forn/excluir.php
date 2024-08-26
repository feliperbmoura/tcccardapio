<?php

require_once('../../../../conexao.php');

$id = $_POST['codigo'];



    $query = $pdo->prepare("DELETE FROM fornecedor WHERE id_fornecedor = $id");

$query->execute();

echo "salvo com sucesso";