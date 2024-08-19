<div class="row">
    <div class="col-12">
        <button class="btn btn-success" onclick="inserir()">Inserir</button>
    </div>
</div>

<div class="row" id="listar">
    
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
        <input type="text" class="form-control" id="txtCod" name="txtCod" placeholder="Nome do produto">
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
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Fornecedor</label>
                    <select class="form-select" aria-label="Default select example" id="txtForn" name="txtForn">
                        <option selected value="0">Selecione o Fornecedor</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
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
                    <textarea id="txtdesc" name="txtdesc" ></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="exampleFormControlInput1" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="txtfoto" name="txtfoto" placeholder="name@example.com">
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

<script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(){
        listarcardapio();
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
        $("#titulo").text("Inserir Produto");
        $("#modalinserir").modal('show');
    }

    $("#form").submit(function () {
        
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "pag/cardapio/cadastrar.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                if (mensagem.trim() == "salvo com sucesso") {
                   listarcardapio();
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
</script>