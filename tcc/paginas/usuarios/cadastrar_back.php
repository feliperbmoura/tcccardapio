<?php

require_once("../../conexao.php");

session_start();

$depoimento=$_POST['txtdepoimento'];
$id_cliente=$_SESSION['usuario']['cod'];
$data=date('Y-m-d H:i:s');

$query = $pdo->prepare("INSERT INTO feedback(id_cliente, feedback, data) VALUES (:id_cliente, :feedback, :data)");
$query->bindValue(":id_cliente","$id_cliente");
$query->bindValue(":feedback","$depoimento");
$query->bindValue(":data","$data");
$query->execute();

echo "salvo com sucesso";