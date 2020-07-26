<?php ob_start(); ?>
<?php $this->title = 'Jean Forteroche | Editer un commentaire' ?>
<div class="container">
    <div id="editBookComment">
        <div class="row">
            <div class="col-12">
                <p><a href="index.php?action=admin">Retour à la page d'administration</a></p>
                <?php foreach ($bookComments as $bookComment): ?>
                <header class="text-center">
                    <h1>Commentaire de "<?= $bookComment['commentAuthor'] ?>" </h1>
                    <p>Publié le <?= $bookComment['commentFrDate'] ?></p>
                </header>
                <div class="row">
                    <div class="col-12">
                        <p class="contentComment"><?= $bookComment['comment'] ?></p>
                    </div>
                    <form method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?= $bookComment['commentId'] ?>" />
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