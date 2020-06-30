<?php ob_start(); ?>
<?php $this->title = 'Jean Forteroche | Editer un commentaire' ?>
<div id="editBookComment">
    <div class="row">
        <div class="col-12">
            <p><a href="index.php?action=admin">Retour à la page d'administration</a></p>
            <?php foreach ($bookComments as $bookComment): ?>
            <header class="text-center">
                <h1>Commentaire de "<?= htmlspecialchars($bookComment['commentAuthor']) ?>" </h1>
                <p>Publié le <?= htmlspecialchars($bookComment['commentFrDate']) ?></p>
            </header>
            <form method="post" action="">
                <label for="content">Contenu :</label>
                <div class="form-group">
                    <textarea id="content" class="form-control" name="content" rows=15" cols="60"><?= htmlspecialchars($bookComment['Comment']) ?></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($bookComment['commentId']) ?>" />
                    <input type="submit" class="btn btn-outline-primary" name="formAcceptComment" value="Accepter" />
                    <input type="submit" class="btn btn-outline-primary" name="formDeleteComment" value="Supprimer" />
                </div>
            </form>
            <?php endforeach ?>
        </div>
    </div>
</div>