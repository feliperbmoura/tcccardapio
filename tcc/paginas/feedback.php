
<section id="testimonials">

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
$query = $pdo->prepare("SELECT F.*, C.nome FROM feedback F INNER JOIN cliente C ON F.id_cliente=C.id_cliente ORDER BY F.id_feedback DESC ");
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
                            <p class="nome">
                               <?=$cliente?>
                                <span class="starsback">
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