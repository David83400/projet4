<?php ob_start(); ?>
<?php $this->title = 'Jean Forteroche | ' . $episode['title'] ?>
<div class="container">
    <?php if (isset($_SESSION['flash']))
    { ?>
    <?php foreach($_SESSION['flash'] as $type => $message): ?>
    <div class="alert-flash">
        <h2><?= $message; ?></h2>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
    </div>
    <?php } ?>
    <section id="episode">
        <p><a href="index.php?action=episodes">Retour à la liste des billets</a></p>
        <article>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <header class="text-center">
                              <h1><?= $episode['title'] ?></h1>
                              <p>Publié par Jean Forteroche le <?= $episode['creationFrDate'] ?></p>
                            </header>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <img src="Public/images/jeanForterocheRounded.png" class="rounded-circle float-left" alt="Jean Forteroche">
                            <p class="content"><?= $episode['content'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
    <section id="commentsEpisodes">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <header>
                            <h3>Laissez votre commentaire.</h3>
                        <?php
                        if (isset($_SESSION['userPseudo'])) {
                        ?>
                        </header>
                        <form method="post" action="index.php?action=episodeComment">
                            <div class="form-group">
                                <input id="pseudoEpisode" name="author" type="text" value="<?php if (isset($_COOKIE['pseudo'])) { echo $_COOKIE['pseudo']; } ?>" required />
                            </div>
                            <div class="form-group">
                                <textarea id="textCommentEpisode" name="episodeComment" placeholder="Votre commentaire"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= $episode['id'] ?>" />
                                <input type="submit" class="btn btn-outline-primary" value="Commenter" />
                            </div>
                        </form>
                        <?php
                        } else {
                        ?>
                        <p>Pour laisser un commentaire, connectez vous à votre compte ou créez en un : <a href="index.php?action=connexion">Je crée mon compte.</a></p>
                        </header>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <header>
                            <h4>Commentaires :</h4>
                        </header>
                        <?php foreach ($episodeComments as $episodeComment): ?>
                            <p><span><?= $episodeComment['author'] ?> </span> le <?= $episodeComment['commentFrDate'] ?> <a class="signale" href="index.php?action=signaleEpisodeComment&id=<?= $episodeComment['id'] ?>&episodeId=<?=$episodeComment['episodeId'] ?>&flag=<?= $episodeComment['flag'] ?>">Signaler</a></p>
                            <p class="comment"><?= $episodeComment['episodeComment'] ?></p>
                            <hr />
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>