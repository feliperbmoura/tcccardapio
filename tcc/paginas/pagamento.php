    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
          
        body{
            background-color: #562b2db4;
            color: white;
        }

        #qrcode, #boleto {
            display: none; /* Oculto por padrão */
            margin-top: 20px;
        }

        #qrcode img, #boleto img {
            max-width: 250px; /* Ajustar tamanho do QR Code e código de barras */
            height: auto;
            display: block;
            margin: 0 auto;
        }

        #cartao-info {
            display: none; /* Campos de cartão ocultos por padrão */
            margin-top: 20px;
        }

        #pagamento-recebido {
            display: none;
            margin-top: 20px;
        }

        #login-section {
            display: none;
            margin-top: 20px;
        }

        .container {
            max-width: 600px;
        }
    </style>

<div class="container mt-5" style="background-color: #562b2d; padding: 20px; margin-bottom: 300px; " >
    <h1>Pagamento</h1>
    <p id="total" style="color: #ffcb45"></p>

    <!-- Opções de pagamento -->
    <div class="mb-3">
        <label for="paymentMethod" class="form-label">Selecione a forma de pagamento:</label>
        <select class="form-select" id="paymentMethod" onchange="showPaymentOption()">
            <option value="">Escolha uma opção</option>
            <option value="pix">PIX</option>
            <option value="cartao">Cartão de Crédito/Débito</option>
        </select>
    </div>

    <!-- QR Code para PIX -->
    <div id="qrcode">
        <h5>Use o QR Code abaixo para pagar com PIX:</h5>
        <img id="qrcode-img" src="" alt="QR Code PIX"> <!-- A imagem do QR Code será gerada dinamicamente -->
        <p></p>
        <button class="btn btn-success mt-3" onclick="finalizarPagamento('pix')">Pagamento Realizado</button>
    </div>

    <!-- Boleto Bancário -->
    <div id="boleto">
        <h5>Pague com o boleto bancário:</h5>
        <p>Código de barras:</p>
        <img id="boleto-img" src="" alt="Código de Barras Boleto">
        <p><strong>Vencimento:</strong> 30 dias a partir da data de emissão</p>
        <button class="btn btn-success mt-3" onclick="finalizarPagamento('boleto')">Boleto Pago</button>
    </div>

    <!-- Formulário de Cartão de Crédito/Débito -->
    <div id="cartao-info">
        <h5>Insira os dados do cartão:</h5>
        <form onsubmit="event.preventDefault(); finalizarPagamento('cartao');">
            <div class="mb-3">
                <label for="nomeCartao" class="form-label">Nome no Cartão</label>
                <input type="text" class="form-control" id="nomeCartao" placeholder="Nome Completo">
            </div>
            <div class="mb-3">
                <label for="numeroCartao" class="form-label">Número do Cartão</label>
                <input type="text" class="form-control" id="numeroCartao" placeholder="XXXX XXXX XXXX XXXX">
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="validadeCartao" class="form-label">Data de Validade</label>
                    <input type="text" class="form-control" id="validadeCartao" placeholder="MM/AA">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cvvCartao" class="form-label">CVV</label>
                    <input type="text" class="form-control" id="cvvCartao" placeholder="XXX">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Finalizar Compra</button>
        </form>
    </div>

    <!-- Mensagem de pagamento recebido -->
    <div id="pagamento-recebido" class="alert alert-success">
        <h4 class="alert-heading">Pagamento Recebido com Sucesso!</h4>
        <p>Seu pagamento esta sendo processado e liberado apos contado com WhatsApp. Agora você pode fazer login abaixo:</p>
        <p>Favor enviar a mensagem automatica que esta no WhatsApp para dar procedimento no Login e senha dos produtos comprados</p>
    </div>
    
</div>

<script>
    // Pega o valor total da URL
    const urlParams = new URLSearchParams(window.location.search);
    const total = urlParams.get('total');

    document.getElementById('total').textContent = `Preço Total: R$ ${total}`;

    // Função para exibir a forma de pagamento selecionada
    function showPaymentOption() {
        const paymentMethod = document.getElementById('paymentMethod').value;
        const qrcode = document.getElementById('qrcode');
        const boleto = document.getElementById('boleto');
        const cartaoInfo = document.getElementById('cartao-info');

        if (paymentMethod === 'pix') {
            qrcode.style.display = 'block';
            boleto.style.display = 'none';
            cartaoInfo.style.display = 'none';
            gerarQRCode(total); // Gera o QR Code com o valor total
        } else if (paymentMethod === 'cartao') {
            cartaoInfo.style.display = 'block';
            boleto.style.display = 'none';
            qrcode.style.display = 'none';
        } else {
            qrcode.style.display = 'none';
            boleto.style.display = 'none';
            cartaoInfo.style.display = 'none';
        }
    }

    // Função para gerar o QR Code PIX dinamicamente
    function gerarQRCode(total) {
        const chavePix = "14999099300";  // Coloque sua chave PIX aqui
        const nomeRecebedor = "VisiConnet"; // Nome do recebedor
        const cidadeRecebedor = "São-Paulo"; // Cidade do recebedor
        const valor = parseFloat(total).toFixed(2);

        // Gerar um código do padrão PIX, simples
        const pixCode = `00020126330014BR.GOV.BCB.PIX0114${chavePix}5204000053039865404${valor}5802BR5925${nomeRecebedor}6006${cidadeRecebedor}62070503***`;

        // Usando uma API pública para gerar o QR Code do PIX
        const urlQRCode = `https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=${encodeURIComponent(pixCode)}`;

        document.getElementById("qrcode-img").src = urlQRCode;
    }


    // Função para finalizar o pagamento e enviar mensagem para o WhatsApp
    function finalizarPagamento(metodo) {
        // document.getElementById('pagamento-recebido').style.display = 'block';
        // document.getElementById('login-section').style.display = 'block';


        let mensagem = '';
        if (metodo === 'pix') {
            mensagem = 'PIX concedido com sucesso. Verifique sua conta se consta o PIX.';
        }

        $.ajax({
            url: "paginas/pedidos/cadastrar.php?metodo="+metodo,
            type: 'POST',

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
        location.href = 'index.php?pag=finalizar'
        // Enviar a mensagem para o WhatsApp
        const numeroWhatsApp = '14991314963';
        const urlWhatsApp = `https://wa.me/${numeroWhatsApp}?text=${encodeURIComponent(mensagem)}`;
        window.open(urlWhatsApp, '_blank'); // Abre o WhatsApp em uma nova aba com a mensagem pronta
    }

    
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>











<!--
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
-->