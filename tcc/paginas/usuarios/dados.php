<?php

require_once('conexao.php');

$id = $_SESSION['usuario']['cod'];

$query = $pdo->prepare("SELECT * FROM cliente WHERE id_cliente = $id");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = @count($res);

if($total > 0){
    ?>
    <form action="index.php?pag=login&pagina=atualizar" method="post">
        <label>Nome</label>
        <input type="text" name="txtnome" id="txtnome" value="<?=$res[0]['nome']?>">
        <label>Email</label>
        <input type="email" name="txtemail" id="txtemail" value="<?=$res[0]['email']?>">
        <label>Senha</label>
        <input type="password" name="txtsenha" id="txtsenha" value="<?=$res[0]['senha']?>">
        <input type="submit" value="Atualizar">
    </form>
    <?php
}
?>