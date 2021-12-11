<?php
    /**
    */

    //Carregamento das classes
    require __DIR__ . '../../../vendor/autoload.php';

    use App\Controller\Entity\Designer;
    use App\Controller\Entity\Movel;
    use App\Lib\Db\Pagination;

    //Variáveis de construção HTML
    $results = '';
    $paginacao = '';

    //Validação da busca por inserção de texto string.
    $search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);

    //Cláusulas WHERE para consulta
    $condition = [
        strlen($search) ? 'd_nome LIKE "%' . $search . '%"' : null,
        'd_id != 1'
    ];
    $condition = array_filter($condition); //Remove os campos GET vazios do array

    //Prepara as querys WHERE para consulta
    $where = implode(' AND ', $condition);

    $qtd = Designer::getQtdDesigners($where); //Contagem do total de consultas efetuadas
    $obPagination = new Pagination($qtd, $_GET['page'] ?? 1, 20); //Paginação dos resultados (20 por página)

    //Consulta final
    $designers = Designer::getDesigners($where, null, $obPagination->getLimit());

    //manter GETS ao selecionar uma nova página
    unset($_GET['page']);
    $gets = http_build_query($_GET);

    //Consulta para gerar a quantidade de páginas com base no GET
    $paginas = $obPagination->getPages();

    //Amostragens dos links às páginas
    foreach ($paginas as $key => $pagina) {
        $class = $pagina['atual'] ? 'btn-dark-white' : 'btn-white';
        $paginacao .= '
        <li>
            <div class="btn ' . $class . '"><a href="?page=' . $pagina['pagina'] . '&' . $gets . '">' . $pagina['pagina'] . '</a></div>
        </li>
        ';
    }

    //amostragem dos dados ao usuário
    foreach ($designers as $designer) {
        $results .= '
                <div class="designer">
                <div class="img" style="background-image: url(data:' . $designer->d_typeImg . ';base64,' . base64_encode($designer->d_imagem) . ')"></div>
                <div class="information-designer">
                <p class="title"><strong>' . strtoupper(utf8_encode($designer->d_nome)) . '</strong> (' . Movel::getQtdMovelByDesigner($designer->d_id) . ' móveis disponíveis)</p>
                <p class="description">
                    ' . utf8_encode($designer->d_bio) . '
                </p>
                    <a href="viewDesigners.php?id=' . $designer->d_id . '">+ INFO</a>

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
    <link rel="icon" type="image/x-icon" href="../../public/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../../public/css/designers.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/animations.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/scroll.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/pagination.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/search-container.css">

    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">
    <title>Arquivo Vivo - Designers</title>
</head>
<body>
    <div id="container">
        <?php include 'includes/header.php' ?>
        <main>
            <h1>DESIGNERS</h1>
            <hr>
            <div class="search-container">
                <form id="form-search" method="get">
                    <button type="submit"><img src="../../public/images/search-icon.png" style="cursor: pointer;"></button>
                    <input name="search" type="text" placeholder="Pesquisar..." value="<?= $search ?>">
                </form>
            </div>
        </main>
        <section class="animate-up">
            <?= $results ?>
        </section>
        <div class="selection-furnitures animate-up">
            <nav>
                <?= $paginacao ?>
            </nav>
        </div>
        <?php include 'includes/footer.php' ?>
    </div>
</body>
</html>