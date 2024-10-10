<main id="content">
        <section id="home">
            <div class="shape"></div>
            <div id="cta">
                <h1 class="title">
                    Peça direto de sua 
                    <span>casa</span>
                </h1>
                <p class="description" style="color: white;">
                    Explore nosso cardápio diversificado, que inclui opções para todos os gostos: de donuts tradicionais com glacê e granulado a recheios surpreendentes e coberturas gourmet. <strong>E para quem busca algo ainda mais especial, você pode criar seu propriprio donuts personalizado</strong>
                </p>
                
                <div id="cta-buttons">
                    <a href="index.php?pag=menu" class="btn-default">
                        Ver cardápio
                    </a>
                    <a href="tel:+5514991314963" id="phone-button">
                        <button class="btn-default">
                            <i class="fa-solid fa-phone"></i>
                        </button>
                        (55) 14 99131-4963
                    </a>
                </div>

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

            <div id="banner">
                <img src="imagens/logo.png" alt="">
            </div>
        </section>

        <section id="menu">
            <h2 class="section-title">Cardápio</h2>
            <h3 class="section-subtitle">Donuts mais vendidos</h3>

            <div id="dishes-principal">
                <div class="dish-principal">
                    <div class="dish-heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <img src="imagens/Design_sem_nome__19_-removebg-preview.png" class="dish-image" alt="" style="height: 250px;">

                    <h3 class="dish-title">
                        Stranberry Donuts
                    </h3>

                    <span class="dish-description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(500+)</span>
                    </div>

                    <div class="dish-price">
                        <h4>R$20,00</h4>
                        <button class="btn-default">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </button>
                    </div>
                </div>

                <div class="dish">
                    <div class="dish-heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <img src="imagens/Design_sem_nome__22_-removebg-preview.png" class="dish-image" alt="" style="height: 250px;">

                    <h3 class="dish-title">
                        Lorem Ipsum
                    </h3>

                    <span class="dish-description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(500+)</span>
                    </div>

                    <div class="dish-price">
                        <h4>R$20,00</h4>
                        <button class="btn-default">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </button>
                    </div>
                </div>

                <div class="dish">
                    <div class="dish-heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <img src="imagens/Design sem nome (20).png" class="dish-image" alt="" style="height: 250px;">

                    <h3 class="dish-title">
                        Lorem Ipsum
                    </h3>

                    <span class="dish-description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(500+)</span>
                    </div>

                    <div class="dish-price">
                        <h4>R$20,00</h4>
                        <button class="btn-default">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </button>
                    </div>
                </div>

                <div class="dish">
                    <div class="dish-heart">
                        <i class="fa-solid fa-heart"></i>
                    </div>

                    <img src="imagens/Design_sem_nome__21_-removebg-preview.png" class="dish-image" alt="" style="height: 250px;">

                    <h3 class="dish-title">
                        Lorem Ipsum
                    </h3>

                    <span class="dish-description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </span>

                    <div class="dish-rate">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <span>(500+)</span>
                    </div>

                    <div class="dish-price">
                        <h4>R$20,00</h4>
                        <button class="btn-default">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section id="testimonials">
            <img src="imagens/logo.png" id="testimonial_chef" alt="">

            <div id="testimonials_content">
                <h2 class="section-title">
                    Avaliações
                </h2>
                <h3 class="section-subtitle">
                    Feedback dos clientes
                </h3>

                <div id="feedbacks">
                <?php

require_once('conexao.php'); 
$query = $pdo->prepare("SELECT F.*, C.nome FROM feedback F INNER JOIN cliente C ON F.id_cliente=C.id_cliente ORDER BY F.id_feedback DESC LIMIT 0,2");
$query->execute();
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total = @count($res);

for($i = 0; $i<=$total-1; $i++){

    $cliente = $res[$i]['nome'];
    $feedback = $res[$i]['feedback'];
    
   
    ?>
    <div class="feedback">
                        <img src="imagens/user.png" class="feedback-avatar" alt="">

                        <div class="feedback-content">
                            <p>
                               <?=$cliente?>
                                <span>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </p>
                            <p>
                                "<?=$feedback?>"
                            </p>
                        </div>
                    </div>
    <?php
}
?>
                </div>

                <a href="index.php?pag=feedback" class="btn btn-default">
                    Ver mais avaliações
                </a>
            </div>
        </section>
    </main>
