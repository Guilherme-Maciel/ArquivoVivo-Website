<?php
require __DIR__ . '../../../vendor/autoload.php';

use App\Controller\Entity\Movel;
use App\Lib\Db\Pagination;

$results = '';

if(!isset($_GET['filter'])){
    $where = 'm_qtdEstoque > 0 and moveis.ct_id = categoria.ct_id';

    $qtd = Movel::getQtdMoveis($where);

    $obPagination = new Pagination($qtd, $_GET['page'] ?? 1, 2);

    $furnitures = Movel::getMoveis($where);

    echo "<pre>";
    print_r($obPagination->getLimit());
    echo "</pre>"; exit;
}
else{
    $filter = $_GET['filter'];

    $where = 'm_qtdEstoque > 0 and moveis.ct_id = categoria.ct_id and moveis.ct_id = "'.$filter.'"';

    $qtd = Movel::getQtdMoveis($where);

    $obPagination = new Pagination($qtd, $_GET['page'] ?? 1, 10);

    $furnitures = Movel::getMoveis($where);
}

foreach ($furnitures as $furniture) {
    $results .= '
        <fieldset>
            <article onclick="window.location.href = `viewMoveis.php?id=' . $furniture->m_id . '`">
                <div class="sample-furniture">
                    <div style="background-image: url(data:' . $furniture->m_typeImg . ';base64,' . base64_encode($furniture->m_imagem) . '); "></div>
                    <p><strong>' .utf8_encode($furniture->m_titulo) . '</strong></p>
                    <h3>' . strtoupper(utf8_encode($furniture->ct_nome)) . '</h3>
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
    <link rel="stylesheet" type="text/css" href="../../public/css/animations.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/scroll.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">
    <title>Arquivo Vivo - Móveis</title>
</head>

<body>
    <div id="container">
        <?php include 'includes/header.php' ?>
        <main>
            <h1>MÓVEIS</h1>
            <hr>
            <div class="search-container">
                <img src="../../public/images/search-icon.svg">
                <input type="text" placeholder="Pesquisar...">
            </div>
            <div class="filter-container">
                <a href="furnitures.php">TODOS    </a>
                <a href="furnitures.php?filter=2">AMBIENTES    </a>
                <a href="furnitures.php?filter=3">APARADOR    </a>
                <a href="furnitures.php?filter=4">CADEIRAS    </a>
                <a href="furnitures.php?filter=5">CREDENZA    </a>
                <a href="furnitures.php?filter=6">ESCRIVANINHA    </a>
                <a href="furnitures.php?filter=7">ESTANTE    </a>
                <a href="furnitures.php?filter=8">MESA LATERAL    </a>
                <a href="furnitures.php?filter=9">MESA ALTA    </a>
                <a href="furnitures.php?filter=10">MESA DE CENTRO    </a>
                <a href="furnitures.php?filter=11">OBJETOS    </a>
                <a href="furnitures.php?filter=12">POLTRONAS    </a>
                <a href="furnitures.php?filter=13">SOFÁS    </a>
            </div>
        </main><br><br>
        <section>
            <div class="furnitures-container animate-up">
                <div>
                    <?= $results ?>
                </div>
        </section>
        <div class="selection-furnitures">
            <nav>
                <li>
                    <div><a href="">&#9664;</a></div>
                <li>
                    <div><a href="">&#9654;</a></div>
                </li>
            </nav>
        </div>
        <?php include 'includes/footer.php' ?>
    </div>

</body>

</html>