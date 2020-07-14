<?php ob_start(); ?>
<?php $this->title = 'Jean Forteroche | Message de ' ?>
<div class="container">
    <section id="editMessage">
        <p><a href="index.php?action=messaging">Retour à la liste des messages</a></p>
        <div class="row">
            <div class="col-12">
                <header class="text-center">
                  <h1>Message de <?= $messages['userPseudo'] ?></h1>
                  <p>Envoyé le <?= $messages['messageFrDate'] ?></p>
                  <p>Membre inscrit depuis le <?= $messages['inscriptionFrDate'] ?></p>
                </header>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="contentMessage"><?= $messages['userMessage'] ?></p>
            </div>
            <form method="post">
                <input type="submit" class="btn btn-outline-primary" name="formTreatMessage" value="Marquer comme traité" />
            </form>
        </div>
    </section>
</div>