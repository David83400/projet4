<?php $this->title = 'Jean Forteroche | ' . htmlspecialchars($episode['title']) ?>

<article>
  <p><a href="index.php?action=episodes">Retour à la liste des billets</a></p>
  <header>
    <h1><?= htmlspecialchars($episode['title']) ?></h1>
    <p>Publié par Jean Forteroche le <?= htmlspecialchars($episode['creationFrDate']) ?></p>
  </header>
  <p><?= htmlspecialchars($episode['content']) ?></p>
</article>
<hr />
<header>
  <h3>Laissez un commentaire sur l'épisode : "<?= htmlspecialchars($episode['title']) ?>".</h3>
</header>
<form method="post" action="index.php?action=comment">
    <input id="author" name="author" type="text" placeholder="Votre pseudo" required /><br />
    <textarea id="textComment" name="comment" rows="14" placeholder="Votre commentaire" required></textarea><br />
    <input type="hidden" name="id" value="<?= htmlspecialchars($episode['id']) ?>" />
    <input type="submit" value="Commenter" />
</form>
<hr />
<header>
  <h3>Les derniers commentaires sur l'épisode : "<?= htmlspecialchars($episode['title']) ?>".</h3>
</header>
  <?php foreach ($comments as $comment): ?>
    <p>Le <?= htmlspecialchars($comment['commentFrDate']) ?></p>
    <p><?= htmlspecialchars($comment['author']) ?> dit :</p>
    <p><?= htmlspecialchars($comment['comment']) ?></p>
  <?php endforeach; ?>