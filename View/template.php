<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="Public/bootstrap-4.5.0-dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="Public/style.css" />
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="icon" type="image/png" href="Public/images/favicon.png" />
        <script src="https://kit.fontawesome.com/c9ef589bf6.js" crossorigin="anonymous"></script>
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <div class="row mainHeader">
                <div class="logo col-7 offset-3 col-sm-8 offset-sm-4 col-md-5 offset-md-4 col-lg-4 offset-lg-2">
                    <a href="http://localhost/blogJeanForteroche/projet4/index.php"><h1>Jean Forteroche</h1></a>
                </div>
                <div class="socialIcons col-4 offset-4 col-sm-4 offset-sm-4 col-md-4 offset-md-4 col-lg-2 offset-lg-3">
                    <ul>
                        <li><a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://localhost/blogJeanForteroche/projet4/index.php"><i class="fas fa-home"></i><span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">L'auteur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Les romans</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://localhost/blogJeanForteroche/projet4/index.php?action=episodes">Billet simple</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <div>
                <a href="#">Se connecter</a>
            </div>
        </nav>
        <div class="container-fluid">
            <?= $content ?>
        </div>
        <ul class="socialIconsBottom">
            <li><a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
        </ul>
        <footer>
            <ul>
                <li><a href="#">Mentions légales</a></li>
                <li><a href="#">politique de confidentialité</a></li>
                <li><a href="#">Cookies</a></li>
            </ul>
            <p>Site web fictif réalisé pour projet d'études.</p>
        </footer>
        <script src="Public/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    </body>
</html>

