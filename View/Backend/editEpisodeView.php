<?php ob_start(); ?>
<?php $this->title = 'Jean Forteroche | Edition' ?>
<div class="container">
    <div id="editEpisode">
        <div class="row">
            <div class="col-12">
                <p><a href="index.php?action=admin">Retour à la liste des épisodes</a></p>
                <header class="text-center">
                    <h1>Editer un épisode</h1>
                </header>
                <?php if (isset($_POST['formEditEpisode'])) { ?>
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
                        <input id="title" class="form-control" type="text" name="title" value="" />
                    </div>
                    <label for="slug">Slug :</label>
                    <div class="form-group">
                        <input id="slug" class="form-control" type="text" name="slug" value="" />
                    </div>
                    <label for="content">Contenu :</label>
                    <div class="form-group">
                        <textarea id="content" class="form-control tiny" type="text" name="content">
                            <h1>Titre du chapitre</h1>
                            <p>Contenu .......</p>
                        </textarea>
                    </div>
                    <label for="authorEpisode">Auteur :</label>
                    <div class="form-group">
                        <input id="authorEpisode" class="form-control" type="text" name="author" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-primary" name="formEditEpisode" value="Valider" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>