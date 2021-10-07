<?php
    require __DIR__.'../../../vendor/autoload.php';
    use App\Controller\Entity\Movel;


    $results = '';
    $furnitures= Movel::getMoveis();

    foreach($furnitures as $furniture){
        $results .= '
        <fieldset>
            <article onclick="window.location.href = `viewMoveis.php?id='.$furniture->m_id.'`">
                <div class="sample-furniture">
                    <div style="background-image: url(data:'.$furniture->m_typeImg.';base64,'.base64_encode($furniture->m_imagem).'); "></div>
                    <p><strong>'.$furniture->m_titulo.'</strong></p>
                    <h3>'.$furniture->m_categoria.'</h3>
                </div>
            </article>
        </fieldset>
        ';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../public/css/furnitures.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/footer.css">

    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap"
        rel="stylesheet">
    <title>Arquivo Vivo - Móveis</title>
</head>

<body>
    <div id="container">
    <?= include 'includes/header.php'?>
        <main>
            <h1>MÓVEIS</h1>
            <hr>
            <div class="search-container">
                <img src="../../public/images/search-icon.svg">
                <input type="text" placeholder="Pesquisar...">
            </div>
            <div class="filter-container">
                <a href="">TODOS    </a>
                <a href="">AMBIENTES    </a>
                <a href="">APARADOR    </a>
                <a href="">CADEIRAS    </a>
                <a href="">CREDENZA    </a>
                <a href="">ESCRIVANINHA    </a>
                <a href="">ESTANTE    </a>
                <a href="">MESA LATERAL    </a>
                <a href="">MESA ALTA    </a>
                <a href="">MESA DE CENTRO    </a>
                <a href="">OBJETOS    </a>
                <a href="">POLTRONAS    </a>
                <a href="">SOFÁS    </a>
            </div>
        </main><br><br>
        <section>
            <div class="furnitures-container">
                <div>
                  <?=$results?>
                </div>
        </section>
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
        <?= include 'includes/footer.php'?>
    </div>

</body>
</html>