<?php 
@session_start();
require_once('../../../../conexao.php');

$busca = '%' . @$_POST['busca']. '%';

if(@$_POST['pagina'] == ""){
    @$_POST['pagina'] = 0;
}

$pagina = intval(@$_POST['pagina']);
$limite = $pagina * 10;

$query = $pdo->query("SELECT * FROM categoria  ORDER BY categoria ASC LIMIT $limite,10");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = @count($res);

if($total > 0){
  echo <<<HTML
  <table class='table'>
    <thead>
      <tr>
        <th scope='col'>Código</th>
        <th scope='col'>Categoria</th>
        <th scope='col'>Ações</th>
      </tr>
    </thead>
    <tbody>                        
  HTML;

  for($i=0; $i<=$total-1;$i++){
      $codigo = $res[$i]['id_categoria'];
      $nome = $res[$i]['categoria'];

    echo <<<HTML
<tr>
<th scope='row'>{$codigo}</th>   
<td>{$nome}</td>     
<td><button class="btn btn-warning" onclick="editar('{$codigo}','{$nome}')">Editar</button>
<button class="btn btn-danger" onclick="excluir('{$codigo}')">Excluir</button>
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
  function editar(codigo,nome){
    limpar();
    $("#titulo").text("Editar Produto");
    $('#txtCategoria').val(nome);
    $('#txtCod').val(codigo);    
    $("#modalinserir").modal('show');
  }

  function excluir(codigo){
    $.ajax({
      url: 'pag/categoria/excluir.php',
      method: 'POST',
      data: {codigo},
      dataType: "html",
      success: function (mensagem) {
                if (mensagem.trim() == "salvo com sucesso") {
                   listarcategoria();
                   $('#modalinserir').modal('hide');
                } else {
                    alert(mensagem);
            }


        }
    });
  }

  function limpar()
  {
    $('#txtCategoria').val('');
    $('#txtCod').val('');
  }
</script>
