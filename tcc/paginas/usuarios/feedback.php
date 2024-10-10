<form id="formdepoimento">
    <textarea name="txtdepoimento" id="txtdepoimento" cols="30" rows="10"></textarea>
    <button>Enviar</button>
</form>

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