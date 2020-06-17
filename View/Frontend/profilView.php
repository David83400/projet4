<?php session_start(); ?>
<?php $this->title = 'Jean Forteroche | Profil membre' ?>

<div class="d-flex flex-column justify-content-around" id="infos">
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
                <form method="POST" action="">
                    <div class="form-group d-flex flex-column">
                        <label for="oldPass">Votre ancien mot de passe</label><input id="oldPass" name="oldPass" type="password" />
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="newPass">Votre nouveau mot de passe</label><input id="newPass" name="newPass" type="password" />
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="newPassConfirm">Confirmez votre nouveau mot de passe</label><input id="newPassConfirm" name="newPassConfirm" type="password" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-outline-primary" name="formChangeMdp" value="Confirmer" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
