<?php ob_start() ?>
<?php $this->title = 'Jean Forteroche | Blog officiel' ?>
<section>
    <?php if (isset($_SESSION['flash']))
    { ?>
    <?php foreach($_SESSION['flash'] as $type => $success): ?>
    <div class="alert-flash">
        <h2><?= $success; ?></h2>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
    </div>
    <?php } ?>
    <div class="row slider">
        <div class="col-lg-3 blocImgAuthor">
            <img src="Public/images/jeanForteroche.png" alt="Jean Forteroche auteur" class="imgAuthor">
        </div>
        <div class="col-6 offset-3 col-sm-6 offset-sm-3 col-md-5 offset-md-1 col-lg-4 offset-lg-0 quoteNews">
            <blockquote>
                <h2><i class="fas fa-quote-left"></i><a href="http://localhost/blogJeanForteroche/projet4/index.php?action=episodes"><span> Découvrez les épisodes de mon tout nouveau roman </span></a><i class="fas fa-quote-right"></i></h2>
            </blockquote>
        </div>
        <div class="col-6 offset-2 col-sm-4 offset-sm-3 col-md-4 offset-md-1 col-lg-3 offset-lg-0 blocBilletSimple">
            <a href="http://localhost/blogJeanForteroche/projet4/index.php?action=episodes"><img src="Public/images/billetSimple.png" alt="livre de Jean Forteroche" class="imgBilletSimple"></a>
        </div>
    </div>
</section>
<section>
    <div class="row presentation">
        <article class="introduction col-8 offset-2 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-5 offset-lg-4 col-xl-4 offset-xl-4">
            <p>Chers visiteurs,</p>
            <p>J'ai voulu partager avec vous l'écriture de mon nouveau roman dans son format numérique épisode après épisode. Nous pourrons ainsi voyager ensemble dans des contrées merveilleuses. Vous partagerez avec moi les aventures extraordinaires de Balthazar en Alaska.
            Bonne lecture à vous tous.
            </p>
            <p>Jean Forteroche.</p>
        </article>
    </div>
</section>
<?php foreach ($lastEpisode as $lastEpisode): ?>
<section id="lastEpisode">
    <div class="row">
        <div class="col-sm-3 offset-sm-6 col-md-3 offset-md-6 col-lg-3 offset-lg-6 book">
            <div class="front">
                <div class="title">
                    <h2>Nouvel épisode</h2>
                    <h3>"<?= $lastEpisode['title'] ?>"</h3>
                </div>
            </div>
            <div class="layer1"></div>
            <div class="layer2"></div>
            <div class="layer3"></div>
            <div class="layer4"></div>
            <div class="layer-text">
                <div class="page-text">
                    <header>
                        <h3><?= $lastEpisode['title'] ?></h3>
                        <p>Publié par Jean Forteroche le <?= $lastEpisode['creationFrDate'] ?></p>
                    </header>
                </div>
            </div>
            <div class="layer-text-2">
                <div class="page-text-2">
                    <p><?= substr($lastEpisode['content'], 0, 550) ?> ... <a href="<?= 'index.php?action=episode&id=' . $lastEpisode['id'] ?>">lire la suite</a></p>
                </div>
            </div>
            <div class="layer5"></div>
            <div class="layer6"></div>
            <div class="layer7"></div>
            <div class="layer8"></div>
            <div class="back"></div>
        </div>
    </div>
</section>
<section id="lastEpisodeResponsive">
    <div class="card">
        <div class="row no-gutters">
            <div class="col-6 offset-3 col-md-4 offset-md-0 couverture">
                <img src="Public/images/couvertureResponsive.jpg" class="card-img-top" alt="Livre de Jean Forteroche">
                <div class="card-body">
                    <h3 class="card-title"><?= $lastEpisode['title'] ?></h3>
                    <p class="card-text"><?= substr($lastEpisode['content'], 0, 550) ?> ... <a href="<?= 'index.php?action=episode&id=' . $lastEpisode['id'] ?>">lire la suite</a></p>
                    <p class="card-text"><small class="text-muted">Publié par Jean Forteroche le <?= $lastEpisode['creationFrDate'] ?></small></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>
<section id="lastNovels">
    <h2>Mes derniers récits</h2>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
        <?php foreach ($lastBooks as $lastBook): ?>
        <div class="col">
            <div class="card h-100">
                <img src="<?= $lastBook['bookImage'] ?>" class="card-img-top" alt="livre de Jean Forteroche">
                <div class="card-body">
                    <h4 class="card-title"><?= $lastBook['title'] ?></h4>
                    <p class="card-text"><?= substr($lastBook['content'], 0, 100) ?> ... <a href="<?= 'index.php?action=book&id=' . $lastBook['id'] ?>">découvrir</a></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

