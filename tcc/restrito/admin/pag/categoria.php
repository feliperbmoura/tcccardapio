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
        <input type="hidden" class="form-control" id="txtCod" name="txtCod" placeholder="Nome do produto">
            <div class="row">
                <div class="col-12">
                    <label for="exampleFormControlInput1" class="form-label">Categoria</label>
                    <input type="text" class="form-control" id="txtCategoria" name="txtCategoria" placeholder="Nome do produto">
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
        listarcategoria();
    });

    function listarcategoria(pagina){
        $("#pagina").val(pagina);

        var busca = $("#buscar").val();
        $.ajax({
            url: 'pag/categoria/listar.php',
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
        $("#titulo").text("Inserir Categoria");
        $("#modalinserir").modal('show');
    }

    $("#form").submit(function () {
        
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "pag/categoria/salvar.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                if (mensagem.trim() == "salvo com sucesso") {
                    listarcategoria();
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