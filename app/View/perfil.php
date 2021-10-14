<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../../public/css/perfil.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/header.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/footer.css" />
    <link rel="stylesheet" type="text/css" href="../../public/css/scroll.css">


    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,300;0,400;0,500;0,600;0,700;0,800;1,100&display=swap"
        rel="stylesheet" />
    <title>Perfil</title>
</head>

<body>
    <div id="container">
    <?php include 'includes/header.php' ?>
        <main>
            <div class="perfil-title">
                <h1>SEU PERFIL</h1>
                <span>
                    <img src="../../public/images/edit.svg" alt="Editar">
                    <img src="../../public/images/exit.svg" alt="Sair">
                </span>
            </div>
            <hr />
            <form action="">
                <div class="input-box">
                    <div class="input-single">
                        <p>nome:</p>
                        <input type="text" />
                    </div>
                    <div class="input-single">
                        <p>sobre.:</p>
                        <input type="text" />
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-single">
                        <p>email:</p>
                        <input type="text" />
                    </div>
                    <div class="input-single">
                        <p>senha.:</p>
                        <input type="text" />
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-single">
                        <p>tel fixo:</p>
                        <input type="text" />
                    </div>
                    <div class="input-single">
                        <p>tel cel:</p>
                        <input type="text" />
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-single">
                        <p>rua:</p>
                        <input type="text" />
                    </div>
                    <div class="input-single">
                        <p>bairro:</p>
                        <input type="text" />
                    </div>
                </div>
                <div class="input-box">
                    <div class="input-cep-num">
                        <div>
                            <p>cep:</p>
                            <input type="text" />
                        </div>
                        <div>
                            <p>n°:</p>
                            <input type="text" class="n" />
                        </div>
                    </div>
                    <div class="input-single">
                        <p>complemento:</p>
                        <input type="text" />
                    </div>
                </div>
            </form>
            <br />
            <br />
        </main>
        <section>
            <h1>CURTIDOS &#10084;</h1>
            <hr />
            <p>
                Parece que você não curtiu nenhum movel <a href="">Clque aqui</a> e
                confira nosso portifólio
            </p>
        </section>
        <?php include 'includes/footer.php'?>
    </div>
</body>

</html>