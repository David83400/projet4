<?php $this->title = 'Jean Forteroche | Blog officiel' ?>

<?php foreach ($lastEpisode as $lastEpisode): ?>
<article>
  <header>
    <a href="<?= "index.php?action=episode&id=" . htmlspecialchars($lastEpisode['id']) ?>">
      <h1><?= htmlspecialchars($lastEpisode['title']) ?></h1>
    </a>
    <p>Publié par Jean Forteroche le : <?= htmlspecialchars($lastEpisode['creationFrDate']) ?></p>
  </header>
  <p><?= htmlspecialchars($lastEpisode['content']) ?></p>
</article>
<?php endforeach; ?>