<?php
require_once('../../conexao.php');
?>
<div class="row" id="listar">
    
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