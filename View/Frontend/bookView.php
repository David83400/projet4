<?php $this->title = 'Jean Forteroche | ' . htmlspecialchars($book['title']) ?>
<div class="container">
    <section id="book">
        <p><a href="index.php?action=books">Retour à la liste des romans</a></p>
        <article>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <header>
                            <h1><?= htmlspecialchars($book['title']) ?></h1>
                            <p>Parution : <?= htmlspecialchars($book['parutionFrDate']) ?></p>
                            </header>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <img src="<?= htmlspecialchars($book['bookImage']) ?>" class="float-left" alt="Livre de Jean Forteroche">
                            <p class="content"><?= htmlspecialchars($book['content']) ?></p>
                            <h4>Commander</h4>
                            <a href="https://www.placedeslibraires.fr/" target="_blank"><button type="button" class="btn btn-outline-primary">Place des libraires</button></a>
                            <a href="https://www.fnac.com/" target="_blank"><button type="button" class="btn btn-outline-primary">Fnac</button></a>
                            <a href="https://www.amazon.fr/" target="_blank"><button type="button" class="btn btn-outline-primary">Amazon</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
    <section id="commentsBooks">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <header>
                            <h3>Laissez votre commentaire.</h3>
                        <?php
                        if (isset($_SESSION['userPseudo']))
                        {
                        ?>
                        </header>
                        <form method="post" action="index.php?action=bookComment">
                            <div class="form-group">
                                <input id="pseudoBook" name="author" type="text" placeholder="Votre pseudo" required />
                            </div>
                            <div class="form-group">
                                <textarea id="textCommentBook" name="bookComment" placeholder="Votre commentaire" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($book['id']) ?>" />
                                <input type="submit" class="btn btn-outline-primary" value="Commenter" />
                            </div>
                        </form>
                        <?php
                        } else {
                        ?>
                        <p>Pour laisser un commentaire, connectez vous à votre compte ou créez en un : <a href="index.php?action=connexion">Je crée mon compte.</a></p>
                        </header>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <header>
                        <h4>Commentaires :</h4>
                        </header>
                        <?php foreach ($bookComments as $bookComment): ?>
                        <p><span><?= htmlspecialchars($bookComment['author']) ?> </span> Le <?= htmlspecialchars($bookComment['commentFrDate']) ?> <a class="signale" href="index.php?action=signaleBookComment&id=<?= htmlspecialchars($bookComment['id']) ?>&bookId=<?= htmlspecialchars($bookComment['bookId']) ?>">Signaler</a></p>
                        <p><?= htmlspecialchars($bookComment['bookComment']) ?></p>
                        <hr />
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>