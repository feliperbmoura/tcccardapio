<?php 
@session_start();
require_once('../../../../conexao.php');

$busca = '%' . @$_POST['busca']. '%';

if(@$_POST['pagina'] == ""){
    @$_POST['pagina'] = 0;
}

$pagina = intval(@$_POST['pagina']);
$limite = $pagina * 10;

$query = $pdo->query("SELECT P.*, C.nome FROM pedidos P INNER JOIN cliente C ON P.id_cliente = C.id_cliente");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = @count($res);

if($total > 0){
  echo <<<HTML
  <table class='table'>
    <thead>
      <tr>
        <th scope='col'>Código</th>
        <th scope='col'>Cliente</th>
        <th scope='col'>Valor</th>
        <th scope='col'>Status</th>
        <th scope='col'>Ações</th>
      </tr>
    </thead>
    <tbody>                        
  HTML;

  for($i=0; $i<=$total-1;$i++){
      $codigo = $res[$i]['id_pedidos'];
      $cliente = $res[$i]['nome'];
      $valor = $res[$i]['valor'];
      $status = $res[$i]['status'];
      

      if($status == 1){
          $status_extenso = 'Em Preparação';
      }else{
          if($status == 2){
              $status_extenso = 'Aguardando Cliente';
          }else{
              $status_extenso = 'Finalizado';
          }
      }

    echo <<<HTML
<tr>
<th scope='row'>{$codigo}</th>   
<td>{$cliente}</td>   
<td>{$valor}</td> 
<td>{$status_extenso}</td>
<td>
</td>                          
HTML;
  }

  echo <<<HTML
</tbody>
</table>                       
HTML;
}
?>
<script type="text/javascript">
  
</script>
