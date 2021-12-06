<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../public/images/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" type="text/css" href="../../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/contato.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/animations.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/scroll.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>


    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap"
        rel="stylesheet">
    <title>Arquivo Vivo - Contato</title>
</head>

<body>
    <div id="container">
    <?php include 'includes/header.php'?>
        <main>
        </main>
        <section>
            <h1>CONTATO</h1>
            <hr>
            <form class="animate-up" action="../Model/Contact.php" method="POST">
                <input type="text" name="name" placeholder="Nome*" required>
                <input type="text" name="address" placeholder="Endereço (opcional)">
                <div class="phone-number">
                    <input id="telCel" type="text" name="tel1" placeholder="Celular (opcional)">
                    <input id="telFix" type="text" name="tel2" placeholder="Telefone (opcional)">
                </div>
                <input type="email" name="email" placeholder="Email*" required>
                <textarea name="message" class="message" placeholder="Mensagem*" required wrap="soft"
                    rows="6"></textarea>
                <div class="end-buttons">
                    <button class="send" type="submit">enviar</button>
                    <button type="reset" class="clear">limpar</button>
                </div>
            </form>
        </section>
        <?php include 'includes/footer.php'?>
    </div>
    <script type="text/javascript">
    $("#telCel").mask("(00) 00000-0000");
    $("#telFix").mask("(00) 0000-0000");
    </script>
</body>
</html>