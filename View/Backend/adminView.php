<?php $this->title = 'Jean Forteroche | Administration' ?>
<div id="admin">
    <div class="listEpisodes">
        <div class="row">
            <div class="col-12">
                <header class="text-center">
                    <h1>Episodes "Billet simple pour l'Alaska"</h1>
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
                                <a href="index.php?action=modifyEpisode&id=<?= $episode['id'] ?>">éditer</a>
                                <a onclick="return confirm('Voulez vous vraiment supprimer ce contenu ?');"href="index.php?action=deleteEpisode&id=<?= $episode['id'] ?>">supprimer</a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="listEpisodeComments">
        <div class="row">
            <div class="col-12">
                <?php foreach($episodeComments as $episodeComment): ?>
                <header class="text-center">   
                <?php
                if ($episodeComment['nbComments'] > 0)
                { ?>
                <h2><span class="alert alert-danger"><?= htmlspecialchars($episodeComment['nbComments']) ?></span> commentaire(s) d'épisode(s) signalé(s)</h2>
                <?php
                } else { ?>
                <h2>Liste des commentaires d'épisodes signalés</h2>
                </header>
                <?php
                }
                ?>
                </header>
                <table class="table table-striped table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Auteur</th>
                            <th scope="col">Commentaire</th>
                            <th scope="col">Posté le</th>
                            <th scope="col">Article</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col"><?= htmlspecialchars($episodeComment['commentAuthor']) ?></th>
                            <td><?= htmlspecialchars(substr($episodeComment['comment'], 0, 20)) ?></td>
                            <td><?= htmlspecialchars($episodeComment['commentFrDate']) ?></td>
                            <td><?= htmlspecialchars($episodeComment['title']) ?></td>
                            <td>
                                <a href="index.php?action=editEpisodeComment&id=<?= $episodeComment['commentId'] ?>">éditer</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <div class="listBookComments">
        <div class="row">
            <div class="col-12">
                <?php foreach($bookComments as $bookComment): ?>
                <header class="text-center">   
                <?php
                if ($bookComment['nbComments'] > 0)
                { ?>
                <h2><span class="alert alert-danger"><?= htmlspecialchars($bookComment['nbComments']) ?></span> commentaire(s) de roman(s) signalé(s)</h2>
                <?php
                } else { ?>
                <h2>Liste des commentaires de romans signalés</h2>
                </header>
                <?php
                }
                ?>
                </header>
                <table class="table table-striped table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Auteur</th>
                            <th scope="col">Commentaire</th>
                            <th scope="col">Posté le</th>
                            <th scope="col">Article</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="col"><?= htmlspecialchars($bookComment['commentAuthor']) ?></th>
                            <td><?= htmlspecialchars(substr($bookComment['comment'], 0, 20)) ?></td>
                            <td><?= htmlspecialchars($bookComment['commentFrDate']) ?></td>
                            <td><?= htmlspecialchars($bookComment['title']) ?></td>
                            <td>
                                <a href="index.php?action=editBookComment&id=<?= $bookComment['commentId'] ?>">éditer</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>