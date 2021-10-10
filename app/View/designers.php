<?php
require __DIR__ . '../../../vendor/autoload.php';

use App\Controller\Entity\Designer;


$results = '';
$designers = Designer::getDesigners();

foreach ($designers as $designer) {
    $results .= '
    <div class="designer">
    <div class="img" style="background-image: url(data:'.$designer->d_typeImg.';base64,'.base64_encode($designer->d_imagem).')"></div>
    <div class="information-designer">
        <p class="title"><strong> '.strtoupper(utf8_encode($designer->d_nome)).' </strong> (29 móveis disponíveis)</p>
        <p class="description">
            '.utf8_encode($designer->d_bio).'
        </p>
        <a href="viewDesigners.php?id='.$designer->d_id.'">+ INFO</a>

    </div>
</div>
        ';
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../public/css/designers.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/animations.css">


    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap"
        rel="stylesheet">
    <title>Arquivo Vivo - Designers</title>
</head>

<body>
    <div id="container">
    <?php include 'includes/header.php'?>
        <main>
            <h1>DESIGNERS</h1>
            <hr>
            <div class="search-container">
                <img src="../../public/images/search-icon.svg">
                <input type="text" placeholder="Pesquisar...">
            </div>
        </main>
        <section>
            <?=$results?>
            <div class="selection-furnitures">
                <nav>
                    <li>
                        <div><a href="">&#9664;</a></div>
                    </li>
                    <li>
                        <div><a href="">1</a></div>
                    </li>
                    <li>
                        <div><a href="">2</a></div>
                    </li>
                    <li>
                        <div><a href="">3</a></div>
                    </li>
                    <li>
                        <div><a href="">4</a></div>
                    </li>
                    <li>
                        <div><a href="">5</a></div>
                    </li>
                    <li>
                        <div><a href="">&#9654;</a></div>
                    </li>
                </nav>
            </div>
        </section>
        <?php include 'includes/footer.php'?>
    </div>

</body>



</html>