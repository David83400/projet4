<?php $this->title = 'Jean Forteroche | Administration' ?>
<div id="admin">
    <div class="listEpisodes">
        <div class="row">
            <div class="col-12">
                <header class="text-center">
                    <h1>Episodes "Billet Simple pour l'Alaska"</h1>
                </header>
                <table class="table table-striped table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Créé le</th>
                            <th scope="col">Modifié le</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($episodes as $episode): ?>
                        <tr>
                            <th scope="col"><?= $episode['id'] ?></th>
                            <td><?= $episode['title'] ?></td>
                            <td><?= $episode['creationFrDate'] ?></td>
                            <td><?= $episode['modificationFrDate'] ?></td>
                            <td>
                                <a href="index.php?action=modify&id=<?= $episode['id'] ?>">éditer</a>
                                <a onclick="return confirm('Voulez vous vraiment supprimer ce contenu ?');"href="index.php?action=deleteEpisode&id=<?= $episode['id'] ?>">supprimer</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="listComments">
        <div class="row">
            <div class="col-12">
                <header class="text-center">
                    <h2>Liste des commentaires signalés</h2>
                </header>
                <table class="table table-striped table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Auteur</th>
                            <th scope="col">Commentaire</th>
                            <th scope="col">Posté le</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php // foreach($episodes as $episode): ?>
                        <tr>
                            <th scope="col"><? //= $episode['id'] ?></th>
                            <td><?//= $episode['title'] ?></td>
                            <td><?//= $episode['creationFrDate'] ?></td>
                            <td>
                                <a href="index.php?action=modify&id=<? //= $episode['id'] ?>">Mettre en ligne</a>
                                <a onclick="return confirm('Voulez vous vraiment supprimer ce contenu ?');"href="index.php?action=delete&id=<? //=  $episode['id'] ?>">supprimer</a>
                            </td>
                        </tr>
                        <?php // endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>