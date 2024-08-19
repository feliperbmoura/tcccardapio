<?php

require_once('../../../../conexao.php');

$id = $_POST['codigo'];



    $query = $pdo->prepare("DELETE FROM produtos WHERE id_produto = $id");

$query->execute();

echo "salvo com sucesso";