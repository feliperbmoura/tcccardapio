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
                    <input type="text" class="form-control" id="txtForn" name="txtForn" placeholder="Nome do fornecedor">
                </div>
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">CNPJ</label>
                    <input type="text" class="form-control" id="txtCNPJ" name="txtCNPJ" placeholder="ex 9.50">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="txtEnd" name="txtEnd" placeholder="ex 9.50">
                </div>
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Nro</label>
                    <input type="text" class="form-control" id="txtNro" name="txtNro" placeholder="ex 9.50">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="txtCidade" name="txtCidade" placeholder="ex 9.50">
                </div>
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">UF</label>
                    <input type="text" class="form-control" id="txtUF" name="txtUF" placeholder="ex 9.50">
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">CEP</label>
                    <input type="text" class="form-control" id="txtCEP" name="txtCEP" placeholder="ex 9.50">
                </div>
                <div class="col-6">
                    <label for="exampleFormControlInput1" class="form-label">Telefone</label>
                    <input type="text" class="form-control" id="txtFone" name="txtFone" placeholder="ex 9.50">
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
        listarforn();
    });

    function listarforn(pagina){
        $("#pagina").val(pagina);

        var busca = $("#buscar").val();
        $.ajax({
            url: 'pag/forn/listar.php',
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
        $("#titulo").text("Inserir Fornecedor");
        $("#modalinserir").modal('show');
    }

    $("#form").submit(function () {
        
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "pag/forn/salvar.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                if (mensagem.trim() == "salvo com sucesso") {
                    listarforn();
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