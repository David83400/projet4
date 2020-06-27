<?php ob_start(); ?>
<?php $this->title = 'Jean Forteroche | Modifier un épisode' ?>
<div id="modify">
    <div class="row">
        <div class="col-12">
            <p><a href="index.php?action=admin">Retour à la liste des épisodes</a></p>
            <header class="text-center">
                <h1>Modifier l'épisode "<?= htmlspecialchars($episode['title']) ?>" </h1>
                <p>Publié par Jean Forteroche le <?= htmlspecialchars($episode['creationFrDate']) ?></p>
                <p>Dernière modification le <?= htmlspecialchars($episode['modificationFrDate']) ?></p>
            </header>
            <form method="post" action="">
                <label for="title">Titre :</label>
                <div class="form-group">
                    <input id="title" class="form-control" type="text" name="title" value="<?= htmlspecialchars($episode['title']) ?>" />
                </div>
                <label for="slug">Slug :</label>
                <div class="form-group">
                    <input id="slug" class="form-control" type="text" name="slug" value="<?= htmlspecialchars($episode['slug']) ?>" />
                </div>
                <label for="content">Contenu :</label>
                <div class="form-group">
                    <textarea id="content" class="form-control" name="content" rows=15" cols="60"><?= htmlspecialchars($episode['content']) ?></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($episode['id']) ?>" />
                    <input type="submit" class="btn btn-outline-primary" name="formModifyEpisode" value="Modifier" />
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <header class="text-center">
                <h3>Commentaires de l'épisode "<?= htmlspecialchars($episode['title']) ?>" </h3>
            </header>
            <table class="table table-striped table-sm text-center">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Auteur</th>
                        <th scope="col">Commentaire</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($episodeComments as $episodeComment): ?>
                    <tr>
                        <th scope="col"><?= $episodeComment['author'] ?></th>
                        <td><?= $episodeComment['episodeComment'] ?></td>
                        <td><?= $episodeComment['commentFrDate'] ?></td>
                        <td>
                            <a onclick="return confirm('Voulez vous vraiment supprimer ce contenu ?');"href="index.php?action=delete&id=<?=  $episodeComment['id'] ?>">supprimer</a>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>