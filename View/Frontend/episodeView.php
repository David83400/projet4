<?php $this->title = 'Jean Forteroche | ' . htmlspecialchars($episode['title']) ?>

<div class="container">
  <section id="episode">
    <p><a href="index.php?action=episodes">Retour à la liste des billets</a></p>
    <article>
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-12">
              <header>
                <h1><?= htmlspecialchars($episode['title']) ?></h1>
                <p>Publié par Jean Forteroche le <?= htmlspecialchars($episode['creationFrDate']) ?></p>
              </header>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <img src="Public/images/jeanForterocheRounded.png" class="rounded-circle float-left" alt="Jean Forteroche">
              <p class="content"><?= htmlspecialchars($episode['content']) ?></p>
            </div>
          </div>
        </div>
      </div>
    </article>
  </section>
  <hr />
  <section id="comments">
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-12">
            <header>
              <h4>Laissez votre commentaire.</h4>
            </header>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <form method="post" action="index.php?action=comment">
              <div class="form-group">
                <input id="pseudo" name="author" type="text" placeholder="Votre pseudo" required />
              </div>
              <div class="form-group">
                <textarea id="textComment" name="comment" placeholder="Votre commentaire" required></textarea>
              </div>
              <div class="form-group">
                <input type="hidden" name="id" value="<?= htmlspecialchars($episode['id']) ?>" />
                <input type="submit" class="btn btn-primary" value="Commenter" />
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-12">
            <header>
              <h4>Commentaires :</h4>
            </header>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <?php foreach ($comments as $comment): ?>
              <p><span><?= htmlspecialchars($comment['author']) ?> :</span> Le <?= htmlspecialchars($comment['commentFrDate']) ?></p>
              <p><?= htmlspecialchars($comment['comment']) ?></p>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>