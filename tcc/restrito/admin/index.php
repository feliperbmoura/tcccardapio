<?php 
$pag = @$_GET['pag'];

if(empty($pag)){
    $pag = 'dash.php';
}else{
    $pag = $pag.'.php';
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../src/styles/dashboard.css">
    <link rel="stylesheet" href="../../src/styles/footer.css">
  </head>
  <body>
    <nav class="nav-bar">
    <img src="../../imagens/logo-name.png" alt="Logo" id="nav-logo">
    <a href="index.php">Dashboard</a>
    <a href="index.php?pag=cardapio">Cardápio</a>
    <a href="index.php?pag=categoria">Categoria</a>
    <a href="index.php?pag=fornecedor">Fornecedor</a>
    <a href="index.php?pag=pedidos">Pedidos</a>
  </nav>
    <?php 
    require_once('pag/'.$pag)
  ?>


<footer>
        <img src="../../../imagens/wave.svg" alt="">

        <div id="footer_items">
            <span id="copyright" style="color: white;">
                &copy 2024 Dubah Donuts Desenvolvido pelos alunos da Etec Antônio Devisate de Marília SP 
            </span>

            <div class="social-media-buttons">
                <a href="#">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>

                <a href="#">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="#">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div>
        </div>
    </footer>
  </body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>