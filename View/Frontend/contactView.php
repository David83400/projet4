<?php $this->title = 'Jean Forteroche | Contact' ?>
<div class="container">
    <?php if (isset($_SESSION['flash']))
    { ?>
    <?php foreach($_SESSION['flash'] as $type => $success): ?>
    <div class="alert-flash">
        <h2><?= $success; ?></h2>
    <?php endforeach; ?>
    <?php unset($_SESSION['flash']); ?>
    </div>
    <?php } ?>
    <div id="contact">
        <div class="row">
            <div class="col-12">
                <header class="text-center">
                    <h1>Formulaire de contact </h1>
                </header>
                <?php if ((isset($_POST['contactForm']))) { ?>
                <?php foreach ($errors as $error): ?>
                <div class="alert alert-danger">
                    <ul>
                        <li><?= $error; ?></li>
                    </ul>
                </div>
                <?php endforeach; ?>
                <?php } ?>
                <form method="post" action="index.php?action=contact">
                    <label for="pseudoUser">Votre pseudo :</label>
                    <div class="form-group">
                        <input id="pseudoUser" class="form-control" type="text" name="pseudo" />
                    </div>
                    <label for="userEmail">Votre email :</label>
                    <div class="form-group">
                        <input id="userEmail" class="form-control" type="email" name="email" />
                    </div>
                    <label for="userMessage">Votre message :</label>
                    <div class="form-group">
                        <textarea id="userMessage" class="form-control" name="message" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-primary" name="contactForm" value="Valider" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>