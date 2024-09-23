<?php 
@session_start();
require_once('../../../../conexao.php');

$pedidos = $_POST['pedido'];

$query = $pdo->query("SELECT P.*, C.nome FROM pedidos P INNER JOIN cliente C ON P.id_cliente = C.id_cliente WHERE id_pedidos = $pedidos");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = @count($res);

$cliente = $res[0]['nome'];

$data = date("d/m/Y", strtotime($res[0]['data']));
$hora = date("H:i", strtotime($res[0]['hora']));
$forma = $res[0]['forma'];
$valor = $res[0]['valor'];
$status = $res[0]['status'];

if($status == 0){
        $status = 'Finalizado';
}else{
        if($status == 1){
                $status = 'Em preparação';
        }else{
                $status = 'Aguardando Cliente';
        }
}

echo <<<HTML
    <div class="row" id="tabela-pedidos">
        <div class="col-12"><b>Cliente: </b>{$cliente}</div>
</div>
<div class="row">
        <div class="col-6"><b>Data: </b>{$data}</div>
        <div class="col-6"><b>Hora: </b>{$hora}</div>
</div>
<div class="row">
        <div class="col-12"><b>Forma: </b>{$forma}</div>
</div>
<div class="row">
        <div class="col-6"><b>Valor: </b>R$ {$valor}</div>
        <div class="col-4"><b>Status: </b>{$status}</div>
</div>
<hr>
<div class="row">
HTML;
$query = $pdo->query("SELECT I.*,P.nome FROM itens I INNER JOIN produtos P ON I.id_produto = P.id_produto WHERE I.id_pedido = $pedidos");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = @count($res);
if($total > 0){
        echo <<<HTML
        <table class='table'>
          <thead>
            <tr>
              <th scope='col'>Produto</th>
              <th scope='col'>Valor Unitario</th>
              <th scope='col'>QTD</th>
              <th scope='col'>Subtotal</th>
            </tr>
          </thead>
          <tbody>                        
        HTML;
      
        for($i=0; $i<=$total-1;$i++){
            $produto = $res[$i]['nome'];
            $unitario = $res[$i]['valor_unitario'];
            $qtd = $res[$i]['qtd'];
            $subtotal = $res[$i]['subtotal'];
            
      
          echo <<<HTML
      <tr>
      <th scope='row'>{$produto}</th>   
      <td>{$unitario}</td>   
      <td>{$qtd}</td> 
      <td>{$subtotal}</td>
      <td>
      HTML;
        }
      
        echo <<<HTML
      </tbody>
      </table>                       
      HTML;
      }
echo <<<HTML
</div>
HTML;