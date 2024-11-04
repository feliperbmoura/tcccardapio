<h1 id="titulo">
    Seus Pedidos
</h1>

<script src="../src/javascript/script.js"></script>
<?php
$sub = 0;
if (isset($_SESSION['usuario'])) {
    if (isset($_SESSION['carrinho'])) {
       foreach($_SESSION['carrinho'] as $c){
           $sub = $sub+$c['preco']; 
          
        ?>          
                    <div id="card-box">
                        <div id="carrinho-conteudo">
                            <img src="imagens/<?=$c['foto']?>" class="dish-image" alt="" >
                            <div id="descricao">

                                <div id="valor">

                                    <h5 class="card-title"><?=$c['nome']?></h5>
                                    <p class="card-text">R$<?=$c['preco']?></p>
                                </div>

                            </div>
                        </div>
                        <a href="#" class="btn-default" style="color: white; text-decoration: none; border-radius: 0; border-bottom-left-radius: 10px;" onclick="personalizar()">Personalizar</a>
                    </div>
                    
        
        <?php 
       }

       ?>
        <div id="add-mais">
            <a href="index.php?pag=menu" id="">Adicionar mais   </a>
        </div>
    <div id="pagamento">
        <p> Total: R$<?=$sub?></p>

        <div id="linha"></div>

        <div id="pagar">
            <a class="btn-default btn"href="index.php?pag=pagamento">Finalizar</a>
            <button class=""onclick="cancelar()">Cancelar :(</button>
        </div>
    </div>

       <?php
    } else {
        echo '
    <h4 style="text-align: center;">Ahhh! parece que seu carrinho está vazio</h4>
    <div id="add-mais">
        <a href="index.php?pag=menu" id="">Adicionar</a>
    </div>';
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