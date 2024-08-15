<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/styles/cadastro.css">
    <title>Document</title>
</head>
<body>
    <main>
        <form id="form">
                
        <img src="imagens/logo.png" alt="logo">

                <div id="txt1">
                    <h2>Cadastre-se</h2>
                </div>           
             
            
            <div id="email">   
                <label for="txtNome" class="form-label">Digite seu nome</label>
                <input type="text" class="form-control" id="txtNome" name="txtNome" placeholder="Nome" required>
            </div>        
             
            <div id="email">
                <label for="txtEmail" class="form-label">Digite seu Email</label>
                <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email" required>
            </div>      
            
            <div id="senha">
                <label for="txtSenha" class="form-label">Digite sua senha</label>
                <input type="password" class="form-control" id="txtSenha" name="txtSenha" placeholder="Senha" required>    
            <div id="senha2">
                <label for="txtCsenha" class="form-label">Confirma a senha</label>
                <input type="password" class="form-control" id="txtCsenha" name="txtCsenha" placeholder="Confirmar senha" required>
            </div>
            </div>      
              
            <div>
                <button type="submit" id="botao">Salvar</button>
            </div>

            <div id="login">
                <a href="index.php?pag=login" style=" color: white; text-decoration: none;" >Já tenho uma conta </a>
            </div>       

        </form>
    </main>
</body>
</html>











<script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script type="text/javascript">

    $("#form").submit(function () {

        event.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "paginas/login/cadastrar.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                if (mensagem.trim() == "Salvo com Sucesso") {
                    alert('Cadastrado com Sucesso!');
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