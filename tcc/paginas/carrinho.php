<?php
$sub = 0;
session_start();
if (isset($_SESSION['usuario'])) {
    if (isset($_SESSION['carrinho'])) {
       foreach($_SESSION['carrinho'] as $c){
           $sub = $sub+$c['preco']; 
          
        ?>
        <div class="row">
            <div class="col-8">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?=$c['nome']?></h5>
                        <p class="card-text"><?=$c['preco']?></p>
                        <a href="#" class="btn btn-primary" onclick="personalizar()">Personalizar</a>
                    </div>
                </div>
            </div>
        </div>
        
        <?php 
       }
       
       ?>
       Subtototal: <?=$sub?>

       <a href="index.php?pag=pagamento">Pagamento</button>
       <button onclick="cancelar()">Cancelar</button>
       <?php
    } else {
        echo 'Ahhh! Seu carrinho está vazio, que tal fazer uma compra :)';
    }
} else {
    header('Location: index.php?pag=login');
}
?>
<div class="modal fade" id="modalPersonalizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Personalizar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form></form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Salvar</button>
      </div>
    </div>
  </div>
</div>

<script>
    function personalizar(){
        $("#modalPersonalizar").modal('show');
    }

    function cancelar(){
        $.ajax({
            url: "paginas/pedidos/cancelar.php",
            type: 'POST',

            success: function (mensagem) {
                if (mensagem.trim() == "salvo com sucesso") {
                    window.location.assign("index.php?pag=menu");
                } else {
                    alert(mensagem);
            }
        },

        cache: false,
        contentType: false,
        processData: false,

        });
    }

</script>