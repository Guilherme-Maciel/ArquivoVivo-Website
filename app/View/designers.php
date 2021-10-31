<?php
require __DIR__ . '../../../vendor/autoload.php';

use App\Controller\Entity\Designer;
use App\Controller\Entity\Movel;
use App\Lib\Db\Pagination;


$results = '';
$paginacao = '';

$qtd = Designer::getQtdDesigners();
$obPagination = new Pagination($qtd, $_GET['page'] ?? 1, 2);
$designers = Designer::getDesigners(null, null, $obPagination->getLimit());

//gets
unset($_GET['page']);
$gets = http_build_query($_GET);

//paginação
$paginas = $obPagination->getPages();

foreach ($paginas as $key=>$pagina){
    $class = $pagina['atual'] ? 'btn-dark-white' : 'btn-white';
    $paginacao .= '
    <li>
        <div class="btn '.$class.'"><a href="?page='.$pagina['pagina'].'&'.$gets.'">'.$pagina['pagina'].'</a></div>
    </li>
    ';
}

foreach ($designers as $designer) {
    $results .= '
    <div class="designer">
    <div class="img" style="background-image: url(data:'.$designer->d_typeImg.';base64,'.base64_encode($designer->d_imagem).')"></div>
    <div class="information-designer">
    <p class="title"><strong>'.strtoupper(utf8_encode($designer->d_nome)).'</strong> ('.Movel::getQtdMovelByDesigner($designer->d_id).' móveis disponíveis)</p>
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
    <link rel="stylesheet" type="text/css" href="../../public/css/scroll.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/pagination.css">




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
        </section>
            <div class="selection-furnitures">
                <nav>
                   <?=$paginacao?>
                </nav>
            </div>
        <?php include 'includes/footer.php'?>
    </div>

</body>



</html>