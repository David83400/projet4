<?php ob_start(); ?>
<?php $this->title = 'Jean Forteroche | Modifier un épisode' ?>
<div class="container">
    <div id="modify">
        <div class="row">
            <div class="col-12">
                <p><a href="index.php?action=admin">Retour à la liste des épisodes</a></p>
                <header class="text-center">
                    <h1>Modifier l'épisode "<?= $episode['title'] ?>" </h1>
                    <p>Publié par Jean Forteroche le <?= $episode['creationFrDate'] ?></p>
                    <p>Dernière modification le <?= $episode['modificationFrDate'] ?></p>
                </header>
                <?php if (isset($_POST['formModifyEpisode'])) { ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php } ?>
                <form method="post">
                    <label for="title">Titre :</label>
                    <div class="form-group">
                        <input id="title" class="form-control" type="text" name="title" value="<?=$episode['title'] ?>" />
                    </div>
                    <label for="slug">Slug :</label>
                    <div class="form-group">
                        <input id="slug" class="form-control" type="text" name="slug" value="<?= $episode['slug'] ?>" />
                    </div>
                    <label for="content">Contenu :</label>
                    <div id="content" class="form-group">
                        <textarea id="content" class="form-control tiny" name="content"><?= $episode['content'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?= $episode['id'] ?>" />
                        <input type="submit" class="btn btn-outline-primary" name="formModifyEpisode" value="Modifier" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>