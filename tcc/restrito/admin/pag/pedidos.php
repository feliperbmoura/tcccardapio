<?php
require_once('../../conexao.php');
?>
<div class="row" id="listar">
    
</div>

<div class="modal fade" id="modalitens" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="titulo">Itens do Pedido</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="listaritens"></div>
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
        listarpedido();
    });

    function listarpedido(pagina){
        $("#pagina").val(pagina);

        var busca = $("#buscar").val();
        $.ajax({
            url: 'pag/pedidos/listar.php',
            method: 'POST',
            data: {busca,pagina},
            dataType: "html",
            success: function(result){
                $("#listar").html(result);
            }
        });
    }

</script>