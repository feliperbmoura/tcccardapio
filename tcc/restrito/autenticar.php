<?php 
@session_start();
require_once('../conexao.php');

$login = $_POST['txtLogin'];
$senha = md5($_POST['txtSenha']);

$query = $pdo->prepare("SELECT * FROM administrador WHERE email=:email AND senha=:senha");
$query->bindValue(":email","$login");
$query->bindValue(":senha","$senha");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = @count($res);

if($total > 0){
    $_SESSION['admin']['cod'] = $res[0]['id_admin'];
    $_SESSION['admin']['nome'] = $res[0]['nome'];
    $_SERVER['admin']['nivel'] = $res[0]['nivel'];

    echo "salvo com sucesso";
}else{
    echo "Login ou senha incorretos!";

}
