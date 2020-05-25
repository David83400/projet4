<?php $this->title = 'Jean Forteroche | Blog officiel' ?>

<?php foreach ($lastEpisode as $lastEpisode): ?>
<article>
  <header>
    <a href="<?= "index.php?action=episode&id=" . htmlspecialchars($lastEpisode['id']) ?>">
      <h1><?= htmlspecialchars($lastEpisode['title']) ?></h1>
    </a>
    <time><?= htmlspecialchars($lastEpisode['creationDate']) ?></time>
  </header>
  <p><?= htmlspecialchars($lastEpisode['content']) ?></p>
</article>
<?php endforeach; ?>