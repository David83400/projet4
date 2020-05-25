<?php $this->title = 'Jean Forteroche | Billet simple pour l\'Alaska' ?>

<?php foreach ($episodes as $episode): ?>
    <article>
        <header>
            <a href="<?= "index.php?action=episode&id=" . htmlspecialchars($episode['id']) ?>">
                <h1><?= htmlspecialchars($episode['title']) ?></h1>
            </a>
            <p>Publié par Jean Forteroche le <?= htmlspecialchars($episode['creationFrDate']) ?></p>
        </header>
        <p><?= htmlspecialchars($episode['content']) ?></p>
    </article>
<?php endforeach; ?>