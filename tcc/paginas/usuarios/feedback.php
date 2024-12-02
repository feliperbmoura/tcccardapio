
<!--<form id="formdepoimento">
    <textarea name="txtdepoimento" id="txtdepoimento" cols="30" rows="10"></textarea>
    <button>Enviar</button>
</form>-->


<section id="testimonials" style="margin-top: -100px;">
            <img src="imagens/logo.png" id="testimonial_chef" alt="">

            <div id="testimonials_content">
            <h3 class="section-subtitle">
                    Envie seu feedback
                </h3>

            <form id="formdepoimento" style="">
                <textarea name="txtdepoimento" id="txtdepoimento"  style="border: none; resize: none; padding: 10px; border-radius: 20px;" placeholder="Digite seu feedback" maxlength="250" rezise="none"></textarea>
                <br>
                <button class="btn " id="btn-enviar">Enviar</button>
            </form>


               
            <a href="index.php?pag=feedback" class="btn btn-default" style="margin-top: 10px;">
                    Ver mais avaliações
                </a>

            </div>

            
        </section>





<script type="text/javascript">
$("#formdepoimento").submit(function () {

    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: "paginas/usuarios/cadastrar_back.php",
        type: 'POST',
        data: formData,

        success: function (mensagem) {
            if (mensagem.trim() == "salvo com sucesso") {
                alert(mensagem);
                // window.location='index.php?pag=login';
            } else {
                Swal.fire({
                icon: "error",
                title: "Oops...",
                text: mensagem,
                });
            }


        },

        cache: false,
        contentType: false,
        processData: false,

    });

});
</script>