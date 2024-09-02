<?php

require_once('../../../../conexao.php');

$produto=$_POST['txtProduto'];
$preco=$_POST['txtPreco'];
$cat=$_POST['txtCat'];
$fornecedor=$_POST['txtForn'];
$qtd=$_POST['txtQtd'];
$qtdM=$_POST['txtQtdM'];
$validade=$_POST['txtValidade'];
$descricao=$_POST['txtdesc'];
$id = $_POST['txtCod'];

echo $descricao;
exit;

//validar troca da foto
$query = $pdo->query("SELECT * FROM produtos where id_produto = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
    $foto = $res[0]['foto'];
}else{
    $foto = 'sem-foto.jpg';
}

//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['txtfoto']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../../../imagens/' .$nome_img;

$imagem_temp = @$_FILES['txtfoto']['tmp_name'];

if(@$_FILES['txtfoto']['name'] != ""){
    $ext = pathinfo($nome_img, PATHINFO_EXTENSION);
    if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){

        //EXCLUO A FOTO ANTERIOR
        if($foto != "sem-foto.jpg"){
            @unlink('../../../../imagens/'.$foto);
        }

        $foto = $nome_img;

        move_uploaded_file($imagem_temp, $caminho);
    }else{
        echo 'Extensão de Imagem não permitida!';
        exit();
    }
}


if($id == ''){
    $query = $pdo->prepare("INSERT INTO produtos(nome,preco,categoria,data_validade,quantidade,quantidade_min,descricao,fornecedor,foto) 
                                           VALUE(:nome,:preco,:categoria,:data_validade,:quantidade,:quantidade_min,:descricao,:fornecedor,:foto)");
 }else{
    $query = $pdo->prepare("UPDATE produtos SET nome=:nome,preco=:preco,categoria=:categoria,data_validade=:data_validade,quantidade=:quantidade,
                           quantidade_min=:quantidade_min,descricao=:descricao,fornecedor=:fornecedor,foto=:foto WHERE id_produto = $id");
}


$query->bindValue(":nome","$produto");
$query->bindValue(":preco","$preco");
$query->bindValue(":categoria","$cat");
$query->bindValue(":data_validade","$validade");
$query->bindValue(":quantidade","$qtd");
$query->bindValue(":quantidade_min","$qtdM");
$query->bindValue(":descricao","$descricao");
$query->bindValue(":fornecedor","$fornecedor");
$query->bindValue(":foto","$foto");
$query->execute();

echo "salvo com sucesso";