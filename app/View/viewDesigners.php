<?php
    //Carregamento das classes
    require __DIR__.'../../../vendor/autoload.php';

    use \App\Controller\Entity\Designer;
    use \App\Controller\Entity\Movel;

    //validação do ID recebido por GET
    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: designers.php?status=error');
        exit;
    }

    //Variáveis de construção HTML
    $results = '';
    $resultMoveis = '';
    $resultsCat = '';

    $designer = Designer::getDesigner($_GET['id']);
        //construção da estrutura HTML do designer
        $results = '
            <div class="designer">
                <div class="image"><img src="data:'.$designer->d_typeImg.';base64,'.base64_encode($designer->d_imagem).'"></div>
                <div>
                    <h1 class="dname">'.utf8_encode(strtoupper($designer->d_nome)).'</h1><br>
                    <P>
                    '.utf8_encode($designer->d_bio).'
                    </P><br><br><br>
        ';

    $furnitures = Movel::getMoveis('d_id = '.$designer->d_id.' and moveis.ct_id = categoria.ct_id');
    //Construção da estrutura HTML dos móveis pertencentes ao designer
    foreach ($furnitures as $furniture){
        $resultMoveis .= '
            <fieldset>
                    <article onclick="window.location.href = `viewMoveis.php?id='.$furniture->m_id.'`">
                        <div class="sample-furniture">
                            <div style="background-image: url(data:'.$furniture->m_typeImg.';base64,'.base64_encode($furniture->m_imagem).');"></div>
                            <p><strong>'.$furniture->m_titulo.'</strong></p>
                            <h3>'.$furniture->ct_nome.'</h3>
                        </div>
                    </article>
                </fieldset>
            ';
    }

    $designerCat = Designer::getDesignerByCategoria($_GET['id']);
    //Construção da estrutura HTML para as categorias as quais o designer usufrui
    foreach ($designerCat as $cat){
        $resultsCat .= utf8_encode('<a href=furnitures.php?filter='.$cat->ct_id.'>|'.$cat->ct_nome.'|<a>');
    }

    $moveisQtd = Movel::getQtdMoveis('categoria.ct_id = moveis.ct_id AND d_id = '.$_GET['id'])

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../public/images/favicon.ico">
    <title><?=strtoupper(utf8_encode($designer->d_nome))?></title>
    <link rel="stylesheet" type="text/css" href="../../public/css/view-designer.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/furnitures.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/scroll.css">


    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap"
        rel="stylesheet">
    <title></title>
</head>

<body>
    <div id="container">
    <?php include 'includes/header.php'?>
        <button onClick="history.go(-1)"><img src="../../public/images/arrow.png" alt="arrow"></button>
        <hr>
            <?=$results?>
            <p>MÓVEIS DISPONÍVEIS: <?=$moveisQtd?></p>
                <p>CATEGORIAS: <?=$resultsCat?></p>
            </div>
        </div>
        <hr>
<section>
    <div class="furnitures-container">
        <div>
        <?=$resultMoveis?>
        </div>
    </div>

</section>
<?php include 'includes/footer.php'?>
</body>