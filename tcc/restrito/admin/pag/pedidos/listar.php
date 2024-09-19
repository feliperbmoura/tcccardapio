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
HTML;
      if($status !=0)
  echo <<<HTML
  <button class="btn btn-warning" onclick="atualizar('{$codigo}','{$status}')">Atualizar Pedido</button>
HTML;
echo <<<HTML
  <button class="btn btn-danger" onclick="ver('{$codigo}')">Ver Itens</button>
</td>                          
HTML;
  }

  echo <<<HTML
</tbody>
</table>                       
HTML;
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
  function atualizar(codigo,status){
    if(status == 1){
      var pedido = "Aguardando cliente";
    }else{
      var pedido = "Finalizado";
    }
      Swal.fire({
          title: "Deseja realmente atualizar o status para "+pedido,
          showDenyButton: true,
          showCancelButton: false,
          confirmButtonText: "Sim",
          denyButtonText: `Não`
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          $.ajax({
            url: 'pag/pedidos/atualizar.php',
            method: 'POST',
            data: {codigo,status},
            dataType: "html",
            success: function (mensagem) {
                      if (mensagem.trim() == "salvo com sucesso") {
                        Swal.fire("Pedido atualizado com sucesso!", "", "success");
                        listarpedido();
                      } else {
                          alert(mensagem);
                  }


              }
          });
        }
      });
  }

  function ver(pedido){
    $.ajax({
            url: 'pag/pedidos/itens.php',
            method: 'POST',
            data: {pedido},
            dataType: "html",
            success: function(result){
              console.log(result);
                $("#listaritens").html(result);
                $("#modalitens").modal('show');
            }
        });
  }
</script>
