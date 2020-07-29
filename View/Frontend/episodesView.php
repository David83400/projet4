<?php $this->title = 'Jean Forteroche | Billet simple pour l\'Alaska' ?>
<?php foreach ($episodes as $episode): ?>
<section id="episodesList">
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="cover col-3 col-sm-3 offset-sm-3 col-md-3 offset-md-4 col-lg-3 offset-lg-1">
                <h3 class="text-center"><?= $episode['title'] ?></h3>
                <img src="<?= $episode['episodeImage'] ?>" class="card-img" alt="livre de Jean Forteroche">
            </div>
            <div class="col-md-7 offset-md-3 col-lg-6 offset-lg-1">
                <div class="card-body">
                    <div class="card-title">
                        <h2 class="text-center"><?= $episode['title'] ?></h2>
                    </div>
                    <p class="card-text"><?= substr($episode['content'], 0, 550) ?> ... <a href="<?= 'index.php?action=episode&id=' . $episode['id'] ?>">lire la suite</a></p>
                    <p class="card-text"><small class="text-muted">Publié par Jean Forteroche le <?= $episode['creationFrDate'] ?></small></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endforeach; ?>