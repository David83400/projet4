<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- meta description -->
        <meta name="description"
            content="Découvrez sur mon blog mon tout nouveau roman. J'ai voulu vous le faire découvrir en format numérique épisode après épisode. Nous pourrons ainsi voyager ensemble dans des contrées merveilleuses. Vous partagerez avec moi les aventures extraordinaires de Balthazar en Alaska." />

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary">
        <meta name=”twitter:site” content="@jeanforteroche" />
        <meta name="twitter:title" content="Jean Forteroche : blog officiel.">
        <meta name="twitter:description"
            content="Découvrez sur mon blog mon tout nouveau roman. J'ai voulu vous le faire découvrir en format numérique épisode après épisode. Nous pourrons ainsi voyager ensemble dans des contrées merveilleuses. Vous partagerez avec moi les aventures extraordinaires de Balthazar en Alaska.">
        <meta name=”twitter:image” content="Public/images/billetSimple.png" />

        <!-- Open Graph -->
        <meta property="og:title" content="Jean Forteroche : blog officiel." />
        <meta property="og:type" content="Website" />
        <meta property="og:url" content="https://www.jeanforteroche.com/" />
        <meta property="og:image" content="Public/images/billetSimple.png" />
        <meta property="og:description"
            content="Découvrez sur mon blog mon tout nouveau roman. J'ai voulu vous le faire découvrir en format numérique épisode après épisode. Nous pourrons ainsi voyager ensemble dans des contrées merveilleuses. Vous partagerez avec moi les aventures extraordinaires de Balthazar en Alaska." />
        <meta property="og:site_name" content="jeanforteroche" />

        <!-- CSS Bootstrap -->
        <link href="Public/bootstrap-4.5.0-dist/css/bootstrap.css" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="Public/style.css" />

        <!-- CSS fontawesome -->
        <script src="https://kit.fontawesome.com/c9ef589bf6.js" crossorigin="anonymous"></script>

        <!-- google fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Favicons -->
        <link rel="icon" type="image/png" href="Public/images/favicon.png" />
        
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <div class="row mainHeader">
                <div class="logo col-7 offset-3 col-sm-8 offset-sm-4 col-md-5 offset-md-4 col-lg-4 offset-lg-2">
                    <a href="index.php"><h1>Jean Forteroche</h1></a>
                </div>
                <div class="socialIcons col-4 offset-4 col-sm-4 offset-sm-4 col-md-4 offset-md-4 col-lg-2 offset-lg-3">
                    <ul>
                        <li><a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </header>
        <?= $navbar ?>
        <div class="container-fluid">
            <?= $content ?>
        </div>
        <?= $footer ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="Public/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    </body>
</html>