<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Public/style.css" />
        <script src="https://kit.fontawesome.com/c9ef589bf6.js" crossorigin="anonymous"></script>
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <h1>Jean Forteroche</h1>
            <ul>
                <li><i class="fab fa-facebook-f"></i></li>
                <li><i class="fab fa-twitter"></i></li>
                <li><i class="fab fa-instagram"></i></li>
            </ul>
        </header>
        <nav>
            <ul>
                <li><a href="#"><i class="fas fa-home"></i></a></li>
                <li><a href="#">L'auteur</a></li>
                <li><a href="#">Les romans</a></li>
                <li><a href="#">Billet simple</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
            <?= $content ?>
        <ul>
            <li><i class="fab fa-facebook-f"></i></li>
            <li><i class="fab fa-twitter"></i></li>
            <li><i class="fab fa-instagram"></i></li>
        </ul>
        <footer>
            <ul>
                <li><a href="#">Mentions légales</a></li>
                <li><a href="#">politique de confidentialité</a></li>
                <li><a href="#">Cookies</a></li>
            </ul>
        </footer>
    </body>
</html>

