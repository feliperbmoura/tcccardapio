<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>



<style>


@media screen and (min-width: 30em) {

.w-70 {

width: 70%;

}

}

#bloco-confirma {

border-radius: .5rem;

background: #562b2d;

padding: 2rem;

margin-bottom: 200px;
}
</style>



</head>
<body>
<div class="w-70" style="padding-left: 1em; padding-right: 1em; margin-left: auto; margin-right: auto" id="status-pedido-c">

<p style="font-size: 2.90rem; margin-top: 20px; color: white;">Pedido Confirmado</p>

<div id="bloco-confirma">

<span style="font-size: 2rem; color: white; font-weight: 600">Seu pedido foi realizado com sucesso.</span>

<p><span style="color: white; font-size: 2rem">Em breve seu pedido ficara pronto<strong id="email"></strong>, fique atentento ao nosso site!</span></p></div>

</div>


</div>

</div>

<script>
    setTimeout(() => {
      location.href = 'index.php?pag=menu'
    }, 3500)

    document.getElementById('pagamento-recebido').style.display = 'block';

  </script>
</body>
</html>



