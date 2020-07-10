<?php $this->title = 'Jean Forteroche | Profil Administrateur' ?>
<section class="infos">
    <div class="d-flex flex-column justify-content-around">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="textInfos d-flex flex-column justify-content-between text-center">
                    <h3>Bonjour <?= $_SESSION['userPseudo'] ?></h3>
                    <h4>Vous trouverez ici vos informations de connexion</h4>
                    <p>Votre pseudo : <?= $_SESSION['userPseudo'] ?></p>
                    <p>Votre email : <?= $_SESSION['userEmail'] ?></p>
                    <p>Votre date d'inscription : le <?= $_SESSION['userInscriptionDate'] ?></p>
                    <a href="index.php?action=deconnect">Se déconnecter</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8 offset-2 col-md-4 offset-md-4">
                <div class="changeMdp text-center">
                    <h4>Changer de mot de passe</h4>
                    <?php if (isset($_POST['formAdminChangeMdp'])) { ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?= $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php } ?>
                    <form method="POST" action="">
                        <div class="form-group d-flex flex-column">
                            <label for="oldAdminPass">Votre ancien mot de passe</label><input id="oldAdminPass" name="oldPass" type="password" />
                        </div>
                        <div class="form-group d-flex flex-column">
                            <label for="newAdminPass">Votre nouveau mot de passe <span>(8 caractères minimum)</span></label><input id="newAdminPass" name="newPass" type="password" />
                        </div>
                        <div class="form-group d-flex flex-column">
                            <label for="newAdminPassConfirm">Confirmez votre nouveau mot de passe</label><input id="newAdminPassConfirm" name="newPassConfirm" type="password" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-outline-primary" name="formAdminChangeMdp" value="Confirmer" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>