<?php 
@session_start();
require_once('../../../../conexao.php');

$pedidos = $_POST['pedido'];

$query = $pdo->query("SELECT P.*, C.nome FROM pedidos P INNER JOIN cliente C ON P.id_cliente = C.id_cliente WHERE id_pedidos = $pedidos");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = @count($res);

$cliente = $res[0]['nome'];
$data = $res[0]['nome'];

echo <<<HTML
    <div class="row">
        <div class="col-12"><b>Cliente: </b>{$cliente}</div>
</div>
<div class="row">
        <div class="col-6"><b>Data: </b></div>
        <div class="col-6"><b>Pacote: </b></div>
</div>
<div class="row">
        <div class="col-12"><b>Equipe: </b></div>
</div>
<div class="row">
        <div class="col-4"><b>Valor do Projeto: </b></div>
        <div class="col-4"><b>Valor Total: </b>R$</div>
         <div class="col-4"><b>Data de Cadastro: </b></div>
</div>
<div class="row">
        <div class="col-6"><b>Status do projeto: </b></div>
        <div class="col-6"><b>Tem Módulo? </b></div>
</div>
<hr>
<div class="row">
      
</div>
HTML;