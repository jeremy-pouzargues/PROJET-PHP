<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" href="<?= $style ?>">
        <link id="ThemeStylesheet" rel="stylesheet" href="<?= $style_theme ?>">
        <script src="https://kit.fontawesome.com/b18ab37082.js" crossorigin="anonymous"></script>

        <title><?= $title ?></title>
    </head>
    <body>
        <script src="../assets/js/architecture.js"></script>
        <header>
            <div id="HeaderContainer">
                <a id="LogoHeaderContainer" href="">
                    <img id="LogoHeader" src="https://imagizer.imageshack.com/img922/7716/Xxjiro.png" alt="logo FreeNote">
                </a>

                <nav>
                    <a class="navLink" href="loginV.php">Connexion <i class="fas fa-sign-in-alt"></i></a>
                    <a class="navLink" href="registerV.php">Inscription <i class="fas fa-user-plus"></i></a>
                </nav>
                <button id="ChangeThemeButton">
                        <i id="IconThemeButton" class="fas fa-moon"></i>
                </button>
            </div>
        </header>


        <?= $content ?>


        <footer>
            <section id="FooterContainer">
                <div id="NameContainer">
                    <p class="AuthorName">
                        <a href="https://github.com/leo-dalloz"><i class="fab fa-github"></i>Léo Dalloz</a>
                    </p>
                    <p class="AuthorName">
                        <a href="https://github.com/jeremy-pouzargues"><i class="fab fa-github"></i> Jérémy Pouzargues</a>
                    </p>
                    <p class="AuthorName">
                        <a href="https://github.com/LucasUrgenti"><i class="fab fa-github"></i> Lucas Urgenti</a>
                    </p>
                    <p class="AuthorName">
                        <a href="https://github.com/laurent-vouriot"><i class="fab fa-github"></i> Laurent Vouriot</a>
                    </p>
                    <p class="AuthorName">
                        <a href="https://github.com/audreywagner"><i class="fab fa-github"></i> Audrey Wagner</a>
                    </p>
                    <button id="ToUpButton">
                        <i class="far fa-arrow-alt-circle-up"></i>
                    </button>
                </div>
            </section>
        </footer>
        <script src="../assets/js/architecture.js"></script>
    </body>
</html>