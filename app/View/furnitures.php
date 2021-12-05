<?php
    /**
    */

    //Carregamento das classes
    require __DIR__ . '../../../vendor/autoload.php';

    use App\Controller\Entity\Movel;
    use App\Lib\Db\Pagination;

    //Variáveis de construção HTML
    $results = '';
    $paginacao = '';

    //Validação da busca por inserção de texto string.
    $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);

    //Validação do filtro da categoria do móvel.
    $filtro = filter_input(INPUT_GET, 'filter', FILTER_SANITIZE_NUMBER_INT);
    $filtro = in_array($filtro,[2,3,4,5,6,7,8,9,10,11,12,13]) ? $filtro : '';

    //Cláusulas WHERE para consulta
    $condition = [
        strlen($search) ? 'm_titulo LIKE "%'.$search.'%"' : null,
        'moveis.ct_id = categoria.ct_id',
        strlen($filtro) ? 'moveis.ct_id = "'.$filtro.'"' : null,
        'm_qtdEstoque > 0'
    ];
    $condition = array_filter($condition); //Remove os campos GET vazios do array

    //Prepara as querys WHERE para consulta
    $where = implode(' AND ', $condition);

    $qtd = Movel::getQtdMoveis($where); //Contagem do total de consultas efetuadas
    $obPagination = new Pagination($qtd, $_GET['page'] ?? 1, 20); //Paginação dos resultados (20 por página)

    //Consulta final
    $furnitures = Movel::getMoveis($where, null, $obPagination->getLimit());

    //amostragem dos dados ao usuário
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

    //manter GETS ao selecionar uma nova página
    unset($_GET['page']);
    $gets = http_build_query($_GET);

    //Consulta para gerar a quantidade de páginas com base no GET
    $paginas = $obPagination->getPages();

    //Amostragens dos links às páginas
    foreach ($paginas as $key=>$pagina){
        $class = $pagina['atual'] ? 'btn-dark-white' : 'btn-white';
        $paginacao .= '
        <li>
            <div class="btn '.$class.'"><a href="?page='.$pagina['pagina'].'&'.$gets.'">'.$pagina['pagina'].'</a></div>
        </li>
        ';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../public/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../../public/css/furnitures.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/animations.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/scroll.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/search-container.css">

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
                <form id="form-search" method="get">
                <button type="submit"><img src="../../public/images/search-icon.png" style="cursor: pointer;"></button>
                    <input name="search" type="text" placeholder="Pesquisar..." value="<?=$search?>">
                </form>
            </div>
            <div class="filter-container">
                <a class="<?= !isset($_GET['filter']) ? 'selected-filter' : ''?>" href="furnitures.php">TODOS    </a>
                <a class="<?= $_GET['filter'] == 2 ? 'selected-filter' : ''?>" href="furnitures.php?filter=2">AMBIENTES    </a>
                <a class="<?= $_GET['filter'] == 3 ? 'selected-filter' : ''?>" href="furnitures.php?filter=3">APARADOR    </a>
                <a class="<?= $_GET['filter'] == 4 ? 'selected-filter' : ''?>" href="furnitures.php?filter=4">CADEIRAS    </a>
                <a class="<?= $_GET['filter'] == 5 ? 'selected-filter' : ''?>" href="furnitures.php?filter=5">CREDENZA    </a>
                <a class="<?= $_GET['filter'] == 6 ? 'selected-filter' : ''?>" href="furnitures.php?filter=6">ESCRIVANINHA    </a>
                <a class="<?= $_GET['filter'] == 7 ? 'selected-filter' : ''?>" href="furnitures.php?filter=7">ESTANTE    </a>
                <a class="<?= $_GET['filter'] == 8 ? 'selected-filter' : ''?>" href="furnitures.php?filter=8">MESA LATERAL    </a>
                <a class="<?= $_GET['filter'] == 9 ? 'selected-filter' : ''?>" href="furnitures.php?filter=9">MESA ALTA    </a>
                <a class="<?= $_GET['filter'] == 10 ? 'selected-filter' : ''?>" href="furnitures.php?filter=10">MESA DE CENTRO    </a>
                <a class="<?= $_GET['filter'] == 11 ? 'selected-filter' : ''?>" href="furnitures.php?filter=11">OBJETOS    </a>
                <a class="<?= $_GET['filter'] == 12 ? 'selected-filter' : ''?>" href="furnitures.php?filter=12">POLTRONAS    </a>
                <a class="<?= $_GET['filter'] == 13 ? 'selected-filter' : ''?>" href="furnitures.php?filter=13">SOFÁS    </a>
            </div>
        </main><br><br>
        <section>
            <div class="furnitures-container animate-up">
                <div>
                    <?= $results ?>
                </div>
        </section>
        <div class="selection-furnitures animate-up">
            <nav>
                <?=$paginacao?> 
            </nav>
        </div>
        <?php include 'includes/footer.php' ?>
    </div>

</body>

</html>