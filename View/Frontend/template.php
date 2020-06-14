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
        <nav class="navbar navbar-expand-lg navbar-dark">
            <?= $navbar ?>
        </nav>
        <div class="container-fluid">
            <?= $content ?>
        </div>
        <?= $footer ?>
        <script src="Public/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    </body>
</html>

