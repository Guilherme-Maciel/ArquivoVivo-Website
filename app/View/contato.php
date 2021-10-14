<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" type="text/css" href="../../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/footer.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/contato.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/animations.css">
    <link rel="stylesheet" type="text/css" href="../../public/css/scroll.css">

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
                    <input type="text" name="tel1" placeholder="Telefone 1 (opcional)">
                    <input type="text" name="tel2" placeholder="Telefone 2 (opcional)">
                </div>
                <input type="text" name="email" placeholder="Email*" required>
                <textarea name="message" class="message" placeholder="Mensagem*" required wrap="soft"
                    rows="6"></textarea>
                <div class="end-buttons">
                    <button class="send" type="submit">enviar</button>
                    <button class="clear">limpar</button>
                </div>
            </form>
        </section>
        <?php include 'includes/footer.php'?>
    </div>
</body>
</html>