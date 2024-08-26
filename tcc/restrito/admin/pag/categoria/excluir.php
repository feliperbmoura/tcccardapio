<?php

require_once('../../../../conexao.php');

$id = $_POST['codigo'];



    $query = $pdo->prepare("DELETE FROM categoria WHERE id_categoria = $id");

$query->execute();

echo "salvo com sucesso";