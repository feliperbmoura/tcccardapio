<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <form id="formlogin">
            <div class="row text-center">
                <div class="col-12">
                    <h2>Faça seu login</h2>
                </div>
                <div class="col-3">
                    <label for="txtLogin" class="form-label">Digite seu email</label>
                    <input type="email" class="form-control" id="txtLogin" name="txtLogin"
                           placeholder="name@example.com">
                </div>
                <div class="col-3">
                    <label for="txtSenha" class="form-label">Digite sua senha</label>
                    <input type="password" class="form-control" id="txtSenha" name="txtSenha" placeholder="123">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Acessar</button>
        
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script type="text/javascript">

    $("#formlogin").submit(function () {

        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "autenticar.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                $('#mensagem').text('');
                $('#mensagem').removeClass()
                if (mensagem.trim() == "salvo com sucesso") {
                    window.location='admin/';
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
