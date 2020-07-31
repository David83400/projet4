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
        <meta property="og:url" content="http://www.jeanforteroche-projet4.fr" />
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

        <!-- tinyMCE -->
        <script src="https://cdn.tiny.cloud/1/wv4gd1po1a9gi1dsf2fzj5ul79crnk2ubj2dtl39y002kxu4/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        
        <title><?= $title ?></title>
    </head>
    <body>
        <header>
            <div class="row mainHeader">
                <div class="logo col-7 offset-3 col-sm-8 offset-sm-4 col-md-5 offset-md-4 col-lg-4 offset-lg-2">
                    <h1>Jean Forteroche</h1>
                </div>
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <?= $navbar ?>
        </nav>
        <div class="container-fluid">
            <?= $content ?>
        </div>

        <!-- tinyMCE -->
        <script type="text/javascript">
            tinymce.init({
            selector: '.tiny',
            entity_encoding : "raw",
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
            language: 'fr_FR',
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="Public/bootstrap-4.5.0-dist/js/bootstrap.min.js"></script>
    </body>
</html>