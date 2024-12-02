<h2 id="titulo" style=" margin-top: -100px;">Editar suas Informações</h2>
<?php

require_once('conexao.php');

$id = $_SESSION['usuario']['cod'];

$query = $pdo->prepare("SELECT * FROM cliente WHERE id_cliente = $id");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = @count($res);

if($total > 0){
    ?>
    <div id="editar-login">

            <form action="index.php?pag=login&pagina=atualizar" method="post" >

                <div id="email">
                    <label>Nome</label>
                    <br>
                    <input type="text" name="txtnome" id="txtnome" value="<?=$res[0]['nome']?>">
                </div>

                <div id="email">
                    <label>Email</label>
                    <br>
                    <input type="email" name="txtemail" id="txtemail" value="<?=$res[0]['email']?>">
                </div>

                <div id="senha">
                    <label>Senha</label>
                    <br>
                    <input type="password" name="txtsenha" id="txtsenha" value="<?=$res[0]['senha']?>">
                </div>
                <br>
                <input type="submit" value="Atualizar" class="btn-default">

            </form>

</div>




    
    <?php
}
?>