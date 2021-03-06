<?php ob_start(); ?>
<?php $this->title = 'Jean Forteroche | Se connecter' ?>
<section id="connexion">
    <div class="row">
        <div class="connect col-10 offset-1 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4 offset-lg-2">
            <div class="row">
                <div class="col-12 ">
                    <h3>Se connecter</h3>
                    <?php if (isset($_POST['formConnect'])) { ?>
                    <?php foreach ($errors as $error): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <li><?= $error; ?></li>
                        </ul>
                    </div>
                    <?php endforeach; ?>
                    <?php } ?>
                    <form method="POST" action="">
                        <div class="form-group d-flex flex-column justify-content-center">
                            <label for="pseudoConnect">Votre pseudo</label><input id="pseudoConnect" name="pseudo" type="text" />
                        </div>
                        <div class="form-group d-flex flex-column justify-content-center">
                            <label for="passConnect">Votre mot de passe</label><input id="passConnect" name="pass" type="password" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-outline-primary" name="formConnect" value="Se connecter" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="create col-10 offset-1 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-4">
            <div class="row">
                <div class="col-12">
                    <h3>Créer un compte</h3>
                    <?php if (isset($_POST['formCreate'])) { ?>
                    <?php foreach ($errors as $error): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <li><?= $error; ?></li>
                        </ul>
                    </div>
                    <?php endforeach; ?>
                    <?php } ?>
                    <form method="POST">
                        <div class="form-group d-flex flex-column justify-content-center">
                            <label for="pseudoCreate">Votre pseudo <span>(entre 5 et 19 caractères)</span></label><input id="pseudoCreate" name="pseudo" type="text" />
                        </div>
                        <div class="form-group d-flex flex-column justify-content-center">
                            <label for="passCreate">Votre mot de passe <span>(8 caractères minimum)</span></label><input id="passCreate" name="pass" type="password" />
                        </div>
                        <div class="form-group d-flex flex-column justify-content-center">
                            <label for="passConfirm">Confirmez votre mot de passe</label><input id="passConfirm" name="passConfirm" type="password" />
                        </div>
                        <div class="form-group d-flex flex-column justify-content-center">
                            <label for="email">Votre email</label><input id="email" name="email" type="email" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-outline-primary" name="formCreate" value="S'inscrire" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>