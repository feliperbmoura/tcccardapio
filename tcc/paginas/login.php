<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/styles/login.css">
    <title>Login</title>
</head>
<body>
<?php
if (isset($_SESSION['usuario'])) {
       $pagina = @$_GET['pagina'];

       if(empty($pagina)){
           $pagina = 'home.php';
       }else{
           $pagina = $pagina.'.php';
       }
           require_once('paginas/usuarios/'.$pagina);
} else {
    ?>
    <main id="content">
        <form id="formlogin">

        <img src="imagens/logo.png" alt="logo">
                
            <div id="txt1">
                <h2>Faça seu login</h2>
            </div>           

                <div id="email">
                    <label for="txtLogin" class="form-label">Digite seu email</label>
                    <input type="email" class="form-control" id="txtLogin" name="txtLogin" placeholder="name@example.com">
                </div>

                <div id="senha">
                    <label for="txtSenha" class="form-label">Digite sua senha</label>
                    <input type="password" class="form-control" id="txtSenha" name="txtSenha" placeholder="123">
                </div>

                            
                <div id="remember">

                <span>
                    <input type="checkbox" id="txtCheckbox" name="txtCheckbox">
                    <label for="txtCheckbox">Lembrar senha</label>
                </span>

                <a href="index.php?pag=cadastro">Não tenho conta</a>
                </div>    


                <button type="submit" id="botao">Entrar</button>


        </form>
    </main>
</body>
</html>


















    <?php
}
?>


<script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script type="text/javascript">

    $("#formlogin").submit(function () {

        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "paginas/login/autenticar.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                $('#mensagem').text('');
                $('#mensagem').removeClass()
                if (mensagem.trim() == "salvo com sucesso") {
                    window.location='index.php';
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
