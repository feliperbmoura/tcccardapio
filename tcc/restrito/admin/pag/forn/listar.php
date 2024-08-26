<?php 
@session_start();
require_once('../../../../conexao.php');

$busca = '%' . @$_POST['busca']. '%';

if(@$_POST['pagina'] == ""){
    @$_POST['pagina'] = 0;
}

$pagina = intval(@$_POST['pagina']);
$limite = $pagina * 10;

$query = $pdo->query("SELECT * FROM fornecedor ORDER BY fornecedor ASC LIMIT $limite,10");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = @count($res);

if($total > 0){
  echo <<<HTML
  <table class='table'>
    <thead>
      <tr>
        <th scope='col'>Código</th>
        <th scope='col'>Fornecedor</th>
        <th scope='col'>Telefone</th>
        <th scope='col'>Cidade</th>
        <th scope='col'>Ações</th>
      </tr>
    </thead>
    <tbody>                        
  HTML;

  for($i=0; $i<=$total-1;$i++){
      $codigo = $res[$i]['id_fornecedor'];
      $nome = $res[$i]['fornecedor'];
      $cnpj = $res[$i]['cnpj'];
      $endereco = $res[$i]['endereco'];
      $nro = $res[$i]['nro'];
      $cidade = $res[$i]['cidade'];
      $uf = $res[$i]['uf'];
      $cep = $res[$i]['cep'];
      $telefone = $res[$i]['telefone'];

    echo <<<HTML
<tr>
<th scope='row'>{$codigo}</th>   
<td>{$nome}</td>   
<td>{$telefone}</td> 
<td>{$cidade}</td>
<td><button class="btn btn-warning" onclick="editar('{$codigo}','{$nome}','{$cnpj}','{$endereco}','{$nro}','{$cidade}','{$uf}','{$cep}','{$telefone}')">Editar</button>
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
  function editar(codigo,nome,cnpj,endereco,nro,cidade,uf,cep,telefone){
    limpar();
    $("#titulo").text("Editar Fornecedor");
    $('#txtForn').val(nome);
    $('#txtCNPJ').val(cnpj);
    $('#txtEnd').val(endereco);
    $('#txtNro').val(nro);
    $('#txtCidade').val(cidade);
    $('#txtUF').val(uf);
    $('#txtCEP').val(cep);
    $('#txtFone').val(telefone);
    $('#txtCod').val(codigo);
    
    $("#modalinserir").modal('show');
  }

  function excluir(codigo){
    $.ajax({
      url: 'pag/forn/excluir.php',
      method: 'POST',
      data: {codigo},
      dataType: "html",
      success: function (mensagem) {
                if (mensagem.trim() == "salvo com sucesso") {
                    listarforn();
                   $('#modalinserir').modal('hide');
                } else {
                    alert(mensagem);
            }


        }
    });
  }

  function limpar()
  {
    $('#txtForn').val('');
    $('#txtCNPJ').val('');
    $('#txtEnd').val('');
    $('#txtNro').val('');
    $('#txtCidade').val('');
    $('#txtUF').val('');
    $('#txtCEP').val('');
    $('#txtCod').val('');
    $('#txtFone').val();
  }
</script>
