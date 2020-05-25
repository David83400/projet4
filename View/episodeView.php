<?php $this->title = 'Jean Forteroche | ' . htmlspecialchars($episode['title']) ?>

<article>
  <p><a href="index.php?action=episodes">Retour à la liste des billets</a></p>
  <header>
    <h1><?= htmlspecialchars($episode['title']) ?></h1>
    <time><?= htmlspecialchars($episode['creationDate']) ?></time>
  </header>
  <p><?= htmlspecialchars($episode['content']) ?></p>
</article>