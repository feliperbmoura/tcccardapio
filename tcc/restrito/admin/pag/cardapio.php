<?php
require_once('../../conexao.php');
?>
<div class="container" id="container">
<div class="row">
    <div id="button-inserir">
        <button class="btn btn-success" onclick="inserir()">Inserir</button>
    </div>
</div>

<div class="row scroll" id="listar">
    
</div>
</div>

<!-- modal -->
<div class="modal fade" id="modalinserir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="titulo"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form">
        <input type="hidden" class="form-control" id="txtCod" name="txtCod" placeholder="Nome do produto">
            <div class="row">
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Produto</label>
                    <input type="text" class="form-control" id="txtProduto" name="txtProduto" placeholder="Nome do produto">
                </div>
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Preço</label>
                    <input type="text" class="form-control" id="txtPreco" name="txtPreco" placeholder="ex 9.50">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Categoria</label>
                    <select class="form-select" aria-label="Default select example" id="txtCat" name="txtCat">
                    <option selected value="0">Selecione a categoria</option>
                        <?php
                            $query = $pdo->query("SELECT * FROM categoria  ORDER BY categoria ASC");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            $total = @count($res);

                            if($total > 0){
                                for($i=0; $i<$total;$i++){
                                    $id = $res[$i]['id_categoria'];
                                    $categoria=$res[$i]['categoria'];
                                    echo "<option value='{$id}'>{$categoria}</option>";
                                }
                            }else{
                                echo "<option value='0'>Nenhuma Categoria Cadastrada</option>";
                            }
                        ?>
                    </select>
                </div>
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Fornecedor</label>
                    <select class="form-select" aria-label="Default select example" id="txtForn" name="txtForn">
                    <option selected value="0">Selecione o fornecedor</option>
                        <?php
                            $query = $pdo->query("SELECT * FROM fornecedor  ORDER BY fornecedor ASC");
                            $res = $query->fetchAll(PDO::FETCH_ASSOC);
                            $total = @count($res);

                            if($total > 0){
                                for($i=0; $i<$total;$i++){
                                    $id = $res[$i]['id_fornecedor'];
                                    $fornecedor=$res[$i]['fornecedor'];
                                    echo "<option value='{$id}'>{$fornecedor}</option>";
                                }
                            }else{
                                echo "<option value='0'>Nenhum fornecedor Cadastrado</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">QTD</label>
                    <input type="number" class="form-control" id="txtQtd" name="txtQtd" placeholder="name@example.com">
                </div>
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">QTD Min.</label>
                    <input type="number" class="form-control" id="txtQtdM" name="txtQtdM" placeholder="name@example.com">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Validade</label>
                    <input type="date" class="form-control" id="txtValidade" name="txtValidade" placeholder="name@example.com">
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="exampleFormControlInput1" class="form-label">Descrição</label>
                    <textarea class="tinymce" data-tinymce="data-tinymce" name="txtdesc" id="txtdesc"></textarea>
                    <!-- <textarea id="txtdesc" name="txtdesc"></textarea> -->
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="txtfoto" name="txtfoto"  onChange="carregarIMG();">
                </div>
                <div class="col-6">
                    <div id="divIMG">
                        <img src="../../imagens/dounts/sem-foto.jpg" id="target" width="100px">
                    </div>
                </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar</button>
        </form>  
    </div>
    </div>
  </div>
</div>


<script src="../../vendor/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
<script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        listarcardapio();
        tinymce.init({
            selector: 'textarea',
            license_key: 'gpl'
        });
    });

    function listarcardapio(pagina){
        $("#pagina").val(pagina);

        var busca = $("#buscar").val();
        $.ajax({
            url: 'pag/cardapio/listar.php',
            method: 'POST',
            data: {busca,pagina},
            dataType: "html",
            success: function(result){
                $("#listar").html(result);
            }
        });
    }

    function inserir(){
        limpar();
        $("#titulo").text("Inserir Produto");
        $("#modalinserir").modal('show');
    }

    $("#form").submit(function () {
        tinymce.activeEditor.setProgressState(true);
        tinymce.triggerSave();
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "pag/cardapio/cadastrar.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                if (mensagem.trim() == "salvo com sucesso") {
                   listarcardapio();
                tinymce.activeEditor.setProgressState(false);
                   $('#modalinserir').modal('hide');
                } else {
                    alert(mensagem);
            }


        },

        cache: false,
        contentType: false,
        processData: false,

        });

    });

    function carregarIMG() {
        var target = document.getElementById('target');
        var file = document.querySelector("#txtfoto").files[0];

        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }


</script>