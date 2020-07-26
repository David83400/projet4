<?php ob_start(); ?>
<?php $this->title = 'Jean Forteroche | Editer un commentaire' ?>
<div class="container">
    <div id="editEpisodeComment">
        <div class="row">
            <div class="col-12">
                <p><a href="index.php?action=admin">Retour à la page d'administration</a></p>
                <?php foreach ($episodeComments as $episodeComment): ?>
                <header class="text-center">
                    <h1>Commentaire de "<?= $episodeComment['commentAuthor'] ?>" </h1>
                    <p>Publié le <?= $episodeComment['commentFrDate'] ?></p>
                </header>
                <div class="row">
                    <div class="col-12">
                        <p class="contentComment"><?= $episodeComment['comment'] ?></p>
                    </div>
                    <form method="post">
                        <div class="form-group">
                        <input type="hidden" name="id" value="<?= $episodeComment['commentId'] ?>" />
                        <input type="submit" class="btn btn-outline-primary" name="formAcceptComment" value="Accepter" />
                        <input type="submit" class="btn btn-outline-primary" name="formDeleteComment" value="Supprimer" />
                    </div>
                    </form>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>