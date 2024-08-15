<?php 
$pag = @$_GET['pag'];

if(empty($pag)){
    $pag = 'home.php';
}else{
    $pag = $pag.'.php';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="src/styles/style.css">
    <link rel="stylesheet" href="src/styles/header.css">
    <link rel="stylesheet" href="src/styles/home.css">
    <link rel="stylesheet" href="src/styles/menu.css">
    <link rel="stylesheet" href="src/styles/testimonials.css">
    <link rel="stylesheet" href="src/styles/footer.css">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Dubah Donuts</title>
</head>
<body>
    <header>
        <nav id="navbar">
            <img src="imagens/logo-name.png" alt="Logo" id="nav-logo">

            <ul id="nav-list">

                <li class="nav-item active"><a href="index.php">Inicio</a></li>

                <li class="nav-item"><a href="index.php#menu">Cardapio</a></li>

                <li class="nav-item"><a href="index.php?#testimonials">Avaliações</a></li>

            </ul>

            <a class="btn btn-default" href="index.php?pag=login">
                Peça aqui
            </a>
            
            <button id="mobile-btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </nav>

        <div id="mobile-menu">
            <ul id="mobile-nav-list">

                <li class="nav-item"><a href="index.php">Inicio</a></li>

                <li class="nav-item"><a href="index.php#menu">Cardapio</a></li>

                <li class="nav-item"><a href="index.php?#testimonials">Avaliações</a></li>

            </ul>

            <a class="btn btn-default" href="index.php?pag=login">
                Peça aqui
            </a>
        </div>
    </header>

  <?php 
    require_once('paginas/'.$pag)
  ?>
    <footer>
        <img src="imagens/wave.svg" alt="">

        <div id="footer_items">
            <span id="copyright" style="color: white;">
                &copy 2024 Dubah Donuts Desenvolvido pelos alunos da Etec Antônio Devisate de Marília SP 
            </span>

            <div class="social-media-buttons">
                <a href="">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>

                <a href="">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="">
                    <i class="fa-brands fa-facebook"></i>
                </a>
            </div>
        </div>
    </footer>

    <script src="src/javascript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>