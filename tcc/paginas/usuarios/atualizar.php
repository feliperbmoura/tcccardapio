<?php
require_once('conexao.php');
$id = $_SESSION['usuario']['cod'];
$nome = $_POST['txtnome'];
$email = $_POST['txtemail'];
$senha = $_POST['txtsenha'];


$query = $pdo->prepare("UPDATE cliente SET nome=:nome,email=:email,senha=:senha WHERE id_cliente = $id");
$query->bindValue(":nome","$nome");
$query->bindValue(":email","$email");
$query->bindValue(":senha","$senha");
$query->execute();

header("Refresh: 0; url=index.php?pag=login&pagina=dados");

?>