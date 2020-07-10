<?php ob_start(); ?>
<?php $this->title = 'Jean Forteroche | ' . htmlspecialchars($episode['title']) ?>
<div class="container">
    <section id="episode">
        <p><a href="index.php?action=episodes">Retour à la liste des billets</a></p>
        <article>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <header>
                              <h1><?= htmlspecialchars($episode['title']) ?></h1>
                              <p>Publié par Jean Forteroche le <?= htmlspecialchars($episode['creationFrDate']) ?></p>
                            </header>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <img src="Public/images/jeanForterocheRounded.png" class="rounded-circle float-left" alt="Jean Forteroche">
                            <p class="content"><?= htmlspecialchars($episode['content']) ?></p>
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
                        <?php if (isset($_SESSION['flash']))
                        { ?>
                        <?php foreach($_SESSION['flash'] as $type => $message): ?>
                        <div class="alert-flash">
                            <h2><?= $message; ?></h2>
                        <?php endforeach; ?>
                        <?php unset($_SESSION['flash']); ?>
                        </div>
                        <?php } ?>
                        <?php
                        if (isset($_SESSION['userPseudo'])) {
                        ?>
                        </header>
                        <form method="post" action="index.php?action=episodeComment">
                            <div class="form-group">
                                <input id="pseudoEpisode" name="author" type="text" placeholder="Votre pseudo" required />
                            </div>
                            <div class="form-group">
                                <textarea id="textCommentEpisode" name="episodeComment" placeholder="Votre commentaire" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($episode['id']) ?>" />
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
                            <p><span><?= htmlspecialchars($episodeComment['author']) ?> </span> le <?= htmlspecialchars($episodeComment['commentFrDate']) ?> <a class="signale" href="index.php?action=signaleEpisodeComment&id=<?= htmlspecialchars($episodeComment['id']) ?>&episodeId=<?= htmlspecialchars($episodeComment['episodeId']) ?>&flag=<?= htmlspecialchars($episodeComment['flag']) ?>">Signaler</a></p>
                            <p><?= htmlspecialchars($episodeComment['episodeComment']) ?></p>
                            <hr />
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>