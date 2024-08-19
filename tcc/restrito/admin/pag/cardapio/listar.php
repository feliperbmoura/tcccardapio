<?php 
@session_start();
require_once('../../../../conexao.php');

$busca = '%' . @$_POST['busca']. '%';

if(@$_POST['pagina'] == ""){
    @$_POST['pagina'] = 0;
}

$pagina = intval(@$_POST['pagina']);
$limite = $pagina * 10;

$query = $pdo->query("SELECT * FROM produtos  ORDER BY nome ASC LIMIT $limite,10");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = @count($res);

if($total > 0){
  echo <<<HTML
  <table class='table'>
    <thead>
      <tr>
        <th scope='col'>Código</th>
        <th scope='col'>Produto</th>
        <th scope='col'>Preço</th>
        <th scope='col'>Fornecedor</th>
        <th scope='col'>Quantidade</th>
        <th scope='col'>Categoria</th>
        <th scope='col'>Ações</th>
      </tr>
    </thead>
    <tbody>                        
  HTML;

  for($i=0; $i<=$total-1;$i++){
      $codigo = $res[$i]['id_produto'];
      $nome = $res[$i]['nome'];
      $preco = $res[$i]['preco'];
      $forn = $res[$i]['fornecedor'];
      $qtd = $res[$i]['quantidade'];
      $cat = $res[$i]['categoria'];
      $qtdm = $res[$i]['quantidade_min'];
      $validade = $res[$i]['data_validade'];
      $desc = $res[$i]['descricao'];
      $foto = $res[$i]['foto'];

    echo <<<HTML
<tr>
<th scope='row'>{$codigo}</th>   
<td>{$nome}</td>   
<td>{$preco}</td> 
<td>{$forn}</td>
<td>{$qtd}</td> 
<td>{$cat}</td>   
<td><button class="btn btn-warning" onclick="editar('{$codigo}','{$nome}','{$preco}','{$cat}','{$forn}','{$qtd}','{$qtdm}','{$validade}','{$desc}','{$foto}')">Editar</button>
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
  function editar(codigo,nome,preco,categoria,fornecedor,qtd,qtdm,validade,descricao,foto){
    $("#titulo").text("Editar Produto");
    $('#txtProduto').val(nome);
    $('#txtPreco').val(preco);
    $('#txtCat').val(categoria);
    $('#txtForn').val(fornecedor);
    $('#txtQtd').val(qtd);
    $('#txtQtdM').val(qtdm);
    $('#txtValidade').val(validade);
    $('#txtdesc').val(descricao);
    $('#txtCod').val(codigo);

    
    $("#modalinserir").modal('show');
  }

  function excluir(codigo){
    $.ajax({
      url: 'pag/cardapio/excluir.php',
      method: 'POST',
      data: {codigo},
      dataType: "html",
      success: function (mensagem) {
                if (mensagem.trim() == "salvo com sucesso") {
                   listarcardapio();
                   $('#modalinserir').modal('hide');
                } else {
                    alert(mensagem);
            }


        }
    });
  }
</script>
