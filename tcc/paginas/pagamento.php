<form id="form">
<input type="radio" id="pix" name="fav_language" value="PIX">
<label for="pix">PIX</label><br>
<div class="campopix" id="campopix">
<input type="text" placeholder="Digite a chave pix">
</div>
<input type="radio" id="credito" name="fav_language" value="Credito">
<label for="credito">Crédito</label><br>
<div class="campocredito" id="campocredito">
<input type="text" placeholder="Digite o numero do cartão">
<input type="text" placeholder="Digite a data de validade">
<input type="text" placeholder="Digite a chave d cartão">
</div>
<input type="radio" id="debito" name="fav_language" value="Debito">
<label for="debito">Débito</label>
<div class="campodebito" id="campodebito">
<input type="text" placeholder="Digite o numero do cartão">
<input type="text" placeholder="Digite a data de validade">
<input type="text" placeholder="Digite a chave d cartão">
</div>

<button type="submit">Finalizar</button>
</form>

<script>
    $(document).ready(function() {
        $('#campopix').hide();
        $('#campocredito').hide();
        $('#campodebito').hide();

        $('input:radio[name="fav_language"]').change(function() {
            // aqui, this é o radio quem foi clicado, então basta comparar o valor com val()
            if ($(this).val() == "PIX") {
                $('#campopix').show();
            } else {
            $('#campopix').hide();
            }

            if ($(this).val() == "Credito") {
                $('#campocredito').show();
            } else {
            $('#campocredito').hide();
            }

            if ($(this).val() == "Debito") {
                $('#campodebito').show();
            } else {
            $('#campodebito').hide();
            }
        });
    });

    $("#form").submit(function () {
        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "paginas/pedidos/cadastrar.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                if (mensagem.trim() == "salvo com sucesso") {
                    window.location.assign("index.php?pag=finalizar");
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